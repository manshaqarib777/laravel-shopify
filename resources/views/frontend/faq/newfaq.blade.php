@extends('frontend.layouts.auth')

@section('content')

    @section('breadcrumb')

        <style>

            footer {
                bottom: -15px !important;
            }

        </style>


        <div class="container">
            <div class="row" style="margin-top: 5%;">
                <div class="col-xxl-12">
                    <div class="breadcrumb__content text-center">
                        <h3 class="breadcrumb__title">Support</h3>
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('home') }}">Home</a></span>
                            <span class="dvdr tp-dot"><i class="fa-solid fa-period"></i></span>
                            <span>Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    <section class="faq__area pb-110 pt-60">
        <div class="container tp-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq__tab-content">
                        <div class="accordion" id="sale-accordion">
                            @if(isset($faq))
                                @foreach($faq as $key => $value)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{$key}}">
                                            <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}"
                                                    aria-expanded="true" aria-controls="collapseOne">
                                                {{$value->question}}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$key}}" class="accordion-collapse collapse"
                                             aria-labelledby="heading{{$key}}" data-bs-parent="#sale-accordion">
                                            <div class="accordion-body">

                                                <p>{{$value->answer}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
