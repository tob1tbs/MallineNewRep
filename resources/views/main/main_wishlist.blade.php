@extends('layout.layout')

@section('content')
<main class="main">
    <div class="container mb-30 mt-50">
        <div class="row">
            <div class="col-lg-5 mx-auto text-center">
                <h1 class="title heading-1 style-3 mb-40">შენახული</h1>
            </div>
            <div class="row">
                @foreach($wishlist_list as $wishlist_item)
                <div class="col-lg-3 wishlist-item-{{ $wishlist_item->id }}">
                    <div class="product-cart-wrap mb-30">
                        <div class="remove">
                            <a href="javascript:;" onclick="RemoveFromWishlist({{ $wishlist_item->id }})" class="text-body text-right">
                                <i class="fi-rs-trash"></i>
                            </a>
                        </div>
                        <div class="product-img-action-wrap wishlist">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('actionProductsView', $wishlist_item->product_id) }}">
                                    <img class="default-img" src="{{ $wishlist_item->getProductData->photo }}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            @if($wishlist_item->getProductData->count > 0)
                            <span class="stock-status in-stock mb-0"> {{ trans('site.on_stock') }}: {{ $wishlist_item->count }} </span>
                            @else
                            <span class="stock-status out-stock mb-0" style="color: #f74b81;">{{ trans('site.no_stock') }}</span>
                            @endif
                            <div class="product-category">
                                <a href="{{ route('actionProductsIndex', $wishlist_item->getProductData->getCategoryData->id) }}">{{ json_decode($wishlist_item->getProductData->getCategoryData->name)->{app()->getLocale()} }}</a>
                            </div>
                            <h2><a href="{{ route('actionProductsView', $wishlist_item->product_id) }}">{{ $wishlist_item->getProductData->{"name_" . app()->getLocale()} }}</a></h2>
                            <div>
                                @if(!empty($wishlist_item->getVendorData))
                                <span class="font-small text-muted">{{ trans('site.seller') }} <a target="_blank" href="https://{{ $wishlist_item->getVendorData->host }}">{{ json_decode($wishlist_item->getVendorData->data)->{"name_" . app()->getLocale()} }}</a></span>
                                @endif
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    <span>₾28.85</span>
                                    <span class="old-price">₾32.8</span>
                                </div>
                                <div class="add-cart">
                                    @if($wishlist_item->getProductData->count > 0)
                                    <button class="btn btn-sm" onclick="AddToCart({{ $wishlist_item->product_id }})">{{ trans('site.add_to_cart') }}</button>
                                    @else
                                    <button class="btn btn-sm btn-secondary"><i class="fi-rs-headset mr-5"></i>{{ trans('site.contact') }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection