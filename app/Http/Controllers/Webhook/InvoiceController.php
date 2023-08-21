<?php

namespace App\Http\Controllers\Webhook;

use App\Classes\BitcoinAPI;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\UserInvoice;
use App\Models\UserTransaction;
use Config;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function paidInvoice(Request $request)
    {


        $payserver_store_id = Config::get('laravel-btcpay.store_id');
        $payserver_secret = Config::get('laravel-btcpay.api_key');
        $payserver_host = Config::get('laravel-btcpay.server_url');


        $request->get('invoiceId');
        $request->header('BTCPay-Sig');
        $payload = $request->json()->all();
        \Log::info(json_encode($payload));
        $secret = Setting::get('webhook.secret');
        $signature = 2;
        try {
            $this->verify_signature($request, $secret);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
        $payment = $payload['payment'];
        $invoice = UserInvoice::with('user')->where('invoice_id', $payload['invoiceId'])->first();
        \Log::info($payload);
        if ($payment['status'] === 'Settled' && $invoice && $invoice->status === 'waiting') {
            DB::beginTransaction();
            try {
                $value = $payment['value'];
                $currency = BitcoinAPI::convertBtc($value);
                $userTransaction = UserTransaction::create([
                    'user_id' => $invoice->user_id,
                    'status' => 'paid',
                    'payment_method' => 'btc',
                    'amount' => intval($currency),
                    'amount_cent' => intval($currency * 100),
                    'txid' => $payload['invoiceId'],
                ]);
                $user = $invoice->user;
                $user->balance_in_cent += $currency / 100.0;
                $user->save();
                $invoice->status = 'paid';
                $invoice->save();
                \Log::info($invoice);
                \Log::info($user);
                \Log::info($userTransaction);
                $reserved_balance = (float)Setting::get('reserved_balance');
                $reserved_balance += ($value * Config::get('laravel-btcpay.reserve_percentage'));
                Setting::set('reserved_balance', $reserved_balance);
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error($e->getMessage());
                return response()->json(['error' => 'Something went wrong']);
            }
            DB::commit();
            $minimum = (float)Setting::get('share_limit', 100);
            \Log::info('minimum' . $minimum);
            \Log::info('reserved' . $reserved_balance);
            //DEDUCT FROM STORE WALLET if Payable balance reaches a fixed value. eg 0.01 BTC
            if ($reserved_balance > $minimum) {
                $feerate = 20;
                $request_params = [
                    'destinations' => [
                        [
                            'destination' => Config::get('laravel-btcpay.payserver_address'),
                            'amount' => $reserved_balance,
                            'subtractFromAmount' => true
                        ]
                    ],
                    'feerate' => $feerate,
                ];
                $guzzle = new Client();
                $response = $guzzle->post("$payserver_host/api/v1/stores/$payserver_store_id/payment-methods/onchain/BTC/wallet/transactions", [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Authorization' => 'token ' . $payserver_secret
                    ],
                    'json' => $request_params
                ]);
            }
        }
    }

    private function verify_signature(Request $request, string $signingSecret)
    {
        \Log::info($signingSecret);

        $signature = Str::after($request->header('BTCPay-Sig'), 'sha256=');

        if (!$signature) {
            throw new \Exception('Signature is missing');
        }


        if (empty($signingSecret)) {
            throw new \Exception('Signing secret is missing');
        }
        $computedSignature = hash_hmac('sha256', $request->getContent(), $signingSecret);
        \Log::info($signature);
        \Log::info($computedSignature);

        if (!hash_equals($signature, $computedSignature)) {
            throw new \Exception('Signature is invalid');
        }
        return 0;
    }

    //
}
