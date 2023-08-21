@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/media.title') )

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
                            <a href="{{ route('backend-shoppings') }}" class="btn btn-primary">Mehrfach Bestellungen</a>

                        </div>
                    </div>
                </div>
                <div class="card-body py-4">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger fade show" role="alert">
                            <div class="alert-text">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert"
                                        aria-label="{{ __('frontend/main.close') }}">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('backend-media-upload') }}" class="kt-form" method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <input type="file" name="media_file"/><br/><br/>
                        <button type="submit" class="btn btn-primary">{{ __('backend/media.upload') }}</button>
                    </form>

                    <hr/>
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users"
                           style="overflow-x: auto; overflow-y: hidden;">
                        <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" id="checkAll" type="checkbox"/>
                                </div>
                            </th>
                            <th>{{ __('backend/media.preview') }}</th>
                            <th>{{ __('backend/media.filename') }}</th>
                            <th>{{ __('backend/media.date') }}</th>
                            <th>{{ __('backend/media.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                        @foreach($medias as $media)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">

                                        <input class="form-check-input orderCheck" data-id="{{ $media->id }}"
                                               type="checkbox"/>
                                    </div>
                                </td>
                                <th scope="row">
                                    <img src="{{ media($media->filename) }}"
                                         style="max-width: 40px;border:2px solid #ccc;border-radius:2px;padding:3px;"/>
                                </th>
                                <td>{{ $media->filename }}</td>
                                <td>
                                    {{ $media->created_at->format('d.m.Y H:i') }}
                                </td>
                                <td style="font-size: 20px;">
                                    <a href="{{ media($media->filename) }}" target="_media"><i style="font-size: 18px;"
                                                                                               class="fas fa-external-link-alt"></i></a>
                                    <a href="{{ route('backend-media-delete', $media->id) }}"><i
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
