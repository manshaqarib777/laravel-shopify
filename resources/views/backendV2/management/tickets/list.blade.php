@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/management.tickets.title') )

@section('content')

<style>
    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
    /*-----------------management/tickets/-------------------*/
.fit {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 20px;
}
.table.table-row-dashed tr {
    border-bottom-width: 0px !important;
    border-bottom-style: dashed;
    border-bottom-color: var(--kt-border-color);
}
tbody.tab tr td {
    padding: 5px 0px !important;
}
i.la.la-edit {
    font-size: 18px;
}
i.la.la-trash {
    font-size: 18px;
}
.btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon) {
    border: 0;
    padding: calc(.775rem + 1px) calc(1.5rem + 1px);
}
a {
    margin-left: 5px;
}
a :last-child {
    margin-left: 0px; !important;
}
.tike {
    padding-top: 0px;
}
th.min-w-125px.sorting {
    padding-left: 0px !important;
}
th, td{
    font-size: 14px !important;
}
.card .card-body {
    padding-right: 0px !important;
}
a.btn.btn-primary {
    padding: 10px 0px !important;
}
i.la.la-edit {
    margin-left: 30px;
}
tbody.tab tr td {
    padding: 8px 13px !important;
}
.table.gy-5 td, .table.gy-5 th {
    padding-top: 1.25rem;
    padding-bottom: 1.25rem;
    padding-left: 17px !important;
    font-weight: 400;
}
th.min-w-125px.sorting {
    padding-left: 17px !important;
}
th.ter.min-w-125px.sorting {
    padding-left: 35px !important;
}
a.btn.btn-primary {
    padding: 10px 15px !important;
}
[data-theme=dark] tr {
    color: #e1e1e3;
}
[data-theme=dark] .table>:not(:last-child)>:last-child>* {
    border-bottom-color: inherit;
    color: #7D7D7D;
}

.svg-icon.svg-icon-2 svg {
    height: 1.5rem!important;
    width: 1.5rem!important;
    color: #1d1d1d;
}
.btn:not(.btn-outline):not(.btn-dashed):not(.border-hover):not(.border-active):not(.btn-flush):not(.btn-icon) {
    background-color: #d3f56a !important;
    color: #1D1D1D !important;
    width: 106px !important;
}
th.actionbtn.min-w-125px.sorting {
    padding-left: 35px !important;
}
.search-bar {
    width: auto;
}
.search-bar input[type="text"] {
    border-radius: 5px;
    color: #7D7D7D;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    border: 2px solid #303030;
    border-radius: 10px;
    width: 246px;
    height: 44px;
    background-color: transparent;
}
h6 {
    font-size: 20px;
    margin-left: 10px;
    font-weight: 400;
}


/*-----------------management/tickets/ End-------------------*/
</style>
<div class="content d-flex flex-column flex-column-fluid tike" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <h6>Tickets</h6>
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
                    <div class="fit" data-kt-user-table-toolbar="base">
                        <a href="{{ route('index-with-pageNumber') }}" class="btn btn-primary">{{ __('backend/management.tickets.go_to_shop') }}</a>
                        <!--begin::search-->
                         <div class="search-bar"> <form action="#">
                                 <input type="text" placeholder="Search.." name="search">
                                </form>
                             </div>

                        <!--begin::Filter-->
                        <!--begin::Menu 1-->
                        <div style="display: contents" class="row justify-content-around">
                            <button type="button" class="btn btn-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Filter</button>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-4 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Separator-->
                                <!--begin::Content-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fs-5 fw-semibold mb-3">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <div class="d-flex flex-column flex-wrap fw-semibold" data-kt-customer-table-filter="payment_type">
                                            <!--begin::Option-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                <input class="form-check-input" type="radio" name="status" value="all" checked="checked" />
                                                <span class="form-check-label text-gray-600">All</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                                <input class="form-check-input" type="radio" name="status" value="closed" />
                                                <span class="form-check-label text-gray-600">{{ __('backend/management.tickets.status_data.closed') }}</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                                <input class="form-check-input" type="radio" name="status" value="answered" />
                                                <span class="form-check-label text-gray-600">{{ __('backend/management.tickets.edit.answered') }}</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" name="status" value="open" />
                                                <span class="form-check-label text-gray-600">{{ __('backend/management.tickets.status_data.open') }}</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter" onclick="changeFilter()">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--<div class="search-bar"> <form action="#">-->
                            <!--     <input type="text" placeholder="Search.." name="search">-->
                            <!--    </form>-->
                            <!-- </div>-->
                            <!--<a href="{{ route('index-with-pageNumber') }}" class="btn btn-primary">{{ __('backend/management.tickets.go_to_shop') }}</a>-->
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-body py-4">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users" style="overflow-x: auto; overflow-y: hidden;">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-95px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.id') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.user') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.subject') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.category') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.status') }}</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.date') }}</th>
                            <th class="actionbtn min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1">{{ __('backend/management.tickets.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class=" tab text-gray-600 fw-semibold">
                        @foreach($tickets as $ticket)
                        <tr>
                            <td scope="row">{{ $ticket->id }}</td>
                            <td>
                                {{ $ticket->getUser()->username }}
                            </td>
                            <td>{{ $ticket->subject }}</td>
                            <td>{{ $ticket->getCategory()->name }}</td>
                            <td>
                                @if($ticket->isClosed())
                                <span class="kt-badge kt-badge--danger kt-badge--dot kt-badge--md"></span>
                                <span class="kt-label-font-color-2 kt-font-bold">{{ __('backend/management.tickets.status_data.closed') }}</span>
                                @elseif($ticket->isReplied())
                                <span class="kt-badge kt-badge--brand kt-badge--dot kt-badge--md"></span>
                                <span class="kt-label-font-color-2 kt-font-bold">{{ __('backend/management.tickets.edit.answered') }}</span>
                                @else
                                <span class="kt-badge kt-badge--success kt-badge--dot kt-badge--md"></span>
                                <span class="kt-label-font-color-2 kt-font-bold">{{ __('backend/management.tickets.status_data.open') }}</span>
                                @endif
                            </td>
                            <td>
                                {{helperdateFormat($ticket->created_at)}} {{ $ticket->created_at->format('H:i') }}
                            </td>
                            <td style="font-size: 20px;">
                                <a href="{{ route('backend-management-ticket-edit', $ticket->id) }}"><i class="la la-edit"></i></a>
                                <a href="{{ route('backend-management-ticket-delete', $ticket->id) }}"><i class="la la-trash"></i></a>
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

@section('page_scripts')
<script>
    function changeFilter() {
        let status = $('[name="status"]:checked').val();

        const url = new URL(location.href);
        url.searchParams.set('status', status);
        window.location.href = url.href
    }
</script>
@endsection