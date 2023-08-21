@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/management.products.database.title') )

@section('content')

    <style>
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    </style>
    <div class="content d-flex flex-column flex-column-fluid jjjjjj" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                      transform="rotate(45 17.0365 15.1223)" fill="currentColor"/>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor"/>
                            </svg>
                        </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-user-table-filter="search"
                                   class="form-control form-control-solid w-250px ps-14" placeholder="Search user"/>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <!--begin::Filter-->
                            <!--begin::Menu 1-->
                            <a href="{{ route('index-with-pageNumber') }}"
                               class="btn btn-primary">{{ __('backend/management.tickets.go_to_shop') }}</a>

                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <div class="row">
                        <div class="col-lg-12 col-xl-4 order-lg-1 order-xl-1">
                            <div class="k-portlet">
                                <div class="k-portlet__head  k-portlet__head--noborder">
                                    <div class="k-portlet__head-label">
                                        <h3 class="k-portlet__head-title">{{ __('backend/management.products.database.widget1.title') }}</h3>
                                    </div>
                                </div>
                                <div class="k-portlet__body">
                                    <div class="k-widget-20">
                                        <div class="k-widget-20__title">
                                            <div class="k-widget-20__label">{{ $databaseItems }}</div>
                                           {{-- <div class="products-chart card-rounded-bottom"
                                                 data-x="{{ $chart['x'] }}"
                                                 data-y="{{ $chart['y'] }}"
                                                 data-kt-chart-color="info" style="height: 150px"></div> --}}
                                            {{--                                            <img class="k-widget-20__bg" src="{{ asset_dir('admin/assets/media/misc/iconbox_bg.png') }}" alt="bg" />--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-xl-8 order-lg-1 order-xl-1">
                            <div class="k-portlet k-portlet--height-fluid">
                                <div class="k-portlet__head">
                                    <div class="k-portlet__head-label">
                                        <h3 class="k-portlet__head-title">
                                            @if(isset($databaseItemsSearch))
                                                {{ __('backend/management.products.database.title2', ['count' => 'Suchtreffer: ' . $databaseItemsSearch]) }}
                                            @else
                                                {{ __('backend/management.products.database.title2', ['count' => $databaseItems]) }}
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                                <div class="k-portlet__body">
                                    <form method="POST"
                                          action="{{ route('backend-management-product-database-search', $product->id) }}">
                                        @csrf
                                        <div class="form-group mt-5">
                                            <div class="form-group mt-5">
                                                <div class="col-md-6" style="padding:0;margin:0;">
                                                    <input type="text" class="form-control" name="search_input"
                                                           value="{{ $search ?? '' }}"
                                                           placeholder="Suchbegriff eingeben..."/>
                                                    <br/>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input type="checkbox" class="form-check-input"
                                                               name="search_regex"
                                                               @if(isset($regex) && $regex) checked @endif/>
                                                        <label>Regex?</label>
                                                    </div>
                                                    <br/>
                                                    <div class="form-group mt-5">
                                                        <input type="submit" class="btn btn-primary btn-inlineblock"
                                                               value="Suchen"/>
                                                    </div>
                                                    <hr/>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    {!! preg_replace('/' . $database->currentPage() . '\?page=/', '', $database->links()) !!}

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>
                                                Inhalt
                                            </th>
                                            <th style="text-align:right;">
                                                Datum
                                            </th>
                                            <th style="text-align:right;">
                                                Aktionen
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($database as $databaseItem)
                                            <tr>
                                                <td>
                                                    @if(strlen($databaseItem->content) > 0)
                                                        @php
                                                            try {
                                                                echo decrypt($databaseItem->content);
                                                            } catch (Exception $e) {
                                                                echo $databaseItem->content;
                                                            }
                                                        @endphp
                                                    @endif
                                                </td>
                                                <td style="text-align:right;">
                                                    {{ $databaseItem->created_at }}
                                                </td>
                                                <td style="text-align:right;">
                                                    <a style="font-size:16px;"
                                                       href="{{ route('backend-management-product-database-edit', $databaseItem->id) }}"
                                                       data-toggle="tooltip"
                                                       data-original-title="{{ __('backend/main.tooltips.edit') }}"><i
                                                            class="la la-edit"></i></a>
                                                    <a style="font-size:16px;"
                                                       href="{{ route('backend-management-product-database-delete', $databaseItem->id) }}"
                                                       data-toggle="tooltip"
                                                       data-original-title="{{ __('backend/main.tooltips.delete') }}"><i
                                                            class="la la-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    {!! preg_replace('/' . $database->currentPage() . '\?page=/', '', $database->links()) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                            <div class="k-portlet k-portlet--height-fluid mt-5">
                                <div class="k-portlet__head mt-5">
                                    <div class="k-portlet__head-label mt-5">
                                        <h3 class="k-portlet__head-title">{{ __('backend/management.products.database.import.txt.title') }}</h3>
                                    </div>
                                </div>
                                <div class="k-portlet__body k-portlet__body--fluid">
                                    <form method="POST"
                                          action="{{ route('backend-management-product-database-import-txt') }}"
                                          style="width: 100%;">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{ $product->id }}"/>

                                        <div class="form-group mt-5" style="width: 100%;">
                                            <label
                                                for="import_txt_input">{{ __('backend/management.products.database.import.txt.input') }}</label>
                                            <textarea style="width: 100%;"
                                                      class="form-control @if($errors->has('import_txt_input')) is-invalid @endif"
                                                      name="import_txt_input" id="import_txt_input"
                                                      placeholder="{{ __('backend/management.products.database.import.txt.input') }}">{{ old('import_txt_input') }}</textarea>

                                            @if($errors->has('import_txt_input'))
                                                <span class="invalid-feedback" style="display:block" role="alert">
																	<strong>{{ $errors->first('import_txt_input') }}</strong>
																</span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-5" style="margin-bottom: 5px;">
                                            <b>{{ __('backend/management.products.database.import.options') }}</b>
                                        </div>

                                        <div class="form-group mt-5">
                                            <div class="form-check form-check-custom form-check-solid form-check-sm">
                                                <input class="form-check-input" type="radio"
                                                       name="product_import_txt_option" id="product_import_txt_option"
                                                       value="linebyline" data-content-visible="false"
                                                       data-weight-visible="false" checked/>
                                                <label class="form-check-label" for="product_import_txt_option">
                                                    {{ __('backend/management.products.database.import.line_by_line') }}
                                                </label>
                                            </div>


                                            <!--<label class="k-radio k-radio--all k-radio--solid">
                                                <input type="radio" name="product_import_txt_option" value="linebyline" checked />
                                                <span></span>
                                                {{ __('backend/management.products.database.import.line_by_line') }}
                                            </label>-->
                                        </div>

                                        <div class="form-group mt-5">
                                            <div
                                                class="form-check form-check-custom product_import_txt_option_wrap form-check-solid form-check-sm">
                                                <input class="form-check-input" type="radio"
                                                       name="product_import_txt_option" id="product_import_txt_option2"
                                                       value="seperator" data-content-visible="false"
                                                       data-weight-visible="false"/>
                                                <label class="form-check-label" for="product_import_txt_option2">
                                                    {{ __('backend/management.products.database.import.with_seperator') }}
                                                </label>
                                            </div>

                                            <input type="text" class="form-control"
                                                   value="@if(strlen(App\Models\Setting::get('import.custom.delimiter')) > 0){{ App\Models\Setting::get('import.custom.delimiter') }}@endif"
                                                   name="product_import_txt_seperator_input"/>
                                            @if($errors->has('product_import_txt_seperator_input'))
                                                <span class="invalid-feedback" style="display:block" role="alert">
																	<strong>{{ $errors->first('product_import_txt_seperator_input') }}</strong>
																</span>
                                            @endif
                                        </div>


                                        <div class="form-group mt-5">
                                            <input type="submit" class="btn btn-primary"
                                                   value="{{ __('backend/management.products.database.import.submit_button') }}"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                            <div class="k-portlet k-portlet--height-fluid mt-5">
                                <div class="k-portlet__head mt-5">
                                    <div class="k-portlet__head-label mt-5">
                                        <h3 class="k-portlet__head-title mt-5">{{ __('backend/management.products.database.import.one.title') }}</h3>
                                    </div>
                                </div>
                                <div class="k-portlet__body k-portlet__body--fluid mt-5">
                                    <form method="POST"
                                          action="{{ route('backend-management-product-database-import-one') }}"
                                          style="width: 100%;">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{ $product->id }}"/>

                                        <div class="form-group mt-5" style="width: 100%;">
                                            <label
                                                for="import_one_content">{{ __('backend/management.products.database.import.one.content') }}</label>
                                            <textarea style="width: 100%;"
                                                      class="form-control @if($errors->has('import_one_content')) is-invalid @endif"
                                                      name="import_one_content" id="import_one_content"
                                                      placeholder="{{ __('backend/management.products.database.import.one.content') }}">{{ old('import_one_content') }}</textarea>

                                            @if($errors->has('import_one_content'))
                                                <span class="invalid-feedback" style="display:block" role="alert">
																	<strong>{{ $errors->first('import_one_content') }}</strong>
																</span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-5">
                                            <input type="submit" class="btn btn-primary"
                                                   value="{{ __('backend/management.products.database.import.submit_button') }}"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .product_import_txt_option_wrap {
            margin-bottom: 20px;
        }

        .form-check-custom .form-check-input {
            margin-right: 5px;
        }
    </style>
@endsection
@section('page_scripts')
    <script>
        var KTWidgetsManagment = function () {
            // Statistics widgets
            var productsChart = function () {
                var charts = document.querySelectorAll('.products-chart');

                [].slice.call(charts).map(function (element) {
                    var height = parseInt(KTUtil.css(element, 'height'));

                    if (!element) {
                        return;
                    }

                    var color = element.getAttribute('data-kt-chart-color');

                    var labelColor = KTUtil.getCssVariableValue('--bs-' + 'gray-800');
                    var baseColor = KTUtil.getCssVariableValue('--bs-' + color);
                    var lightColor = KTUtil.getCssVariableValue('--bs-' + color + '-light');

                    var options = {
                        series: [{
                            name: '',
                            data: document.querySelector('.products-chart').dataset["x"].split(',')
                        }],
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
                            type: 'solid',
                            opacity: 0.3
                        },
                        stroke: {
                            curve: 'smooth',
                            show: true,
                            width: 3,
                            colors: [baseColor]
                        },
                        xaxis: {
                            categories: document.querySelector('.products-chart').dataset["y"].split(","),
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
                                    color: '#E4E6EF',
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
                            max: 80,
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
                            enabled: false,
                            show: false,
                            style: {
                                fontSize: '16px'
                            },
                            /*y: {
                                formatter: function(val) {
                                    return "$" + val + " thousands"
                                }
                            }*/
                        },
                        colors: [baseColor],
                        markers: {
                            colors: [baseColor],
                            strokeColor: [lightColor],
                            strokeWidth: 3
                        }
                    };

                    var chart = new ApexCharts(element, options);
                    chart.render();
                });
            }

            // Public methods
            return {
                init: function () {
                    productsChart();
                }
            }
        }();

        // Webpack support
        if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
            module.exports = KTWidgetsManagment;
        }

        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            KTWidgetsManagment.init();
        });
    </script>
@endsection
