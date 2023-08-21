@extends('backendV2.layouts.default')
@section('pageTitle', 'Bonus' )

@section('content')

    <style>
        table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
    </style>
    <div class="content d-flex flex-column flex-column-fluidn" id="kt_content">
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
                                {{--                                <div class="kt-portlet__head">--}}
                                {{--                                    <div class="kt-portlet__head-label">--}}
                                {{--                                        <h3 class="kt-portlet__head-title">Bonus</h3>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <form method="post" class="kt-form"
                                      action="{{ route('backend-management-product-bonus', $pID) }}">
                                    @csrf

                                    <input type="hidden" name="settings_bonus_ids" value="{{ $Ids }}"/>
                                    <div class="kt-portlet__body">
                                        @foreach($bbs as $b)
                                            <div class="kt-section kt-section--first row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="settings_bonus_amount_{{ $b->id }}">Min.
                                                            Betrag</label>
                                                        <input type="text"
                                                               class="form-control @if($errors->has('settings_bonus_amount_' . $b->id)) is-invalid @endif"
                                                               id="settings_bonus_amount_{{ $b->id }}"
                                                               name="settings_bonus_amount_{{ $b->id }}"
                                                               placeholder="100" value="{{ $b->min_amount }}"/>

                                                        @if($errors->has('settings_bonus_amount_' . $b->id))
                                                            <span class="invalid-feedback" style="display:block;"
                                                                  role="alert">
																			<strong>{{ $errors->first('settings_bonus_amount_' . $b->id) }}</strong>
																		</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="settings_bonus_percent_{{ $b->id }}">Prozent</label>
                                                        <input type="text"
                                                               class="form-control @if($errors->has('settings_bonus_percent_' . $b->id)) is-invalid @endif"
                                                               id="settings_bonus_percent_{{ $b->id }}"
                                                               name="settings_bonus_percent_{{ $b->id }}"
                                                               placeholder="0.90" value="{{ $b->percent }}"/>

                                                        @if($errors->has('settings_bonus_percent_' . $b->id))
                                                            <span class="invalid-feedback" style="display:block;"
                                                                  role="alert">
																			<strong>{{ $errors->first('settings_bonus_percent_' . $b->id) }}</strong>
																		</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-2" style="padding-top:27px">

                                                    <a href="{{ route('backend-management-product-bonus-del', [$pID, $b->id]) }}"
                                                       class="btn btn-danger">Löschen</a>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="kt-section kt-section--first row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="settings_bonus_amount_new">Min. Betrag</label>
                                                    <input type="text"
                                                           class="form-control @if($errors->has('settings_bonus_amount_new')) is-invalid @endif"
                                                           id="settings_bonus_amount_new"
                                                           name="settings_bonus_amount_new" placeholder="100" value=""/>

                                                    @if($errors->has('settings_bonus_amount_new'))
                                                        <span class="invalid-feedback" style="display:block;"
                                                              role="alert">
																			<strong>{{ $errors->first('settings_bonus_amount_new') }}</strong>
																		</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="settings_bonus_percent_new">Prozent</label>
                                                    <input type="text"
                                                           class="form-control @if($errors->has('settings_bonus_percent_new')) is-invalid @endif"
                                                           id="settings_bonus_percent_new"
                                                           name="settings_bonus_percent_new" placeholder="0.90"
                                                           value=""/>

                                                    @if($errors->has('settings_bonus_percent_new'))
                                                        <span class="invalid-feedback" style="display:block;"
                                                              role="alert">
																			<strong>{{ $errors->first('settings_bonus_percent_new') }}</strong>
																		</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot">
                                        <div class="kt-form__actions mt-5">
                                            <button type="submit" class="btn btn-primary">Speichern</button>
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
