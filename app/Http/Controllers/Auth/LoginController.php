<?php

namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Illuminate\Http\Request;
	use App\Rules\ValidHCaptcha;

    class LoginController extends Controller
    {
        use AuthenticatesUsers;

		protected $redirectTo = '/admin';

		    protected function redirectTo()
			{
				if (auth()->user()->id == '1') {
					return '/admin';
				}
				return '/home';
			}

        protected $username = 'username';

        public function __construct()
        {
            $this->middleware('guest')->except('logout');
        }

        protected function credentials(Request $request)
        {

            $field = $this->field($request);

            return [
                $field => $request->get($this->username()),
                'password' => $request->get('password'),
            ];
        }

        public function field(Request $request)
        {

            $email = $this->username();

            return 'username';
            //return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'username';
        }

        protected function validateLogin(Request $request)
        {
            if (env('APP_ENV') != 'local') {
                $field = $this->field($request);

                $messages = [
                    "{$this->username()}.exists" => __('auth.not_exists'),
                    'h-captcha-response' => __('frontend/main.captcha_failed'),
                ];
                $this->validate($request, [
                    $this->username() => "required|exists:users,{$field}",
                    'password' => 'required',
                    'h-captcha-response' => ['required', new ValidHCaptcha()],
                ], $messages);
            }

        }

        public function showLoginForm()
        {
            echo "1";
            die;
            return view('frontend.auth.login');
        }

        public function shownewLoginForm()
        {
            return view('frontend.auth.newlogin');
        }
    }
