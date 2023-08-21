@php use App\Classes\LangHelper; @endphp
@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/management.faqs.edit.title') )

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
                            <!-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg> -->
                        </span>
                            <!--end::Svg Icon-->
                            <!-- <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" /> -->
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

                            {{ App\Classes\LangHelper::getLangSelector('lang-edit-faq', $faq->id, $lang ?? null) }}


                            <div class="kt-portlet">
                                <div class="kt-portlet__head mt-5">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">{{ __('backend/management.faqs.edit.title') }}</h3>
                                    </div>
                                </div>
                                <form method="post" class="kt-form"
                                      action="{{ route('backend-management-faq-edit-form') }}">
                                    @csrf

                                    @if($lang != null)
                                        <input type="hidden" name="translation_lng" value="{{ strtolower($lang) }}"/>
                                    @endif

                                    <input type="hidden" value="{{ $faq->id }}" name="faq_edit_id"/>

                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="form-group mt-5">
                                                <label
                                                    for="faq_edit_question">{{ __('backend/management.faqs.question') }}</label>
                                                <input type="text"
                                                       class="form-control @if($errors->has('faq_edit_question')) is-invalid @endif"
                                                       id="faq_edit_question" name="faq_edit_question"
                                                       placeholder="{{ __('backend/management.faqs.question') }}"
                                                       value="{{ LangHelper::getValue($lang, 'faq', 'question', $faq->id) ?? $faq->question }}"/>

                                                @if($errors->has('faq_edit_question'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('faq_edit_question') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            @if($lang == null)
                                                <div class="form-group mt-5">
                                                    <label
                                                        for="faq_edit_category">{{ __('backend/management.faqs.category') }}</label>
                                                    <select name="faq_edit_category" id="faq_edit_category"
                                                            class="form-control @if($errors->has('faq_edit_category')) is-invalid @endif">
                                                        <option
                                                            value="0">{{ __('backend/main.please_choose') }}</option>
                                                        @foreach(App\Models\FAQCategory::all() as $faqCategory)
                                                            <option value="{{ $faqCategory->id }}"
                                                                    @if($faq->getCategory()->id == $faqCategory->id) selected @endif>{{ $faqCategory->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @if($errors->has('faq_edit_category'))
                                                        <span class="invalid-feedback" style="display:block;"
                                                              role="alert">
																		<strong>{{ $errors->first('faq_edit_category') }}</strong>
																	</span>
                                                    @endif
                                                </div>
                                            @endif

                                            <div class="form-group mt-5">
                                                <label
                                                    for="faq_edit_answer">{{ __('backend/management.faqs.answer') }}</label>
                                                <textarea
                                                    class="text-editor form-control @if($errors->has('faq_edit_answer')) is-invalid @endif"
                                                    id="faq_edit_answer" name="faq_edit_answer"
                                                    placeholder="{{ __('backend/management.faqs.answer') }}">{{ LangHelper::getValue($lang, 'faq', 'answer', $faq->id) ?? (strlen($faq->answer) > 0 ? ($faq->answer) : '') }}</textarea>

                                                @if($errors->has('faq_edit_answer'))
                                                    <span class="invalid-feedback" style="display:block" role="alert">
																		<strong>{{ $errors->first('faq_edit_answer') }}</strong>
																	</span>
                                                @endif
                                            </div>

                                            @if($lang == null)
                                                <div class="form-group mt-5">
                                                    <label for="faq_edit_ordering">Reihenfolge</label>
                                                    <input type="number"
                                                           class="form-control @if($errors->has('faq_edit_ordering')) is-invalid @endif"
                                                           id="faq_edit_ordering" name="faq_edit_ordering"
                                                           placeholder="" value="{{ $faq->ordering }}"/>

                                                    @if($errors->has('faq_edit_ordering'))
                                                        <span class="invalid-feedback" style="display:block"
                                                              role="alert">
																		<strong>{{ $errors->first('faq_edit_ordering') }}</strong>
																	</span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot mt-5">
                                        <div class="kt-form__actions mt-5">
                                            <button type="submit"
                                                    class="btn btn-primary">{{ __('backend/management.faqs.edit.submit_button') }}</button>
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
@endsection
