@extends('frontend.layouts.auth')

@section('content')
    <style>
        .submitBtn {
            border: 2px solid #3771fe;
            padding: 6px 39px 6px 40px;
            border-radius: 0.25rem;
        }

        .submitBtn:hover {
            background: transparent;
            border: 2px solid #3771fe;
        }

        footer {
            bottom: -15px !important;
        }

        .settings_container {
            margin-top: 80px;
        }
    </style>
    <section class="blog__area pb-100 pt-0">
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
        <div class="container settings_container">
            <div class="row">
                @include('frontend.common.frontmenu')
                <div class="col-xxl-8 col-lg-8">
                    <div class="blog__wrapper" style="padding-top: 0px;">
                        <article class="postbox__item format-image mb-40 transition-3">
                            <div class="blog__grid-tag">
                                <a href="javascript:void(0);">{{ __('frontend/user.settings') }}</a>
                            </div>
                        </article>


                        <div class="postbox__comment-form">
                            <h3 class="postbox__comment-form-title">{{ __('Change avatar') }}</h3>
                            <form method="POST" action="{{ route('settings-avatar-change') }}" enctype="multipart/form-data">
                                @csrf

                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="row mb-3">
                                    <label for="avatar" class="col-form-label">{{ __('Avatar') }}</label>

                                    <div class="col-md-12">
                                        <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">

                                        @if(Auth::user()->photo)
                                            <img src="/avatars/{{ Auth::user()->photo }}" style="width:80px;margin-top: 10px; "alt="">
                                        @else
                                            <img src="{{asset_dir('newdesign/assets/img/user/user123.jpg')}}" style="width:80px;margin-top: 10px;" alt="">
                                        @endif

                                        @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary submitBtn">
                                            {{ __('frontend/user.settings_save_submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="postbox__comment-form">
                            <h3 class="postbox__comment-form-title">{{ __('frontend/user.settings_change_password') }}</h3>
                            <form method="post" action="{{ route('settings-password-change') }}">
                                @csrf

                                <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="postbox__comment-input-box">
                                        <h4>{{ __('frontend/user.settings_current_password') }} <span>*</span></h4>
                                        <div class="postbox__comment-input">
                                            <input id="settings_current_password" type="password"
                                                   class="{{ $errors->has('settings_current_password') ? ' is-invalid' : '' }}"
                                                   name="settings_current_password"
                                                   value="{{ old('settings_current_password') }}" required>

                                            @if ($errors->has('settings_current_password'))
                                                <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('settings_current_password') }}</strong>
		                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="postbox__comment-input-box">
                                        <h4>{{ __('frontend/user.settings_new_password') }} <span>*</span></h4>
                                        <div class="postbox__comment-input">
                                            <input id="settings_new_password" type="password"
                                                   class="{{ $errors->has('settings_new_password') ? ' is-invalid' : '' }}"
                                                   name="settings_new_password"
                                                   value="{{ old('settings_new_password') }}" required>

                                            @if ($errors->has('settings_new_password'))
                                                <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('settings_new_password') }}</strong>
		                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-xl-12 col-lg-12">
                                    <div class="postbox__comment-input-box">
                                        <h4>{{ __('frontend/user.settings_new_password_confirm') }} <span>*</span></h4>
                                        <div class="postbox__comment-input">
                                            <input id="settings_new_password_confirm" type="password"
                                                   class="{{ $errors->has('settings_new_password_confirm') ? ' is-invalid' : '' }}"
                                                   name="settings_new_password_confirm"
                                                   value="{{ old('settings_new_password_confirm') }}" required>

                                            @if ($errors->has('settings_new_password_confirm'))
                                                <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $errors->first('settings_new_password_confirm') }}</strong>
		                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary submitBtn">
                                            {{ __('frontend/user.settings_save_submit') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ url('./assets/newdesign/assets/js/custom.js') }}"></script>
@endsection
