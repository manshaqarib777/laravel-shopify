@extends('frontend.layouts.auth')

@section('content')
    <section class="error__area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="error__content text-center">
                        <div class="error__thumb m-img mb-20">
                            <img src="{{asset_dir('newdesign/assets/img/error/common-error.png')}}" alt="404"/>
                        </div>

                        <div class="error__content">
                            <h3 class="error__title">{{ __('error.no_permissions.title') }}</h3>

                            <p>{{ __('error.no_permissions.message') }}</p>

                            <a href="{{ App\Models\Setting::get('app.url') }}" class="tp-btn-3">
                                {{ __('error.no_permissions.button') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
