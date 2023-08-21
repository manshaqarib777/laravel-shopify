@extends('frontend.layouts.auth')

@section('content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    {{ __('frontend/shop.product_not_found') }}
                </div>
            </div>
        </div>
    </div>
@endsection
