@extends('layout.layout')

@section('meta')
<title>{{ json_decode($seo_data->value)->{'title_'.app()->getLocale()} }}</title>
<meta name="description" content="{{ json_decode($seo_data->value)->{'description_'.app()->getLocale()} }}" />
<meta name="keywords" content="{{ json_decode($seo_data->value)->{'keywords_'.app()->getLocale()} }}" />
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/slider-range.css')}}">
@endsection

@section('content')
<main class="main">
    <div class="page-header">
        <div class="container">
            <div class="archive-header"> 
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <h1 class="mb-15 Center">{{ trans('site.all_products') }}</h1>
                        <div class="breadcrumb">
                            <a href="{{ route('actionMainIndex') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>{{ trans('site.home') }}</a>
                            <span></span> {{ trans('site.your_cart_is_empty') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30 mt-50">
        <div class="row">
            <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
				<form action="{{ route('actionProductsIndex') }}" method="get">
                <div class="sidebar-widget price_range range mb-30">
                    <h5 class="section-title style-1 mb-15 font-neue" style="font-size: 16px;">{{ trans('site.by_price') }}</h5>
                    <div class="price-filter">
                        <div class="price-filter-inner">
                            <div id="slider-range" class="mb-20"></div>
                            <div class="d-flex justify-content-between">
                                <div class="caption">{{ trans('site.from') }}: <strong id="slider-range-value1" class="text-brand"></strong></div>
                                <div class="caption">{{ trans('site.to') }}: <strong id="slider-range-value2" class="text-brand"></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-widget widget-category-2 mb-30">
                    <h5 class="section-title style-1 mb-15 font-neue" style="font-size: 16px;">{{ trans('site.categories') }}:</h5>
                    @if(empty(request()->category_id))
                    <ul>
                        @foreach($product_category_list->where('parent_id', 0) as $category_item)
                            @if($category_item->getProductCount()->count() > 0)
                            <li>
                                <a href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),['category_id' => $category_item->id])) }}">{{ json_decode($category_item->name)->{app()->getLocale()} }}</a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                    @elseif(!empty(request()->category_id) AND empty(request()->child_category_id))
                    <ul>
                        <li class="catactive">
                            <a href="{{ url()->current() }}">
                                <button class="arrowbtn"><img src="{{ asset('assets/imgs/theme/icons/back.png') }}" alt=""></button>
								{{  json_decode($product_category_list->find(request()->category_id)->name)->{app()->getLocale()} }}
                            </a>
                        </li>
                        @foreach($product_category_list->where('parent_id', request()->category_id) as $child_category_item)
                            @if($child_category_item->getProductCountChild()->count() > 0)
                            <li>
                                <a href="{{ url()->current().'?'.http_build_query(['category_id' => request()->category_id, 'child_category_id' => $child_category_item->id]) }}">{{ json_decode($child_category_item->name)->{app()->getLocale()} }}</a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                    @elseif(!empty(request()->category_id) AND !empty(request()->child_category_id))
                    <ul>
                        <li class="catactive">
                            <a href="{{ url()->current().'?'.http_build_query(['category_id' => request()->category_id]) }}">
                                <button class="arrowbtn"><img src="{{ asset('assets/imgs/theme/icons/back.png') }}" alt=""></button>
								{{  json_decode($product_category_list->find(request()->child_category_id)->name)->{app()->getLocale()} }}
                            </a>
                        </li>
                        @foreach($product_category_list->where('parent_id', request()->child_category_id) as $sub_category)
                            @if($sub_category->getProductCountSub()->count() > 0)
                            <li>
                                <a href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),['category_id' => request()->category_id, 'child_category_id' => request()->child_category_id, 'sub_category_id' => $sub_category->id])) }}">{{ json_decode($sub_category->name)->{app()->getLocale()} }}</a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                    @endif
                </div>
				<div class="accordion">
					@if(count($product_brand_list) > 0)
					<div class="accordion-head">
						<h4 style="font-size: 18px;" class="font-neue">{{ trans('site.brands') }}</h4><div class="arrow down"></div>
					</div>
					<div class="accordion-body">
						<div class="list-group">
							<div class="list-group" id="hide-show">
								<div class="list-group-item mb-10 mt-10">
									@foreach($product_brand_list as $brand_item)
                                    @php
                                        if(isset(request()->brand) && in_array($brand_item->id, request()->brand)) {
                                            $checked = 'checked';
                                        } else {
                                            $checked = '';
                                        }
                                    @endphp
									<div class="custome-checkbox">
										<input class="form-check-input" type="checkbox" name="brand[]" id="brand_item_{{ $brand_item->id }}" value="{{ $brand_item->id }}" {{ $checked }}/>
										<label class="form-check-label" for="brand_item_{{ $brand_item->id }}"><span>{{ json_decode($brand_item->name)->{app()->getLocale()} }}</span></label>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					@endif
					@foreach($product_options_list as $option_item)
					@if(count($product_options_value_list->where('option_id', $option_item->id)) > 0)
					<div class="accordion-head">
						<h4 style="font-size: 18px;">{{ json_decode($option_item->name)->{app()->getLocale()} }}</h4><div class="arrow down"></div>
					</div>
					<div class="accordion-body">
						<div class="list-group">
							<div class="list-group" id="hide-show">
								<div class="list-group-item mb-10 mt-10">
									@foreach($product_options_value_list->where('option_id', $option_item->id) as $option_value_item)
									<div class="custome-checkbox">
										<input class="form-check-input" type="checkbox" name="option_value_item[]" id="option_value_item{{ $option_value_item->id }}" value="" />
										<label class="form-check-label" for="option_value_item{{ $option_value_item->id }}"><span>{{ json_decode($option_value_item->name)->{app()->getLocale()} }}</span></label>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					@endif
					@endforeach
					<div class="filterbtn">
						<button class="font-neue">მოძებნე</button>
					</div>
				</div>
				</form>
            </div>
            <div class="col-lg-4-5">
                <div class="shop-product-fillter">
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10 d-flex justify-content-between">
                            <div class="sort-by-product-wrap" id="mySharedown">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>{{ trans('site.show') }}:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> @if(empty(request()->show)) 30 @else {{ request()->show }} @endif <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    @foreach($show_list as $k => $v)
                                    <li>
                                        <a class="@if($k == request()->show) active @endif" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),['show' => $k])) }}">{{ $v }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>{{ trans('site.sort_by') }}:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> @if(empty(request()->sort)) {{ $sort_list['DATE_NEW'][app()->getLocale()] }} @else {{ $sort_list[request()->sort][app()->getLocale()] }} @endif <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    @foreach($sort_list as $k => $v)
                                    <li><a class="@if($k == request()->sort) active @endif" href="{{ url()->current().'?'.http_build_query(array_merge(request()->except('page'),['sort' => $k])) }}">{{ $v[app()->getLocale()] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @if(count($product_list) > 0)
                    @foreach($product_list as $product_item)
                    @if(!empty($product_item->product_id))
                    <div class="col-lg-2-4 col-md-3 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <a href="{{ route('actionProductsView', $product_item['id']) }}">
                                    <img src="{{ $product_item['photo'] }}" style="margin: 0 auto; width: 100%; height: 100%">
                                </a>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    @if(!empty($product_item['discount_price']) && $product_item['discount_percent'])
                                    <span class="sale">{{ $product_item['discount_percent'] }}%</span>
                                    @endif
                                </div>
                                @if(Auth::check() && in_array($product_item['id'], $wishlist_item_ids))
                                <div class="wishlist-product-item-{{ $product_item['id'] }}">
                                    <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="RemoveFromWishlist(1, {{ $product_item['id'] }})">
                                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="_x_stroke-1.6 ng-star-inserted _x_stroke-purple _x_fill-purple" id="addWishList_1"><path d="M18.99 6.10136C18.613 5.73919 18.1678 5.45546 17.6803 5.26664C17.1928 5.07781 16.6726 4.98764 16.15 5.00136V5.00136C15.5114 5.00638 14.881 5.14609 14.3 5.41136C13.7186 5.6754 13.2003 6.06067 12.78 6.54136L12.09 7.32136L11.41 6.54136C10.9897 6.06067 10.4714 5.6754 9.89 5.41136C9.31074 5.14103 8.67923 5.00107 8.04 5.00136V5.00136C7.51343 4.99468 6.99052 5.08975 6.5 5.28136C5.76735 5.57769 5.13889 6.08442 4.69396 6.73758C4.24902 7.39075 4.00754 8.16108 4 8.95136C4 11.9014 7.47 14.9514 9 16.2914L9.4 16.6514C10.31 17.4914 11.4 18.4914 12.13 19.0914C12.82 18.4914 13.96 17.4914 14.87 16.6514L15.27 16.2914C16.76 14.9714 20.27 11.8914 20.27 8.94136C20.255 7.88628 19.8237 6.87988 19.07 6.14136L18.99 6.10136Z"></path></svg>
                                    </div>
                                </div>
                                @else
                                <div class="wishlist-product-item-{{ $product_item['id'] }}">
                                    <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="AddToWishlist({{ $product_item['id'] }})">
                                        <img src="{{ asset('/assets/imgs/theme/icons/icon-heart.svg') }}" width="18" height="18">
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="product-content-wrap">
                                <h2><a href="{{ route('actionProductsView', $product_item['id']) }}">{{ $product_item['name_'.app()->getLocale()] }}</a></h2>
                                <div>
                                    <a class="action-btn hover-up">
                                        <p class="products-installment-note font-neue">თვეში <span>9₾</span> -დან</p>
                                    </a>
                                </div>
                                <div class="product-rate-cover" style="margin-top: 2px;">
                                    @if(!empty($product_item['discount_price']))
                                    <div class="product-price">
                                        <span>{{ number_format($product_item->discount_price / 100, 2) }} ₾</span>
                                        <span class="old-price">{{ number_format($product_item->price / 100, 2) }} ₾</span>
                                    </div>
                                    @else
                                    <div class="product-price">
                                        <span>₾{{ number_format($product_item->price / 100, 2) }}</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="product-card-bottom" style="margin-top: 12px;">
                                    <div class="product-rate-cover" style="margin-top: 5px;">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="add-cart" onclick="AddToCart({{ $product_item['id'] }})">
                                            <a class="basket_white" href="javascript:;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21.763" height="21.841" viewBox="0 0 21.763 21.841" style="position: relative; top: -3px">
                                                    <path style="fill: #fff;fill-rule: evenodd;" d="M405.121,515.729a2.713,2.713,0,0,0-2.1-1H389.428v-1.365A1.365,1.365,0,0,0,388.063,512h-2.718a1.365,1.365,0,0,0,0,2.73h1.365v9.555a2.73,2.73,0,0,0,2.718,2.73H401.66a2.721,2.721,0,0,0,2.665-2.195L405.69,518a2.73,2.73,0,0,0-.569-2.266Zm-15.693,8.556V517.46h13.591l-1.365,6.825H389.421Zm-1.365,4.1a2.717,2.717,0,1,0,.005,0Zm13.592,0a2.715,2.715,0,1,0,.005,0Z" transform="translate(-383.98 -512)" />
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="add-cart" onclick="ProductCompare({{ $product_item['id'] }})">
                                            <a class="compare_white" href="javascript:;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.527 11.288">
                                                    <defs>
                                                        <style>
                                                            .cls-1{fill:#fff}
                                                        </style>
                                                    </defs>
                                                    <g id="noun_Compare_71604" transform="translate(-9 -21.354)">
                                                        <g id="Group_132" data-name="Group 132" transform="translate(9 21.354)">
                                                            <path id="Path_163" d="M50.944 47.133h-3.73v-1.5c0-.448-.239-.568-.571-.268l-3.071 2.794a.724.724 0 0 0 .008 1.093l3.059 2.794c.332.3.575.18.575-.268v-1.596h3.73a.728.728 0 0 0 .754-.768v-1.425a.8.8 0 0 0-.754-.856z" class="cls-1" data-name="Path 163" transform="translate(-37.17 -40.92)"/>
                                                            <path id="Path_164" d="M17.128 24.314l-3.064-2.794c-.332-.3-.58-.18-.58.268v1.655H9.761a.685.685 0 0 0-.761.706v1.425a.869.869 0 0 0 .761.918h3.723v1.442c0 .448.243.568.575.268l3.072-2.794a.724.724 0 0 0-.003-1.094z" class="cls-1" data-name="Path 164" transform="translate(-9 -21.354)"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @else
                    <div class="alert alert-primary" style="margin-left: 13px;" role="alert">{{ trans('site.product_list_is_empty') }}</div>
                    @endif
                </div>
                {{ $product_list->links('vendor.custom') }}
            </div>
        </div>
    </div>
</main>
@endsection
@php 
    
    if(request()->has('price_from')) {
        $min = request()->price_from;
    } else {
        $min = 0;
    }
    
    if(request()->has('price_to')) {
        $max = request()->price_to;
    } else {
        $max = $product_all->max('price') / 100;
    }

@endphp
@section('js')
<script type="text/javascript">
    if ($("#slider-range").length) {
        $(".noUi-handle").on("click", function () {
            $(this).width(50);
        });
        var rangeSlider = document.getElementById("slider-range");
        var moneyFormat = wNumb({
            decimals: 0,
            thousand: ",",
            prefix: "₾"
        });
        noUiSlider.create(rangeSlider, {
            start: [{{ $min }}, {{ $max }}],
            step: 1,
            range: {
                min: 0,
                max: [{{ $product_all->max('price') / 100 }}]
            },
            format: moneyFormat,
            connect: true
        });

        // Set visual min and max values and also update value hidden form inputs
        rangeSlider.noUiSlider.on("update", function (values, handle) {
            document.getElementById("slider-range-value1").innerHTML = values[0];
            document.getElementById("slider-range-value2").innerHTML = values[1];
            document.getElementsByName("min-value").value = moneyFormat.from(values[0]);
            document.getElementsByName("max-value").value = moneyFormat.from(values[1]);
        });

        rangeSlider.noUiSlider.on("change", function (values, handle) {
            $.ajax({
                dataType: 'json',
                url: "/products/ajax/price",
                type: "POST",
                data: {
                    price_from: moneyFormat.from(values[0]),
                    price_to: moneyFormat.from(values[1]),
                    current_url: '{{ url()->current().'?'.http_build_query(array_merge(request()->except('page', 'price_from', 'price_to'))) }}',
                },
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
                success: function(data) {
                    if(data['status'] == true) {
                        window.location.href = data['redirect_url'];
                    }
                }
            });
        });
    }
</script>
@endsection