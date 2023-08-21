@extends('frontend.layouts.auth')

@section('content')

<style>
    .breadcrumb__area.pt-160.pb-40.p-relative {
        padding-top: 0px;
    }

    .product__sold_number {
        color: #3771fe !important;
    }

    .product__details-bid-status {
        flex: 0 0 50% !important;
    }

    .product__details-bid-status::after {
        right: 4px !important;
    }

    .product__details-info-btn {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .product__details-info-btn .tp-btn-2 {
        flex: 0 0 auto;
    }

    .product__details-creator-thumb.verified::after {
        color: #3771fe !important;
    }

    .tp-btn-2 {
        border-radius: 0.25rem !important;
    }

    .sold-out-label {
        margin-top: 20px;
    }

    .image-container {
        width: 35vw;
        height: 30vw;
        background: transparent;
        display: flex;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    .text {
        font-family: 'Poppins', sans-serif;
        margin: auto;
        font-size: 30px;
        font-weight: 700;
        color: #3A3B7B;
        line-height: 4vw;
    }

    @media screen and (max-width:420px) {
        .pt-80 {
            padding-top: 0px;
        }
    }
</style>

<section class="product__details-area pt-80 pb-120">

    <div class="container">
        @if(!Auth::check() && false)
        <div class="alert alert-warning  mb-60">
            <div class="notBalance">@lang('frontend/shop.product_page.login_to_buy')</div>
        </div>
        @endif
        <div class="row">
            <div class="col-xxl-7 col-xl-6 col-lg-6">
                <div class="product__details-thumb-tab d-sm-flex align-items-start">
                    <div class="product__details-thumb-content">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-1" role="tabpanel"
                                aria-labelledby="nav-1-tab">
                                @if($product->thumbnail_image &&
                                file_exists('assets/adminV2/assets/media/product/'.$product->thumbnail_image))
                                <img style=" object-fit:cover;" class="test" width="485" height="485"
                                    src="{{asset_dir('adminV2/assets/media/product/'.$product->thumbnail_image)}}"
                                    alt="" />
                                @else
                                <img style=" object-fit:cover;" class="test" width="485" height="485"
                                    src="{{asset_dir('newdesign/assets/img/creator/16838828281.jpg')}}" alt="" />
                                {{-- <div class="image-container text-center">
                                            <h3 class="text">{{ $product->name }}</h3>
                            </div> --}}
                            {{-- <img width="485" height="485" src="{{asset_dir('newdesign/assets/img/product/tab/product-tab-big-1.jpg')}}"
                            alt=""/>--}}
                            @endif
                        </div>
                        {{-- <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab">--}}
                        {{-- <img src="../../../assets/newdesign/assets/img/product/tab/product-tab-big-2.jpg" alt=""/>--}}
                        {{-- </div>--}}
                        {{-- <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab">--}}
                        {{-- <img src="../../../assets/newdesign/assets/img/product/tab/product-tab-big-3.jpg" alt=""/>--}}
                        {{-- </div>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-5 col-xl-6 col-lg-6">
            <div class="product__details-wrapper">
                <h3 class="product__details-title">{{ $product->name }} </h3>
                <?php  $product_sell = DB::select('select * from  lv_users_orders where status="completed"');?>
                <div class="product__details-bid-info">
                    {{-- <!-- <p>From <span>0.44 €</span></p> --> --}}
                    {{-- <p>@lang('frontend/shop.product_page.product_sold_amount', ['amount' => count($product_sell)])</p>--}}
                </div>

                <div class="product__details-info d-sm-flex align-items-center justify-content-between">
                    <div class="product__details-info-item mb-30 mt-5">
                        <p>Seller</p>
                        <div class="product__details-creator d-flex align-items-center">
                            <div class="product__details-creator-thumb verified mr-10">
                                <a href="#">
                                    <img src="../../../assets/newdesign/assets/img/creator/<?php echo $shopLogo->value ?? '' ?>"
                                        alt="">
                                </a>
                            </div>
                            <div class="product__details-creator-content">
                                <h3>
                                    <a href="#">{{ $shopName->value ?? 'My Shop'}}</a>
                                </h3>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="product__details-info">
                    <div class="product__details-info-top">
                        <div class="product__details-info-tab">
                            <nav>
                                <div class="nav nav-tabs" id="product-nav-tab" role="tablist">
                                    <span class="nav-link active"
                                        id="nav-details-tab">@lang('frontend/shop.product_page.description')</span>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="product__details-info-tab-content">
                        <div class="tab-content" id="product-details">
                            <div class="tab-pane fade show active" id="nav-details" role="tabpanel"
                                aria-labelledby="nav-details-tab">
                                <div class="product__details-tab-item">
                                    <div class="product__details-info-item mb-25">
                                        <p>{{$metaDESC}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="product__details-info-bottom ">
                        <div class="product__details-bid d-sm-flex align-content-center justify-content-between">
                            <div class="product__details-bid-status mb-15">
                                <p>@lang('frontend/shop.product_page.price')</p>
                                {{--<h4>{{$amount}} €</h4>--}}
                                {{-- {{dd($product->old_price_in_cent)}}
                                {{dd($product->price_in_cent)}} --}}
                                @if($product->old_price_in_cent > $product->price_in_cent && $product->old_price_in_cent
                                != '0' && $product->old_price_in_cent != '')
                                @php
                                $calculate = ($product->price_in_cent/$product->old_price_in_cent)*100;
                                $calculateReverse = 100 - $calculate;
                                @endphp
                                <h4 style="margin-bottom: 5px;">
                                    <del>{{$product->getFormatted_old_price_in_cent()}}</del>&nbsp&nbsp&nbsp{{$product->getFormattedFrontPrice()}}
                                </h4>

                                <p style="margin-bottom: 8px;">You Save
                                    {{$product->getFormattedSalePer($calculateReverse)}}%</p>
                                <style>
                                    .product__details-bid-countdown {
                                        display: flex;
                                        align-items: center;
                                    }
                                </style>
                                @else
                                <h4>{{$product->getFormattedFrontPrice()}}</h4>
                                @endif



                                {{-- <span id="getCurrency" style="display: none">{{$product->getCurrencyCode()}}</span>
                                --}}
                            </div>
                            <div class="product__details-bid-countdown mb-15">
                                {{-- <!-- <div class="product-bid-countdown d-flex align-items-center" data-countdown="2024/01/01"></div> --> --}}

                                @if($product->is_available && $is_ballance)
                                <h3 class="text-white">@lang('frontend/shop.product_page.quantity')</h3>
                                @else
                                <h3 class="text-white sold-out-label">{{$product->formatted_front_stock_status}}</h3>
                                @endif
                            </div>
                        </div>
                        @if(!Auth::check())

                        @elseif(Auth::check() && !$is_ballance && false)
                        <div class="notBalance">@lang('frontend/shop.product_page.is_balance')</div>
                        @endif
                        {{-- {{url('checkout')}}--}}
                        <form id="oneClickCheckout" action="{{ url('buy-one-click') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="product_name" value="{{ $product->name }}">
                            <input type="hidden" name="product_amount" value="{{ $amount }}">
                            <input type="hidden" name="product_amount_in_cents" value="{{ $product->price_in_cent }}">
                            @if($product->thumbnail_image !== null)
                            <input type="hidden" name="product_thumbnail_image" value="{{ $product->thumbnail_image }}">
                            @else
                            <input type="hidden" name="product_thumbnail_image" value="">
                            @endif
                            <div class="product__details-info-btn" style="">
                                @if($product->is_available)
                                {{-- <button type="submit" class="tp-btn-2 active" onclick="return confirm('Are you sure you want to Buy this product?');" data-toggle="modal" data-target="#buyNowModal">Buy Now</button>--}}

                                {{-- $is_ballance --}}
                                @if(true)
                                <button type="button" class="tp-btn-2 active"
                                    onclick="{{ !empty(auth()->user()) ? 'prepareProductPriceByQty()' : 'showAuthError()' }}">
                                    @lang('frontend/shop.product_page.buy_now_btn')
                                </button>

                                <div class="qty">
                                    <div class="btns d-flex justify-content-end" style="gap: 15px;">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            style="border-radius: unset;" onclick="quantityMinus()">-</button>
                                        <input type="number" min="1" id="productQty" class="form-control quantityValue"
                                            name="qty" style="width: 30%" style="border-radius: unset;" value="1">
                                        <button type="button" class="btn btn-sm btn-primary"
                                            style="border-radius: unset;" onclick="quantityPlus()">+</button>
                                    </div>
                                </div>
                                @endif
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

{{-- <!-- Modal --> --}}
<div class="share__modal modal fade" id="buyNowModal" tabindex="-1" aria-labelledby="buyNowModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="share__modal-content text-center">

                <div class="total_info-head">
                    <div class="total_info-name">
                        <h3>{{ $product->name }}</h3>
                        <span>@lang('frontend/shop.product_page.product_sold_amount', ['amount' =>
                            count($product_sell)])</span>
                        <div class="total_info-amount">
                            <div class="total_info-amount-total">
                                <h4>@lang('frontend/shop.product_page.total'):</h4>
                                <span></span>
                            </div>

                            <div class="total_info-amount-to_pay">
                                <h4>@lang('frontend/shop.product_page.amount_to_pay'):</h4>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal_image_product">
                        <div class="image_product">
                            @if($product->thumbnail_image)
                            <img src="{{asset_dir('adminV2/assets/media/product/'.$product->thumbnail_image)}}"
                                alt="" />
                            @else
                            {{-- <img src="{{asset_dir('newdesign/assets/img/bid/2/bid-img-1.jpg')}}" alt=""/> --}}
                            <img src="{{asset_dir('newdesign/assets/img/creator/16838828281.jpg')}}" alt="" />
                            @endif
                        </div>
                    </div>
                </div>

                {{-- <!--<div class="total_info-descr">
                    <p>{{$metaDESC}}</p>
            </div>--> --}}

            <div class="total_info-btn">
                <button id="popup-total" type="submit" value="@lang('frontend/shop.product_page.confirm_order')"
                    onclick="submitForm()"
                    class="tp-btn-2 active">@lang('frontend/shop.product_page.confirm_order')</button>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    .product__details-creator-thumb.verified:before {
        content: "";
        background: white;
        position: absolute;
        width: 10px;
        right: 0px;
        height: 10px;
        bottom: 5px;
    }

    /*  Oops Popup css*/

    .swal2-modal {
        background-color: var(--tp-theme-dark);
    }

    #swal2-title {
        color: white;
    }

    .swal2-icon .swal2-x-mark-line-left,
    .swal2-icon .swal2-x-mark-line-right {
        background-color: red !important;
    }

    .swal2-icon.swal2-error {
        border-color: red;
    }

    #swal2-html-container {
        color: rgba(255, 255, 255, 0.6);
    }

    .swal2-confirm.swal2-styled {
        background-color: var(--tp-theme-1);
        border: 2px solid rgba(55, 113, 254, 0.6);
    }

    .swal2-confirm.swal2-styled:hover {
        background-color: rgba(55, 113, 254, 0.04);
        color: var(--tp-common-white);
        border: 2px solid rgba(55, 113, 254, 0.6);
    }

    .swal2-deny.swal2-styled {
        background-color: red;
        border: 2px solid red;
    }

    .swal2-deny.swal2-styled:hover {
        background-color: rgba(55, 113, 254, 0.04);
        color: var(--tp-common-white);
        border: 2px solid red;
    }

    .swal2-cancel.swal2-styled {
        background-color: #6e7881;
        border: 2px solid #6e7881;
    }

    .swal2-cancel.swal2-styled:hover {
        background-color: rgba(55, 113, 254, 0.04);
        color: var(--tp-common-white);
        border: 2px solid #6e7881;
    }


    /* Oops Popup css*/


    #buyNowModal .modal-content {
        padding: 30px;
    }

    #buyNowModal .modal_image_product {
        width: 50%;
        display: flex;
        justify-content: center;
    }

    #buyNowModal .total_info-head {
        align-items: start;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    #buyNowModal .total_info-head img {
        width: auto;
        max-width: 100%;
    }

    #buyNowModal .total_info-name {
        text-align: center;
        margin-top: 15px;
    }

    #buyNowModal .total_info-name h3 {
        font-size: 28px;
        margin-bottom: 6px;
    }

    #buyNowModal .total_info-amount h4 {
        font-size: 13px;
        margin-bottom: 0;
        line-height: 26px;
        margin-right: 10px;
    }

    #buyNowModal .total_info-name {
        width: 45%;
        margin-left: 0;
    }

    #buyNowModal .total_info-amount {
        display: block;
    }

    #buyNowModal .total_info-amount-total {
        margin-bottom: 3px;
    }

    #buyNowModal .total_info-amount-total,
    #buyNowModal .total_info-amount-to_pay {
        display: flex;
        width: 100%;
        justify-content: center;
    }

    #buyNowModal .total_info-amount>div {
        width: 100%;
        text-align: center;
    }

    #buyNowModal .image_product {
        width: 220px;
        height: 220px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
        border: 1px solid #192054;
        overflow: hidden;
        border-radius: 10px;
    }

    #buyNowModal .image_product img {
        max-height: 100%;
        border-radius: 0;
    }

    @media (min-width: 576px) {
        #buyNowModal .modal-dialog {
            max-width: 500px;
        }
    }

    #buyNowModal .total_info-head {
        align-items: start;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    @media (max-width: 768px) {
        #buyNowModal .share__modal-content .total_info-head {
            flex-direction: column-reverse;
            align-items: center;
        }

        #buyNowModal .total_info-amount {
            margin-top: 17px;
        }

        #buyNowModal .modal_image_product {
            margin-bottom: 10px;
        }

        #buyNowModal .total_info-name {
            width: 100%;
        }

        #buyNowModal .modal_image_product {
            width: 90%;
        }
    }
</style>

<script>
    const qtyEl = document.querySelector(".quantityValue");
    qtyEl.addEventListener("paste", function (e) {
        e.preventDefault();
    }, true);

    qtyEl.addEventListener("keypress", function (e) {
        //  lonley 0
        if (e.keyCode === 48 && !e.target.value.length) return e.preventDefault();
    });

    qtyEl.addEventListener("keypress", function (e) {
        if (e.which != 8 && e.which != 0 && e.which < 48 || e.which > 57)
        {
            // 0 for null values
            // 8 for backspace
            // 48-57 for 0-9 numbers
            e.preventDefault();
        }
    });


    function quantityPlus(){
        let qty = document.querySelector(".quantityValue");
        count = qty.value;
        count++;
        qty.value = count;
    }

    function quantityMinus(){
        let qty = document.querySelector(".quantityValue");
        count = qty.value;
        count--;
        let finalQty = count <= 0 ? "1" : count;
        qty.value = finalQty;
    }



    function prepareProductPriceByQty(){
        // data-bs-toggle="modal" data-bs-target="#buyNowModal"
		@if(Auth::check())
		const authUserBal = parseFloat('{{ Auth::user()->getdBalanceWallet() }}');
		const productPrice = parseFloat('{{ $product->price_in_cent }}');
		if(productPrice > authUserBal) {

            swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '@lang('frontend/shop.product_page.is_balance')',
        }).then((result) => {
            /* Read more about handling dismissals below */

        })


		//console.log('stop here');
			return false;
		}
		@endif

        $('#buyNowModal').modal('show')
        let currency = '{{$product->getCurrencyCode()}}';
        let qty = document.querySelector(".quantityValue");
        let priceInCents = document.querySelector("input[name='product_amount_in_cents']");

        let totalElem = document.querySelector(".total_info-amount-total span");
        let amountToPayElem = document.querySelector(".total_info-amount-to_pay span");

        totalElem.innerHTML = `${qty.value} x ${priceInCents.value} ${currency}`;
        amountToPayElem.innerHTML = `${(qty.value * priceInCents.value)} ${currency}`;
    }

    function submitForm() {
        document.getElementById("oneClickCheckout").submit();
    }

    function showAuthError()
    {
        swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '@lang('frontend/main.auth_error')',
        }).then((result) => {
            /* Read more about handling dismissals below */
            window.location.href = "/login";
        })
    }

    document.addEventListener('error', function (event) {
        var elm = event.target;
        if (elm.tagName == 'IMG') {
            elm.src = "/assets/newdesign/assets/img/product/tab/product-tab-big-1.jpg";
        }
    }, true );
</script>
@endsection
