@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/dashboard.title'))


@section('content')

<style>
    .timeline-label:before {
        left: 88px !important;
    }

    .aside {
        display: flex;
        flex-direction: column;
        /*background-color: #232f3e;*/
        padding: 0
    }
    .apexcharts-canvas .apexcharts-xaxistooltip,
    .apexcharts-canvas .apexcharts-tooltip {
        display: none;
    }
    .image-container {
        width: 5vw;
        height: 5vw;
        background: transparent;
        display: flex;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        margin-right: 1vw;
        border-radius: 25%;
    }

    .text {
        margin: auto;
        font-size: .6vw !important;
        font-weight: 600;
        color: var(--tp-common-white);
        line-height: 1vw;
    }
    .image_text{
        width: 5vw;
        height: 5vw;
        margin-right: 1vw;
        object-fit:cover;
        border-radius: 25%;
    }

    .image-container_top_seller {
        width: 5vw;
        height: 5vw;
        background: transparent;
        display: flex;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
    }

    .text_top_seller {
        margin: auto;
        font-size: .5vw !important;
        font-weight: 600;
        color: var(--tp-common-white);
        line-height: 1vw;
    }
    .image_text_top_seller{
        width: 3vw;
        height: 3vw;
    }

    .td_href{
        display: flex !important;
        align-items: center;
        justify-content: flex-start;
    }
    
 .graph_block   .card-body.d-flex.flex-column path {
    stroke: #D3F56A;
}
.graph_block .card:hover {
    background-color: #D3F56A !important;
}
.graph_block .card:hover .d-flex.flex-column path {
    stroke: white;
}
span.value {
    color: #d3f56a;
}
 .card:hover span.value{
    color:white;
}
/*.card-body.d-flex.flex-column {*/
/*    background-image: url('https://laravel-site.net/laravelsite-app/assets/newdesign/assets/img/arrow11.png');*/
/*    background-repeat: no-repeat;*/
/*    background-position: right;*/
    
/*}*/
 .card:hover .card-body.d-flex.flex-column {
    background-image: url('https://laravel-site.net/laravelsite-app/assets/newdesign/assets/img/arrow11.png');
    background-repeat: no-repeat;
    background-position: right;
}
</style>

<!-- begin:: Content Head -->
<div class="content d-flex flex-column flex-column-fluid pt-0" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Row-->
        <div class="row gy-5 g-xl-5 graph_block">
            <!--begin::Col-->
            <div class="col-xl-4">
                <!--begin::Mixed Widget 13-->
                <div class="card card-xl-stretch mb-xl-0 theme-dark-bg-body" style="background-color: #F7D9E3">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <a href="#" class="text-dark fs-3"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.5 1.5H10.5V10" stroke="#D3F56A" stroke-width="1.5"/>
<path d="M10.5 1.5L1.5 10.5" stroke="#D3F56A" stroke-width="1.5"/>
</svg>
{{ __('backend/dashboard.tickets_total.widget_title') }}</a>
                            <!--end::Title-->
                            <!--begin::Chart-->
                            <div class="mixed-widget-13-chart-new"
                                 data-series="{{json_encode($data["tickets"]["counts"])}}"
                                 data-categories="{{json_encode($data["tickets"]["dates"])}}"
                                 style="height: 100px"></div>
                            <!-- <div class="mixed-widget-13-chart" style="height: 100px"></div> -->

                            <!--end::Chart-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Stats-->
                        <div class="pt-5">
                            <!--begin::Number-->
                            <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ $counts['ticketsCount'] }}</span>
                            <!--end::Number-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 13-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4 ">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xl-stretch mb-xl-0 theme-dark-bg-body" style="background-color: #CBF0F4">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <a href="#" class="text-dark  fs-3 pb-4"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.5 1.5H10.5V10" stroke="#D3F56A" stroke-width="1.5"/>
<path d="M10.5 1.5L1.5 10.5" stroke="#D3F56A" stroke-width="1.5"/>
</svg>
{{ __('backend/dashboard.products_total.widget_title') }}</a>
                            <!--end::Title-->
                            <!--begin::Chart-->
                            <!-- <div class="" style="height: 100px"></div> -->
                            {{-- @if(isset($data["products"]["counts"])) {{json_encode($data["products"]["counts"])}} @else 0 @endif  --}}
                            <div class="mixed-widget-14-chart-new" style="height: 100px"
                                 data-series="@if(isset($data["products"]["counts"])) {{json_encode($data["products"]["counts"])}} @else 0 @endif"
                                 data-categories="@if(isset($data["products"]["counts"])) {{json_encode($data["products"]["dates"])}} @else 0 @endif"
                                 ></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Stats-->
                        <div class="pt-5">
                            <!--begin::Number-->
                            <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ $counts['productsCount'] }}</span>
                            <!--end::Number-->
                            <!--begin::Text-->
                            <!--end::Text-->
                        </div>
                        <!--end::Stats-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->

            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4 " style="display:none;">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xxl-stretch mb-5 mb-xl-0 theme-dark-bg-body" style="background-color: #CBD4F4">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column mb-7">
                            <!--begin::Title-->
                            <a href="#" class="text-dark fs-3">{{ __('backend/dashboard.articles_total.widget_title') }} & {{ __('backend/dashboard.newsletter_total.widget_title') }}</a>
                            <!--end::Title-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Row-->
                        <div class="row g-0">
                            <!--begin::Col-->
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-9 me-2">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-light">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs043.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M22 8H8L12 4H19C19.6 4 20.2 4.39999 20.5 4.89999L22 8ZM3.5 19.1C3.8 19.7 4.4 20 5 20H12L16 16H2L3.5 19.1ZM19.1 20.5C19.7 20.2 20 19.6 20 19V12L16 8V22L19.1 20.5ZM4.9 3.5C4.3 3.8 4 4.4 4 5V12L8 16V2L4.9 3.5Z" fill="currentColor" />
                                                    <path d="M22 8L20 12L16 8H22ZM8 16L4 12L2 16H8ZM16 16L12 20L16 22V16ZM8 8L12 4L8 2V8Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark  lh-1">{{ App\Models\Article::count() }}</div>
                                        <div class="fs-7 text-gray-600 ">{{ __('backend/dashboard.articles_total.widget_title') }}</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-9 ">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-light">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs046.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 22C7.4 22 7 21.6 7 21V9C7 8.4 7.4 8 8 8C8.6 8 9 8.4 9 9V21C9 21.6 8.6 22 8 22Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M4 15C3.4 15 3 14.6 3 14V6C3 5.4 3.4 5 4 5C4.6 5 5 5.4 5 6V14C5 14.6 4.6 15 4 15ZM13 19V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V19C11 19.6 11.4 20 12 20C12.6 20 13 19.6 13 19ZM17 16V5C17 4.4 16.6 4 16 4C15.4 4 15 4.4 15 5V16C15 16.6 15.4 17 16 17C16.6 17 17 16.6 17 16ZM21 18V10C21 9.4 20.6 9 20 9C19.4 9 19 9.4 19 10V18C19 18.6 19.4 19 20 19C20.6 19 21 18.6 21 18Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bold lh-1">{{ App\Models\User::where('newsletter_enabled', 1)->count() }}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">{{ __('backend/dashboard.newsletter_total.widget_title') }}</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4 ">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xxl-stretch mb-5 mb-xl-10 theme-dark-bg-body" style="background-color: #cdffcd">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column mb-7">
                            <!--begin::Title-->
                            <a href="#" class="text-dark fs-3"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.5 1.5H10.5V10" stroke="#D3F56A" stroke-width="1.5"/>
<path d="M10.5 1.5L1.5 10.5" stroke="#D3F56A" stroke-width="1.5"/>
</svg>
{{ __('backend/dashboard.users_total.widget_title') }} & {{ __('backend/dashboard.total_orders.widget_title') }} </a>
                            <!--end::Title-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Row-->
                        <div class="row g-0">

                            <!--begin::Col-->
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-9 ">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
{{--                                        <div class="symbol-label bg-light">--}}
{{--                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs022.svg-->--}}
{{--                                            <span class="svg-icon svg-icon-1 svg-icon-dark">--}}
{{--																	<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--																		<path opacity="0.3" d="M11.425 7.325C12.925 5.825 15.225 5.825 16.725 7.325C18.225 8.825 18.225 11.125 16.725 12.625C15.225 14.125 12.925 14.125 11.425 12.625C9.92501 11.225 9.92501 8.825 11.425 7.325ZM8.42501 4.325C5.32501 7.425 5.32501 12.525 8.42501 15.625C11.525 18.725 16.625 18.725 19.725 15.625C22.825 12.525 22.825 7.425 19.725 4.325C16.525 1.225 11.525 1.225 8.42501 4.325Z" fill="currentColor" />--}}
{{--																		<path d="M11.325 17.525C10.025 18.025 8.425 17.725 7.325 16.725C5.825 15.225 5.825 12.925 7.325 11.425C8.825 9.92498 11.125 9.92498 12.625 11.425C13.225 12.025 13.625 12.925 13.725 13.725C14.825 13.825 15.925 13.525 16.725 12.625C17.125 12.225 17.425 11.825 17.525 11.325C17.125 10.225 16.525 9.22498 15.625 8.42498C12.525 5.32498 7.425 5.32498 4.325 8.42498C1.225 11.525 1.225 16.625 4.325 19.725C7.425 22.825 12.525 22.825 15.625 19.725C16.325 19.025 16.925 18.225 17.225 17.325C15.425 18.125 13.225 18.225 11.325 17.525Z" fill="currentColor" />--}}
{{--																	</svg>--}}
{{--																</span>--}}
{{--                                            <!--end::Svg Icon-->--}}
{{--                                        </div>--}}
                                        <div class="symbol-label bg-light">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs022.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Communication/Add-user.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="currentColor"/>
                                                        <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="currentColor"  />
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>

                                            <!-- <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.3" d="M11.425 7.325C12.925 5.825 15.225 5.825 16.725 7.325C18.225 8.825 18.225 11.125 16.725 12.625C15.225 14.125 12.925 14.125 11.425 12.625C9.92501 11.225 9.92501 8.825 11.425 7.325ZM8.42501 4.325C5.32501 7.425 5.32501 12.525 8.42501 15.625C11.525 18.725 16.625 18.725 19.725 15.625C22.825 12.525 22.825 7.425 19.725 4.325C16.525 1.225 11.525 1.225 8.42501 4.325Z" fill="currentColor" />
                                                    <path d="M11.325 17.525C10.025 18.025 8.425 17.725 7.325 16.725C5.825 15.225 5.825 12.925 7.325 11.425C8.825 9.92498 11.125 9.92498 12.625 11.425C13.225 12.025 13.625 12.925 13.725 13.725C14.825 13.825 15.925 13.525 16.725 12.625C17.125 12.225 17.425 11.825 17.525 11.325C17.125 10.225 16.525 9.22498 15.625 8.42498C12.525 5.32498 7.425 5.32498 4.325 8.42498C1.225 11.525 1.225 16.625 4.325 19.725C7.425 22.825 12.525 22.825 15.625 19.725C16.325 19.025 16.925 18.225 17.225 17.325C15.425 18.125 13.225 18.225 11.325 17.525Z" fill="currentColor" />
                                                </svg>
                                            </span> -->
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bold lh-1">{{ App\Models\User::count() }}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">{{ __('backend/dashboard.users_total.widget_title') }}</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-12">
                                <div class="d-flex align-items-center mb-9  ">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-light">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs045.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-dark"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Shopping/Cart1.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z" fill="currentColor" />
                                                        <path d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z" fill="currentColor"/>
                                                    </g>
                                                </svg><!--end::Svg Icon-->
                                            </span>
                                             {{-- <span class="svg-icon svg-icon-1 svg-icon-dark">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 11.7127L10 14.1127L22 11.7127L14 9.31274L2 11.7127Z" fill="currentColor" />
                                                    <path opacity="0.3" d="M20.9 7.91274L2 11.7127V6.81275C2 6.11275 2.50001 5.61274 3.10001 5.51274L20.6 2.01274C21.3 1.91274 22 2.41273 22 3.11273V6.61273C22 7.21273 21.5 7.81274 20.9 7.91274ZM22 16.6127V11.7127L3.10001 15.5127C2.50001 15.6127 2 16.2127 2 16.8127V20.3127C2 21.0127 2.69999 21.6128 3.39999 21.4128L20.9 17.9128C21.5 17.8128 22 17.2127 22 16.6127Z" fill="currentColor" />
                                                </svg>
                                            </span> --}}
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Title-->
                                    <div>
                                        <div class="fs-5 text-dark fw-bold lh-1">{{ App\Models\Setting::get('shop.total_sells', 0) }}</div>
                                        <div class="fs-7 text-gray-600 fw-bold">{{ __('backend/dashboard.total_orders.widget_title') }}</div>
                                    </div>
                                    <!--end::Title-->
                                </div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4 mt-0">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #F7D9E3">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1">
                            <!--begin::Title-->
                            <a href="#" class="text-dark  fs-3"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.5 1.5H10.5V10" stroke="#D3F56A" stroke-width="1.5"/>
<path d="M10.5 1.5L1.5 10.5" stroke="#D3F56A" stroke-width="1.5"/>
</svg>
{{ __('backend/dashboard.today_profit') }}</a>
                            <!--end::Title-->
                            <!--begin::Chart-->
                            <!-- <div class="" style="height: 100px"></div> -->
                            <div class="mixed-widget-13-chart-orders" style="height: 100px"
                                 data-series="{{json_encode($data["orders"]["counts"])}}"
                                 data-categories="{{json_encode($data["orders"]["dates"])}}"
                                 ></div>
                            <!--end::Chart-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Stats-->
                        <div class="pt-5">
                            <!--begin::Number-->
                            <span class="text-dark fw-bold fs-3x me-2 lh-0">{{ $counts["profitCount"] }}</span>
                            <!--end::Number-->

                            <!--begin::Number-->
                            <!--end::Number-->
                            <!--begin::Text-->
                            <span class="text-dark fw-bold fs-6 lh-0">{{ date('d', time()) }} {{ __('backend/dashboard.months_number.' . date('m', time())) }}</span>
                            <!--end::Text-->

                            <!--begin::Text-->
                            <!--end::Text-->
                        </div>
                        <!--end::Stats-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->

            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-4 mt-0">
                <!--begin::Mixed Widget 14-->
                <div class="card card-xl-stretch mb-xl-10 theme-dark-bg-body" style="background-color: #CBF0F4">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column  ">
                            <!--begin::Title-->
                            <a href="#" class="text-dark fs-3"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.5 1.5H10.5V10" stroke="#D3F56A" stroke-width="1.5"/>
<path d="M10.5 1.5L1.5 10.5" stroke="#D3F56A" stroke-width="1.5"/>
</svg>
{{ __('backend/dashboard.bestseller.widget_title') }}</a>
                            <!--end::Title-->
                            <!--begin::Chart-->
                            <!-- <div class="" style="height: 100px"></div> -->
                            <!-- <div class="mixed-widget-14-chart" style="height: 100px"></div> -->
                            <!--end::Chart-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Stats-->
                        @foreach(App\Models\Product::orderByDesc('sells')->limit(4)->get() as $bestsellerProduct)
                        <div class="pt-2">
                            <span class=" " style="margin-right: 5px;">
                                {{ $loop->iteration }}.
                            </span>
                            <b> {{ $bestsellerProduct->name }} </b>
                            <br>
                            <b>{{ __('backend/dashboard.bestseller.price') }}</b>
                            <span class="value">{{ $bestsellerProduct->getFormattedPrice() }}</span>
                        </div>
                        @endforeach
                        <!--end::Stats-->
                    </div>
                </div>
                <!--end::Mixed Widget 14-->
            </div>
            <!--end::Col-->
        </div>

        <!--end::Row-->
        <!--begin::Tables Widget 9-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">{{ __('backend/dashboard.recent_orders.title') }}</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">{{ __('backend/dashboard.recent_orders.total', ['total' => App\Models\UserOrder::count()]) }}</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <!-- UserOrder::orderByDesc('created_at')->limit(10)->get()->all(); -->

                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th class="min-w-200px">{{ __("backend/dashboard.recent_orders.customer") }}</th>
                                <th class="min-w-150px">{{ __("backend/dashboard.recent_orders.product") }}</th>
                                <th class="min-w-150px">{{ __("backend/dashboard.recent_orders.price") }}</th>
                                <th class="min-w-100px text-end">{{ __("backend/dashboard.recent_orders.date") }}</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach(App\Models\UserOrder::with('product')->orderByDesc('created_at')->limit(10)->get() as $orders)
                            <?php $userOrderCustomer = App\Models\User::where('id', $orders->user_id)->get()->first();
                            ?>
                            <tr>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark fs-6">{{$userOrderCustomer->username ?? 'UNKNOWN'}}</a>
                                        </div>
                                    </div>
                                </td>
                                <td>

                                    <a href="#" class="text-dark  d-block fs-6 td_href">
                                            @if($orders->thumbnail_image && file_exists('assets/adminV2/assets/media/product/'.$orders->thumbnail_image))
                                                <img class="image_text" src="{{asset_dir('adminV2/assets/media/product/'.$orders->thumbnail_image)}}" alt=""/>
                                            @else
                                                <!--<div class="image-container text-center">-->
                                                <!--    <h3 class="text">{{ $orders->name }}</h3>-->
                                                <!--</div>-->
                                                {{--                                        <img width="485" height="485" src="{{asset_dir('newdesign/assets/img/product/tab/product-tab-big-1.jpg')}}" alt=""/>--}}
                                            @endif {{ $orders->name ?? 'UNKNOWN'}}
                                    </a>

                                </td>
                                <td class="text-end">
                                    <div class="d-flex flex-column w-100 me-2">
                                        <div class="d-flex flex-stack mb-2">
                                            <span class="text-  me-2 fs-7">{{$orders->getFormattedPrice()}}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <div class="d-flex justify-content-start flex-column">
                                            <a href="#" class="text-dark  s fs-6">{{helperdateFormat($orders->created_at)}}{{--{{$orders->created_at->format('d.m.Y H:i')}}--}} </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Table container-->
            </div>
            <!--begin::Body-->
        </div>
        <!--end::Tables Widget 9-->
        <!--begin::Row-->
        <div class="row gy-5 g-xl-5">
            <!--begin::Col-->
            <div class="col-xxl-6 mt-0">
                <!--begin::List Widget 5-->
                <div class="card card-xl-stretch mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0 mt-4">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="fw-bold mb-2 text-dark"> {{ __('backend/dashboard.recent_tickets.title') }}</span>
                            <span class="text-muted fw-semibold fs-7">{{ __('backend/dashboard.recent_tickets.total', ['total' => App\Models\UserTicket::count()]) }}</span>
                        </h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <!-- <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"> -->
                            <button type="button" class="btn btn-sm btn-icon btn-color-primary" onclick="location.href='admin/management/tickets'">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
                                            <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
                                            <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
                                            <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_63de77131b758">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->
                                <!--begin::Form-->
                                <div class="px-7 py-5  ">
                                    <!--begin::Input group-->
                                    <div class="mb-10 ">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div class="">
                                            <select class="form-select form-select-solid selectTicketOption " data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_63de77131b758" data-allow-clear="true">
                                                <option></option>
                                                <option value="closed">Closed</option>
                                                <option value="open">Open</option>
                                                <option value="">Replied</option>
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                        <button type="button" onclick="changeStatus(this)" class="btn btn-sm btn-primary ticketButton" data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Timeline-->
                        <div class="timeline-label">
                            <!--begin::Item-->
                            @foreach(App\Models\UserTicket::orderByDesc('created_at')->limit(4)->get()->all() as $tickets)
                            <?php $userOrderCustomer = App\Models\User::where('id', $tickets->user_id)->get()->first();
                            if ($tickets->isClosed()) {
                                $userTicketStatus = 'text-danger';
                            } elseif ($tickets->isReplied()) {
                                $userTicketStatus = 'text-warning';
                            } else {
                                $userTicketStatus = 'text-success';
                            }
                            ?>

                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bold text-gray-800 fs-6" style="width: 100px !important;">{{helperdateFormat($tickets->created_at)}}{{--{{$tickets->created_at->format('d.m.Y')}}--}}</div>
                                <!--end::Label-->
                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="fa fa-genderless  {{$userTicketStatus}} fs-1"></i>
                                </div>
                                <!--end::Badge-->
                                <!--begin::Text-->
                                <div class="fw-mormal timeline-content text-muted ps-3" style="cursor: pointer;" onclick="location.href='admin/management/tickets'"> {{substr(htmlspecialchars($tickets->subject), 0, 255)}} ({{$userOrderCustomer->username ?? 'UNKNOWN'}})</div>
                                <!--end::Text-->
                                <!-- <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input widget-9-check ticketCheck" data-id="{{$tickets->id}}" type="checkbox" value="1" />
                                </div> -->
                            </div>
                            @endforeach
                            <!--end::Item-->
                        </div>
                        <!--end::Timeline-->
                    </div>
                    <!--end: Card Body-->
                </div>

                <!--end: List Widget 5-->
            </div>
            <div class="col-xxl-6 mt-0">
                <!--begin::List Widget 4-->
                <div class="card card-xl-stretch mb-5 mb-xl-10">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Top Seller</span>
                        </h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button onclick="location.href = '/admin/orders/page/1'" type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                <span class="svg-icon svg-icon-2">
														<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor" />
																<rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																<rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
																<rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor" opacity="0.3" />
															</g>
														</svg>
													</span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 3-->
                            <!--end::Menu 3-->
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-5">

                        @foreach($userOrders as $order)
                        <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-50px me-5">
                                    <span class="symbol-label">
                                       @if($order->product->thumbnail_image && file_exists('assets/adminV2/assets/media/product/'.$order->product->thumbnail_image))
                                            <img class="image_text_top_seller" src="{{asset_dir('adminV2/assets/media/product/'.$order->product->thumbnail_image)}}" alt=""/>
                                        @else
                                            <div class="image-container_top_seller_d text-center">
                                                    <h3 class="text_top_seller">{{ $order->product->name }}</h3>
                                                </div>
                                            {{--                                        <img width="485" height="485" src="{{asset_dir('newdesign/assets/img/product/tab/product-tab-big-1.jpg')}}" alt=""/>--}}
                                        @endif
{{--                                        <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" />--}}
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Section-->
                                <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                    <div class="flex-grow-1 me-2">
                                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">{{ $order->product->name }}</a>
                                        <span class="text-muted fw-semibold d-block fs-7">{{ $order->product->getCategory()->name }}</span>
                                    </div>
                                    <span class="badge badge-light fw-bold my-2">+ {{ $order->totalprice }} {{ \App\Models\Setting::getShopCurrency() }}</span>
                                </div>
                                <!--end::Section-->
                            </div>
                        @endforeach
                        <!--end::Item-->
                    </div>
                    <!--end::Body-->
                </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!-- end:: Content Body -->
@endsection

@section('page_scripts')
<script>

    $(document).ready(function () {
        initMixedWidget13New('.mixed-widget-13-chart-new');
        initMixedWidget13New('.mixed-widget-13-chart-orders');
        initMixedWidget14New(".mixed-widget-14-chart-new");

    });


    var initMixedWidget14New = function(selector) {
        var element = document.querySelector(selector);
        var options;
        var chart;
        var height;


        height = parseInt(KTUtil.css(element, 'height'));
        var labelColor = KTUtil.getCssVariableValue('--bs-gray-800');

        options = {
            series: [{
                name: 'Inflation',
                data: JSON.parse(element.getAttribute("data-series"))
            }],
            chart: {
                fontFamily: 'inherit',
                height: height,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            grid: {
                show: false,
                padding: {
                    top: 0,
                    bottom: 0,
                    left: 0,
                    right: 0
                }
            },
            colors: ['#ffffff'],
            plotOptions: {
                bar: {
                    borderRadius: 2.5,
                    dataLabels: {
                        position: 'top', // top, center, bottom
                    },
                    columnWidth: '20%'
                }
            },
            dataLabels: {
                enabled: false,
                formatter: function(val) {
                    return val + "%";
                },
                offsetY: -20,
                style: {
                    fontSize: '12px',
                    colors: ["#304758"]
                }
            },
            xaxis: {
                labels: {
                    show: false,
                },
                categories: JSON.parse(element.getAttribute("data-categories")),
                position: 'top',
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                },
                crosshairs: {
                    show: false
                },
                tooltip: {
                    enabled: false
                }
            },
            yaxis: {
                show: false,
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false,
                    background: labelColor
                },
                labels: {
                    show: false,
                    formatter: function(val) {
                        return val + "%";
                    }
                }
            }
        };

        chart = new ApexCharts(element, options);
        chart.render();
    }

    var initMixedWidget13New = function(selector) {
        var height;
        var element = document.querySelector(selector);
        height = parseInt(KTUtil.css(element, 'height'));

        if ( !element ) {
            return;
        }

        var labelColor = KTUtil.getCssVariableValue('--bs-' + 'gray-800');
        var strokeColor = KTUtil.getCssVariableValue('--bs-' + 'gray-300');

        var options = {
            series: [{
                name: 'Net Profit',
                data: JSON.parse(element.getAttribute("data-series"))
            }],
            grid: {
                show: false,
                padding: {
                    top: 0,
                    bottom: 0,
                    left: 0,
                    right: 0
                }
            },
            chart: {
                fontFamily: 'inherit',
                type: 'area',
                height: height,
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                },
                sparkline: {
                    enabled: true
                }
            },
            plotOptions: {},
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            fill: {
                type: 'gradient',
                gradient: {
                    opacityFrom: 0.4,
                    opacityTo: 0,
                    stops: [20, 120, 120, 120]
                }
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: ['#FFFFFF']
            },
            xaxis: {
                categories: JSON.parse(element.getAttribute("data-categories")),
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
                labels: {
                    show: false,
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                },
                crosshairs: {
                    show: false,
                    position: 'front',
                    stroke: {
                        color: strokeColor,
                        width: 1,
                        dashArray: 3
                    }
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: '12px'
                    }
                }
            },
            yaxis: {
                min: 0,
                max: 60,
                labels: {
                    show: false,
                    style: {
                        colors: labelColor,
                        fontSize: '12px'
                    }
                }
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            tooltip: {
                style: {
                    fontSize: '12px'
                },
                y: {
                    formatter: function (val) {
                        return "$" + val + " thousands"
                    }
                }
            },
            colors: ['#ffffff'],
            markers: {
                colors: [labelColor],
                strokeColor: [strokeColor],
                strokeWidth: 3
            }
        };

        var chart = new ApexCharts(element, options);
        chart.render();
    }
    function changeStatus(obj) {
        let status = $('.selectTicketOption').find('option:selected').val()
        let ticket = $('.ticketCheck').attr('checked')
        $.each(ticket, function(i, e) {
            $.ajax({
                type: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/admin/order/change-status",
                data: {
                    status: status,
                    ticket: $(this).attr('data-id')
                },
                dataType: "json",
                success: function(response) {
                    swal({
                        title: "Error!",
                        text: "Here's my error message!",
                        type: "error",
                        confirmButtonText: "Cool"
                    });
                }
            });


        })



    }
</script>
@endsection
