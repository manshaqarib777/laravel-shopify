@extends('backendV2.layouts.default')
@section('pageTitle', 'Shopping ' )

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
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">

                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                        fill="currentColor"/>
                                </svg>
                            </span>
                                Status
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">

                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Status Options</div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <div class="px-7 py-5" data-kt-user-table-filter="form">
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">Status:</label>
                                        <select class="form-select form-select-solid fw-bold selectOption"
                                                data-kt-select2="true" data-placeholder="Select option"
                                                data-allow-clear="true" data-kt-user-table-filter="role"
                                                data-hide-search="true">
                                            <option></option>
                                            <option value="nothing">Nothing</option>
                                            <option value="cancelled">Cancel</option>
                                            <option value="completed">Complete</option>
                                            <option value="pending">Pending</option>
                                        </select>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary fw-semibold px-6"
                                                onclick="changeStatus(this)">Apply
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users"
                           style="overflow-x: auto; overflow-y: hidden;">
                        <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                            <th>{{ __('backend/orders.table.id') }}</th>
                            <th>{{ __('backend/orders.table.product') }}</th>
                            <th>{{ __('backend/orders.table.user') }}</th>
                            <th>{{ __('backend/orders.table.date') }}</th>
                            <th>{{ __('backend/orders.table.delivery_method') }}</th>
                            <th>{{ __('backend/orders.table.notes') }}</th>
                            <th>{{ __('backend/orders.table.status') }}</th>
                            <th>{{ __('backend/orders.table.amount') }}</th>
                            <th>{{ __('backend/orders.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        @foreach($shopping->getOrders() as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->name }}</td>
                                <td>
                                    {{ $order->getUser()->username }}
                                </td>
                                <td>
                                    {{ $order->created_at->format('d.m.Y H:i') }}
                                </td>
                                <td>
                                    @if($order->delivery_method)
                                        {{ $order->delivery_method }}
                                    @endif
                                </td>
                                <td>
                                    @if(strlen($order->drop_info) > 0)
                                        {!! nl2br(e(decrypt($order->drop_info))) !!}
                                    @endif
                                </td>
                                <td>
                                    @if($order->getStatus() == 'cancelled')
                                        {{ __('backend/orders.status.cancelled') }}
                                    @elseif($order->getStatus() == 'completed')
                                        {{ __('backend/orders.status.completed') }}
                                    @elseif($order->getStatus() == 'pending')
                                        {{ __('backend/orders.status.pending') }}
                                    @endif
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
                                            <a href="{{ route('backend-order-delete', $order->id) }}"
                                               class="menu-link px-3"
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
