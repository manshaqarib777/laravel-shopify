<?php

namespace App\Http\Controllers\UserPanel;

    use App\Classes\BitcoinAPI;
    use App\Http\Controllers\Controller;
    use App\Models\Coupon;
    use App\Models\User;
    use App\Models\Transactions;
    use App\Models\UserCouponCheckout;
    use App\Models\UserOrder;
    use App\Models\UserTicket;
    use App\Models\UserTransaction;
    use App\Rules\RuleCouponRedeem;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
   // use Illuminate\Validation\Validator;
   use BTCPayServer\Client\Invoice;
  use Validator;
  use App\UseCases\UserPanelService;
use App\Http\Requests\UserPanel\OrderReviewRequest;

    class UserPanelController extends Controller
    {
        protected $service;

        public function __construct(UserPanelService $service)
        {
            $this->middleware('auth');
            $this->service = $service;
        }

        public function showUserDashboard()
        {
            return view('frontend/userpanel.home');
        }

        public function shownewUserDashboard()
        {
            $uid = Auth::user()->id;
            $data = User::where('id',$uid)->first();
            $tickets = UserTicket::where('user_id',$uid)->orderBy('id','DESC')->get();
            return view('frontend/userpanel.newhome',compact('data','tickets'));
        }

        public function showSettingsPage()
        {
            return view('frontend/userpanel.settings');
        }

        public function shownewSettingsPage()
        {
            return view('frontend/userpanel.newsettings');
        }

        public function removeCouponCheckout()
        {
            UserCouponCheckout::where('user_id', Auth::user()->id)->delete();

            return redirect()->route('checkout');
        }

        public function redeemCouponCheckout(Request $request)
        {
            if ($request->getMethod() == 'POST') {
                $validator = Validator::make($request->all(), [
                    'coupon_code' => new RuleCouponRedeem(),
                ]);

                if (! $validator->fails()) {
                    $coupon = Coupon::where('code', $request->get('coupon_code'))->get()->first();

                    if ($coupon != null) {
                        if (! Auth::user()->hasCouponUsed($coupon)) {
                            UserCouponCheckout::create([
                                'coupon_code' => $coupon->code,
                                'user_id' => Auth::user()->id,
                            ]);

                            return redirect()->route('checkout');
                        } else {
                            $request->flash();

                            return redirect()->route('checkout')->withErrors(['coupon_code' => __('frontend/user.coupon_redeem.error3')])->withInput();
                        }
                    } else {
                        return redirect()->route('checkout')->withErrors(['coupon_code' => __('frontend/user.coupon_redeem.error1')])->withInput();
                    }
                } else {
                    $request->flash();

                    return redirect()->route('checkout')->withErrors($validator)->withInput();
                }
            }

            return redirect()->route('checkout');
        }

        public function redeemCoupon(Request $request)
        {
            if ($request->getMethod() == 'POST') {
                $validator = Validator::make($request->all(), [
                    'coupon_redeem_code' => new RuleCouponRedeem(),
                ]);

                if (! $validator->fails()) {
                    $coupon = Coupon::where('code', $request->get('coupon_redeem_code'))->get()->first();

                    if ($coupon != null) {
                        if (! $coupon->isPercent()) {
                            if (! Auth::user()->hasCouponUsed($coupon)) {
                                if (Auth::user()->redeemCoupon($coupon)) {
                                    return redirect()->route('deposit')->with(['successMessage' => __('frontend/user.coupon_redeem.success', [
                                        'amount' => $coupon->getFormattedAmount(),
                                        'code' => $coupon->code,
                                    ])]);
                                }
                            } else {
                                $request->flash();

                                return redirect()->route('deposit')->withErrors(['coupon_redeem_code' => __('frontend/user.coupon_redeem.error3')])->withInput();
                            }
                        } else {
                            return redirect()->route('deposit')->withErrors(['coupon_redeem_code' => __('frontend/user.coupon_redeem.error4')])->withInput();
                        }
                    }
                } else {
                    $request->flash();

                    return redirect()->route('deposit')->withErrors($validator)->withInput();
                }
            }

            return redirect()->route('deposit');
        }

        public function passwordChangeForm(Request $request)
        {
            if ($request->getMethod() == 'POST') {
                $validator = Validator::make($request->all(), [
                    'settings_current_password' => [
                        'required',
                    ],
                    'settings_new_password' => [
                        'required', 'min:6', 'max:255', 'same:settings_new_password_confirm',
                    ],
                    'settings_new_password_confirm' => [
                        'required', 'min:6', 'max:255',
                    ],
                ]);

                if (! $validator->fails()) {
                    if (Hash::check($request->input('settings_current_password'), Auth::user()->password)) {
                        Auth::user()->update([
                            'password' => bcrypt($request->input('settings_new_password_confirm')),
                        ]);

                        return redirect()->route('settings')->with('successMessageSettingsPassword', __('frontend/user.success_password_changed'));
                    } else {
                        $validator->getMessageBag()->add('settings_current_password', __('frontend/user.settings_current_password_wrong'));

                        $request->flash();

                        return redirect()->route('settings')->withErrors($validator)->withInput();
                    }
                } else {
                    $request->flash();

                    return redirect()->route('settings')->withErrors($validator)->withInput();
                }
            }

            return redirect()->route('settings');
        }

        public function jabberIDChangeForm(Request $request)
        {
            if ($request->getMethod() == 'POST') {
                $validator = Validator::make($request->all(), [
                    'settings_jabber_id' => [
                        'required', 'string', 'email', 'max:255', 'unique:users,jabber_id,'.Auth::user()->id,
                    ],
                ]);

                if (! $validator->fails()) {
                    $jabberID = $request->input('settings_jabber_id');

                    Auth::user()->update([
                        'jabber_id' => $jabberID,
                       // 'newsletter_enabled' => $request->get('newsletter_enabled') ? 1 : 0,
                    ]);
                } else {
                    $request->flash();

                    return redirect()->route('settings')->withErrors($validator)->withInput();
                }
            }

            return redirect()->route('settings');
        }

        public function mailAddressChangeForm(Request $request)
        {
            if ($request->getMethod() == 'POST') {
                $validator = Validator::make($request->all(), [
                    'settings_mail_address' => [
                        'required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id,
                    ],
                ]);

                if (! $validator->fails()) {
                    $mailAddress = $request->input('settings_mail_address');

                    Auth::user()->update([
                        'email' => $mailAddress,
                    ]);
                } else {
                    $request->flash();

                    return redirect()->route('settings')->withErrors($validator)->withInput();
                }
            }

            return redirect()->route('settings');
        }

        public function showDepositPage()
        {
            return view('frontend/userpanel.deposit');
        }
        public function BtcpayTransactions(Request $request)
        {

            $orderId = $request->order_id;

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://btcpay0.voltageapp.io/api/v1/stores/AiKz2Y5NSCjvMhNmqJReYgjTRf5vyn4e8JrfwCZ8pRN4/invoices?orderId=$orderId",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
              CURLOPT_HTTPHEADER => array(
                'Authorization: Basic cHJpbmNla2FtYm9qNzUwMEBnbWFpbC5jb206TU1EaTFQRm5uUnFhdlU1aGhVRm96ZzRPUQ==',
              ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $result = json_decode($response);
            $invid = $result[0]->id;
            $amt = $result[0]->amount;
            $status = $result[0]->status;
            $currency = $result[0]->currency;

            if($invid){
                $transaction = new Transactions;
                $transaction->order_id = $orderId;
                $transaction->invoice_id = $invid;
                $transaction->amount = $amt;
                $transaction->status = $status;
                $transaction->save();

            }else{
                echo "haini";
            }

        }
        public function shownewDepositPage()
        {
            return view('frontend/userpanel.newdeposit');
        }

        public function depositBtcPaidCheck($userTransactionID)
        {
            $userTransaction = UserTransaction::where([
                ['id', '=', $userTransactionID],
                ['user_id', '=', Auth::user()->id],
                ['payment_method', '=', 'btc'],
            ])->orderByDesc('created_at')->get()->first();

            if ($userTransaction == null) {
                return redirect()->route('deposit');
            } else {
                $userTransaction->updateWhenPaidBtc();

                return redirect()->route('transactions');
            }
        }

        public function showDepositBtcPage()
        {
            $userTransaction = UserTransaction::where([
                ['user_id', '=', Auth::user()->id],
                ['status', '=', 'waiting'],
                ['payment_method', '=', 'btc'],
            ])->orderByDesc('created_at')->get()->first();

            if ($userTransaction == null) {
                $bitcoind = BitcoinAPI::getBitcoinClient();
                $btcWallet = $bitcoind->getnewaddress(Auth::user()->username, 'p2sh-segwit');

                $userTransaction = UserTransaction::create([
                    'user_id' => Auth::user()->id,
                    'wallet' => encrypt($btcWallet),
                    'status' => 'waiting',
                    'payment_method' => 'btc',
                    'amount' => 0,
                    'amount_cent' => 0,
                    'txid' => '',
                ]);
            } else {
                $btcWallet = decrypt($userTransaction->wallet);
            }

            return view('frontend/userpanel.deposit_btc', [
                'btcWallet' => $btcWallet,
                'clipboardJS' => (object) [
                    'element' => '.btc-cashin-copy-btn',
                    'fadeIn' => '.btc-cashin-copy-info',
                ],
                'userTransactionID' => $userTransaction->id,
            ]);
        }

        public function depositEthPaidCheck($userTransactionID)
        {
            $userTransaction = UserTransaction::where([
                ['id', '=', $userTransactionID],
                ['user_id', '=', Auth::user()->id],
                ['payment_method', '=', 'eth'],
            ])->orderByDesc('created_at')->get()->first();

            if ($userTransaction == null) {
                return redirect()->route('deposit');
            } else {
                $userTransaction->updateWhenPaidEth();

                return redirect()->route('transactions');
            }
        }

        public function showDepositEthPage()
        {
        }

        public function showOrdersPage($pageNumber = 0)
        {

            $user_orders = UserOrder::where('user_id', Auth::user()->id)->orderByDesc('created_at')->paginate(1, ['*'], 'page', $pageNumber);

            if ($pageNumber > $user_orders->lastPage() || $pageNumber <= 0) {
                return redirect()->route('orders-with-pageNumber', 1);
            }

            return view('frontend/userpanel.orders', [
                'user_orders' => $user_orders,
            ]);
        }

        public function shownewOrdersPage($pageNumber = 0)
        {
            $user_orders = UserOrder::where('user_id', Auth::user()->id)->orderByDesc('id')->paginate(5, ['*'], 'page', $pageNumber);

            if ($pageNumber > $user_orders->lastPage() || $pageNumber <= 0) {
                return redirect()->route('orders-with-pageNumber', 1);
            }

            return view('frontend/userpanel.neworders', [
                'user_orders' => $user_orders,
            ]);
        }

        public function showTransactionsPage($pageNumber = 0)
        {
            $user_transactions = UserTransaction::where('user_id', Auth::user()->id)->orderByDesc('created_at')->paginate(5, ['*'], 'page', $pageNumber);

            if ($pageNumber > $user_transactions->lastPage() || $pageNumber <= 0) {
                return redirect()->route('transactions-with-pageNumber', 1);
            }

            return view('frontend/userpanel.transactions', [
                'user_transactions' => $user_transactions,
            ]);
        }

        public function shownewTransactionsPage($pageNumber = 0)
        {
            $user_transactions = UserTransaction::where('user_id', Auth::user()->id)->orderByDesc('created_at')->paginate(5, ['*'], 'page', $pageNumber);

            if ($pageNumber > $user_transactions->lastPage() || $pageNumber <= 0) {
                return redirect()->route('transactions-with-pageNumber', 1);
            }

            return view('frontend/userpanel.newtransactions', [
                'user_transactions' => $user_transactions,
            ]);
        }


        public function updatephoto(Request $request){

            $request->validate([
                'photoFile' => 'required|mimes:png,jpg,jpeg'
            ]);

            try{
                if($request->hasFile("photoFile")){
                    $fileName = time().'.'.$request->photoFile->extension();
                    $data = ['photo'=> $fileName];
                    $update = User::where("username",Auth::user()->username)->update($data);
                    $request->photoFile->move('assets/newdesign/assets/img/creator/', $fileName);
                    return redirect()->back()->with('success','Update Successfuly....');
                }
            }catch(\Exception $e){
                return redirect()->back()->with('error','Something goes wrong while uploading file!');
            }
        }


        public function updateCoverphoto(Request $request){

            $request->validate([
                'coverFile' => 'required|mimes:png,jpg,jpeg'
            ]);

            try{
                if($request->hasFile("coverFile")){
                    $fileName = time().'.'.$request->coverFile->extension();
                    $data = ['cover'=> $fileName];
                    $update = User::where("username",Auth::user()->username)->update($data);
                    $request->coverFile->move('assets/newdesign/assets/img/creator/', $fileName);
                    return back()->with('success','Update Successfuly....');
                }
            }catch(\Exception $e){
                return redirect()->back()->with('error','Something goes wrong while uploading file!');
            }
        }

        public function setOrderReview ($orderId, OrderReviewRequest $request) {
            $status = $this->service->setUserOrderReview($orderId, $request->input("review"));
            return response()->json(["status" => $status], 200);
        }
    }
