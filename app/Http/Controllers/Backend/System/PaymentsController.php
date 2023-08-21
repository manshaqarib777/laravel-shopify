<?php

namespace App\Http\Controllers\Backend\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateWithdrawalRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('backend');
        $this->middleware('permission:system_payments');
    }

    public function show()
    {
        $payserver_store_id = env('BTC_PAY_SERVER_STORE_ID', '');
        $payserver_secret = env('BTC_PAY_SERVER_SECRET', '');
        $url = "https://laravel-payment.net/api/v1/stores/$payserver_store_id/payment-methods/onchain/BTC/wallet/";

        $guzzle = new Client();
        $response = $guzzle->request("GET", $url, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'token ' . $payserver_secret
            ],
        ]);
        $balance = 0;
        $responseJson = json_decode($response->getBody()->getContents(), 'true');
        Session::put('balance', $responseJson['confirmedBalance']);
        $url = "https://laravel-payment.net/api/v1/stores/$payserver_store_id/payment-methods/onchain/BTC/wallet/feerate?blockTarget=10";
        $feeRate = Session::get('feerate', 0);
        $feeRate = 0;
        if ($feeRate === 0) {
            $guzzle = new Client();
            $response = $guzzle->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'token ' . $payserver_secret
                ],
//                'params' => [
//                    'blockTarget' => 1
//                ]
            ]);
            $feerate = json_decode($response->getBody()->getContents(), 'true');
            $feeRate = $feerate['feeRate'];
            Session::put('feerate', $feeRate);
        }

        Session::put('conversion_rate', 27500);
        return view('backendV2.system.payments', [
            'balance' => $responseJson['confirmedBalance'],
            'conversion_rate' => 27500,
            'fee_rate' => $feeRate,
            'minimum' => 1,
        ]);
    }

    public function submit(CreateWithdrawalRequest $request)
    {
        $payserver_store_id = env('BTC_PAY_SERVER_STORE_ID', '');
        $payserver_secret = env('BTC_PAY_SERVER_SECRET', '');
        $amount = 0.0;
        if ($request->input('amount') > 0) {
            $amount = round($request->input('amount') / Session::get('conversion_rate'), 8);
        }
        $feerate = Session::get('feerate', 0);
        if ($request->input('feerate') > 0) {
            $feerate = round(100_000_000 * $request->input('feerate') / Session::get('conversion_rate'), 8);
        }

        $request_params = [
            'destinations' => [
                [
                    'destination' => $request->input('destination_address'),
                    'amount' => $amount,
                    'subtractFromAmount' => true
                ]
            ],
            'feerate' => $feerate,
        ];
        $guzzle = new Client();
        $response = $guzzle->post("https://laravel-payment.net/api/v1/stores/$payserver_store_id/payment-methods/onchain/BTC/wallet/transactions", [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'token ' . $payserver_secret
            ],
            'json' => $request_params
        ]);
        Session::remove('conversion_rate');
        dd($response->getBody()->getContents());

        return redirect()->route('backend-system-payments')->with([
            'successMessage' => __('backend/system.payments.transfer_initiated'),
        ]);
    }
}
