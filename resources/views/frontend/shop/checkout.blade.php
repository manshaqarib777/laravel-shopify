@php use App\Classes\Rabatt; @endphp
@php use App\Models\UserCart; @endphp
@extends('frontend.layouts.auth')

@section('content')
    <style>
        .card {
            background-color: #110c3b !important;
        }

        .form-control {
            background-color: #05092b !important;
        }

        .list-group-item {
            background-color: #110c3b !important;
            color: #565d6d !important;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="margin-top:60px;">
                <h3 class="page-title text-white mb-4">{{ __('frontend/v4.checkout_title') }}</h3>
                @if (Session::has('errorMessage'))
                    <div class="">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="{{ __('frontend/main.close') }}">
                                        <span aria-hidden="true">×</span>
                                    </button>

                                    {!! Session::get('errorMessage') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (Session::has('successMessage'))
                    <div class="">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert"
                                            aria-label="{{ __('frontend/main.close') }}">
                                        <span aria-hidden="true">×</span>
                                    </button>

                                    {!! Session::get('successMessage') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!UserCart::hasDroplestProducts(Auth::user()->id))
                    <div class="alert alert-warning">
                        {{ __('frontend/shop.start_video_alert') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">{{ __('frontend/v4.confirm_order') }}</div>
                    <div class="card-body">
                        @if(count(Auth::user()->getCheckoutCoupons()) <= 0)
                            <b>{{__('Do you have a coupon code?')}}</b>
                            <form method="POST" action="{{ route('redeem-coupon-checkout') }}">
                                @csrf

                                <input autofocus type="text"
                                       class="form-control{{ $errors->has('coupon_code') ? ' is-invalid' : '' }}"
                                       value="{{ old('coupon_code') }}" name="coupon_code"/>
                                @if ($errors->has('coupon_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('coupon_code') }}</strong>
                                    </span>
                                @endif

                                <input type="submit" class="btn btn-secondary mt-15" value="{{__('Redeem')}}"/>
                            </form>
                        @else
                            <b>Dein
                                Gutscheincode: </b>{{ strtoupper(Auth::user()->getCheckoutCoupons()[0]->coupon_code) }}
                            <br/>
                            <a href="{{ route('remove-coupon-checkout') }}">Anderen Gutschein verwenden</a>
                        @endif
                        <hr/>

                        <form method="POST" action="{{ route('checkout-form') }}">
                            @csrf

                            @if(UserCart::hasDroplestProducts(Auth::user()->id))
                                <b>{{ __('frontend/v4.checkoutinfo1') }}</b>

                                <hr/>
                                <input type="hidden" name="product_id" value="{{$_GET['product_id']}}">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">

                                        <b>{{ __('frontend/shop.delivery_method.title') }}</b><br/><br/>

                                        @foreach(App\Models\DeliveryMethod::all() as $deliveryMethod)
                                            <label class="k-radio k-radio--all k-radio--solid">
                                                <input type="radio" name="product_delivery_method"
                                                       value="{{ $deliveryMethod->id }}" data-content-visible="false"
                                                       data-weight-visible="false"
                                                       @if(!$deliveryMethod->isAvailableForUsersCart()) disabled @endif />
                                                <span></span>
                                                {{ __('frontend/shop.delivery_method.row', [
                                                    'name' => $deliveryMethod->name,
                                                    'price' => $deliveryMethod->getFormattedPrice()
                                                ]) }}

                                                @if(!$deliveryMethod->isAvailableForUsersCart())
                                                    <div class="delivery-method-info">
                                                        {{ __('frontend/shop.delivery_method.minmaxinfo', [
                                                            'min' => $deliveryMethod->getFormattedMinAmount(),
                                                            'max' => $deliveryMethod->getFormattedMaxAmount()
                                                        ]) }}
                                                    </div>
                                                @endif
                                            </label><br/>
                                        @endforeach
                                    </li>
                                </ul>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <label for="product_drop">{{ __('frontend/shop.order_note') }}</label>
                                        <textarea class="form-control" name="product_drop" id="product_drop"
                                                  placeholder="{{ __('frontend/shop.order_note_placeholder') }}">{{ old('product_drop') ?? Session::get('productDrop') ?? '' }}</textarea>
                                    </li>
                                </ul>

                                <hr/>
                            @endif

                            <b>{{ __('frontend/v4.carttotal') }} </b><br/>
                            {{ UserCart::getCartSubPrice(Auth::user()->id, false) }} <br/>
                            <br/>

                            @if(count(Auth::user()->getCheckoutCoupons()) > 0)
                                <b>{{ __('frontend/v4.amount_rabatt') }} </b><br/>
                                {{ UserCart::getCartRabatt(Auth::user()->id) }} <br/>
                                <br/>
                            @endif
                            <b>{{ __('frontend/v4.amount_to_pay') }} </b><br/>
                            {{ Rabatt::priceformat(UserCart::getCartSubInCentCheckedCoupon(Auth::user()->id)) }}
                            <br/>


                            @if(UserCart::hasDroplestProducts(Auth::user()->id))
                                <i>{{ __('frontend/v4.zzglversand') }}</i>
                            @endif

                            <br/>
                            <br/>


                            <hr/>

                            <input type="submit" value="{{ __('frontend/v4.buyconfirmbtn') }}" class="btn btn-primary"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
