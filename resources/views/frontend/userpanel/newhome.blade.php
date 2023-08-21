@extends('frontend.layouts.auth')

@section('content')

    <section class="edit__profile pb-120 pt-100">
        <div class="edit__profile ">
            <div class="container-fluid fix p-0">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="profile__cover-wrapper p-relative">
                            <div class="profile__cover w-img tp-img-cover">
                                @if(Auth::user()->cover != "")
                                    <img src="assets/newdesign/assets/img/creator/<?= Auth::user()->cover ?>" alt="">
                                @elseif(Auth::user()->cover == "")
                                    <img src="{{asset_dir('newdesign/assets/img/creator/creator-bg-2.jpg')}}" alt="">
                                @endif
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
                                @if(Auth::user()->photo != "")
                                    <img src="assets/newdesign/assets/img/creator/<?= Auth::user()->photo ?>" alt="">
                                @elseif(Auth::user()->photo == "")
                                    <img src="{{asset_dir('newdesign/assets/img/creator/user-1.jpg')}}" alt="">
                                @endif
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
            @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach <br>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            @if(session()->has("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get("success")}}<br>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has("error"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get("error")}}<br>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                @include('frontend.common.frontmenu')
                <div class="col-xxl-8 col-lg-8">
                    <div class="profile__tab-content tytyu">
                        <div class="tab-content" id="profile-tabContent">
                            <div class="tab-pane fade show active" id="nav-information" role="tabpanel"
                                 aria-labelledby="nav-information-tab">
                                <div class="profile__info">
                                    <h3 class="profile__info-title">{!! __('frontend/user.panel.welcome_message', [ 'name' => e($data->username) ]) !!}</h3>
                                    <div class="profile__info-content">
                                        <?php $role = Auth::user()->id; ?>
                                        <?php $data = DB::select("SELECT * FROM lv_users_orders WHERE `user_id`=$role;");
                                        $count_man = count($data);
                                        $users = DB::select("SELECT * FROM lv_users WHERE `id`=$role;");
                                        //print_R( $users);
                                        $account_create = $users[0]->created_at;
                                        //    echo formatDate($account_create,"Y/m/d ");
                                        ?>


                                        <div class="row">
                                            <div class="col-xxl-12 col-md-12">
                                                <div class="profile__input-box">
                                                    <h4>Total Order</h4>
                                                    <div class="profile__input">
                                                        <?php echo $count_man; ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-6 col-md-6">
                                                <div class="profile__input-box"
                                                ">
                                                <h4>Account Created </h4>
                                                <div class="profile__input">
                                                    {{helperdateFormat($account_create)}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-ticket" role="tabpanel"
                                     aria-labelledby="nav-ticket-tab">
                                    <div class="profile__ticket table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Ticket</th>
                                                <th scope="col">Topic</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">View</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row"> #2245</th>
                                                <td>How can i share ?</td>
                                                <td>Pending</td>
                                                <td><a href="#" class="link-btn">View <i
                                                            class="fa-light fa-arrow-right-long"></i> </a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> #2220</th>
                                                <td>Send money, but not working</td>
                                                <td>Need your replay</td>
                                                <td><a href="#" class="link-btn">View <i
                                                            class="fa-light fa-arrow-right-long"></i> </a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> #2125</th>
                                                <td>Balance error</td>
                                                <td>Resolved</td>
                                                <td><a href="#" class="link-btn">View <i
                                                            class="fa-light fa-arrow-right-long"></i> </a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> #2124</th>
                                                <td>How to decline bid</td>
                                                <td>Resolved</td>
                                                <td><a href="#" class="link-btn">View <i
                                                            class="fa-light fa-arrow-right-long"></i> </a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"> #2121</th>
                                                <td>How to contact</td>
                                                <td>Resolved</td>
                                                <td><a href="#" class="link-btn">View <i
                                                            class="fa-light fa-arrow-right-long"></i> </a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-notification" role="tabpanel"
                                     aria-labelledby="nav-notification-tab">
                                    <div class="btn-wrapper w-100">
                                        <a style="float: right;" href="{{ route('ticket-create') }}"
                                           class="tp-btn-2 active">{{ __('frontend/main.create_ticket') }}</a>
                                    </div>
                                    <div class="profile__ticket table-responsive w-100">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Ticket</th>
                                                <th scope="col">Topic</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">View</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($tickets) > 0)
                                                @foreach($tickets as $ticket)
                                                    <tr>
                                                        <th scope="row"> #{{$ticket->id}}</th>
                                                        <td>{{ ucwords($ticket->subject) }}</td>
                                                        <td>{{ ucwords($ticket->status) }}</td>
                                                        <td>
                                                            <a href="{{ route('ticket-delete', $ticket->id) }}"
                                                               class="link-btn">{{ __('frontend/user.tickets.delete') }}</a>
                                                            |
                                                            <a href="{{ route('ticket-id', $ticket->id) }}"
                                                               class="link-btn">{{ __('frontend/user.tickets.view') }}
                                                                {{-- <i class="fa-light fa-arrow-right-long"></i>  --}}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="4">No tickets found!!</td>
                                                </tr>
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="{{ url('./assets/newdesign/assets/js/custom.js') }}"></script>
@endsection
