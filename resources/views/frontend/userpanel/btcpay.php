@extends('frontend.layouts.auth')

@section('content')
<section class="blog__area pb-100 pt-100">
    <div class="edit__profile ">
        <div class="container-fluid fix p-0">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="profile__cover-wrapper p-relative">
                        <div class="profile__cover w-img tp-img-cover">
                            @if(Auth::user()->cover != "")
                            <img src="assets/newdesign/assets/img/creator/<?= Auth::user()->cover ?>" alt="">
                            @elseif(Auth::user()->cover == "")
                            <img src="{{asset_dir('newdesign/assets/img/creator/creator-bg-2.jpg')}}" alt="">
                            @endif
                        </div>
                        <div class="profile__cover-edit">
                            <form action="{{ url('update/cover-photo') }}" method="post" id="formCoverData"
                                  enctype="multipart/form-data">
                                @csrf
                                <input id="profile-cover-input" class="cover-img-popup" type="file" name="coverFile">
                            </form>

                            <label for="profile-cover-input"><i class="fa-regular fa-pen-to-square"></i></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-12">
                    <div class="profile__thumb-wrapper  text-center">
                        <div class="profile__thumb text-center tp-img-profile d-inline-block p-relative">
                            @if(Auth::user()->photo != "")
                            <img src="assets/newdesign/assets/img/creator/<?= Auth::user()->photo ?>" alt="">
                            @elseif(Auth::user()->photo == "")
                            <img src="{{asset_dir('newdesign/assets/img/creator/user-1.jpg')}}" alt="">
                            @endif
                            <div class="profile__thumb-edit">
                                <form action="{{ url('update/photo') }}" method="post" id="formData"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input id="profile-thumb-input" class="profile-img-popup photo-file"
                                           name="photoFile" type="file">
                                </form>

                                <label for="profile-thumb-input"><i class="fa-regular fa-camera"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @include('frontend.common.frontmenu')
            <div class="col-xxl-8 col-lg-8">
                <article class="postbox__item format-image mb-40 transition-3">
                    <div class="blog__grid-tag">
                        <a href="javascript:void(0);">{{ __('frontend/user.deposit') }}</a>
                    </div>
                </article>

                <div class="product__details-info">
                    <h3 class="postbox__comment-form-title">{{ __('frontend/user.payment_methods') }}</h3>
                    <div class="product__details-info-bottom ">
                        <div class="product__details-info-btn">
                            <!--<a href="/transactions/page/1" class="tp-btn-2 active"><img src="https://btcpay0.voltageapp.io/img/paybutton/pay.svg" /></a-->
                            <a href="https://btcpay0.voltageapp.io/api/v1/invoices?storeId=AiKz2Y5NSCjvMhNmqJReYgjTRf5vyn4e8JrfwCZ8pRN4&currency=USD"
                               class="" style="padding: 0;" target="_blank"><img
                                    src="https://btcpay0.voltageapp.io/img/paybutton/pay.svg"/></a>
                        </div>
                    </div>
                </div>

                <div class="product__details-info mt-25">
                    <h3 class="postbox__comment-form-title">{{ __('frontend/user.coupon_redeem.title') }}</h3>
                    <form method="POST" action="{{ route('redeem-coupon') }}">
                        @csrf

                        <div class="col-xxl-12 col-xl-12 col-lg-12">
                            <div class="postbox__comment-input-box">
                                <h4>{{ __('frontend/user.coupon_redeem.code') }} <span>*</span></h4>
                                <div class="postbox__comment-input">
                                    <input id="coupon_redeem_code" type="text"
                                           class="{{ $errors->has('coupon_redeem_code') ? ' is-invalid' : '' }}"
                                           name="coupon_redeem_code" value="{{ old('coupon_redeem_code') }}" required
                                           autofocus>

                                    @if ($errors->has('coupon_redeem_code'))
                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('coupon_redeem_code') }}</strong>
	                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-xxl-12">
                            <div class="postbox__comment-btn">
                                <button type="submit" class="tp-btn-4 w-100">{{ __('frontend/user.coupon_redeem.submit')
                                    }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ url('./assets/newdesign/assets/js/custom.js') }}"></script>
@endsection
