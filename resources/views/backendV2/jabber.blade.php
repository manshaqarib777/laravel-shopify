@extends('backendV2.layouts.default')

@section('content')
    @section('pageTitle', __('backend/jabber.title'))

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bold">{{ __('backend/jabber.newsletter.title') }}</div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <form method="POST" action="{{ route('backend-jabber-newsletter-form') }}" id="kt_project_settings_form"
                      class="form">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--end::Row-->
                        @if($errors->has('jabber_message'))
                            <span class="invalid-feedback" style="display:block" role="alert">
                        <strong>{{ $errors->first('jabber_message') }}</strong>
                    </span>
                        @endif
                        <!--end::Row-->
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div
                                    class="fs-6 fw-semibold mt-2 mb-3">{{ __('backend/jabber.newsletter.message') }}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <textarea class="form-control @if($errors->has('jabber_message')) is-invalid @endif"
                                          name="jabber_message" id="jabber_message"
                                          placeholder="{{ __('backend/jabber.newsletter.type_here') }}">{{ old('jabber_message') }}</textarea>

                            </div>
                            <!--begin::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary"
                                id="kt_project_settings_submit"> {{ __('backend/jabber.newsletter.submit_button') }}</button>
                    </div>
                    <!--end::Card footer-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!-- ---------------------------------------------------------------------------------------- -->
    @if(Auth::user()->hasPermission('jabber_login'))
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div class="container-xxl" id="kt_content_container">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title fs-3 fw-bold"> {{ __('backend/jabber.login.title') }}</div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('backend-jabber-login-form') }}" class="form">
                        @csrf

                        <!--begin::Card body-->
                        <div class="card-body p-9">
                            <div class="row mb-8">
                                <div class="col-xl-3">
                                    <div
                                        class="fs-6 fw-semibold mt-2 mb-3"> {{ __('backend/jabber.login.address') }}</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="text"
                                           class=" form-control-solid form-control @if($errors->has('jabber_address')) is-invalid @endif"
                                           name="jabber_address" id="jabber_address"
                                           placeholder="{{ __('backend/jabber.login.address_placeholder') }}"
                                           value="{{ App\Models\Setting::get('jabber.address') }}"/>
                                </div>
                                @if($errors->has('jabber_address'))
                                    <span class="invalid-feedback" style="display:block" role="alert">
                            <strong>{{ $errors->first('jabber_address') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="row mb-8">
                                <div class="col-xl-3">
                                    <div
                                        class="fs-6 fw-semibold mt-2 mb-3"> {{ __('backend/jabber.login.username') }}</div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="text"
                                           class="form-control-solid form-control @if($errors->has('jabber_username')) is-invalid @endif"
                                           name="jabber_username" id="jabber_username"
                                           placeholder="{{ __('backend/jabber.login.username') }}"
                                           value="{{ App\Models\Setting::get('jabber.username') }}"/>
                                </div>
                                @if($errors->has('jabber_username'))
                                    <span class="invalid-feedback" style="display:block" role="alert">
                            <strong>{{ $errors->first('jabber_username') }}</strong>
                        </span>
                                @endif
                            </div>
                            <div class="row mb-8">
                                <div class="col-xl-3">
                                    <div
                                        class="fs-6 fw-semibold mt-2 mb-3"> {{ __('backend/jabber.login.password') }} </div>
                                </div>
                                <div class="col-xl-9 fv-row">
                                    <input type="text"
                                           class="form-control-solid form-control @if($errors->has('jabber_password')) is-invalid @endif"
                                           name="jabber_password" id="jabber_password"
                                           placeholder="{{ __('backend/jabber.login.password') }}"
                                           value="{{ App\Models\Setting::get('jabber.password') }}"/>

                                </div>
                                @if($errors->has('jabber_password'))
                                    <span class="invalid-feedback" style="display:block" role="alert">
                            <strong>{{ $errors->first('jabber_password') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('page_scripts')

@endsection
