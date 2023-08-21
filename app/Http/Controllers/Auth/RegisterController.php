<?php

namespace App\Http\Controllers\Auth;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Http\Controllers\Controller;
    use App\Mails\AccountCreatedMail;
    use App\Models\Notification;
    use App\Models\User;
    use Illuminate\Foundation\Auth\RegistersUsers;
    // use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    // use Illuminate\Http\Request;
	use App\Rules\ValidHCaptcha;
    use Hash;
    use Mail;

    class RegisterController extends Controller
    {
        use RegistersUsers;

        protected $redirectTo = '/home';

        public function __construct()
        {
            $this->middleware('guest');
        }

        protected function validator(array $data)
        {
            return Validator::make($data, [
                /*
                'name' => [
                    'required', 'string', 'min:3', 'max:30'
                ],
                */
                'username' => [
                    'required', 'string', 'min:3', 'max:30', 'regex:/^[a-zA-Z0-9_]+$/u', 'unique:users',
                ],
                /*
                'email' => [
                    'required', 'string', 'email', 'max:255', 'unique:users'
                ],
                */
                'jabber_id' => [
                    'required', 'string', 'email', 'max:255', 'unique:users',
                ],
                'password' => [
                    'required', 'string', 'min:6', 'max:100', 'confirmed',
                ],
                'h-captcha-response' => ['required', new ValidHCaptcha()],
            ]);
        }

        protected function create(array $data)
        {
            $user = User::create([
                'name'                  => '', //$data['name'],
                'username'              => $data['username'],
                //'email'                 => $data['email'],
                'jabber_id'             => $data['jabber_id'],
                'newsletter_enabled'    => isset($data['newsletter_enabled']) ? 1 : 0,
                'balance_in_cent'       => 0,
                'password'              => Hash::make($data['password']),
            ]);

            if ($user) {
                //Mail::to($data['email'])->send(new AccountCreatedMail($user));
                Notification::create([
                    'custom_id' => $user->id,
                    'type' => 'user',
                ]);

                return $user;
            }
        }

        public function newRegister(Request $request){

            // $this->validate($request, [

            /*echo"<pre>"; print_r($request->all());*/
            $validator = Validator::make($request->all(), [

              'username'=> [
                    'required', 'string', 'min:3', 'max:30', 'regex:/^[a-zA-Z0-9_]+$/u', 'unique:users',
                ],
            //   'jabber_id'=> [
            //         'required', 'string', 'email', 'max:255', 'unique:users',
            //     ],
              'password'=> [
                    'required', 'string', 'min:6', 'max:100', 'confirmed',
                ],
                'h-captcha-response' => ['required', new ValidHCaptcha()],

            ]);


            if ($validator->fails()) {

                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }else{

                $user = new User;
                $user->name = $request->username;
                $user->username = $request->username;
                // $user->email = $request->jabber_id;
                // $user->jabber_id = $request->jabber_id;
                $user->newsletter_enabled = isset($request->newsletter_enabled) ? 1 : 0;
                $user->balance_in_cent = 0;
                $user->password = Hash::make($request->password);
                $user->save();
                // if($user){
                    //     // Notification::create([
                    //     //     'custom_id' => $user->id,
                    //     //     'type' => 'user',
                    //     // ]);
                    // }
                // sleep(5);

                if($user){
                    Auth::login($user);

                    return redirect('/home')->with("success",'logged In Successful...');
                }
             }
            // $user = User::create([
                //     'name'                  => '', //$data['name'],
                //     'username'              => $request->username,
                //     //'email'                 => $data['email'],
                //     'jabber_id'             => $request->jabber_id,
                //     'newsletter_enabled'    => isset($request->newsletter_enabled) ? 1 : 0,
                //     'balance_in_cent'       => 0,
                //     'password'              => Hash::make($request->password),
                // ]);

                // if ($user) {
                //     //Mail::to($data['email'])->send(new AccountCreatedMail($user));
                //     Notification::create([
                //         'custom_id' => $user->id,
                //         'type' => 'user',
                //     ]);

                //     return redirect('login');
            // }
        }

        public function showRegistrationForm()
        {
            return view('frontend.auth.register');
        }

        public function shownewRegistrationForm()
        {
            return view('frontend.auth.newregister');
        }
    }
