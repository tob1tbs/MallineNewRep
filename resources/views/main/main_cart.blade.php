@extends('layout.layout')

@section('content')
<main class="main">
    @if(count(Cart::getContent()) > 0)
    <div class="container mb-80 mt-50 cart-page-body cart-body-s">
        <div class="row">
            <div class="col-lg-12 mb-40">
                <div class="d-flex justify-content-between">
                    <h6 class="text-body"><a href="javascript:;" onclick="ClearCart()" class="text-muted"><i class="fi-rs-trash mr-5"></i>{{ trans('site.cart_clear') }}</a></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30"></th>
                                <th scope="col" class="font-neue" colspan="2" >{{ trans('site.product') }}</th>
                                <th scope="col" class="font-neue">{{ trans('site.item_price') }}</th>
                                <th scope="col" class="font-neue" class="text-center">{{ trans('site.quantity') }}</th>
                                <th scope="col" class="font-neue">{{ trans('site.total') }}</th>
                                <th scope="col" class="font-neue" class="end"></th>
                            </tr>
                        </thead>
                        <tbody class="cart-body-page">
                            @if(count(Cart::getContent()) > 0)
                                @foreach(Cart::getContent()->sort() as $cart_item)
                                <tr class="pt-30 cart-item-s-{{ $cart_item->id }}">
                                    <td class="custome-checkbox pl-30"></td>
                                    <td class="image product-thumbnail pt-40"><img src="@if(!empty($cart_item['attributes']['photo'])) {{ $cart_item['attributes']['photo'] }} @endif" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="{{ route('actionProductsView', $cart_item['id']) }}">{{ $cart_item->name }}</a></h6>
                                        <p class="mt-10">{{ trans('site.on_stok') }} <span class="text-brand">{{ $cart_item['attributes']['count'] }}</span> {{ trans('site.items') }}</p>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-body">₾{{ number_format($cart_item->price, 2)}}</h4>
                                    </td>
                                    <td class="text-center detail-info" data-title="Stock">
                                        <div class="detail-extralink" style="position: relative;">
                                            <div class="detail-qty border radius">
                                                <a href="javascript:;" onclick="UpdateQuantityMinus({{ $cart_item->id }})" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <input type="number" value="{{ $cart_item->quantity }}" class="qty-val item-quantity-{{ $cart_item->id }}">
                                                <a href="javascript:;" onclick="UpdateQuantityPlus({{ $cart_item->id }})" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="detail-qty-overlay" style="visibility: hidden;"></div>
                                        </div>
                                    </td>
                                    <td class="price" data-title="Price">
                                        <h4 class="text-brand total-price-{{ $cart_item->id }}">₾{{ number_format($cart_item->price * $cart_item->quantity, 2)}} </h4>
                                    </td>
                                    <td class="action text-center" data-title="წაშლა"><a href="javascript:;" onclick="RemoveFromCart({{ $cart_item->id }})" class="text-body"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a class="btn" href="{{ route('actionProductsIndex') }}"><i class="fi-rs-arrow-left mr-10"></i>{{ trans('site.countinue_shoping') }}</a>
                    <a class="btn  mr-10 mb-sm-15" href="{{ route('actionMainCheckout') }}"><i class="fi-rs-sign-out ml-15"></i> {{ trans('site.checkout') }}</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container mb-80 mt-50">
        <div class="alert alert-primary" role="alert">{{ trans('site.your_cart_is_empty') }}</div>
    </div>
    @endif
</main>
<style type="text/css">
    .detail-qty-overlay {
        width: 100%;
        height: 100%;
        position: absolute;
        background: rgba(255, 255, 255, 0.5);
        left: 0;
    }
</style>
@endsection