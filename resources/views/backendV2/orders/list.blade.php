@extends('backendV2.layouts.default')
@section('pageTitle', 'Einzelne Bestellungen')

@section('content')

    <style>
        table {
            display: table;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        /*-------------------------------Orders-------------------------------*/
        
:root .card-header.order-header {
    justify-content: end;
    padding-top: 0px !important;
    height: 90px;
}
:root .Search-btn input.form-control.form-control-solid.w-250px.ps-14 {
    color: #7D7D7D;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    border: 2px solid #303030;
    border-radius: 10px;
    width: 400px !important;
}

[data-theme=dark]:root .card-body.order-table {
    background-color: #1e1e2d !important;
    border-radius: 10px !important;
}
[data-theme=dark] .svg-icon svg {
    color: white;
}
[data-theme=dark]:root .card-body.order-table {
    background-color: #1e1e2d !important;
}
:root th.min-w-80px.sorting {
    font-family: 'Inter';
    font-weight: 400;
    font-style: normal;
    line-height: 23px;
    font-size: 14px;
}
[data-theme=dark]:root .card-header.order-header {
    border-bottom: 1px solid #303030 !important;
}
:root .table th, :root .table td {
    font-family: 'Inter';
    font-weight: 300 !important;
    font-style: normal;
    line-height: 23px;
    font-size: 14px !important;
    padding: 5px 5px !important;
}
:root .text-end a.btn.btn-light.btn-active-light-primary.btn-sm {
    background-color: black !important;
}
[data-theme=dark]:root .text-end .btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon) {
    background-color: #1e1e2d !important;
    border: 1px solid #1e1e2d;
    text-align: start;
    padding-left: 5px;
    color: white !important;
}
:root .table tr {
    border-bottom: none !important;
}
:root .text-end {
    text-align: start !important;
}
div#kt_content {
    padding: 0 !important;
}
[data-theme=dark]:root .table td {
    color: white !important;
}
[data-theme=dark]:root tbody th {
    color: white !important;
}
.card-title {
    width: 100%;
    justify-content: space-between;
}
.table-footer {
    margin-top: 15px;
    background-color: #1e1e2d !important;
    border-radius: 10px !important;
}

        /*-------------------------------Orders-end-------------------------------*/
        
    </style>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6 order-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <div class="card-heading"> <h2>Indvidual Orders </h2></div>
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 Search-btn">
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
                                   class="form-control form-control-solid w-250px ps-14"
                                   placeholder="Search for orders"/>
                        </div>
                        <!--end::Search-->
                    </div>
                </div>
                <div class="card-body py-4 order-table">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users"
                           style="overflow-x: auto; overflow-y: hidden;">
                        <thead style=" width: 100%">
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" style=" width: 100%">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" id="checkAll" type="checkbox"/>
                                </div>
                            </th>
                            <th class="min-w-80px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/orders.table.id') }}</th>
                            <th class="min-w-80px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/orders.table.product') }}</th>
                            <th class="min-w-80px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/orders.table.user') }}</th>
                            <th class="min-w-80px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/orders.table.date') }}</th>
                            <th class="min-w-80px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/orders.table.amount') }}</th>
                            <th class="min-w-80px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1"
                                colspan="1">{{ __('backend/orders.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold" style="width: 100%">
                        @foreach($orders as $order)
                            <tr style="width: 100%">
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">

                                        <input class="form-check-input orderCheck" data-id="{{ $order->id }}"
                                               type="checkbox"/>
                                    </div>
                                </td>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->name }}</td>
                                <td>
                                    {{ $order->getUser()->username }}
                                </td>
                                <td>
                                    {{helperdateFormat($order->created_at)}} {{ $order->created_at->format('H:i') }}
                                </td>
                                <td>
                                    @if($order->weight > 0)
                                        {{ $order->weight }}{{ $order->weight_char }}
                                    @else
                                        {{ $order->getAmount() }}
                                    @endif
                                </td>
                                <!--begin::Joined-->
                                <!--begin::Action=-->
                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                       data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="currentColor"/>
                                        </svg>
                                    </span>
                                        <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="{{ route('backend-order-id', $order->id) }}"
                                               class="menu-link px-3">{{ __('backend/orders.view') }}</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="/admin/orders/delete/{{ $order->id }}" class="menu-link px-3"
                                               data-kt-users-table-filter="delete_row">{{ __('backend/orders.delete') }}</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-body py-4 table-footer">
    <div class="pages">
        <p>Showing <span class="footer-page">1 to 10</span> of <span class="footer-page">96</span> entries</p>
    </div>
    <div class="page. no."></div>
                </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script>
        $('#checkAll').change(function () {

            var _this = this;
            $('.orderCheck').each(function () {

                if ($(_this).is(':checked')) {
                    $(this).attr('checked', 'checked');
                } else {
                    $(this).removeAttr('checked', 'checked');
                }
            });
        });

        function changeStatus(obj) {

            let status = $('.selectOption').find('option:selected').val()
            let ticket = $('.orderCheck')


            $.each(ticket, function (i, e) {

                if ($(this).attr('checked')) {
                    $.ajax({
                        type: "post",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/admin/orders/change-status',
                        data: {
                            status: status,
                            order: $(this).attr('data-id')
                        },
                        dataType: "json",
                        success: function (response) {


                        }
                    });

                }
                swal({
                    title: "success",
                    text: "status Updated",
                    type: "success",
                    confirmButtonText: "Cool"
                });
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
            })


        }
    </script>
@endsection
