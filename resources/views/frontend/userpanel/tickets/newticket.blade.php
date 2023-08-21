@extends('frontend.layouts.auth')

@section('content')
<style>
   /* .admin {
      width: 50%;
      margin-right: auto;
   }
   .user {
      width: 50%;
      margin-left: auto;
   }
   .user .blog__grid-author {
      justify-content: flex-end;
   }
   .user .postbox__quote::after {
      right: -4px;
      left: unset !important;
   }
   .user .postbox__quote p{text-align: right;} */
</style>
<section class="blog__area pt-10 pb-100">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12 col-xl-12 col-lg-12">
             <div class="blog__wrapper">
                <article class="postbox__item format-image mb-40 transition-3">
                   <div class="blog__grid-tag">
                      <a href="javascript:void(0);">{{ __('frontend/user.tickets.ticket_details') }} </a>
                   </div>
                   <h3 class="postbox__title">
                      <a href="javascript:void(0);">{{ ucwords($ticket->subject) }}</a>
                   </h3>

                     @if($ticket->user->name == 'admin')
                        <div class="admin">
                     @else
                        <div class="user">
                     @endif
                     <div class="blog__grid-author d-flex align-items-center mb-40">
                        <div class="blog__grid-author-thumb mr-10">

                           <a href="#">
                              <!-- <img src="{{asset_dir('newdesign/assets/img/blog/author/blog-author-1.jpg')}}" alt=""> -->
                           @if($shopLogo->value != "")
                              <img src="{{asset_dir('newdesign/assets/img/creator/'.$shopLogo->value)}}" alt="">
                           @else
                              <img src="{{asset_dir('newdesign/assets/img/user/user123.jpg')}}" alt="">
                           @endif
                           </a>
                        </div>
                        <div class="blog__grid-author-info">
                           <h4><a href="#">{{ $ticket->user->name }}</a></h4>
                           <p>{{ $ticket->created_at->format('F d, Y') . " • " . $ticket->created_at->diffForHumans() }}</p>
                        </div>
                     </div>
                     <div class="postbox__content">
                        <div class="postbox__quote">
                           <blockquote>
                              <p>{!! nl2br(strlen($ticket->content) > 0 ? e(decrypt($ticket->content)) : '') !!}</p>
                           </blockquote>
                        </div>
                     </div>
                   </div>

                  @if(count($ticketReplies) > 0)
                     @foreach($ticketReplies as $ticketReply)
                     @if($ticketReply->user->name == 'admin')
                        <div class="admin">
                     @else
                        <div class="user">
                     @endif
                     {{-- <div class="{{ $ticketReply->user->name }}"> --}}
                        <div class="blog__grid-author d-flex align-items-center mb-40">
                           <div class="blog__grid-author-thumb mr-10">
                              <a href="#">
                                 <!-- <img src="{{asset_dir('newdesign/assets/img/blog/author/blog-author-1.jpg')}}" alt=""> -->
                                 @if($shopLogo->value != "")
                                    <img src="{{asset_dir('newdesign/assets/img/creator/'.$shopLogo->value)}}" alt="">
                                 @else
                                    <img src="{{asset_dir('newdesign/assets/img/user/user123.jpg')}}" alt="">
                                 @endif
                              </a>
                           </div>
                           <div class="blog__grid-author-info">
                              <h4><a href="#">{{ $ticketReply->user->name }}</a></h4>
                              <p>{{ $ticketReply->created_at->format('F d, Y') . " • " . $ticketReply->created_at->diffForHumans() }}</p>
                           </div>
                        </div>
                        <div class="postbox__content">
                           <div class="postbox__quote">
                              <blockquote>
                                 <p>{!! nl2br(strlen($ticketReply->content) > 0 ? e(decrypt($ticketReply->content)) : '') !!}</p>
                              </blockquote>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  @endif

                   {{-- <div class="postbox__thumb m-img mb-30">
                      <a href="blog-details.html">
                         <img src="{{asset_dir('newdesign/assets/img/user/user123.jpg')}}" alt="">
                      </a>
                   </div> --}}

                </article>

                {{-- @if(count($ticketReplies) > 0)
                <div class="postbox__comment mb-75">
                   <h3 class="postbox__comment-title">Comments ({{count($ticketReplies)}})</h3>
                   <ul>
                   	@foreach($ticketReplies as $ticketReply)
                      <li>
                         <div class="postbox__comment-box">
                            <div class="postbox__comment-info d-flex">
                                  <div class="postbox__comment-avater mr-20">
                                     <img src="{{asset_dir('newdesign/assets/img/blog/comments/comment-1.jpg')}}" alt="">
                                  </div>
                                  <div class="postbox__comment-name">
                                     <h5>{{ $ticketReply->user->name }}</h5>
                                      <span class="post-meta">{{ $ticketReply->created_at->format('F d, Y') . " • " . $ticketReply->created_at->diffForHumans() }}</spam>
                                     <span class="post-meta">October 16, 2022 • 1 min read</span>--}}
                                  {{--</div>
                            </div>
                            <div class="postbox__comment-text ml-65">
                               <p>{!! nl2br(strlen($ticketReply->content) > 0 ? e(decrypt($ticketReply->content)) : '') !!}</p>
                            </div>
                         </div>
                      </li>
                      @endforeach
                   </ul>
                </div>
                @endif --}}

                @if(!$ticket->isClosed())
                <div class="postbox__comment-form postbox__comment-form-create-ticket">
                   <h3 class="postbox__comment-form-title">{{ __('frontend/user.tickets.reply_title') }}</h3>
                   <form method="POST" action="{{ route('ticket-reply', $ticket->id) }}">
					@csrf
                      <div class="row">
                         <div class="col-xxl-12">
                            <div class="postbox__comment-input-box">
                               <h4>{{ __('frontend/user.tickets.message') }}</h4>
                               <div class="postbox__comment-input">
                                   <div class="inputField">
                                        <textarea class="{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" required id="message" rows="3">{{ old('message') }}</textarea>
                                   </div>
                                   @if ($errors->has('message'))
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                   @endif
                               </div>
                            </div>
                         </div>
                         <div class="col-xxl-12 col-xl-12 col-lg-12">
                            <!-- <div class="postbox__comment-input-box">
                                <h4>{{ __('frontend/main.captcha') }} <span>*</span></h4>
                                <div class="postbox__comment-input">
	                               	<div class="captcha-img mb-20">
										{!! captcha_img('math') !!}
									</div>
	                                <input type="text" class="{{ $errors->has('captcha') ? ' is-invalid' : '' }}" name="captcha" id="captcha" required />

									@if ($errors->has('captcha'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $errors->first('captcha') }}</strong>
	                                    </span>
	                                @endif
                                </div>
                            </div> -->
                             <div class="login__input-box">
                           <div class="login__input-title d-flex align-items-center justify-content-between">
                               <h4>{{ __('Captcha') }} <span>*</span></h4>
                             </div>
                             <div class="login__input" >
                                <div class="h-captcha {{ $errors->has('h-captcha-response') ? ' is-invalid' : '' }}"  data-sitekey="f7ef0f8b-db29-4cb1-9f44-57787e26d3e0"></div>
                                 @if ($errors->has('h-captcha-response'))
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('frontend/user.login.error_message') }}</strong>
                                    </span>
                                 @endif
                             </div>

                          </div>

                         </div>

                         <div class="col-xxl-12">
                            <div class="postbox__comment-btn buttonForm">
                               <button type="submit" class="tp-btn-4 w-100 fixWidthButton">{{ __('frontend/user.tickets.reply_button') }}</button>
                            </div>
                         </div>
                      </div>
                   </form>
                </div>
                @endif

             </div>
          </div>

       </div>
    </div>
 </section>
@endsection

<script src="https://js.hcaptcha.com/1/api.js" async defer></script>
