@extends('frontend.layouts.auth')

@section('content')
<style>
   main {
      padding-top: 0px !important;
   }
</style>
{{-- <!-- login area start --> --}}
<section class="login__area pb-120">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xxl-6 col-xl-6 col-lg-8">
            <div class="login__wrapper">
               <div class="login__shape">
                  <img class="login__shape-1" src="{{asset_dir('newdesign/assets/img/login/login-person.png')}}" alt="">
                  <img class="login__shape-2" src="{{asset_dir('newdesign/assets/img/login/login-shape-1.png')}}"
                     alt="">
                  <img class="login__shape-3" src="{{asset_dir('newdesign/assets/img/login/login-shape-2.png')}}"
                     alt="">
                  <img class="login__shape-4" src="{{asset_dir('newdesign/assets/img/login/login-shape-3.png')}}"
                     alt="">
               </div>
               <div class="login__top text-center">
                  <h3>{{ __('frontend/user.login.title') }}</h3>
                  <p>Don't have an account yet? <a
                        href="{{ route('register') }}">{{ __('frontend/user.login.create_account') }}</a></p>
               </div>
               @if(session()->has("success"))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> {{session()->get("success")}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
               @endif

               <div class="login__form">
                  <form method="POST" action="{{ route('login') }}">
                     @csrf
                     <div class="login__input-box">
                        <div class="login__input-title">
                           <h4>{{ __('frontend/user.username') }} <span>*</span></h4>
                        </div>
                        <div class="login__input">
                           <div class="inputField">
                              <input required id="email" type="text"
                                 class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                 value="{{ old('email') }}">
                              <span class="login__input-icon">
                                 <i class="fa-light fa-envelope"></i>
                              </span>
                           </div>
                           @if ($errors->has('email'))
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="login__input-box">
                        <div class="login__input-title d-flex align-items-center justify-content-between">
                           <h4>{{ __('frontend/user.login.password') }} <span>*</span></h4>
                           {{-- <div class="forgot-password">
                                   <a href="#">Forgot Password?</a>
                                </div> --}}
                        </div>
                        <div class="login__input">
                           <div class="inputField">
                              <input required id="password" type="password"
                                 class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                              <span class="login__input-icon">
                                 <i class="fa-light fa-lock"></i>
                              </span>
                              <span class="login__input-password-visible">
                                 <i class="fa-light fa-eye" onclick="myFunction()"></i>
                              </span>
                           </div>
                           @if ($errors->has('password'))
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>

                      @if(env('APP_ENV') != 'local')
                         <div class="login__input-box">
                        <div class="login__input-title d-flex align-items-center justify-content-between">
                           <h4>{{ __('Captcha') }} <span>*</span></h4>
                        </div>
                        <div class="login__input">
                           {{-- <!--<div class="captcha-img mb-20">
                                    <div class="h-captcha"  data-sitekey="d390fcfa-170c-4545-be11-934dc671f001"></div>
                                </div>--> --}}
                           <div class="h-captcha {{ $errors->has('h-captcha-response') ? ' is-invalid' : '' }}"
                              data-sitekey="f7ef0f8b-db29-4cb1-9f44-57787e26d3e0"></div>
                           @if ($errors->has('h-captcha-response'))
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ __('frontend/user.login.error_message') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                      @endif
                     <div class="login__btn mb-20 buttonForm">
                        <button class="tp-btn-4 w-100">{{ __('frontend/user.login.submit') }}</button>
                     </div>
                     {{-- <div class="login__signup text-center">
                             <p>Or <a href="register.html">Sing Up</a> with email</p>
                          </div> --}}
                     {{-- <div class="login__option-wrapper">
                             <div class="login__option-item mb-15">
                                <a href="#" class="login__option-btn w-100"><img src="{{asset_dir('newdesign/assets/img/icon/google.png')}}"
                     alt=""> Continue with Google</a>
               </div>
               <div class="login__option-item">
                  <a href="#" class="login__option-btn w-100"><img
                        src="{{asset_dir('newdesign/assets/img/icon/facebook.png')}}" alt=""> Continue with Facebook</a>
               </div>
            </div> --}}
            </form>
         </div>
      </div>
   </div>
   </div>
   </div>
</section>
{{-- <!-- login area end --> --}}
@endsection

<script src="https://js.hcaptcha.com/1/api.js" async defer></script>


{{-- <!-- Password Hide/Show Function Rb--> --}}


<script>
   function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
