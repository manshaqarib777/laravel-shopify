@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/management.tickets.title') )

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
                            <a href="{{ route('index-with-pageNumber') }}" class="btn btn-primary">{{ __('backend/management.tickets.go_to_shop') }}</a>

                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                            @if(!$ticket->isClosed() )
                                <a href="{{ route('backend-management-ticket-close', $ticket->id) }}" class="btn btn-wide btn-bold btn-primary btn-upper" style="margin-bottom:15px">{{ __('backend/management.tickets.edit.close') }}</a>
                            @else
                                    <a href="{{ route('backend-management-ticket-open', $ticket->id) }}" class="btn btn-wide btn-bold btn-success btn-upper" style="margin-bottom:15px">{{ __('backend/management.tickets.edit.open') }}</a>
                            @endif

                            <div class="k-portlet k-portlet--height-fluid">
                                <div class="k-portlet__head">
                                    <div class="k-portlet__head-label">
                                        <h3 class="k-portlet__head-title">
                                            {{ $ticket->subject }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="k-portlet__body k-portlet__body--fluid">
                                    <div style="width: 100%">
                                        <div class="card">
                                            <div class="card-body">
                                                {{-- <p>{!! nl2br(strlen($ticket->content) > 0 ? e(($ticket->content)) : '') !!}</p> --}}
                                                <p>{!! nl2br(strlen($ticket->content) > 0 ? e(decrypt($ticket->content)) : '') !!}</p>
                                            </div>
                                            <div class="card-footer text-muted">
                                                {{ $ticket->getDateTime() }} | {{ $ticket->getUser()->name }} | <b>{{ __('backend/management.tickets.edit.category') }}</b> {{ $ticket->getCategory()->name }}
                                            </div>
                                        </div>

                                        <hr />

                                        @foreach($ticketReplies as $ticketReply)
                                            <div class="card">
                                                <div class="card-body" style="@if($ticketReply->user_id == Auth::user()->id) background-color: #f2f2f2 !important;color: #181C32 !important; @endif">
                                                    {{-- <p>{!! nl2br(strlen($ticketReply->content) > 0 ? e(($ticketReply->content)) : '') !!}</p> --}}
                                                    <p>{!! nl2br(strlen($ticketReply->content) > 0 ? e(decrypt($ticketReply->content)) : '') !!}</p>
                                                </div>
                                                <div class="card-footer text-muted">
                                                    {{ $ticketReply->getDateTime() }} | {{ $ticketReply->getUser()->name }}
                                                </div>
                                            </div>

                                            <hr />
                                        @endforeach

                                        <h5 class="mb-3 mt-3">{{ __('backend/management.tickets.edit.move_category') }}</h5>

                                        <form method="POST" class="kt-form" action="{{ route('backend-management-ticket-move-form') }}" style="width: 100%">
                                            @csrf

                                            <input type="hidden" name="ticket_id" value="{{ $ticket->id}}" class="mb-3 mt-3" />

                                            <div class="form-group" style="width: 100%">
                                                <label class="mb-3 mt-3" for="ticket_move_category">{{ __('backend/management.tickets.edit.move_category') }}</label>
                                                <select  style="width: 100%" class="form-control mb-3 mt-3 @if($errors->has('ticket_move_category')) is-invalid @endif" id="ticket_move_category" name="ticket_move_category">
                                                    <option value="0">{{ __('frontend/main.please_choose') }}</option>
                                                    @foreach(\App\Models\UserTicketCategory::orderBy('name')->get() as $userTicketCategory)
                                                        <option value="{{ $userTicketCategory->id }}" @if($ticket->category_id == $userTicketCategory->id) selected @endif>{{ $userTicketCategory->name }}</option>
                                                    @endforeach
                                                </select>

                                                @if($errors->has('ticket_move_category'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('ticket_move_category') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            <button type="submit" class="btn btn-primary mb-3 mt-3">{{ __('backend/management.tickets.edit.move') }}</button>
                                        </form>

                                        <hr />

                                        <h5 class="mb-3 mt-3">{{ __('backend/management.tickets.edit.title_reply') }}</h5>

                                        <form method="POST" class="kt-form" action="{{ route('backend-management-ticket-reply-form') }}" style="width: 100%">
                                            @csrf

                                            <input type="hidden" name="ticket_reply_id" value="{{ $ticket->id}}" class="mb-3 mt-3" />

                                            <div class="form-group" style="width: 100%">
                                                <label class="mb-2 mt-3" for="ticket_reply_msg">{{ __('backend/management.tickets.edit.message') }}</label>
                                                <textarea style="width: 100%" class="form-control mb-3 mt-3 @if($errors->has('ticket_reply_msg')) is-invalid @endif" id="ticket_reply_msg" name="ticket_reply_msg" placeholder="{{ __('backend/management.tickets.edit.message') }}">{{ old('ticket_reply_msg') }}</textarea>

                                                @if($errors->has('ticket_reply_msg'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('ticket_reply_msg') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            <button type="submit" class="btn  btn-primary mb-3 mt-3">{{ __('backend/management.tickets.edit.submit_button') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
