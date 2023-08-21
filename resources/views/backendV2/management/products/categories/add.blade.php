@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/management.products.categories.title') )

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
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                            <div class="kt-portlet">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">{{ __('backend/management.products.categories.add.title') }}</h3>
                                    </div>
                                </div>
                                <form method="post" class="kt-form"
                                      action="{{ route('backend-management-product-category-add-form') }}">
                                    @csrf

                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="form-group mt-5">
                                                <label for="product_category_add_name"
                                                       class="mb-2">{{ __('backend/management.products.categories.name') }}</label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('product_category_add_name')) is-invalid @endif"
                                                       id="product_category_add_name" name="product_category_add_name"
                                                       placeholder="{{ __('backend/management.products.categories.name') }}"
                                                       value="{{ old('product_category_add_name') }}"/>

                                                @if($errors->has('product_category_add_name'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('product_category_add_name') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            <div class="form-group mt-5">
                                                <label class="mb-2"
                                                       for="product_category_add_slug">{{ __('backend/management.products.categories.slug') }}</label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('product_category_add_slug')) is-invalid @endif"
                                                       id="product_category_add_slug" name="product_category_add_slug"
                                                       placeholder="{{ __('backend/management.products.categories.slug') }}"
                                                       value="{{ old('product_category_add_slug') }}"/>

                                                @if($errors->has('product_category_add_slug'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('product_category_add_slug') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            <div class="form-group mt-5">
                                                <label class="mb-2"
                                                       for="product_category_add_keywords">{{ __('backend/management.products.categories.keywords') }}</label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('product_category_add_keywords')) is-invalid @endif"
                                                       id="product_category_add_keywords"
                                                       name="product_category_add_keywords"
                                                       placeholder="{{ __('backend/management.products.categories.keywords') }}"
                                                       value="{{ old('product_category_add_keywords') }}"/>

                                                @if($errors->has('product_category_add_keywords'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('product_category_add_keywords') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            <div class="form-group mt-5">
                                                <label class="mb-2"
                                                       for="product_category_add_meta_tags_desc">{{ __('backend/management.products.categories.meta_tags_desc') }}</label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('product_category_add_meta_tags_desc')) is-invalid @endif"
                                                       id="product_category_add_meta_tags_desc"
                                                       name="product_category_add_meta_tags_desc"
                                                       placeholder="{{ __('backend/management.products.categories.meta_tags_desc') }}"
                                                       value="{{ old('product_category_add_meta_tags_desc') }}"/>

                                                @if($errors->has('product_category_add_meta_tags_desc'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('product_category_add_meta_tags_desc') }}</strong>
																	</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot mt-5">
                                        <div class="kt-form__actions mt-5">
                                            <button type="submit"
                                                    class="btn btn-primary">{{ __('backend/management.products.categories.add.submit_button') }}</button>
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
