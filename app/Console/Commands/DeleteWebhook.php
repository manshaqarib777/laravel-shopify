<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Config;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class DeleteWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'btcpay:delete-webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $guzzle = new Client();
        $webhook = $guzzle->delete("${payserver_host}api/v1/stores/$payserver_store_id/webhooks/$webhookId", [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'token ' . $payserver_secret
            ],
        ]);
        Setting::where('key', 'webhook.id')
            ->delete();
        return 0;
    }
}
