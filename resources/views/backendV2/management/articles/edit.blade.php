@php use App\Classes\LangHelper; @endphp
@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/management.articles.edit.title') )

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
                            {{ App\Classes\LangHelper::getLangSelector('lang-edit-article', $article->id, $lang ?? null) }}
                            <div class="kt-portlet">
                                <div class="kt-portlet__head mt-5">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">{{ __('backend/management.articles.edit.title') }}</h3>
                                    </div>
                                </div>
                                <form method="post" class="kt-form"
                                      action="{{ route('backend-management-article-edit-form') }}">
                                    @csrf

                                    @if($lang != null)
                                        <input type="hidden" name="translation_lng" value="{{ strtolower($lang) }}"/>
                                    @endif

                                    <input type="hidden" value="{{ $article->id }}" name="article_edit_id"/>

                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="form-group mt-5">
                                                <label
                                                    for="article_edit_title">{{ __('backend/management.articles.article_title') }}</label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('article_edit_title')) is-invalid @endif"
                                                       id="article_edit_title" name="article_edit_title"
                                                       placeholder="{{ __('backend/management.articles.article_title') }}"
                                                       value="{{ LangHelper::getValue($lang, 'article', 'title', $article->id) ?? $article->title }}"/>

                                                @if($errors->has('article_edit_title'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('article_edit_title') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            <div class="form-group mt-5">
                                                <label
                                                    for="article_edit_content">{{ __('backend/management.articles.content') }}</label>
                                                <textarea
                                                    class="text-editor form-control @if($errors->has('article_edit_content')) is-invalid @endif"
                                                    id="article_edit_content" name="article_edit_content"
                                                    placeholder="{{ __('backend/management.articles.content') }}">{{ LangHelper::getValue($lang, 'article', 'content', $article->id) ?? (strlen($article->body) > 0 ? decrypt($article->body) : '') }}</textarea>

                                                @if($errors->has('article_edit_content'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('article_edit_content') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            @if($lang == null)
                                                <div class="form-group mt-5" style="margin-bottom: 5px;">
                                                    <b>{{ __('backend/management.articles.edit.options') }}</b>
                                                </div>

                                                <div
                                                    class="form-check form-check-custom form-check-solid form-check-sm mt-5">
                                                    <input class="form-check-input" type="checkbox"
                                                           name="article_edit_anonym"
                                                           @if($article->user_id == 0) checked @endif />
                                                    <label class="form-check-label" for="product_add_stock_management1">
                                                        {{ __('backend/management.articles.edit.anonym') }}
                                                    </label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot mt-5">
                                        <div class="kt-form__actions">
                                            <button type="submit"
                                                    class="btn btn-primary">{{ __('backend/management.articles.edit.submit_button') }}</button>
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

@section('page_scripts')
    <script type="text/javascript">
        $(function () {
            $('textarea.text-editor').froalaEditor({
                toolbarSticky: false,
                language: 'de',
                theme: 'gray',
                toolbarButtons: ['undo', 'redo', '|', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', '|', 'align', '|', 'fontFamily', 'fontSize', 'color', '|', 'emoticons', '|', 'insertLink', 'insertImage', '|', 'outdent', 'indent', 'clearFormatting', 'insertTable', 'html']
            });
        });
    </script>
    <style>
        .form-check-custom .form-check-input {
            margin-right: 5px;
        }
    </style>
@endsection
