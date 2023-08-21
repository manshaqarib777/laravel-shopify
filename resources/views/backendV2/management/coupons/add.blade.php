@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/management.coupons.add.title') )

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
                        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                            <div class="kt-portlet">
                                <div class="kt-portlet__head mt-5">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">{{ __('backend/management.coupons.add.title') }}</h3>
                                    </div>
                                </div>
                                <form method="post" class="kt-form"
                                      action="{{ route('backend-management-coupon-add-form') }}">
                                    @csrf

                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="form-group mt-5">
                                                <label
                                                    for="coupon_add_code">{{ __('backend/management.coupons.code') }}</label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('coupon_add_code')) is-invalid @endif"
                                                       id="coupon_add_code" name="coupon_add_code"
                                                       placeholder="{{ __('backend/management.coupons.code') }}"
                                                       value="{{ old('coupon_add_code') }}"/>

                                                @if($errors->has('coupon_add_code'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('coupon_add_code') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            <div class="form-group mt-5">
                                                <label
                                                    for="coupon_add_amount">{{ __('backend/management.coupons.amount') }}</label>
                                                <input type="number"
                                                       class="form-control @if($errors->has('coupon_add_amount')) is-invalid @endif"
                                                       id="coupon_add_amount" name="coupon_add_amount"
                                                       placeholder="{{ __('backend/management.coupons.amount') }}"
                                                       value="{{ old('coupon_add_amount') }}"/>

                                                @if($errors->has('coupon_add_amount'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('coupon_add_amount') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            <div class="form-group mt-5">
                                                <label
                                                    for="coupon_add_max_usable">{{ __('backend/management.coupons.max_usable') }}</label>
                                                <input type="number"
                                                       class="form-control @if($errors->has('coupon_add_max_usable')) is-invalid @endif"
                                                       id="coupon_add_max_usable" name="coupon_add_max_usable"
                                                       placeholder="{{ __('backend/management.coupons.max_usable') }}"
                                                       value="{{ old('coupon_add_max_usable') }}"/>

                                                @if($errors->has('coupon_add_max_usable'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('coupon_add_max_usable') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            <div class="form-group mt-5">

                                                <div
                                                    class="form-check form-check-custom form-check-solid form-check-sm mt-5">
                                                    <input type="checkbox" class="form-check-input"
                                                           data-content-visible="false" data-weight-visible="false"
                                                           id="coupon_add_is_percent" name="coupon_add_is_percent"/>
                                                    <label class="form-check-label" for="product_add_stock_management1">
                                                        Prozentual berechnen
                                                    </label>
                                                </div>

                                                @if($errors->has('coupon_add_is_percent'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('coupon_add_is_percent') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            <!--
															<div style="margin-bottom: 5px;">
																<b>{{ __('backend/management.coupons.add.options') }}</b>
															</div>

															<div class="form-group">
																<label class="k-checkbox k-checkbox--all k-checkbox--solid">
																	<input type="checkbox" name="coupon_add_unlimited" />
																	<span></span>
																	{{ __('backend/management.coupons.add.unlimited') }}
                                            </label>
                                        </div>
-->
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot mt-5">
                                        <div class="kt-form__actions">
                                            <button type="submit"
                                                    class="btn btn-wide btn-primary">{{ __('backend/management.coupons.add.submit_button') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <style>
        .form-check-custom .form-check-input {
            margin-right: 5px;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            $('textarea.text-editor').froalaEditor({
                toolbarSticky: false,
                language: 'de',
                theme: 'gray',
                toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'align', '|', 'fontFamily', 'fontSize', 'color', '|', 'emoticons', '|', 'insertLink', 'insertImage', '|', 'outdent', 'indent', 'clearFormatting', 'insertTable', 'html']
            });
        });
    </script>
@endsection
