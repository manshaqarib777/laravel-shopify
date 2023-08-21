@extends('frontend.layouts.auth')

@section('content')
<?php  $product_smarque = DB::select('select * from  lv_marques where id=11');
    foreach($product_smarque as $sell)
    {
        $banner_img  =  $sell->banner_img ?? '';
        $profile_imgds =  $sell->proflie_img ?? '';
        $profile_namess =  $sell->profile_names ?? '';
    }
?>


@if(Auth::user())
<style>
    main {
        padding-top: 0px !important;
    }
</style>
@else
<style>
    main {
        padding-top: 100px !important;
    }

    body .creator__area {
        margin-top: 0px;
    }
</style>
@endif

<style>
    .breadcrumb__area {
        display: none !important;
    }

    body {
        overflow: hidden;
    }

    .salesCounter {
        display: inline-block;
        width: 20px;
        height: 20px;
        line-height: 20px;
        text-align: center;
        border-radius: 20px 20px 20px 0px;
        font-size: 11px;
        opacity: 0.6;
        position: absolute;
        top: -12px;
        right: -15px !important;
        background: #3771fe;
    }

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


    .afterDot::after {
        position: absolute;
        content: "";
        width: 3px;
        height: 3px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -o-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
        right: -12%;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        background-color: var(--tp-text-12);
    }

    .image-container {
        width: 232px;
        height: 232px;
        background: transparent;
        display: flex;
    }

    .creator__area {
        margin-top: 100px;
    }

    .text {
        font-family: 'Poppins', sans-serif;
        margin: auto;
        font-size: 30px;
        font-weight: 700;
        color: #3A3B7B;
        line-height: 40px;
        letter-spacing: -1px;
    }

    .product-href {
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    .extra_user_thumb {
        margin-top: 0px !important;
    }
</style>



{{-- <!-- creator area start --> --}}
<section class="creator__area">
    @if($shopBanner->value != '')
    <div class="creator__banners  tr67"
        data-background="../../../assets/newdesign/assets/img/creator/<?php echo $shopBanner->value ?>"
        style="padding-top: 185px;"></div>
    @else
    {{-- <div class="creator__banners  tr67" data-background="../../../assets/newdesign/assets/img/creator/"
        style="padding-top: 0px;"></div> --}}
    @endif
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="creator__user-wrapper text-center">
                    @if(empty($shopBanner->value))
                    <div class="creator__user-thumb extra_user_thumb">
                        @else
                        <div class="creator__user-thumb">
                            @endif
                            @if($shopLogo->value != '')
                            <img src="../../../assets/newdesign/assets/img/creator/<?php echo $shopLogo->value;?>"
                                alt="">
                            @else

                            @endif
                            <?php  $marque = DB::select('select * from   lv_marques where status="1"');?>



                            @if(count($marque) > 0)
                            <div class="marque__area">
                                <div class="container">
                                    <div class="marque__inner p-relative">
                                        <div class="row">
                                            <div class="col-xxl-12">
                                                <div class="marque__wrapper">
                                                    <div class="marque__slider">
                                                        @foreach($marque as $value)
                                                        <div class="marque__item ">
                                                            <p>{{$value->marque_text}}</p>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <h3 class="creator__user-title">{{ $profile_namess ?? ''}} </h3>
                        @if(empty($shopLogo->value) && empty($shopBanner->value))
                        <div class="creator__follow mt-20">
                            @elseif(empty($shopLogo->value))
                            <div class="creator__follow mt-80">
                                @else
                                <div class="creator__follow">
                                    @endif
                                    <?php  $product_sale = DB::select('select * from  lv_products');?>

                                    <h3 class="text-white creator__user-title shop_name mt-2"
                                        style="font-family: 'Be Vietnam Pro', sans-serif;">
                                        {{ $shopName->value ?? 'My Shop'}}
                                    </h3>
                                    <h5 class="heading-bottom-sales-and-review-box" style="">
                                        <span style="position: relative;">
                                            <span class="salesCounterTest afterDot sales-number" style="">
                                                {{$salesCount ?? ''}}</span> Sales</span>&nbsp;
                                        <span class="positive-review" style="">
                                            {{$reviews["positive_sum"] ?? 0}}</span> /
                                        <span class="negative-review" style="">{{$reviews["negative_sum"] ?? 0}} </span>
                                        Review
                                    </h5>
                                    <style>
                                        .heading-bottom-sales-and-review-box {
                                            color: #949cae;
                                            background: rgba(255, 255, 255, 0.1);
                                            border-radius: 10px;
                                            padding: 10px;
                                            display: inline-block;
                                            font-weight: 400;
                                            font-family: 'Be Vietnam Pro', sans-serif !important;
                                            font-size: 15px;
                                            border: 1px solid rgba(255, 255, 255, 0.08);
                                            border-radius: 5px;
                                        }

                                        .sales-number {
                                            color: #3771fe;
                                            font-size: 15px;
                                            font-weight: bold !important;
                                        }

                                        .negative-review {
                                            color: #ea4335;
                                            font-size: 15px;
                                            font-weight: bold !important;
                                        }

                                        .positive-review {
                                            margin-left: 5px;
                                            color: #38761d;
                                            font-size: 15px;
                                            font-weight: bold !important;
                                        }
                                    </style>

                                    {{-- <h5 style="color:#949cae; font-weight: 400; font-family: 'Be Vietnam Pro', sans-serif !important; font-size:13px;"> 
                             <span style="position: relative;">&nbsp;
                             <span class="salesCounterTest afterDot" style="color: #fff;font-size: 1vw;">
                             {{$salesCount ?? ''}}</span> Sales</span>&nbsp;
                                    <span style="margin-left: 5px; color:#c6efce;font-size: 1vw;">
                                        {{$reviews["positive_sum"] ?? 0}}</span> /
                                    <span style="color: #ffc7ce;font-size: 1vw;">{{$reviews["negative_sum"] ?? 0}}
                                    </span>
                                    Review</h5> --}}

                                </div>

                                {{-- <!-- bid popup area end -->

                                <!-- send message modal start --> --}}
                                <div class="message__modal report__modal modal fade" id="messagemodal" tabindex="-1"
                                    aria-labelledby="messagemodal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="report__close">
                                                <button type="button" class="report__close-btn" data-bs-dismiss="modal"
                                                    aria-label="Close"><i class="fa-regular fa-xmark"></i></button>
                                            </div>
                                            <div class="report__wrapper">
                                                <h3 class="report__title report__title-2">Send your message</h3>
                                                <form action="#">
                                                    <div class="report__input-box">
                                                        <h4>Message</h4>
                                                    </div>
                                                    <div class="report__input">
                                                        <textarea placeholder="Write your message"></textarea>
                                                    </div>
                                                    <div class="report__button">
                                                        <button type="button" class="tp-btn-square">Send </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <!-- send message modal end --> --}}
                                <div class="creator__tab">
                                    <nav>
                                        <div class="nav nav-tabs justify justify-content-center" id="nav-tab"
                                            role="tablist">
                                            <?php  $product=DB::select('select* from lv_products_categories');
								$total =  DB::select('select* from lv_products');
								$count = count($total);?>
                                            <button class="nav-link" id="nav-sale-tab" data-bs-toggle="tab"
                                                onclick=getProducts(0) data-bs-target="#nav-sale" type="button"
                                                role="tab" aria-controls="nav-sale" aria-selected="true">All <span
                                                    class="number">{{$count}}</span></button>

                                            @foreach($product as $products)
                                            @php
                                            $productCount=\App\Models\Product::where('category_id',$products->id)->orderBy("created_at",
                                            "desc")->count();
                                            @endphp
                                            <button class="nav-link" id="nav-sale-tab"
                                                onclick=getProducts({{$products->id}}) data-bs-toggle="tab"
                                                data-bs-target="#nav-sale" type="button" role="tab"
                                                aria-controls="nav-sale" aria-selected="true">{{ $products->name }}
                                                <span class="number">{{$productCount}}</span>
                                            </button>
                                            @endforeach()

                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="creator__border"></div>
                <div class="creator__item-wrapper test pt-40 pb-120">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-12">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade" id="nav-sale" role="tabpanel"
                                        aria-labelledby="nav-sale-tab">
                                        <div class="create__sale">
                                            <div class="row" id="navSaleTab">
                                                <?php $data = \App\Models\Product::orderBy("created_at", "desc")->get(); /*OLD: $data = DB::select("SELECT * FROM  lv_products");*/ ?>

                                                @foreach($data as $product)
                                                <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6">
                                                    <div class="nft__box theme-bg-dark mb-30 transition-3">
                                                        <div class="nft__box-thumb m-img mt-20 mb-20">
                                                            <a class="product-href"
                                                                href="{{ route('product-page', $product->id) }}">

                                                                @if($product->thumbnail_image &&
                                                                file_exists('assets/adminV2/assets/media/product/'.$product->thumbnail_image))
                                                                <img class="test" width="232" height="232"
                                                                    src="{{asset_dir('adminV2/assets/media/product/'.$product->thumbnail_image)}}"
                                                                    alt="" />
                                                                @else
                                                                {{-- <div class="image-container text-center">
                                                                    <img class="test" width="232" height="232"
                                                                        src="{{asset('assets/newdesign/assets/img/creator/16838828281.jpg')}}"
                                                                alt="Demo Image" />
                                                                <p class="text">{{ $product->name }}</p>
                                                        </div> --}}
                                                        <img class="test" width="232" height="232"
                                                            src="{{asset_dir('newdesign/assets/img/creator/16838828281.jpg')}}"
                                                            alt="Demo Image" />
                                                        {{-- <img class="test" src="{{asset_dir('newdesign/assets/img/bid/2/bid-img-1.jpg')}}"
                                                        alt=""/>--}}
                                                        @endif
                                                        </a>
                                                    </div>
                                                    <div class="nft__box-content">
                                                        <div
                                                            class="nft__box-content-top d-flex align-items-center justify-content-between">
                                                            <h3 class="nft__box-title">
                                                                <a
                                                                    href="{{ route('product-page', $product->id) }}">{{ $product->name }}</a>
                                                            </h3>
                                                            <div class="nft__box-trending-icon">
                                                                <span><i class="fa-brands fa-bitcoin"
                                                                        style="line-height: 1.8;"></i></span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="nft__box-info d-flex align-items-center justify-content-between">
                                                            <div class="nft__box-price">
                                                                <p>{{$product->getFormattedFrontPrice()}}</p>
                                                            </div>
                                                            <div class="nft__box-stock">
                                                                <p>{{$product->formatted_front_stock_status}}</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @if($product->isAvailable())
                                                    {{-- <!--
                                                            <div class="nft__box-bottom d-flex align-items-center justify-content-between">
                                                                <div class="nft__box-highest">
                                                                    <p>
                                                                        <button type="submit" class="btn btn-icon btn-block btn-primary buyButton"  onclick="window.location.href='{{ route('product-page', $product->id) }}'">{{
                                                    __('frontend/v4.buybtn') }}</button>
                                                    </p>
                                                </div>
                                            </div>--> --}}
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>
<style>
    .nft__box-stock {
        width: 35%;
        padding-left: 5px;
        text-align: right;
    }

    .nft__box-price {
        width: 65%;
    }

    .nft__box-content,
    .nft__box-thumb {
        padding-left: 15px;
        padding-right: 15px;
    }

    .nft__box-thumb {
        margin: 15px auto;
    }

    .not-products {
        color: white;
        text-align: center;
        margin-top: 40px;
    }
</style>
<script>
    window.addEventListener("load",(e)=>{
        let activeButton  = document.getElementById("nav-sale-tab");
        activeButton.click();
        })

    function getProducts(id){
            let activeTab  = document.getElementById("nav-sale");
            activeTab.classList.add('product-'+id);
            /* $('#navSaleTab').empty(); */
            /*  Make an AJAX request to the Laravel route with the tabId */
        $.ajax({
            url: '/products-tabs/' + id,
            type: 'GET',
            success: function(response) {
                /*console.log(response.length)*/
                $('#navSaleTab').empty();
                if(response.length > 0){
               /*Iterate over the response data using a foreach loop*/
                $.each(response, function(index, item) {
                   
                    /* Generate the HTML for each item*/
            var html = '';
               html +=  `<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6"><div class="nft__box theme-bg-dark mb-30 transition-3"><div class="nft__box-thumb m-img mt-20 mb-20">`;
                    if(item.thumbnail_image) {
                        html +=  `<a  class="product-href" href="../product/${item.id}"><img onerror="changeImageToDiv(this, '${item.name}')" class="test" width='100%' height='232' src="{{asset_dir('adminV2/assets/media/product/${item.thumbnail_image}')}}" alt=""></a></div><div class="nft__box-content">`;
                    }else {
                        /* html +=  `<a class="product-href"  href="../product/${item.id}"><div class="image-container text-center"><p class="text">${item.name}</p></div></a></div><div class="nft__box-content">`;*/
                            html += `<a class="product-href" href="../product/${item.id}"><img class="test" width="100%" height="232" src="{{asset_dir('newdesign/assets/img/creator/16838828281.jpg')}}" alt="Demo Image" /></a></div><div class="nft__box-content">`;
                       }

               html +=  `<div class="nft__box-content-top d-flex align-items-center justify-content-between"><h3 class="nft__box-title"><a href="../product/${item.id}">${item.name}</a></h3>`;
               html +=  `<div class="nft__box-trending-icon"><span><i class="fa-brands fa-bitcoin" style="line-height: 1.8;"></i></span></div></div><div class="nft__box-info d-flex align-items-start justify-content-between">`;
                /* console.log(item.price_in_cent);
                 console.log(item.old_price_in_cent);
                
                debugger;*/
                if(parseFloat(item.old_price_in_cent) > parseFloat(item.price_in_cent) && parseFloat(item.old_price_in_cent) != '0' && parseFloat(item.old_price_in_cent) != ''){
                    var calculate = parseFloat((item.price_in_cent/item.old_price_in_cent)*100).toFixed(2);
                    var calculateReverse = 100 - calculate;
                    var symbols= '{{ $symbol }}';
                    html += `<div class="nft__box-price" style="margin-bottom: 5px;">`;
                    /* html += `<p style="margin-bottom: 5px;"><del>${item.old_price_in_cent} {{ $symbol }}</del>&nbsp&nbsp&nbsp${item.price_in_cent} {{ $symbol }}</p>`;*/
                    
                    if(symbols == "$"){
                        html += '<p style="margin-bottom: 5px;"><del>'+parseFloat(item.old_price_in_cent).toFixed(2).replace(',', '.')+' {{ $symbol }}</del>&nbsp&nbsp&nbsp'+parseFloat(item.price_in_cent).toFixed(2).replace(',', '.')+' {{ $symbol }}</p>';
                        html += '<p style="margin-bottom: 8px;">You Save '+parseFloat(calculateReverse).toFixed(2).replace(',', '.')+'%</p>';
                    }else{
                       html += '<p style="margin-bottom: 5px;"><del>'+parseFloat(item.old_price_in_cent).toFixed(2).replace('.', ',')+'{{ $symbol }}</del>&nbsp&nbsp&nbsp'+parseFloat(item.price_in_cent).toFixed(2).replace('.', ',')+' {{ $symbol }}</p>';
                        html += '<p style="margin-bottom: 8px;">You Save '+parseFloat(calculateReverse).toFixed(2).replace('.', ',')+'%</p>';
                    }
                    html += `</div>`;
                }else{
                    html += `
                    <div class="nft__box-price">
                    <p>${item.price_in_cent } {{ $symbol }}</p>
                    </div>`;
                }
                
                
               html += `<div class="nft__box-stock"><p>${item.formatted_front_stock_status}</p>
                        </div>
                        </div>
                    </div>`;
               /*if (item.is_available) {
                   html +=  `<div class="nft__box-bottom d-flex align-items-center justify-content-between"><div class="nft__box-highest">`;
                   html +=  `<p><a type="submit" class="btn btn-icon btn-block btn-primary buyButton"  href="../product/${item.id}">{{ __('frontend/v4.buybtn') }}</a></p>`;
                   html +=  `</div></div>`;
               }*/

               html +=  `</div></div>`;
                      /* Append the HTML to the tab content*/
                    $('#navSaleTab').append(html);
                });
            }else{
                /*$('#navSaleTab').append("<h2 class='not-products'>No Product Found</h2>");*/
            }
                /*Handle the received data
                Update the content of the corresponding tab*/
               },
            error: function(xhr) {
                /* Handle errors*/
            }
        });

    }

    function changeImageToDiv(that, name)
    {
        let parent = $(that).parent();
        /* $(that).parent();*/
        $(that).remove();
        parent.html('<div class="image-container text-center"><p class="text">'+name+'</p></div>')
    }
</script>


@endsection