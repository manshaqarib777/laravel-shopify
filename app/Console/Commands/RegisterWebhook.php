<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Config;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class RegisterWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'btcpay:register-webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registers the webhook for Invoice Paid';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Registering webhook...');
        $payserver_store_id = Config::get('laravel-btcpay.store_id');
        $payserver_secret = Config::get('laravel-btcpay.api_key');
        $payserver_host = Config::get('laravel-btcpay.server_url');
        $webhookId = Setting::get('webhook.id');
        if ($webhookId) {
            $this->info('Webhook already registered. ID: ' . $webhookId);
            return 0;
        }
        $webhookId = rand(1, 200000000000000);
        $webhookSecret = $this->generateRandomString(32);
        $secretSetting = new Setting(
            [
                'key' => 'webhook.secret',
                'value' => $webhookSecret
            ]
        );
        $secretSetting->save();

        $webhookData = [
            'id' => $webhookId,
            'enabled' => true,
            'automaticRedelivery' => true,
            'url' => route('invoice.paid'),
            'authorizedEvents' => [
                'everything' => false,
                'specificEvents' => [
                    'InvoicePaymentSettled'
                ]
            ],
            'secret' => $webhookSecret
        ];
        $guzzle = new Client();
        $webhook = $guzzle->post("${payserver_host}api/v1/stores/$payserver_store_id/webhooks", [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'token ' . $payserver_secret
            ],
            'json' => $webhookData
        ]);
        $resp = $webhook->getBody()->getContents();
        $json_webhook = json_decode($resp, true);
        $setting = new Setting([
            'key' => 'webhook.id',
            'value' => $json_webhook['id']
        ]);
        $setting->save();
        $this->info('Webhook registered. ID: ' . $json_webhook['id']);
        $this->info('details: ' . $resp);
        return 0;
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
