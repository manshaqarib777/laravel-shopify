@extends('frontend.layouts.auth')

@section('content')
    <style>
        .create_ticketss:hover {
            background-color: transparent !important;
        }
        .blog__grid-tag .tp-btn-2 {
            font-size: 13px;
            color: var(--tp-theme-1);
            padding: 8px 15px;
            min-width: auto;
        }
        .blog__grid-tag .create_ticketss::after {
            width: 0rem !important;
        }
        .blog__grid-tag .tp-btn-2.none {
            font-size: 12px !important;
            padding: 0px 0px !important;
            border: 0px !important;
            background: transparent !important;
        }
        .blog__grid-tag a {
            /* padding-right: 10px; */
        }
        .blog__grid-tag a::after {
            width: 0.1rem !important;
        }
        .blog__grid-tag {
        display: flex;
        align-content: center;
        align-items: center;
        justify-content: space-between;
        }
        .tp-btn-2.bton:hover{
            color: white !important;
        }
    </style>
    <section class="blog__area pb-100 pt-100">
        <div class="edit__profile ">
            <div class="container-fluid fix p-0">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="profile__cover-wrapper p-relative">
                            <div class="profile__cover w-img tp-img-cover">
                                {{--  @if(Auth::user()->cover != "")
                                    <img src="/assets/newdesign/assets/img/creator/<?= Auth::user()->cover ?>" alt="">
                                @elseif(Auth::user()->cover == "")
                                    <img src="{{asset_dir('newdesign/assets/img/creator/creator-bg-2.jpg')}}" alt="">
                                @endif  --}}
                                <img src="{{asset_dir('newdesign/assets/img/user/user123.jpg')}}" alt="">

                            </div>
                            <div class="profile__cover-edit">
                                <form action="{{ url('update/cover-photo') }}" method="post" id="formCoverData"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input id="profile-cover-input" class="cover-img-popup" type="file"
                                           name="coverFile">
                                </form>

                                <label for="profile-cover-input"><i class="fa-regular fa-pen-to-square"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="profile__thumb-wrapper  text-center">
                            <div class="profile__thumb text-center tp-img-profile d-inline-block p-relative">
                                {{--  @if(Auth::user()->photo != "")
                                    <img src="/assets/newdesign/assets/img/creator/<?= Auth::user()->photo ?>" alt="">
                                @elseif(Auth::user()->photo == "")
                                    <img src="{{asset_dir('newdesign/assets/img/creator/user-1.jpg')}}" alt="">
                                @endif  --}}
                                <img src="{{asset_dir('newdesign/assets/img/user/user123.jpg')}}" alt="">

                                <div class="profile__thumb-edit">
                                    <form action="{{ url('update/photo') }}" method="post" id="formData"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input id="profile-thumb-input" class="profile-img-popup photo-file"
                                               name="photoFile" type="file">
                                    </form>

                                    <label for="profile-thumb-input"><i class="fa-regular fa-camera"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                @include('frontend.common.frontmenu')
                <div class="col-xxl-8 col-lg-8">
                    <div class="profile__tab-content">

                        <div class="tab-content" id="profile-tabContent">
                            <article class="postbox__item format-image mb-40 transition-3">
                                <div class="blog__grid-tag">
                                    <a href="javascript:void(0);"><span class="tp-btn-2 none">{{ __('frontend/user.tickets.list_tickets') }}</span></a>
                                    <a href="/ticket/create" class="create_ticketss"><span class="tp-btn-2 bton">Create Ticket</span></a>
                                </div>
                            </article>

                            <div class="tab-pane fade active show" role="tabpanel"
                                 aria-labelledby="nav-ticket-tab">
                                <div class="profile__ticket table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">{{ __('frontend/user.tickets.id') }}</th>
                                            <th scope="col">{{ __('frontend/user.tickets.subject') }}</th>
                                            <th scope="col">{{ __('frontend/user.tickets.category') }}</th>
                                            <th scope="col">{{ __('frontend/user.tickets.status') }}</th>
                                            <th scope="col">{{ __('frontend/user.tickets.date') }}</th>
                                            <th scope="col">{{ __('frontend/user.tickets.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($user_tickets) > 0)
                                            @foreach($user_tickets as $ticket)
                                                <tr>
                                                    <th scope="row">#{{ $ticket->id }}</th>
                                                    <td>
                                                        <a href="{{ route('ticket-id', $ticket->id) }}">{{ substr($ticket->subject, 0, 255) }}</a>
                                                    </td>
                                                    <td>{{ $ticket->getCategory()->name }}</td>
                                                    <td>
                                                        @if($ticket->isClosed())
                                                            {{ __('frontend/user.tickets.status_data.closed') }}
                                                        @else
                                                            @if(!$ticket->isReplied())
                                                                {{ __('frontend/user.tickets.status_data.open') }}
                                                            @else
                                                                {{ __('frontend/user.tickets.status_data.replied') }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{helperdateFormat($ticket->getDate())}}

                                                        {{-- {{ $ticket->getDate() }} --}}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('ticket-id', $ticket->id) }}">{{ __('frontend/user.tickets.view') }}</a>
                                                        <span class="span-divider">|</span>
                                                        <a href="{{ route('ticket-delete', $ticket->id) }}">{{ __('frontend/user.tickets.delete') }}</a>
                                                        {{-- <a href="#" class="link-btn">View
                                                            <i class="fa-light fa-arrow-right-long"></i>
                                                        </a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6">{{ __('frontend/user.tickets.no_tickets_exists') }}</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                {!! preg_replace('/' . $user_tickets->currentPage() . '\?page=/', '', $user_tickets->links()) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ url('./assets/newdesign/assets/js/custom.js') }}"></script>
@endsection
