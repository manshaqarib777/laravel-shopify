@extends('backendV2.layouts.default')

@section('content')
    @section('pageTitle', __('backend/design.title') )
    <style>
        .CodeMirror-sizer {
            margin-left: 0px !important
        }
    </style>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl ttttt" id="kt_content_container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bold">{{ __('backend/design.title') }}</div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Form-->
                <form method="POST" action="{{ route('backend-design-form') }}" id="kt_project_settings_form"
                      class="form">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body p-9">

                        <div class="row mb-8">
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{ __('backend/design.logo') }}</div>
                            </div>
                            <div class="col-xl-9 fv-row">
                                <input id="logo" name="logo" class=" form-control-solid form-control"
                                       value="{{ App\Models\Setting::get('theme.logo') }}"/>

                            </div>
                            @if($errors->has('logo'))
                                <span class="invalid-feedback" style="display:block;" role="alert">
                            <strong>{{ $errors->first('logo') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="row mb-8">
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{ __('backend/design.favicon') }}</div>
                            </div>
                            <div class="col-xl-9 fv-row">
                                <input id="favicon" name="favicon" class=" form-control-solid form-control"
                                       value="{{ App\Models\Setting::get('theme.favicon') }}"/>
                            </div>
                            @if($errors->has('favicon'))
                                <span class="invalid-feedback" style="display:block;" role="alert">
                            <strong>{{ $errors->first('favicon') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="row mb-8">
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{ __('backend/design.background') }}</div>
                            </div>
                            <div class="col-xl-9 fv-row">
                                <input id="background" name="background" class=" form-control-solid form-control"
                                       value="{{ App\Models\Setting::get('theme.background') }}"/>

                            </div>
                            @if($errors->has('background'))
                                <span class="invalid-feedback" style="display:block;" role="alert">
                            <strong>{{ $errors->first('background') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="row mb-8">
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{ __('backend/design.pattern') }}</div>
                            </div>
                            <div class="col-xl-9 fv-row">
                                <input id="pattern" name="pattern" class=" form-control-solid form-control"
                                       value="{{ App\Models\Setting::get('theme.color1') }}"/>

                            </div>
                            @if($errors->has('pattern'))
                                <span class="invalid-feedback" style="display:block;" role="alert">
                            <strong>{{ $errors->first('pattern') }}</strong>
                        </span>
                            @endif
                        </div>

                        <!--<div class="row mb-8">-->
                        <!--begin::Col-->
                        <!--    <div class="col-xl-3">-->
                        <!--        <div class="fs-6 fw-semibold mt-2 mb-3"> {{ __('backend/design.custom_css') }} </div>-->
                        <!--    </div>-->

                        <!--end::Col-->
                        <!--begin::Col-->
                        <!--    <div class="col-xl-9 fv-row">-->
                        <!--        <textarea id="custom_css" name="custom_css">{{ App\Models\Setting::get('theme.custom.css') }}</textarea>-->

                        <!--    </div>-->
                        <!--    @if($errors->has('custom_css'))-->
                        <!--    <span class="invalid-feedback" style="display:block;" role="alert">-->
                        <!--        <strong>{{ $errors->first('custom_css') }}</strong>-->
                        <!--    </span>-->
                        <!--    @endif-->
                        <!--begin::Col-->
                        <!--</div>-->
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

@endsection

@section('page_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.0/addon/hint/show-hint.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.0/addon/hint/css-hint.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.0/mode/css/css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.0/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src=""></script>
    <script>
        CodeMirror.fromTextArea(document.getElementById('custom_css'), {
            lineNumbers: true,
            mode: 'css',
        });
    </script>
@endsection
