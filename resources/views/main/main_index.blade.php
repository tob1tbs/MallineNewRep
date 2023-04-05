@extends('layout.layout')

@section('meta')
<title>{{ json_decode($seo_data->value)->{'title_'.app()->getLocale()} }}</title>
<meta name="description" content="{{ json_decode($seo_data->value)->{'description_'.app()->getLocale()} }}" />
<meta name="keywords" content="{{ json_decode($seo_data->value)->{'keywords_'.app()->getLocale()} }}" />
@endsection

@section('content')
<div class="box-categories pb-20 pt-20 d-flex">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a type="button" id="toggle" class="catbtn font-neue" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="https://mallline.io/assets\imgs\theme\icons\burger.png" alt="" id="icon-burger"> 
                    სრული კატალოგი
                </a>
            </div>
            <div class="col-lg-9">
                <div class="carousel-wrap">
                    <div class="cat-carousel owl-carousel owl-theme" style="left: -50px; height: 50px;">
                        @foreach($category_list->where('parent_id', 0) as $category_item)
                        <div class="item catsmallslider">
                            <a href="{{ route('actionProductsIndex', ['category_id' => $category_item->id]) }}" class="bobBxm">
                                <div class="icon">
                                    <span class="hnjFCX">
                                        <img src="https://adjarastoremedia.s3.amazonaws.com/media/product_category/GIFT_PAGE_ICON%E1%83%AC%E1%83%99%E1%83%94%E1%83%9C%E1%83%A4%E1%83%98%E1%83%AC%E1%83%94%E1%83%A0%E1%83%91%E1%83%92%E1%83%A3%E1%83%98%E1%83%94%E1%83%AC%E1%83%A0%E1%83%9C%E1%83%9D%E1%83%92%E1%83%A4%E1%83%A3%E1%83%94%E1%83%A09%E1%83%B030%E1%83%9234%E1%83%92.svg" loading="eager">
                                    </span>
                                </div>
                                <span class="font-neue" style="font-size: 13px;">{{ json_decode($category_item->name)->{app()->getLocale()} }}</span>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="home-slider style-2 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-12">
                <div class="home-slide-cover">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        @foreach($slider_list->whereNull('is_banner') as $slider_item)
                        <div class="single-hero-slider single-animation-wrap" style="background-image: url({{ $slider_item->path }})">
                            <div class="bg-gradient"></div>
                            <div class="slider-content">
                                <h1 class="display-2 mb-40">
                                    {{ json_decode($slider_item->text)->{'small_text_'.app()->getLocale()} }}
                                </h1>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
            <div class="col-lg-3 d-none d-xl-block">
                @foreach($slider_list->whereNotNull('is_banner')->random(1) as $slider_item)
                <div class="banner-img style-3 animated animated" style="background-image: url({{ $slider_item->path }})">
                    <div class="bg-gradient"></div>
                    <div class="banner-text mt-50">
                        <h2 class="mb-50">
                            {{ json_decode($slider_item->text)->{'small_text_'.app()->getLocale()} }}
                        </h2>
                        @if(!empty($slider_item->url))
                        <a href="{{ $slider_item->url }}" class="btn btn-xs">{{ trans('site.shop_now') }}<i class="fi-rs-arrow-small-right"></i></a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="featured section-padding" style="padding: 10px 0 20px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated" style="padding: 10px 20px;">
                    <div class="banner-icon">
                        <img src="{{ asset('assets/imgs/theme/icons/price-tag.png') }}" alt="" style="width: 50px; height: 50px;" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title" style="font-size: 16px;">{{ trans('site.badge_1_heading') }}</h3>
                        <p>{{ trans('site.badge_1_body') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated" style="padding: 10px 20px;">
                    <div class="banner-icon">
                        <img src="{{ asset('assets/imgs/theme/icons/fast-delivery.png') }}" alt="" style="width: 50px; height: 50px;" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title" style="font-size: 16px;">{{ trans('site.badge_2_heading') }}</h3>
                        <p>{{ trans('site.badge_2_body') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated" style="padding: 10px 20px;">
                    <div class="banner-icon">
                        <img src="{{ asset('assets/imgs/theme/icons/hand-shake.png') }}" alt="" style="width: 50px; height: 50px;" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title" style="font-size: 16px;">{{ trans('site.badge_3_heading') }}</h3>
                        <p>{{ trans('site.badge_3_body') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated" style="padding: 10px 20px;">
                    <div class="banner-icon">
                        <img src="{{ asset('assets/imgs/theme/icons/new-product.png') }}" alt="" style="width: 50px; height: 50px;" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title" style="font-size: 16px;">{{ trans('site.badge_4_heading') }}</h3>
                        <p>{{ trans('site.badge_4_body') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                <div class="banner-left-icon d-flex align-items-center wow fadeIn animated" style="padding: 10px 20px;">
                    <div class="banner-icon">
                        <img src="{{ asset('assets/imgs/theme/icons/exchange.png') }}" alt="" style="width: 50px; height: 50px;" />
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title" style="font-size: 16px;">{{ trans('site.badge_5_heading') }}</h3>
                        <p>{{ trans('site.badge_5_body') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(count($sponsored_items) > 0)
<section class="popular-categories section-padding" style="padding: 0 0; margin-bottom: 15px;">
    <div class="container">
        <div class="section-title" style="margin-bottom: 20px;">
            <div class="title">
                <div>
                    <h3 class="font-neue" style="font-size: 24px;">{{ trans('site.sponsored') }}</h3>
                </div>
            </div>
        </div>
        <div class="carousel-wrap">
                <div class="owl-carousel">
                @foreach($sponsored_items as $product_item)
                <div class="item product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <a href="{{ route('actionProductsView', $product_item->getProduct['id']) }}">
                            <img src="{{ $product_item->getProduct['photo'] }}" style="margin: 0 auto; width: 90%">
                        </a>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            @if(!empty($product_item->getProduct['discount_price']) && $product_item->getProduct['discount_percent'])
                            <span class="sale">{{ $product_item->getProduct['discount_percent'] }}%</span>
                            @endif
                        </div>
                        @if(Auth::check() && in_array($product_item['product_id'], $wishlist_item_ids))
                        <div class="wishlist-product-item-{{ $product_item['product_id'] }}">
                            <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="RemoveFromWishlist(1, {{ $product_item['product_id'] }})">
                                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="_x_stroke-1.6 ng-star-inserted _x_stroke-purple _x_fill-purple" id="addWishList_1"><path d="M18.99 6.10136C18.613 5.73919 18.1678 5.45546 17.6803 5.26664C17.1928 5.07781 16.6726 4.98764 16.15 5.00136V5.00136C15.5114 5.00638 14.881 5.14609 14.3 5.41136C13.7186 5.6754 13.2003 6.06067 12.78 6.54136L12.09 7.32136L11.41 6.54136C10.9897 6.06067 10.4714 5.6754 9.89 5.41136C9.31074 5.14103 8.67923 5.00107 8.04 5.00136V5.00136C7.51343 4.99468 6.99052 5.08975 6.5 5.28136C5.76735 5.57769 5.13889 6.08442 4.69396 6.73758C4.24902 7.39075 4.00754 8.16108 4 8.95136C4 11.9014 7.47 14.9514 9 16.2914L9.4 16.6514C10.31 17.4914 11.4 18.4914 12.13 19.0914C12.82 18.4914 13.96 17.4914 14.87 16.6514L15.27 16.2914C16.76 14.9714 20.27 11.8914 20.27 8.94136C20.255 7.88628 19.8237 6.87988 19.07 6.14136L18.99 6.10136Z"></path></svg>
                            </div>
                        </div>
                        @else
                        <div class="wishlist-product-item-{{ $product_item['product_id'] }}">
                            <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="AddToWishlist({{ $product_item['product_id'] }})">
                                <img src="{{ asset('/assets/imgs/theme/icons/icon-heart.svg') }}" width="18" height="18">
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="product-content-wrap">
                        <h2><a href="{{ route('actionProductsView', $product_item->getProduct['id']) }}">{{ $product_item->getProduct['name_'.app()->getLocale()] }}</a></h2>
                        <div>
                            @if(!empty($product_item->getProduct->getVendorData))
                            <span class="font-neue" style="font-size: 11px;">{{ trans('site.seller') }}:</span>
                            <span class="font-small text-muted">
                                <a target="_blank" href="https://{{ $product_item->getProduct->getVendorData->host }}">{{ json_decode($product_item->getProduct->getVendorData->data)->{"name_" . app()->getLocale()} }}</a>
                            </span>
                            @endif
                        </div>
                        <div>
                            <a class="action-btn hover-up">
                                <p class="products-installment-note font-neue">თვეში <span>9₾</span> -დან</p>
                            </a>
                        </div>
                        <div class="product-rate-cover" style="margin-top: 2px;">
                            @if(!empty($product_item->getProduct['discount_price']))
                            <div class="product-price">
                                <span>{{ number_format($product_item->getProduct->discount_price / 100, 2) }} ₾</span>
                                <span class="old-price">{{ number_format($product_item->getProduct->getProductPrice->price / 100, 2) }} ₾</span>
                            </div>
                            @else
                            <div class="product-price">
                                <span>₾{{ number_format($product_item->getProduct->getProductPrice->price / 100, 2) }}</span>
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
                                <div class="add-cart" onclick="AddToCart({{ $product_item->getProduct['id'] }})">
                                    <a class="basket_white" href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21.763" height="21.841" viewBox="0 0 21.763 21.841" style="position: relative; top: -3px">
                                            <path style="fill: #fff;fill-rule: evenodd;" d="M405.121,515.729a2.713,2.713,0,0,0-2.1-1H389.428v-1.365A1.365,1.365,0,0,0,388.063,512h-2.718a1.365,1.365,0,0,0,0,2.73h1.365v9.555a2.73,2.73,0,0,0,2.718,2.73H401.66a2.721,2.721,0,0,0,2.665-2.195L405.69,518a2.73,2.73,0,0,0-.569-2.266Zm-15.693,8.556V517.46h13.591l-1.365,6.825H389.421Zm-1.365,4.1a2.717,2.717,0,1,0,.005,0Zm13.592,0a2.715,2.715,0,1,0,.005,0Z" transform="translate(-383.98 -512)" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="add-cart" onclick="ProductCompare({{ $product_item->getProduct['id'] }})">
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
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
@if(Auth::check() == true AND count($last_view) > 0)
<section class="popular-categories section-padding" style="padding: 0 0; margin-bottom: 35px;">
	<div class="container">
		<div class="section-title" style="margin-bottom: 20px;">
            <div class="title">
                <div>
                    <h3 class="font-neue" style="font-size: 24px;">{{ trans('site.last_view') }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($last_view as $product_item)
            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                <div class="banner-left-icon d-flex align-items-center" style="padding: 7px; background-color: #f5f5f7; border: 1px solid #ececec; border-radius: 5px; overflow: hidden;">
                    <div class="banner-icon">
                        <a href="{{ route('actionProductsView', $product_item->getProduct['id']) }}">
                            <img src="{{ $product_item->getProduct['photo'] }}" style="margin: 0 auto; width: 70px; height: 70px; background-color: #fff; border: 1px solid #dedede; padding: 4px; border-radius: 3px;">
                        </a>
                    </div>
                    <div class="banner-text">
                        <h3 class="icon-box-title" style="font-size: 13px; width: 50%; white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                            <a href="{{ route('actionProductsView', $product_item->getProduct['id']) }}">{{ $product_item->getProduct['name_'.app()->getLocale()] }}</a>
                        </h3>
                        @if(!empty($product_item->getProduct['discount_price']))
                        <div class="product-price">
                            <span>{{ number_format($product_item->getProduct->discount_price / 100, 2) }} ₾</span>
                            <span class="old-price">{{ number_format($product_item->getProduct->getProductPrice->price / 100, 2) }} ₾</span>
                        </div>
                        @else
                        <div class="product-price">
                            <span>₾{{ number_format($product_item->getProduct->getProductPrice->price / 100, 2) }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
	</div>
</section>
@endif
<section class="popular-categories section-padding" style="padding: 0px 0;">
    <div class="container">
        <div class="section-title" style="margin-bottom: 20px;">
            <div class="title">
                <div>
                    <h3 class="font-neue" style="font-size: 24px;">{{ trans('site.last_products') }}</h3>
                </div>
            </div>
            <div>
                <a href="#" class="allprod" style="font-size: 14px;">{{ trans('site.all_products') }}</a>            
            </div>
        </div>
        <div class="carousel-wrap">
                <div class="owl-carousel">
				@foreach($unsorted_products as $product_item)
                <div class="item product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <a href="{{ route('actionProductsView', $product_item['id']) }}">
                            <img src="{{ $product_item['photo'] }}" style="margin: 0 auto; width: 90%">
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
                            @if(!empty($product_item->getVendorData))
                            <span class="font-neue" style="font-size: 11px;">{{ trans('site.seller') }}:</span>
                            <span class="font-small text-muted">
                                <a target="_blank" href="https://{{ $product_item->getVendorData->host }}">{{ json_decode($product_item->getVendorData->data)->{"name_" . app()->getLocale()} }}</a>
                            </span>
                            @endif
                        </div>
                        <div>
                            <a class="action-btn hover-up">
                                <p class="products-installment-note font-neue">თვეში <span>9₾</span> -დან</p>
                            </a>
                        </div>
                        <div class="product-rate-cover" style="margin-top: 2px;">
                            @if(!empty($product_item['discount_price']))
                            <div class="product-price">
                                <span>{{ number_format($product_item->discount_price / 100, 2) }} ₾</span>
                                <span class="old-price">{{ number_format($product_item->getProductPrice->price / 100, 2) }} ₾</span>
                            </div>
                            @else
                            <div class="product-price">
                                <span>₾{{ number_format($product_item->getProductPrice->price / 100, 2) }}</span>
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
				@endforeach
			</div>
		</div>
	</div>
</section>
<section class="popular-categories section-padding" style="padding: 15px 0;">
    <div class="container">
        <div class="section-title" style="margin-bottom: 20px;">
            <div class="title">
                <div>
                    <h3 class="font-neue" style="font-size: 24px;">{{ trans('site.discounted') }}</h3>
                </div>
            </div>
            <div>
              <a href="{{ route('actionProductsIndex', 'category_id='.$product_item['id']) }}" class="allprod" style="font-size: 14px;">{{ trans('site.all_products') }}</a>
            </div>
        </div>
        <div class="carousel-wrap">
                <div class="owl-carousel">
				@foreach($unsorted_products->whereNotNull('discount_percent')->whereNotNull('discount_price') as $product_item)
				<div class="item product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <a href="{{ route('actionProductsView', $product_item['id']) }}">
                            <img src="{{ $product_item['photo'] }}" style="margin: 0 auto; width: 90%">
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
                            @if(!empty($product_item->getVendorData))
                            <span class="font-neue" style="font-size: 11px;">{{ trans('site.seller') }}:</span>
                            <span class="font-small text-muted">
                                <a target="_blank" href="https://{{ $product_item->getVendorData->host }}">{{ json_decode($product_item->getVendorData->data)->{"name_" . app()->getLocale()} }}</a>
                            </span>
                            @endif
                        </div>
                        <div>
                            <a class="action-btn hover-up">
                                <p class="products-installment-note font-neue">თვეში <span>9₾</span> -დან</p>
                            </a>
                        </div>
                        <div class="product-rate-cover" style="margin-top: 2px;">
                            @if(!empty($product_item['discount_price']))
                            <div class="product-price">
                                <span>{{ number_format($product_item->discount_price / 100, 2) }} ₾</span>
                                <span class="old-price">{{ number_format($product_item->getProductPrice->price / 100, 2) }} ₾</span>
                            </div>
                            @else
                            <div class="product-price">
                                <span>₾{{ number_format($product_item->getProductPrice->price / 100, 2) }}</span>
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
				@endforeach
			</div>
		</div>
	</div>
</section>
<section class="popular-categories section-padding" style="padding: 15px 0;">
    <div class="container">
        <div class="section-title" style="margin-bottom: 20px;">
            <div class="title">
                <div>
                    <h3 class="font-neue" style="font-size: 24px;">{{ trans('site.popular') }}</h3>
                </div>
            </div>
            <div>
              <a href="{{ route('actionProductsIndex', 'category_id='.$product_item['id']) }}" class="allprod" style="font-size: 14px;">{{ trans('site.all_products') }}</a>
            </div>
        </div>
        <div class="carousel-wrap">
                <div class="owl-carousel">
				@foreach($unsorted_products->where('view', '>=', $view_const) as $product_item)
				<div class="item product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <a href="{{ route('actionProductsView', $product_item['id']) }}">
                            <img src="{{ $product_item['photo'] }}" style="margin: 0 auto; width: 90%">
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
                            @if(!empty($product_item->getVendorData))
                            <span class="font-neue" style="font-size: 11px;">{{ trans('site.seller') }}:</span>
                            <span class="font-small text-muted">
                                <a target="_blank" href="https://{{ $product_item->getVendorData->host }}">{{ json_decode($product_item->getVendorData->data)->{"name_" . app()->getLocale()} }}</a>
                            </span>
                            @endif
                        </div>
                        <div>
                            <a class="action-btn hover-up">
                                <p class="products-installment-note font-neue">თვეში <span>9₾</span> -დან</p>
                            </a>
                        </div>
                        <div class="product-rate-cover" style="margin-top: 2px;">
                            @if(!empty($product_item['discount_price']))
	                        <div class="product-price">
	                            <span>{{ number_format($product_item->discount_price / 100, 2) }} ₾</span>
	                            <span class="old-price">{{ number_format($product_item->getProductPrice->price / 100, 2) }} ₾</span>
	                        </div>
	                        @else
	                        <div class="product-price">
	                            <span>₾{{ number_format($product_item->getProductPrice->price / 100, 2) }}</span>
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
				@endforeach
			</div>
		</div>
	</div>
</section>
<section class="popular-categories section-padding">
    <div class="container">
        <div class="section-title" style="margin-bottom: 20px;">
            <div class="title">
                <div>
                    <h3 class="font-neue" style="font-size: 24px;">{{ trans('site.vendors') }}</h3>
                </div>
            </div>
            <div>
              <a href="{{ route('actionVendorsIndex') }}" class="allprod" style="font-size: 14px;">{{ trans('site.all_list') }}</a>
            </div>
        </div>
        <div class="carousel-wrap">
            <div class="owl-carousel">
                <div class="item">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img partners" style="background-image: url('assets/imgs/partner/0124554_apple.png');"></div>
                    </div>
                </div>
                <div class="item">
                    <div class="item product-cart-wrap mb-30">
                        <div class="product-img partners" style="background-image: url('assets/imgs/partner/0130872_national-geographic.png');"></div>
                    </div>
                </div>
                <div class="item">
                    <div class="item product-cart-wrap mb-30">
                        <div class="product-img partners" style="background-image: url('assets/imgs/partner/0131069_msi.png');"></div>
                    </div>
                </div>
                <div class="item">
                    <div class="item product-cart-wrap mb-30">
                        <div class="product-img partners" style="background-image: url('assets/imgs/partner/0142478_skinx.png');"></div>
                    </div>
                </div>
                <div class="item">
                    <div class="item product-cart-wrap mb-30">
                        <div class="product-img partners" style="background-image: url('assets/imgs/partner/0144108_xiaomi.png');"></div>
                    </div>
                </div>
                <div class="item">
                    <div class="item product-cart-wrap mb-30">
                        <div class="product-img partners" style="background-image: url('assets/imgs/partner/0162196_house-of-marley.png');"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@foreach($product_list as $key => $product_item)
    @if(count($product_item['products']) > 0)
    <section class="popular-categories section-padding" style="padding: 15px 0;">
        <div class="container">
            <div class="section-title" style="margin-bottom: 20px;">
                <div class="title">
                    <div>
                        <h3 class="font-neue" style="font-size: 24px;">{{ json_decode($product_item['name'])->{app()->getLocale()} }}</h3>
                    </div>
                </div>
                <div>
                  <a href="{{ route('actionProductsIndex', 'category_id='.$product_item['id']) }}" class="allprod" style="font-size: 14px;">{{ trans('site.all_products') }}</a>
                </div>
            </div>
            <div class="carousel-wrap">
                <div class="owl-carousel">
                    @foreach($product_item['products'] as $product_data)
                    <div class="item product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <a href="{{ route('actionProductsView', $product_data['id']) }}">
                                <img src="{{ $product_data['photo'] }}" style="margin: 0 auto; width: 90%">
                            </a>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                @if(!empty($product_data['discount_price']) && $product_data['discount_percent'])
                                <span class="sale">{{ $product_data['discount_percent'] }}%</span>
                                @endif
                            </div>
                            @if(Auth::check() && in_array($product_data['id'], $wishlist_item_ids))
                            <div class="wishlist-product-item-{{ $product_data['id'] }}">
                                <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="RemoveFromWishlist(1, {{ $product_data['id'] }})">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="_x_stroke-1.6 ng-star-inserted _x_stroke-purple _x_fill-purple" id="addWishList_1"><path d="M18.99 6.10136C18.613 5.73919 18.1678 5.45546 17.6803 5.26664C17.1928 5.07781 16.6726 4.98764 16.15 5.00136V5.00136C15.5114 5.00638 14.881 5.14609 14.3 5.41136C13.7186 5.6754 13.2003 6.06067 12.78 6.54136L12.09 7.32136L11.41 6.54136C10.9897 6.06067 10.4714 5.6754 9.89 5.41136C9.31074 5.14103 8.67923 5.00107 8.04 5.00136V5.00136C7.51343 4.99468 6.99052 5.08975 6.5 5.28136C5.76735 5.57769 5.13889 6.08442 4.69396 6.73758C4.24902 7.39075 4.00754 8.16108 4 8.95136C4 11.9014 7.47 14.9514 9 16.2914L9.4 16.6514C10.31 17.4914 11.4 18.4914 12.13 19.0914C12.82 18.4914 13.96 17.4914 14.87 16.6514L15.27 16.2914C16.76 14.9714 20.27 11.8914 20.27 8.94136C20.255 7.88628 19.8237 6.87988 19.07 6.14136L18.99 6.10136Z"></path></svg>
                                </div>
                            </div>
                            @else
                            <div class="wishlist-product-item-{{ $product_data['id'] }}">
                                <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="AddToWishlist({{ $product_data['id'] }})">
                                    <img src="{{ asset('/assets/imgs/theme/icons/icon-heart.svg') }}" width="18" height="18">
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="{{ route('actionProductsView', $product_data['id']) }}">{{ $product_data['name_'.app()->getLocale()] }}</a></h2>
                            <div>
                                @if(!empty($product_data->getVendorData))
                                <span class="font-neue" style="font-size: 11px;">{{ trans('site.seller') }}:</span>
                                <span class="font-small text-muted">
                                    <a target="_blank" href="https://{{ $product_data->getVendorData->host }}">{{ json_decode($product_data->getVendorData->data)->{"name_" . app()->getLocale()} }}</a>
                                </span>
                                @endif
                            </div>
                            <div>
                                <a class="action-btn hover-up">
                                    <p class="products-installment-note font-neue">თვეში <span>9₾</span> -დან</p>
                                </a>
                            </div>
                            <div class="product-rate-cover" style="margin-top: 2px;">
                                @if(!empty($product_data['discount_price']))
                                <div class="product-price">
                                    <span>{{ number_format($product_data->discount_price / 100, 2) }} ₾</span>
                                    <span class="old-price">{{ number_format($product_data->getProductPrice->price / 100, 2) }} ₾</span>
                                </div>
                                @else
                                <div class="product-price">
                                    <span>₾{{ number_format($product_data->getProductPrice->price / 100, 2) }}</span>
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
                                    <div class="add-cart" onclick="AddToCart({{ $product_data['id'] }})">
                                        <a class="basket_white" href="javascript:;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21.763" height="21.841" viewBox="0 0 21.763 21.841" style="position: relative; top: -3px">
                                                <path style="fill: #fff;fill-rule: evenodd;" d="M405.121,515.729a2.713,2.713,0,0,0-2.1-1H389.428v-1.365A1.365,1.365,0,0,0,388.063,512h-2.718a1.365,1.365,0,0,0,0,2.73h1.365v9.555a2.73,2.73,0,0,0,2.718,2.73H401.66a2.721,2.721,0,0,0,2.665-2.195L405.69,518a2.73,2.73,0,0,0-.569-2.266Zm-15.693,8.556V517.46h13.591l-1.365,6.825H389.421Zm-1.365,4.1a2.717,2.717,0,1,0,.005,0Zm13.592,0a2.715,2.715,0,1,0,.005,0Z" transform="translate(-383.98 -512)" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="add-cart" onclick="ProductCompare({{ $product_data['id'] }})">
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
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @if($loop->index == 1)
    <section class="popular-categories section-padding">
        <div class="container">
            <img src="https://trgde.adocean.pl/files/akaprekoufs/sockllelwc/rcijnwiicb/1530-130.png" style="width: 100%; border-radius: 10px;">
        </div>
    </section>
    @endif
    @if($loop->index == 2)
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <a href="#0">
                        <img src="{{ asset('assets/imgs/theme/banner/1.jpg') }}" alt="" style="width: 100%; border-radius: 30px;">
                    </a>
                </div>
                <div class="col-md-4 col-12 col-sm-6  mb-xl-0">
                    <a href="#0">
                        <img src="{{ asset('assets/imgs/theme/banner/2.jpg') }}" alt="" style="width: 100%; border-radius: 30px;">
                    </a>
                </div>
                <div class="col-md-4 col-12 col-sm-6  mb-xl-0">
                    <a href="#0">
                        <img src="{{ asset('assets/imgs/theme/banner/3.jpg') }}" alt="" style="width: 100%; border-radius: 30px;">
                    </a>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endif
@endforeach
@endsection

@section('js')

@endsection