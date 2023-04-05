@extends('layout.layout')

@section('content')
<main class="main">
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-12">
                @if(count($compare_list) > 0)
                <div class="content_div col_padding">
                    <div class="product-title">
                        <div class="product-title-wrapper">
                            <span class="product-title-text">
                                პროდუქტების შედარება
                            </span>
                        </div>
                    </div>
                    <div class="compare-content">
                        <div class="compare-upper">
                            <div class="review-r">
                                <div class="or-section">
                                    <div class="form-group">
                                        <button class="blue_button btn btn-buy" id="fullrbtn">
                                            სრული მონაცემები
                                        </button>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button class="blue_button btn btn-buy white" id="diffbtn">
                                            განსხვავებები
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <ul class="f-compare-product">
                                <div class="loading">
                                    <img src="assets/imgs/loadercompare.gif">
                                </div>
                                @foreach($compare_list as $item)
                                @if(!empty($item->getProductData))
                                <li class="product-cart-wrap mb-30 col-md-3">
                                    <div class="product-img-action-wrap" style="height: 240px;">
                                        <a href="{{ route('actionProductsView', $item->product_id) }}">
                                            <img src="{{ $item->getProductData->photo }}" style="margin: 0 auto; width: 100%; height: 100%">
                                        </a>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            @if(!empty($item->getProductData->discount_price) && $item->getProductData->discount_percent)
                                            <span class="sale">{{ $item->getProductData->discount_percent }}%</span>
                                            @endif
                                        </div>
                                        @if(Auth::check() && in_array($item->product_id, $wishlist_item_ids))
                                        <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="RemoveFromWishlist(0, {{ $item->id }})">
                                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="_x_stroke-1.6 ng-star-inserted _x_stroke-purple _x_fill-purple" id="addWishList_1"><path d="M18.99 6.10136C18.613 5.73919 18.1678 5.45546 17.6803 5.26664C17.1928 5.07781 16.6726 4.98764 16.15 5.00136V5.00136C15.5114 5.00638 14.881 5.14609 14.3 5.41136C13.7186 5.6754 13.2003 6.06067 12.78 6.54136L12.09 7.32136L11.41 6.54136C10.9897 6.06067 10.4714 5.6754 9.89 5.41136C9.31074 5.14103 8.67923 5.00107 8.04 5.00136V5.00136C7.51343 4.99468 6.99052 5.08975 6.5 5.28136C5.76735 5.57769 5.13889 6.08442 4.69396 6.73758C4.24902 7.39075 4.00754 8.16108 4 8.95136C4 11.9014 7.47 14.9514 9 16.2914L9.4 16.6514C10.31 17.4914 11.4 18.4914 12.13 19.0914C12.82 18.4914 13.96 17.4914 14.87 16.6514L15.27 16.2914C16.76 14.9714 20.27 11.8914 20.27 8.94136C20.255 7.88628 19.8237 6.87988 19.07 6.14136L18.99 6.10136Z"></path></svg>
                                        </div>
                                        @else
                                        <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="AddToWishlist({{ $item->id }})">
                                            <img src="{{ asset('/assets/imgs/theme/icons/icon-heart.svg') }}" width="18" height="18">
                                        </div>
                                        @endif
                                    </div>
                                    <div class="product-content-wrap">
                                        <h2><a href="{{ route('actionProductsView', $item->product_id) }}">{{ $item->getProductData->{"name_" . app()->getLocale()} }}</a></h2>
                                        <div>
                                            @if(!empty($item->getProductData->getVendorData))
                                            <span class="font-small text-muted">{{ trans('site.seller') }} <a target="_blank" href="https://{{ $item->getProductData->getVendorData->host }}">{{ json_decode($item->getProductData->getVendorData->data)->{"name_" . app()->getLocale()} }}</a></span>
                                            @endif
                                        </div>
                                        <div>
                                            <a class="action-btn hover-up">
                                                <p class="products-installment-note font-neue">თვეში <span>9₾</span> -დან</p>
                                            </a>
                                        </div>
                                        <div class="product-rate-cover" style="margin-top: 2px;">
                                            @if(!empty($item->getProductData->discount_price))
                                            <div class="product-price">
                                                <span>{{ number_format($item->getProductData->discount_price / 100, 2) }} ₾</span>
                                                <span class="old-price">{{ number_format($item->getProductData->getProductPrice->price / 100, 2) }} ₾</span>
                                            </div>
                                            @else
                                            <div class="product-price">
                                                <span>₾{{ number_format($item->getProductData->getProductPrice->price / 100, 2) }}</span>
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
                                                <div class="add-cart" onclick="AddToCart({{ $item->product_id }})">
                                                    <a class="basket_white" href="javascript:;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21.763" height="21.841" viewBox="0 0 21.763 21.841" style="position: relative; top: -3px">
                                                            <path style="fill: #fff;fill-rule: evenodd;" d="M405.121,515.729a2.713,2.713,0,0,0-2.1-1H389.428v-1.365A1.365,1.365,0,0,0,388.063,512h-2.718a1.365,1.365,0,0,0,0,2.73h1.365v9.555a2.73,2.73,0,0,0,2.718,2.73H401.66a2.721,2.721,0,0,0,2.665-2.195L405.69,518a2.73,2.73,0,0,0-.569-2.266Zm-15.693,8.556V517.46h13.591l-1.365,6.825H389.421Zm-1.365,4.1a2.717,2.717,0,1,0,.005,0Zm13.592,0a2.715,2.715,0,1,0,.005,0Z" transform="translate(-383.98 -512)" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="add-cart" onclick="RemoveFromCompare({{ $item->product_id }})">
                                                    <a class="compare_white" href="javascript:;">
                                                        X
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="compare-bottom">
                            <div class="general-information-wrapper">
                                <div class="compare_main_div">
                                    <div class="compare_list">
                                        <ul class="left_side_compare">
                                            <li class="compare_general_title">
                                                {{ trans('site.price') }}
                                            </li>
                                        </ul>
                                        <div class="right_side_compare_div">
                                            <ul class="right_side_compare">
                                                @if(!empty($compare_list[0]) && !empty($compare_list[0]->getProductData))
                                                <li class="column">
                                                    @if($compare_list[0]->getProductData->discount_price > 0) 
                                                        {{ $compare_list[0]->getProductData->discount_price / 100 }} ₾
                                                    @else 
                                                        {{ $compare_list[0]->getProductData->getProductPrice->price / 100 }} ₾ 
                                                    @endif
                                                </li>
                                                @endif
                                                @if(!empty($compare_list[1]) && !empty($compare_list[1]->getProductData))
                                                <li class="column">
                                                    @if($compare_list[1]->getProductData->discount_price > 0) 
                                                        {{ $compare_list[1]->getProductData->discount_price / 100 }} ₾
                                                    @else 
                                                        {{ $compare_list[1]->getProductData->getProductPrice->price / 100 }} ₾ 
                                                    @endif
                                                </li>
                                                @endif
                                                @if(!empty($compare_list[2]) && !empty($compare_list[2]->getProductData))
                                                <li class="column">
                                                    @if($compare_list[2]->getProductData->discount_price > 0) 
                                                        {{ $compare_list[2]->getProductData->discount_price / 100 }} ₾
                                                    @else 
                                                        {{ $compare_list[2]->getProductData->getProductPrice->price / 100 }} ₾ 
                                                    @endif
                                                </li>
                                                @endif
                                                @if(!empty($compare_list[3]) && !empty($compare_list[3]->getProductData))
                                                <li class="column">
                                                    @if($compare_list[3]->getProductData->discount_price > 0) 
                                                        {{ $compare_list[3]->getProductData->discount_price / 100 }} ₾
                                                    @else 
                                                        {{ $compare_list[3]->getProductData->getProductPrice->price / 100 }} ₾ 
                                                    @endif
                                                </li>
                                                @endif
                                                <div class="clear"></div>
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="compare_list">
                                        <ul class="left_side_compare">
                                            <li class="compare_general_title">{{ trans('site.status') }}</li>
                                        </ul>
                                        <div class="right_side_compare_div">
                                            <ul class="right_side_compare" style="background: rgb(245, 245, 245);">
                                                @if(!empty($compare_list[0]))
                                                <li>
                                                    @if($compare_list[0]->getProductData->count > 0)
                                                    <span class="stock-status in-stock mb-0" style="float: inherit; padding: 10px 0">{{ trans('site.on_stock') }}</span>
                                                    @else
                                                    <span class="stock-status out-stock mb-0" style="float: inherit; padding: 10px 0">{{ trans('site.no_stock') }}</span>
                                                    @endif
                                                </li>
                                                @endif
                                                @if(!empty($compare_list[1]))
                                                <li>
                                                    @if($compare_list[1]->getProductData->count > 0)
                                                    <span class="stock-status in-stock mb-0" style="float: inherit; padding: 10px 0">{{ trans('site.on_stock') }}</span>
                                                    @else
                                                    <span class="stock-status out-stock mb-0" style="float: inherit; padding: 10px 0">{{ trans('site.no_stock') }}</span>
                                                    @endif
                                                </li>
                                                @endif
                                                @if(!empty($compare_list[2]))
                                                <li>
                                                    @if($compare_list[2]->getProductData->count > 0)
                                                    <span class="stock-status in-stock mb-0" style="float: inherit; padding: 10px 0">{{ trans('site.on_stock') }}</span>
                                                    @else
                                                    <span class="stock-status out-stock mb-0" style="float: inherit; padding: 10px 0">{{ trans('site.no_stock') }}</span>
                                                    @endif
                                                </li>
                                                @endif
                                                @if(!empty($compare_list[3]))
                                                <li>
                                                    @if($compare_list[3]->getProductData->count > 0)
                                                    <span class="stock-status in-stock mb-0" style="float: inherit; padding: 10px 0">{{ trans('site.on_stock') }}</span>
                                                    @else
                                                    <span class="stock-status out-stock mb-0" style="float: inherit; padding: 10px 0">{{ trans('site.no_stock') }}</span>
                                                    @endif
                                                </li>
                                                @endif
                                                <div class="clear"></div>
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="alert alert-primary text-center" role="alert">{{ trans('site.compare_list_is_empty') }}</div>
                @endif
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script type="text/javascript">
    $('#fullrbtn, #diffbtn').click(function () {
        $('#fullrbtn, #diffbtn').addClass('white');
        $(this).removeClass('white');
    });

    $('#fullrbtn').click(function () {
        $('.compare_list li').css('font-weight', '');
        $('.compare_list li').css('color', '');
    });

    $('#diffbtn').click(function () {
        $('.compare_list').each(function () {
            var $this = $(this);

            function hasDifference($el) {
                var hasDiff = true;

                $this.find('li').each(function () {
                    if ($(this).text().trim() == $el.text().trim() && hasDiff && !$(this).is($el)) {
                        hasDiff = false;
                    }
                });

                return hasDiff;
            }

            $this.find('.right_side_compare_div li').each(function () {
                if (hasDifference($(this))) {
                    $(this).css('font-weight', 'bold')
                } else {
                    $(this).css('color', 'rgba(0, 0, 0, 0.3)')
                }
            });
        });
    });
</script>
@endsection