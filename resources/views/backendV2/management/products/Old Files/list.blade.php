@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/management.products.title') )

@section('content')

    <style>
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    </style>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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
                            <!-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg> -->
                        </span>
                            <!--end::Svg Icon-->
                            <!-- <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" /> -->
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

                    <a href="{{ route('backend-management-product-add') }}"
                       class="btn btn-wide btn-bold btn-primary btn-upper"
                       style="margin-bottom:15px">{{ __('backend/main.add') }}</a>
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users"
                           style="overflow-x: auto; overflow-y: hidden;">
                        <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            {{--                            <th class="w-10px pe-2">--}}
                            {{--                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">--}}
                            {{--                                    <input class="form-check-input" id="checkAll" type="checkbox" />--}}
                            {{--                                </div>--}}
                            {{--                            </th>--}}
                            <th class="min-w-100px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/management.products.id') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/management.products.name') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/management.products.category') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/management.products.price') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/management.products.stock_status') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/management.products.sells') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/management.products.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">

                        @foreach($products as $product)
                            <tr>
                                {{--                                <td>--}}
                                {{--                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">--}}

                                {{--                                        <input class="form-check-input orderCheck" data-id="{{ $product->id }}" type="checkbox" />--}}
                                {{--                                    </div>--}}
                                {{--                                </td>--}}
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if($product->getCategory()->slug == 'uncategorized')
                                        {{ $product->getCategory()->name }}
                                    @else
                                        <a href="{{ route('backend-management-product-category-edit', $product->getCategory()->id) }}">{{ $product->getCategory()->name }}</a>
                                    @endif
                                </td>
                                <td>{{ $product->getFormattedPrice() }}</td>
                                <td>
                                    @if($product->isUnlimited())
                                        {{ __('backend/management.products.unlimited') }}
                                    @elseif($product->asWeight())
                                        {{ __('backend/management.products.weight_available', [
                                            'weight' => $product->getWeightAvailable(),
                                            'char' => $product->getWeightChar()
                                        ]) }}
                                    @else
                                        @if($product->inStock())
                                            {{ $product->getStock() }}
                                        @else
                                            {{ __('backend/management.products.sold_out') }}
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    {{ $product->getSells() }}@if($product->asWeight())
                                        {{ $product->getWeightChar() }}
                                    @endif
                                </td>
                                <td style="font-size: 20px;">
                                    @if(!$product->isUnlimited() && !$product->asWeight())
                                        <a href="{{ route('backend-management-product-database', $product->id) }}"
                                           data-toggle="tooltip"
                                           data-original-title="{{ __('backend/main.tooltips.database') }}"><i
                                                class="la la-database"></i></a>
                                    @endif
                                    <a href="{{ route('backend-management-product-edit', $product->id) }}"
                                       data-toggle="tooltip"
                                       data-original-title="{{ __('backend/main.tooltips.edit') }}"><i
                                            class="la la-edit"></i></a>
                                    <a href="{{ route('backend-management-product-delete', $product->id) }}"
                                       data-toggle="tooltip"
                                       data-original-title="{{ __('backend/main.tooltips.delete') }}"><i
                                            class="la la-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
