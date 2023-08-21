@php use App\Models\Product; @endphp
@extends('frontend.layouts.auth')
@section('content')
    @section('breadcrumb')
        <style>
            footer {
                bottom: -15px !important;
            }

            .buyButton {
                border: 2px solid #0d6efd;
            }

            .buyButton:hover {
                border: 2px solid #0d6efd;
                background-color: transparent;
            }
        </style>

        <div class="container">
            <div class="row" style="margin-top: 5%;">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content text-center">
                        <h3 class="breadcrumb__title">Shop</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('home') }}">Home</a></span>
                            <span class="dvdr tp-dot"><i class="fa-solid fa-period"></i></span>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    <?php $data = Product::all(); // OLD: $data = DB::select("SELECT * FROM  lv_products"); ?>
    <section class="shop__grid pt-120 pb-120">
        <div class="container">
            <div class="row">
                @if($data->count())
                    @foreach($data as $product)
                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                            <div class="nft__box theme-bg-dark mb-30 transition-3">
                                <div class="nft__box-thumb m-img mt-20 mb-20">
                                    <a href="{{ route('product-page', $product->id) }}">
                                        @if($product->thumbnail_image)
                                            <img class="test" width="232" height="232"
                                                 src="{{asset_dir('adminV2/assets/media/product/'.$product->thumbnail_image)}}"
                                                 alt=""/>
                                        @else
                                            <img class="test"
                                                 src="{{asset_dir('newdesign/assets/img/bid/2/bid-img-1.jpg')}}"
                                                 alt=""/>
                                        @endif
                                    </a>
                                </div>
                                <div class="nft__box-content">
                                    <div class="nft__box-content-top d-flex align-items-center justify-content-between">
                                        <h3 class="nft__box-title">
                                            <a href="{{ route('product-page', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="nft__box-trending-icon">
                                            <span><i class="fa-brands fa-bitcoin" style="line-height: 1.8;"></i></span>
                                        </div>
                                    </div>
                                    <div class="nft__box-info d-flex align-items-center justify-content-between">
                                        <div class="nft__box-price">
                                            <p>{{$product->getFormattedFrontPrice()}}</p>
                                        </div>
                                        <div class="nft__box-stock">
                                            <p>{{$product->formatted_front_stock_status}}</p>
                                        </div>
                                    </div>
                                </div>
                                @if($product->isAvailable())
                                    <!--<div class="nft__box-bottom d-flex align-items-center justify-content-between">
                                    <div class="nft__box-highest">
                                        <p>
                                            <button type="submit" class="btn btn-icon btn-block btn-primary buyButton" onclick="window.location.href='{{ route('product-page', $product->id) }}'">{{ __('frontend/v4.buybtn') }}</button>
                                        </p>
                                    </div>
                                </div>-->
                                @endif
                            </div>
                        </div>
                    @endforeach

                @else
                    <div class="alert alert-warning">
                        {{ __('frontend/shop.no_products_exists') }}
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Scripts -->
    <script src="{{ asset_dir('vendor/jquery-3.3.1/js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset_dir('vendor/bootstrap-4.1.3/js/bootstrap.min.js') }}" defer></script>

    <script src="//unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>

    <script type="text/javascript">
        function updateCart() {
            //$('#cart-name').html('{{ __('frontend/v4.adding_cart') }}');

            $.ajax({
                'url': '{{ route('cart-ajax') }}',
                method: 'POST'
            })
                .done(function (response) {
                    $('#cart-name').html(response);
                })
                .fail(function () {
                    $('#cart-name').html('{{ __('frontend/v4.unknown_error') }}');
                });
        }

        function addToCart(productId, amountClass) {
            if (!$('a[cart-btn=' + productId + ']').hasClass('disabled')) {
                //  var amounts = parseInt($(amountClass).val());
                var amountd = amountClass.match(/\d+/);
                var amount = amountd[0];
                console.log(amountClass);
                $(amountClass).val('');

                if (amount > 0) {
                    $('a[cart-btn=' + productId + ']').addClass('disabled');

                    $.ajax({
                        'url': '{{ route('cart-add-item-ajax') }}',
                        method: 'POST',
                        data: {product_id: productId, amount: amount}
                    })
                        .done(function (response) {
                            updateCart();

                            $('a[cart-btn=' + productId + ']').removeClass('disabled');
                            window.location.href = "/cart";
                        })
                        .fail(function () {
                            alert("Unbekannter Fehler, Seite neuladen.");

                            $('a[cart-btn=' + productId + ']').removeClass('disabled');
                        })
                        .always(function () {
                            $('a[cart-btn=' + productId + ']').removeClass('disabled');
                        });
                }
            }
        }

        @if(isset($clipboardJS))
        var clipboard = new ClipboardJS('{{ $clipboardJS->element }}');

        clipboard.on('success', function (e) {
            $('{{ $clipboardJS->fadeIn }}').css('display', 'block').hide().fadeIn();
        });
        @endif
    </script>
@endsection
