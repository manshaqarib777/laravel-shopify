@extends('backendV2.layouts.default')

@section('content')
    @section('pageTitle', __('backend/orders.show.title', ['id' => $order->id]) )

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title fs-3 fw-bold">{{ __('backend/orders.title') }}</div>
                    <br>
                    <!--end::Card title-->


                </div>
                @foreach($notes as $note)
                    <div class="d-flex flex-stack position-relative mt-6">
                        <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                        <div class="fw-semibold ms-5">
                            <div class="fs-7 mb-1">{{ $note->getDateTime() }}
                            </div>
                            <a href="#"
                               class="fs-5 fw-bold text-dark text-hover-primary mb-2"> {{ strlen($note->note) > 0 ? decrypt($note->note) : '' }}
                            </a>
                        </div>
                    </div>
                @endforeach
                <form method="POST" action="{{ route('backend-orders-add-note-form', ['id' => $order->id]) }}"
                      id="kt_project_settings_form" class="form">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <div class="row mb-8">
                            <!--begin::Col-->
                            <div class="col-xl-3">
                                <div class="fs-6 fw-semibold mt-2 mb-3">{{ __('backend/orders.note_input') }}</div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xl-9 fv-row">
                                <textarea class="form-control @if($errors->has('order_note')) is-invalid @endif"
                                          name="order_note" id="order_note"
                                          placeholder="">{{ old('order_note') }}</textarea>
                                @if($errors->has('order_note'))
                                    <span class="invalid-feedback" style="display:block" role="alert">
                                <strong>{{ $errors->first('order_note') }}</strong>
                            </span>
                                @endif
                            </div>
                            <!--begin::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card footer-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary"
                                id="kt_project_settings_submit">{{ __('backend/orders.add_note') }}</button>
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

@endsection
