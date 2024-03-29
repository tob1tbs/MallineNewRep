@extends('layout.layout')

@section('content')
<main class="main">
    <div class="container mb-30 mt-50">
        <div class="row">
            <div class="col-lg-5 mx-auto text-center">
                <h1 class="title heading-1 style-3 mb-40 font-neue">{{ trans('site.wishlist') }}</h1>
            </div>
            <div class="row wishlist-content">
                @if(count($wishlist_list) > 0)
                @foreach($wishlist_list as $wishlist_item)
                @if(!empty($wishlist_item->getProductData))
                <div class="col-lg-3 wishlist-item-{{ $wishlist_item->id }}">
                    <div class="product-cart-wrap mb-30">
                        <div class="product-img-action-wrap">
                            <a href="{{ route('actionProductsView', $wishlist_item->product_id) }}">
                                <img src="{{ $wishlist_item->getProductData->photo }}" style="margin: 0 auto; width: 100%; height: 100%">
                            </a>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                @if(!empty($wishlist_item->getProductData->discount_price) && $wishlist_item->getProductData->discount_percent)
                                <span class="sale">{{ $wishlist_item->getProductData->discount_percent }}%</span>
                                @endif
                            </div>
                            @if(Auth::check() && in_array($wishlist_item->product_id, $wishlist_item_ids))
                            <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="RemoveFromWishlist(0, {{ $wishlist_item->id }})">
                                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="_x_stroke-1.6 ng-star-inserted _x_stroke-purple _x_fill-purple" id="addWishList_1"><path d="M18.99 6.10136C18.613 5.73919 18.1678 5.45546 17.6803 5.26664C17.1928 5.07781 16.6726 4.98764 16.15 5.00136V5.00136C15.5114 5.00638 14.881 5.14609 14.3 5.41136C13.7186 5.6754 13.2003 6.06067 12.78 6.54136L12.09 7.32136L11.41 6.54136C10.9897 6.06067 10.4714 5.6754 9.89 5.41136C9.31074 5.14103 8.67923 5.00107 8.04 5.00136V5.00136C7.51343 4.99468 6.99052 5.08975 6.5 5.28136C5.76735 5.57769 5.13889 6.08442 4.69396 6.73758C4.24902 7.39075 4.00754 8.16108 4 8.95136C4 11.9014 7.47 14.9514 9 16.2914L9.4 16.6514C10.31 17.4914 11.4 18.4914 12.13 19.0914C12.82 18.4914 13.96 17.4914 14.87 16.6514L15.27 16.2914C16.76 14.9714 20.27 11.8914 20.27 8.94136C20.255 7.88628 19.8237 6.87988 19.07 6.14136L18.99 6.10136Z"></path></svg>
                            </div>
                            @else
                            <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="AddToWishlist({{ $wishlist_item->id }})">
                                <img src="{{ asset('/assets/imgs/theme/icons/icon-heart.svg') }}" width="18" height="18">
                            </div>
                            @endif
                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="{{ route('actionProductsView', $wishlist_item->product_id) }}">{{ $wishlist_item->getProductData->{"name_" . app()->getLocale()} }}</a></h2>
                            <div>
                                @if(!empty($wishlist_item->getProductData->getVendorData))
                                <span class="font-small text-muted">{{ trans('site.seller') }} <a target="_blank" href="https://{{ $wishlist_item->getProductData->getVendorData->host }}">{{ json_decode($wishlist_item->getProductData->getVendorData->data)->{"name_" . app()->getLocale()} }}</a></span>
                                @endif
                            </div>
                            <div>
                                <a class="action-btn hover-up">
                                    <p class="products-installment-note font-neue">თვეში <span>9₾</span> -დან</p>
                                </a>
                            </div>
                            <div class="product-rate-cover" style="margin-top: 2px;">
                                @if(!empty($wishlist_item->getProductData->discount_price))
                                <div class="product-price">
                                    <span>{{ number_format($wishlist_item->getProductData->discount_price / 100, 2) }} ₾</span>
                                    <span class="old-price">{{ number_format($wishlist_item->getProductData->getProductPrice->price / 100, 2) }} ₾</span>
                                </div>
                                @else
                                <div class="product-price">
                                    <span>₾{{ number_format($wishlist_item->getProductData->getProductPrice->price / 100, 2) }}</span>
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
                                    <div class="add-cart" onclick="AddToCart({{ $wishlist_item->product_id }})">
                                        <a class="basket_white" href="javascript:;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21.763" height="21.841" viewBox="0 0 21.763 21.841" style="position: relative; top: -3px">
                                                <path style="fill: #fff;fill-rule: evenodd;" d="M405.121,515.729a2.713,2.713,0,0,0-2.1-1H389.428v-1.365A1.365,1.365,0,0,0,388.063,512h-2.718a1.365,1.365,0,0,0,0,2.73h1.365v9.555a2.73,2.73,0,0,0,2.718,2.73H401.66a2.721,2.721,0,0,0,2.665-2.195L405.69,518a2.73,2.73,0,0,0-.569-2.266Zm-15.693,8.556V517.46h13.591l-1.365,6.825H389.421Zm-1.365,4.1a2.717,2.717,0,1,0,.005,0Zm13.592,0a2.715,2.715,0,1,0,.005,0Z" transform="translate(-383.98 -512)" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="add-cart" onclick="ProductCompare({{ $wishlist_item->product_id }})">
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
                <div class="container mb-80 mt-50">
                    <div class="alert alert-primary" role="alert">{{ trans('site.wishlist_is_empty') }}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection