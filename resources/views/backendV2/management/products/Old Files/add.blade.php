@extends('backendV2.layouts.default')
@section('pageTitle', __('backend/management.products.title') )

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
                        <div class="kt-portlet">
                            <div class="kt-portlet__head mt-5">
                                <div class="kt-portlet__head-label">
                                    <h3 class="kt-portlet__head-title">{{ __('backend/management.products.add.title') }}
                                    </h3>
                                </div>
                            </div>
                            <form method="POST" class="kt-form"
                                action="{{ route('backend-management-product-add-form') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first mt-5">
                                        <div class="form-group mt-5">
                                            <label
                                                for="product_add_name">{{ __('backend/management.products.name') }}</label>
                                            <input type="text"
                                                class="form-control @if($errors->has('product_add_name')) is-invalid @endif"
                                                id="product_add_name" name="product_add_name"
                                                placeholder="{{ __('backend/management.products.name') }}"
                                                value="{{ old('product_add_name') }}" />

                                            @if($errors->has('product_add_name'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                                <strong>{{ $errors->first('product_add_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-5">
                                            <label
                                                for="product_add_short_description">{{ __('backend/management.products.short_description') }}</label>
                                            <input type="text"
                                                class="form-control @if($errors->has('product_add_short_description')) is-invalid @endif"
                                                id="product_add_short_description" name="product_add_short_description"
                                                placeholder="{{ __('backend/management.products.short_description') }}"
                                                value="{{ old('product_add_short_description') }}" />

                                            @if($errors->has('product_add_short_description'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                                <strong>{{ $errors->first('product_add_short_description') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-5">
                                            <label
                                                for="product_add_category_id">{{ __('backend/management.products.category') }}</label>
                                            <select name="product_add_category_id" id="product_add_category_id"
                                                class="form-control @if($errors->has('product_add_category_id')) is-invalid @endif">
                                                <option value="0">{{ __('backend/main.please_choose') }}</option>
                                                @foreach(App\Models\ProductCategory::all() as $productCategory)
                                                <option value="{{ $productCategory->id }}"
                                                    @if(old('product_add_category_id')==$productCategory->id) selected
                                                    @endif>{{ $productCategory->name }}</option>
                                                @endforeach
                                            </select>

                                            @if($errors->has('product_add_category_id'))
                                            <span class="invalid-feedback" style="display:block;" role="alert">
                                                <strong>{{ $errors->first('product_add_category_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-5">
                                            <label
                                                for="product_add_description">{{ __('backend/management.products.description') }}</label>
                                            <textarea
                                                class="text-editor form-control @if($errors->has('product_add_description')) is-invalid @endif"
                                                id="product_add_description" name="product_add_description"
                                                placeholder="{{ __('backend/management.products.description') }}">{{ old('product_add_description') }}</textarea>

                                            @if($errors->has('product_add_description'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                                <strong>{{ $errors->first('product_add_description') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group mt-5">
                                            <label
                                                for="product_add_images">{{ __('backend/management.products.images') }}</label>
                                            <input type="file" id="product_add_images" name="product_add_images"
                                                class="form-control @if($errors->has('product_add_images')) is-invalid @endif" />

                                            @if($errors->has('product_add_images'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                                <strong>{{ $errors->first('product_add_images') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group mt-5">
                                            <label
                                                for="product_add_price_in_cent">{{ __('backend/management.products.price_in_cent') }}</label>
                                            <input type="text" step="0.01"
                                                class="form-control @if($errors->has('product_add_price_in_cent')) is-invalid @endif"
                                                id="product_add_price_in_cent" name="product_add_price_in_cent"
                                                value="{{ old('product_add_price_in_cent') }}" />

                                            @if($errors->has('product_add_price_in_cent'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                                <strong>{{ $errors->first('product_add_price_in_cent') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-5">
                                            <label
                                                for="product_add_old_price_in_cent">{{ __('backend/management.products.old_price_in_cent') }}</label>
                                            <input type="text" step="0.01"
                                                class="form-control @if($errors->has('product_add_old_price_in_cent')) is-invalid @endif"
                                                id="product_add_old_price_in_cent" name="product_add_old_price_in_cent"
                                                value="{{ old('product_add_old_price_in_cent') }}" />

                                            @if($errors->has('product_add_old_price_in_cent'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                                <strong>{{ $errors->first('product_add_old_price_in_cent') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        {{-- <div class="form-group mt-5">
                                                <label class="k-checkbox k-checkbox--all k-checkbox--solid">
                                                    <input type="checkbox" name="product_add_drop_needed" checked value="1" data-content-visible="false" data-weight-visible="false" />
                                                    <span></span>
                                                    {{ __('backend/management.products.add.drop_needed') }}
                                        </label>
                                    </div> --}}

                                    <div style="margin-bottom: 5px;">
                                        <b>{{ __('backend/management.products.add.options') }}</b>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid form-check-sm mt-5">
                                        <input class="form-check-input" type="radio" name="product_add_stock_management"
                                            id="product_add_stock_management1" checked value="normal"
                                            data-content-visible="false" data-weight-visible="false" />
                                        <label class="form-check-label" for="product_add_stock_management1">
                                            {{ __('backend/management.products.add.normal_stock_management') }}
                                        </label>
                                    </div>

                                    {{-- <div class="form-group">
                                                <label class="k-radio k-radio--all k-radio--solid">
                                                    <input type="radio" name="product_add_stock_management" value="weight" data-content-visible="true" data-weight-visible="true" />
                                                    <span></span>
                                                    {{ __('backend/management.products.add.as_weight') }}
                                    </label>
                                </div> --}}

                                <div class="form-check form-check-custom form-check-solid form-check-sm mt-5">
                                    <input type="radio" class="form-check-input" name="product_add_stock_management"
                                        id="product_add_stock_management" value="unlimited" data-content-visible="true"
                                        data-weight-visible="false" />
                                    <label class="form-check-label" for="product_add_stock_management">
                                        {{ __('backend/management.products.add.unlimited_available') }}
                                    </label>
                                </div>

                                <div class="product_add_weight_div form-group mt-5" style="display: none;">
                                    <label
                                        for="product_add_weightchar">{{ __('backend/management.products.weightchar') }}</label>
                                    <input type="text"
                                        class="form-control @if($errors->has('product_add_weightchar')) is-invalid @endif"
                                        id="product_add_weightchar" name="product_add_weightchar"
                                        placeholder="{{ __('backend/management.products.weightchar') }}"
                                        value="{{ old('product_add_weightchar') }}" />

                                    @if($errors->has('product_add_weightchar'))
                                    <span class="invalid-feedback" style="display:block" role="alert">
                                        <strong>{{ $errors->first('product_add_weightchar') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="product_add_weight_div form-group mt-5" style="display: none;">
                                    <label
                                        for="product_add_weight">{{ __('backend/management.products.weight') }}</label>
                                    <input type="number"
                                        class="form-control @if($errors->has('product_add_weight')) is-invalid @endif"
                                        id="product_add_weight" name="product_add_weight"
                                        placeholder="{{ __('backend/management.products.weight') }}"
                                        value="{{ old('product_add_weight') }}" />

                                    @if($errors->has('product_add_weight'))
                                    <span class="invalid-feedback" style="display:block" role="alert">
                                        <strong>{{ $errors->first('product_add_weight') }}</strong>
                                    </span>
                                    @endif

                                    <div class="form-group mt-5" style="margin-top:20px">
                                        <label for="product_add_interval">Interval (nur für Produkte mit
                                            Gewichtangabe)</label>
                                        <input type="number"
                                            class="form-control @if($errors->has('product_add_interval')) is-invalid @endif"
                                            id="product_add_interval" name="product_add_interval" placeholder=""
                                            value="{{ old('product_add_interval') ?? '1' }}" />

                                        @if($errors->has('product_add_interval'))
                                        <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('product_add_interval') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="product_add_content_div form-group mt-5" style="display: none;">
                                    <label
                                        for="product_add_content">{{ __('backend/management.products.content') }}</label>
                                    <textarea
                                        class="text-editor form-control @if($errors->has('product_add_content')) is-invalid @endif"
                                        id="product_add_content" name="product_add_content"
                                        placeholder="{{ __('backend/management.products.content') }}">{{ old('product_add_content') }}</textarea>

                                    @if($errors->has('product_add_content'))
                                    <span class="invalid-feedback" style="display:block" role="alert">
                                        <strong>{{ $errors->first('product_add_content') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                {{-- <div class="form-group">
                                                <label for="product_add_thumbnail_image">{{ __('backend/product.thumbnail') }}</label>
                                <input type="file" name="product_add_thumbnail_image" id="product_add_thumbnail_image"
                                    accept="image/*">
                        </div> --}}
                    </div>
                </div>
                <div class="kt-portlet__foot mt-5">
                    <div class="kt-form__actions mt-5">
                        <button type="submit"
                            class="btn btn-primary">{{ __('backend/management.products.add.submit_button') }}</button>
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
<script>
    let product_stock_management = document.querySelectorAll("[name = 'product_add_stock_management']")
        for (let i = 0; i < product_stock_management.length; i++) {
            if (product_stock_management[i]) {
                product_stock_management[i].addEventListener("change", function () {
                    checkProductStock(product_stock_management[i])
                });
            }
        }

        function checkProductStock(item) {
            let product_content_div = document.querySelector('.product_add_content_div')
            let display = item.checked && item.value === 'unlimited' ? 'block' : 'none';
            product_content_div.style.display = display;
        }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl/1.2.5/Intl.min.js"
    integrity="sha512-/ArHcCxOUEzVJqTclr4BXgOh822PkcTim88bqb4EBKnn71lsbIjdZzRJb2+/zI0EWrcOTYnDCBrN2/5luFwf5A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
            currencyvalue = '{{$currentprice}}';
            if(currencyvalue == 'euro'){
                var load = $('#product_add_price_in_cent').val();
                var changed = load.replace(/\./g, ',');
                $('#product_add_price_in_cent').val(changed);
    
                $('#product_add_price_in_cent').on('change', function(e){
                    //alert(.val());
                    if(e.keyCode == 8){
                        return
                    }
                    var n = $(this).val().replace(/\,/g, '').replace(/\./g, '');
                    // alert(n);
                    if(n.match(/^\d+$/)){
                        var val = $(this).val().toString();
                        var val1 = val.replace('€', '');
                        var val2 = val1.replace(/\./g, '');
                        var val3 = val2.replace(',', '.')
                        var price = val3.replace(/\s/g, "");
    
                        let USDollar = new Intl.NumberFormat('it-IT', {
                        style: 'currency',
                        currency: 'EUR',
                        });
    
                        //console.log(`The formated version of ${price} is ${USDollar.format(price)}`);
                        var price2 = USDollar.format(price).toString().replace('€', '').replace(/\s/g, "");
    
                        $(this).val(price2);
                    $(this).removeClass('error')
                        $('button[type="submit"]').removeClass('submitstop');
                        }else{
                        $(this).addClass('error')
                        $('button[type="submit"]').addClass('submitstop');
                        }
    
                    
                });
    
    
                var load2 = $('#product_add_old_price_in_cent').val();
                var changed2 = load2.replace(/\./g, ',');
                $('#product_add_old_price_in_cent').val(changed2);
                
                $('#product_add_old_price_in_cent').on('change', function(e){
                //alert(.val());
                if(e.keyCode == 8){
                return
                }
                var n = $(this).val().replace(/\,/g, '').replace(/\./g, '');
                // alert(n);
                if(n.match(/^\d+$/)){
                
                var val = $(this).val().toString();
                var val1 = val.replace('€', '');
                var val2 = val1.replace(/\./g, '');
                var val3 = val2.replace(',', '.')
                var price = val3.replace(/\s/g, "");
                
                let USDollar = new Intl.NumberFormat('it-IT', {
                style: 'currency',
                currency: 'EUR',
                });
                
                //console.log(`The formated version of ${price} is ${USDollar.format(price)}`);
                var price2 = USDollar.format(price).toString().replace('€', '').replace(/\s/g, "");
                
                $(this).val(price2);
                $(this).removeClass('error')
                    $('button[type="submit"]').removeClass('submitstop');
                    }else{
                    $(this).addClass('error')
                    $('button[type="submit"]').addClass('submitstop');
                    }
                
                
                });
            }else{
    
                var load = $('#product_add_price_in_cent').val();
                var changed = load.replace(/\,/g, '.');
                $('#product_add_price_in_cent').val(changed);
                
                $('#product_add_price_in_cent').on('change', function(e){
                    //alert(.val());
                    if(e.keyCode == 8){
                    return
                    }
                    var n = $(this).val().replace(/\,/g, '').replace(/\./g, '');
                    // alert(n);
                    if(n.match(/^\d+$/)){
                    
                        var val = $(this).val().toString();
                        var val1 = val.replace('$', '');
                        var val2 = val1.replace(/\,/g, '');
                        var price = val2.replace(/\s/g, "");
                        // alert(price);
                        let USDollar = new Intl.NumberFormat('en-US', {
                        style: 'currency',
                        currency: 'USD',
                        });
                        
                        console.log(`The formated version of ${price} is ${USDollar.format(price)}`);
                        var price2 = USDollar.format(price).toString().replace('$', '').replace(/\s/g, "");
                        
                        $(this).val(price2);
                        $(this).removeClass('error')
                        $('button[type="submit"]').removeClass('submitstop');
                        }else{
                        $(this).addClass('error')
                        $('button[type="submit"]').addClass('submitstop');
                        }
                });
    
    
                var load2 = $('#product_add_old_price_in_cent').val();
                var changed2 = load2.replace(/\,/g, '.');
                $('#product_add_old_price_in_cent').val(changed2);
                
                $('#product_add_old_price_in_cent').on('change', function(e){
                //alert(.val());
                if(e.keyCode == 8){
                return
                }
                var n = $(this).val().replace(/\,/g, '').replace(/\./g, '');
                // alert(n);
                if(n.match(/^\d+$/)){
                
                var val = $(this).val().toString();
                var val1 = val.replace('$', '');
                var val2 = val1.replace(/\,/g, '');
                var price = val2.replace(/\s/g, "");
                // alert(price);
                let USDollar = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
                });
                
                console.log(`The formated version of ${price} is ${USDollar.format(price)}`);
                var price2 = USDollar.format(price).toString().replace('$', '').replace(/\s/g, "");
                
                $(this).val(price2);
                    $(this).removeClass('error')
                    $('button[type="submit"]').removeClass('submitstop');
                }else{
                    $(this).addClass('error')
                    $('button[type="submit"]').addClass('submitstop');
                }
                });
    
            }
            $('body #product_add_price_in_cent').val('0');
            $('body #product_add_price_in_cent').trigger('change');
            // $('body #product_add_old_price_in_cent').trigger('change');
        });
</script>


<style>
    .error {
        border: 1px solid red !important;
    }

    .submitstop {
        pointer-events: none;
        opacity: 0.5;
    }
</style>
@endsection