@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/system.payments.title') )

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
                <div class="card-body py-4">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 order-lg-1 order-xl-1">
                            <div class="kt-portlet">
                                <form method="post" class="kt-form"
                                      action="{{ route('backend-system-payments-submit') }}">
                                    @csrf
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="form-group mt-5">
                                                <div style="font-size: 24px; font-weight:bold;">Available
                                                    Balance: {{$balance * $conversion_rate ?? "0.00"}} USD
                                                </div>
                                            </div>
                                            <div class="form-group mt-5">
                                                <label
                                                    for="destination_address">{{ __('backend/system.payments.destination_address') }}</label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('destination_address')) is-invalid @endif"
                                                       id="destination_address" name="destination_address"
                                                       placeholder="abcdefghijklmnopqrstuvwxyz01234567890abcde"
                                                       value=""/>

                                                @if($errors->has('destination_address'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('destination_address') }}</strong>
																	</span>
                                                @endif
                                            </div>
                                            <div class="form-group mt-5">
                                                <label for="amount">{{ __('backend/system.payments.amount') }}</label>
                                                <div class="input-group">
                                                    <input type="number"
                                                           step="0.01"
                                                           min="{{$minimum}}"
                                                           max="{{ $balance * $conversion_rate - $fee_rate * $conversion_rate * 0.00000001 }}"
                                                           class="form-control @if($errors->has('amount')) is-invalid @endif"
                                                           id="amount"
                                                           name="amount"
                                                           placeholder="0.04"
                                                           @if(($balance * $conversion_rate) < $minimum)
                                                               disabled
                                                           title="Minimum amount is 50 USD/EUR"
                                                           @endif
                                                           value="{{$minimum}}"/>
                                                    <span class="input-group-text form-control"
                                                          style="max-width: 150px;">{{$currency ?? "USD"}}</span>

                                                </div>

                                                @if($errors->has('amount'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('amount') }}</strong>
																	</span>
                                                @endif
                                            </div>
                                            <div class="form-group mt-5">
                                                <label
                                                    for="fee">{{ __('backend/system.payments.fee') }}</label>
                                                <div class="input-group">
                                                    <input type="number"
                                                           step="0.000000001"
                                                           min="0.000000500"
                                                           name="feerate"
                                                           id="feerate"
                                                           class="form-control @if($errors->has('fee')) is-invalid @endif"
                                                           value="{{round($conversion_rate * ($fee_rate/100_000_000),8)}}"/>
                                                    <span class="input-group-text form-control"
                                                          style="max-width: 150px;">{{$currency ?? "USD"}}</span>
                                                </div>
                                            </div>
                                            {{--                                            <div class="form-group mt-5">--}}
                                            {{--                                                <label--}}
                                            {{--                                                    for="total">{{ __('backend/system.payments.total') }}</label>--}}
                                            {{--                                                <div class="input-group">--}}
                                            {{--                                                    <input type="number"--}}
                                            {{--                                                           step="1"--}}
                                            {{--                                                           class="form-control @if($errors->has('total')) is-invalid @endif"--}}
                                            {{--                                                           min="{{$fee_rate * $conversion_rate * 0.00000001 + $minimum }}"--}}
                                            {{--                                                           max="{{ $balance * $conversion_rate }}"--}}
                                            {{--                                                    />--}}
                                            {{--                                                    <span class="input-group-text form-control"--}}
                                            {{--                                                          style="max-width: 150px;">{{$currency ?? "USD"}}</span>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot mt-5">
                                        <div class="kt-form__actions">
                                            <button type="submit"
                                                    class="btn btn-primary">{{ __('backend/system.payments.request_transfer') }}</button>
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
