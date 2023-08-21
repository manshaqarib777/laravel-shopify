@extends('frontend.layouts.auth')

@section('content')
<style>
    a.header__wallet-btn:hover {
        color: var(--tp-common-white) !important;

    }

    @media screen and (max-width:420px) {
        .share__modal-content .col-3 {
            padding: 0px !important;
        }


    }

    .activity__others ul {
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0px 1px 2px rgba(4, 18, 38, 0.1);
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.04);
    }

    .activity__others ul li,
    .activity__others ul li p {
        background: transparent;
        color: #fff;
        border: none;
    }

    nav {
        text-align: center;
    }

    ul.pagination {
        display: inline-flex;
    }

    .page-item.disabled .page-link {
        background-color: #05092b !important;
        border-color: #212543 !important;
    }

    .page-link {
        background-color: #0f1333 !important;
        border: 1px solid #212543 !important;
        color: #a1a8bc !important;
    }

    .page-item.active .page-link {
        color: #ffffff !important;
        background-color: #3771fe !important;
    }

    .page-item .page-link:focus {
        box-shadow: none !important;
        outline: none !important;

    }

    .image-container {
        /*width: 35vw;*/
        /*height: 30vw;*/
        background: transparent;
        display: flex;
    }

    .text {
        margin: auto;
        font-size: 9px;
        font-weight: 600;
        color: #3A3B7B;
        line-height: 1vw;
    }

    .share__modal_order .modal-content input[type="radio"] {
        margin-bottom: 20px !important;
    }

    span.review-radio-label.wallet {
        margin: auto !important;
        padding: 10px;

    }
</style>
<section class="blog__area pb-100 pt-100">
    <div class="edit__profile ">
        <div class="container-fluid fix p-0">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="profile__cover-wrapper p-relative">
                        <div class="profile__cover w-img tp-img-cover">
                            @if(Auth::user()->cover != "")
                            <img src="/assets/newdesign/assets/img/creator/<?= Auth::user()->cover ?>" alt="">
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
                            <img src="/assets/newdesign/assets/img/creator/<?= Auth::user()->photo ?>" alt="">
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
            <div class="col-xxl-8 col-xl-8 col-lg-8">
                <div class="blog__wrapper" style="padding-top: 0px;">
                    <article class="postbox__item format-image mb-40 transition-3">
                        <div class="blog__grid-tag">
                            <a href="javascript:void(0);">{{ __('frontend/user.orders') }}</a>
                        </div>
                    </article>

                    @if(count($user_orders))
                    <div class="postbox__comment-form">
                        <h3 class="postbox__comment-form-title">{{ __('frontend/user.orders') }}</h3>

                        @foreach($user_orders as $order)

                        <div class="activity__wrapper mr-60">
                            <div class="activity__item d-md-flex align-items-center justify-content-between mb-10">
                                <div class="activity__item-inner d-flex align-items-center">
                                    <div class="activity__thumb mr-20">
                                        <a href="/product/{{$order->product_id}}">
                                            @if($order->thumbnail_image !== null && $order->thumbnail_image !== "" &&
                                            file_exists('assets/adminV2/assets/media/product/'.$order->thumbnail_image))
                                            <img src="{{ asset_dir('adminV2/assets/media/product/'.$order->thumbnail_image) }}"
                                                alt="">
                                            @else
                                            <img src="{{asset_dir('newdesign/assets/img/creator/16838828281.jpg')}}"
                                                alt="">

                                            {{-- @if($order->thumbnail_image !== null && file_exists('assets/adminV2/assets/media/product/'.$order->thumbnail_image))
                                                     <img src="{{ asset_dir('adminV2/assets/media/product/'.$order->thumbnail_image) }}"
                                            alt="">
                                            @else
                                            <div class="image-container text-center">
                                                <h3 class="text">{{ $order->name }}</h3>
                                            </div>
                                            @endif --}}
                                            @endif


                                        </a>
                                        <span class="activity__tag">
                                            <svg width="12" height="11" viewBox="0 0 12 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.6691 6.54838L6.55412 10.6634C6.44752 10.7701 6.32092 10.8547 6.18158 10.9125C6.04223 10.9703 5.89287 11 5.74203 11C5.59119 11 5.44182 10.9703 5.30248 10.9125C5.16313 10.8547 5.03654 10.7701 4.92994 10.6634L0 5.73916V0H5.73916L10.6691 4.92994C10.8829 5.145 11.0029 5.43592 11.0029 5.73916C11.0029 6.0424 10.8829 6.33332 10.6691 6.54838Z"
                                                    fill="white"></path>
                                                <path d="M2.86914 2.8696H2.87542" stroke="#006EED" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="activity__content">
                                        <h3 class="activity__title">
                                            <a href="/product/{{$order->product_id}}"><strong>#{{ $order->id }}</strong>
                                                {{ $order->name }}</a>

                                        </h3>


                                    </div>
                                </div>

                                <div class="activity__status">
                                    <p>{{ __('frontend/shop.price') }} {{ $order->getFormattedPrice() }}</p>
                                    @if (isset($order->orderReviewAccess) && $order->orderReviewAccess)
                                    <a class="tp-btn-2 review-order-product" data-order-id="{{ $order->id }}">
                                        {{ __('frontend/shop.review') }}
                                    </a>
                                    @endif
                                </div>




                            </div>
                            <div class="activity__others">
                                <ul class="list-group list-group-flush">
                                    @if($order->product)
                                    <li class="list-group-item list-group-item-1">
                                        <b>{{ __('frontend/shop.order_product') }}</b> {{ $order->product->name }}
                                    </li>
                                    @endif

                                    @if($order->getAmount() > 1)
                                    <li class="list-group-item list-group-item-2">
                                        <b>{{ __('frontend/shop.order_amount') }}</b> {{ $order->getAmount() }}
                                    </li>
                                    @endif

                                    <li class="list-group-item list-group-item-3">
                                        <b>{{ __('frontend/shop.price') }}</b> {{ $order->getFormattedPrice() }}
                                    </li>

                                    @if($order->delivery_price > 0)
                                    <li class="list-group-item list-group-item-4">
                                        <b>{{ __('frontend/shop.delivery_price') }}</b>
                                        {{ $order->getFormattedDeliveryPrice() }}
                                    </li>
                                    @endif

                                    @if($order->asWeight())
                                    <li class="list-group-item list-group-item-5">
                                        <b>{{ __('frontend/shop.bought_weight') }}</b>
                                        {{ $order->getWeight() . $order->getWeightChar() }}
                                    </li>
                                    @endif

                                    <li class="list-group-item list-group-item-6">
                                        <b>{{ __('frontend/shop.totalprice') }}</b>
                                        {{ $order->getFormattedTotalPrice() }}
                                    </li>

                                    <li class="list-group-item list-group-item-6">
                                        <b>{{ __('frontend/shop.items') }}</b> @forelse (explode('\r\n\r\n',
                                        $order->content) as $content){!! e(strlen($content) ? str_replace(' | | ', ' |
                                        ', preg_replace('#(\r\n|\r|\n)#',' | ',trim(($content)))) . PHP_EOL . '' .
                                        PHP_EOL : '') !!}@empty N/A @endforelse

                                    </li>


                                    @if(strlen($order->delivery_method) > 0)
                                    <li class="list-group-item list-group-item-7">
                                        <b>{{ __('frontend/shop.delivery_method.title') }}</b>
                                        {{ $order->delivery_method }}
                                    </li>
                                    @endif


                                    @if(strlen($order->getDrop()) > 0)
                                    <li class="list-group-item list-group-item-10">
                                        <b>{{ __('frontend/shop.orders_order_note') }}</b>
                                    </li>

                                    <li class="list-group-item list-group-order-note">
                                        {{ decrypt($order->getDrop()) }}
                                    </li>
                                    @endif

                                    @if($order->getStatus() != 'nothing')
                                    <li class="list-group-item list-group-item-9">
                                        <b>{{ __('frontend/shop.orders_status') }}</b>
                                        @if($order->getStatus() == 'cancelled')
                                        {{ __('frontend/shop.orders.status.cancelled') }}
                                        @elseif($order->getStatus() == 'completed')
                                        {{ __('frontend/shop.orders.status.completed') }}
                                        @elseif($order->getStatus() == 'pending')
                                        {{ __('frontend/shop.orders.status.pending') }}
                                        @endif
                                    </li>
                                    @endif

                                    @if($order->hasNotes())
                                    <li class="list-group-item list-group-item-10">
                                        <b>{{ __('frontend/shop.orders_notes') }}</b>
                                    </li>

                                    @foreach($order->getNotes() as $note)
                                    <li class="list-group-item list-group-order-note">
                                        {{ strlen($note->note) > 0 ? decrypt($note->note) : '' }}
                                    </li>
                                    @endforeach


                                    @endif

                                    <li class="list-group-item list-group-item-12">
                                        <b>{{ __('frontend/user.date') }}</b>
                                        {{helperdateFormat($order->created_at)}}
                                        {{-- {{ $order->created_at->format('d.m.Y') }} --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    {{-- {{ $user_orders->onEachSide(0)->links() }} --}}
                    {!! preg_replace('/' . $user_orders->currentPage() . '\?page=/', '',
                    $user_orders->onEachSide(0)->links()) !!}
                    @else
                    <div class="alert alert-warning">
                        {{ __('frontend/user.orders_page.no_orders_exists') }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    {{-- <!-- <div> -->
    <!-- Modal --> --}}
    <div class="share__modal_order modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="color:white;!important;">{{ __('frontend/user.order_review.title') }}
                    </h3>
                    <button style="color:white" type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="share__modal-content text-center">
                    <div class="">
                        <div class="" style="">
                            <div>
                                <div class="alert alert-primary" role="alert">
                                    {{ __('frontend/user.order_review.description') }}
                                </div>
                            </div>
                            <div style="padding: 0px 0px 0px 0px;">
                                <div class="row">
                                    <div class="col-3">
                                        {{-- <h4>@lang('frontend/shop.product_page.total'):</h4>--}}
                                        <h5 style="color: white; display:none;">
                                            {{ __('frontend/user.order_review.feedback') }}:
                                        </h5>
                                    </div>
                                    <div class="col-3 review-radio-group">
                                        <i class="fa-regular fa-face-smile feedback-icons positive-icon"></i>
                                        <input class="review-radio active-review happy" id="positive" checked
                                            type="radio" value="positive">
                                        <span class="review-radio-label wallet"
                                            style="color: lawngreen">{{ __('frontend/user.order_review.positive') }}</span>

                                    </div>
                                    <div class="col-3 review-radio-group">
                                        <i class="fa-regular fa-face-frown feedback-icons negative-icon"></i>
                                        <input type="radio" class="sad" value="negative" id="negative">
                                        <span class="review-radio-label wallet"
                                            style="color: red">{{ __('frontend/user.order_review.negative') }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="total_info-btn">
                        <button id="submitOrderReview" type="submit"
                            value="{{ __('frontend/user.order_review.submit_feedback') }}" onclick=""
                            class="tp-btn-2 active"
                            style="margin: 50px 0 30px 0px;">{{ __('frontend/user.order_review.submit_feedback') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <!-- </div> --> --}}
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    jQuery(document).ready( function($){
        $("#positive").next().addClass('active');
        $("#positive").prev().addClass('active');

        $("body #positive, body #negative").on("click", function(){
            let value = jQuery(this).val();
            /*alert(value);*/
            if(value == 'positive'){
                $("#positive").next().addClass('active');
                $("#negative").next().removeClass('active');
            }else if(value == 'negative'){
                $("#negative").next().addClass('active');
                $("#positive").next().removeClass('active');
            }else{
                $(".review-radio-label").removeClass('active');
            }

        });

        $(".feedback-icons.positive-icon, .feedback-icons.negative-icon").on("click", function(){
            let value = jQuery(this).next().val();
            /*alert(value);*/
            if(value == 'positive'){
                $("#positive").next().addClass('active');
                $("#negative").next().removeClass('active');
                $("#positive").prev().addClass('active');
                $("#negative").prev().removeClass('active');
            }else if(value == 'negative'){
                $("#negative").next().addClass('active');
                $("#positive").next().removeClass('active');
                $("#negative").prev().addClass('active');
                $("#positive").prev().removeClass('active');
            }else{
                $(".review-radio-label").removeClass('active');
                $(".feedback-icons").removeClass('active');
            }
                
        });

        $(".review-radio-label").on("click", function(){
        let value = jQuery(this).prev().val();
        /*alert(value);*/
        if(value == 'positive'){
            $("#positive").next().addClass('active');
            $(".feedback-icons.positive-icon").addClass('active');
            $("#negative").next().removeClass('active');
            $(".feedback-icons.negative-icon").removeClass('active');
        }else if(value == 'negative'){
            $("#negative").next().addClass('active');
            $("#positive").next().removeClass('active');
            $(".feedback-icons.negative-icon").addClass('active');
            $(".feedback-icons.positive-icon").removeClass('active');
        }else{
            $(".review-radio-label").removeClass('active');
            $(".feedback-icons").removeClass('active');
        }
        
        });
    });
</script>
<script src="{{ url('./assets/newdesign/assets/js/custom.js') }}"></script>
<style>
    .feedback-Thanks {
        text-align: center;
        font-size: 30px;
        line-height: normal;
        color: white;
        font-weight: 500;
        padding: 50px 0px;
    }

    input#positive,
    input#negative {
        display: none;
    }

    .feedback-icons.positive-icon.active {
        color: lawngreen;
    }

    .feedback-icons.negative-icon.active {
        color: red;
    }

    .feedback-icons {
        cursor: pointer;
        color: grey;
        font-size: 100px;
        font-weight: 300 !important;
        margin-bottom: 18px;
    }

    .review-radio-label.active,
    .review-radio-label:hover {
        background-color: var(--tp-theme-1);
        color: white !important;
    }

    .review-radio-label {
        border: 2px solid rgba(55, 113, 254, 0.6);
        padding: 7px 15px !important;
        border-radius: 50px;
        background-color: rgba(55, 113, 254, 0.04);
    }

    .share__modal_order .modal-content {
        /* background-color: var(--tp-common-black-7); */
        background-color: #181c3b;
        border: 0;
        border-radius: 20px;
    }

    .share__modal-content.text-center {
        background-color: var(--tp-theme-dark);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .share__modal_order .modal-header {
        /* background-color: var(--tp-common-black-7); */
        background-color: var(--tp-theme-dark);
        text-transform: capitalize !important;
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .share__modal_order .modal-header .btn-close {
        background-color: #fff !important;
    }

    .share__modal_order .modal-content input[type="radio"] {
        -webkit-appearance: none;
        width: 90px;
        height: 90px;
        border: none;
        cursor: pointer;
        transition: border .2s ease;
        filter: grayscale(100%);
        margin: 0 5px;
        transition: all .2s ease;

        &:hover,
        &:checked {
            filter: grayscale(0);
        }

        &:focus {
            outline: 0;
        }

        &.happy {
            background: url("{{asset_dir('newdesign/assets/img/positive_feedback.svg')}}") center;
            background-size: cover;
        }


        &.sad {
            background: url("{{asset_dir('newdesign/assets/img/negative_feedback.svg')}}") center;
            background-size: cover;
        }
    }

    .tp-btn-2.review-order-product:hover {
        color: #fff !important;
        cursor: pointer;
    }

    .share__modal_order .modal-header .btn-close {
        color: #fff !important;
    }

    .tp-btn-2.active {

        background-color: rgba(55, 113, 254, 0.04);
        color: var(--tp-common-white);
        border: 2px solid rgba(55, 113, 254, 0.6);
    }

    .tp-btn-2.active:hover,
    .tp-btn-2.active:focus {
        background-color: var(--tp-theme-1);
        border-color: var(--tp-theme-1);
        color: #fff;

    }

    .activity__thumb a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    .activity__thumb img {
        max-height: 100%;
        width: auto;
        height: auto;
        border-radius: 0;
    }

    .no-image {
        display: block;
        height: 100%;
        width: 100%;
        background: grey;
    }

    .share__modal-content .alert-primary {
        box-shadow: 0px 20px 30px rgba(3, 6, 31, 0.2);
        color: #fff;
        padding: 13px;
        background-color: #181c3b;
        box-sizing: border-box;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 5px;
        cursor: pointer;
        margin: 20px;

    }
</style>

@endsection