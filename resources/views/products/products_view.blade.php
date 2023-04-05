@extends('layout.layout')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
@endsection

@section('content')
<main class="main">
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <div class="Sirv" data-options="zoom.mode:right;thumbnails.position:left;zoom.hint.text.hover:{{ trans('site.zoom') }};">
                                    <div data-src="https://demo.sirv.com/spins/test123/Duplo/duplo-zoo-9.jpg" data-type="zoom"></div>
                                    <div data-src="https://demo.sirv.com/spins/test123/Duplo/duplo-zoo-9.jpg" data-type="zoom"></div>
                                    <div data-src="https://demo.sirv.com/spins/test123/Duplo/duplo-zoo-9.jpg" data-type="zoom"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                @if($product_data['count'] < 1)
                                <span class="stock-status out-stock mb-2" style="color: #f74b81;">არ არის მარაგში</span>
                                @endif
                                @if(!empty($product_data->discount_price))
                                <span class="stock-status discount"> {{ $product_data->discount_percent }}% </span>
                                @endif
                                <h2 class="title-detail">{{ $product_data->{"name_" . app()->getLocale()} }}</h2>
                                <div class="product-detail-rating">
                                    <ul class="float-start">
                                        <li class="mb-5">კატეგორია: <a href="{{ route('actionProductsIndex', ['category_id' => $product_data->getCategoryData->id]) }}">{{ json_decode($product_data->getCategoryData->name)->{app()->getLocale()} }}</a></li>
                                    </ul>
                                </div>
                                @if(!empty($product_data->discount_price))
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">₾{{ $product_data->discount_price / 100 }}</span>
                                        <span>
                                            <span class="old-price font-md ml-15">₾{{ $product_data->getProductPrice->price / 100 }}</span>
                                        </span>
                                    </div>
                                </div>
                                @else
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">₾{{ $product_data->getProductPrice->price / 100 }}</span>
                                    </div>
                                </div>
                                @endif
                                <div class="detail-extralink">
                                    @if($product_data['count'] > 0)
                                    <div class="detail-qty border radius">
                                        <a href="javascript:;" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="number" value="1" class="qty-val item-quantity-{{ $product_data->id }}">
                                        <a href="javascript:;" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    @endif
                                    <div class="product-extra-link2">
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" onclick="AddToWishlist({{ $product_data->id }})"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="javascript:;" onclick="ProductCompare({{ $product_data->id }})"><i class="fi-rs-shuffle"></i></a>
                                        @if($product_data['count'] > 0)
                                        <button type="button" class="button button-add-to-cart" onclick="AddToCart({{ $product_data->id }})"><i class="fi-rs-shopping-cart"></i>{{ trans('site.add_to_cart') }}</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">{{ trans('site.additionl_info') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">{{ trans('site.customer_reviews') }}</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <div class="">
                                        {!! json_decode($product_data->description)->ge !!} 
                                        <table class="font-md">
                                            <tbody>
                                                <tr class="stand-up">
                                                    <th>ადექი</th>
                                                    <td>
                                                        <p>35″L x 24″W x 37-45″H (წინა უკანა ბორბალი)</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-wo-wheels">
                                                    <th>დაკეცილი (ბორბლების გარეშე)</th>
                                                    <td>
                                                        <p>32,5″L x 18,5″W x 16,5″H</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-w-wheels">
                                                    <th>დაკეცილი (ბორბლებით)</th>
                                                    <td>
                                                        <p>32,5″L x 24″W x 18,5″H</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>                                       
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <div class="container mb-80 mt-50">
                                        <div class="alert alert-primary" role="alert">{{ trans('site.add_review_text') }}</div>
                                    </div>
                                <!-- <div class="comments-area">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="mb-30 Center">მომხმარებელთა შეფასებები</h4>
                                            <div class="d-flex mb-30 justify-content-center">
                                                <div class="product-rate d-inline-block mr-15">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                                <h6>4.8 out of 5</h6>
                                            </div>
                                            <div class="comment-list">
                                                <div class="single-comment justify-content-between d-flex">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="assets/imgs/blog/author-4.png" alt="" />
                                                            <a href="#" class="font-heading text-brand">Gemma</a>
                                                        </div>
                                                        <div class="desc">
                                                            <div class="d-flex justify-content-between mb-10">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                </div>
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-form">
                                    <h4 class="mb-30 Center">შეფასების დამატება</h4>
                                    <form action="">
                                        <input class="star star-5" id="star-5" type="radio" name="star" value="1">
                                        <label class="star star-5" for="star-5"></label>
                                        <input class="star star-4" id="star-4" type="radio" name="star" value="2">
                                        <label class="star star-4" for="star-4"></label>
                                        <input class="star star-3" id="star-3" type="radio" name="star" value="3">
                                        <label class="star star-3" for="star-3"></label>
                                        <input class="star star-2" id="star-2" type="radio" name="star" value="4">
                                        <label class="star star-2" for="star-2"></label>
                                        <input class="star star-1" id="star-1" type="radio" name="star" value="5">
                                        <label class="star star-1" for="star-1"></label>
                                    </form>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <form class="form-contact comment_form" action="#" id="commentForm">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="name" id="name" type="text" placeholder="სახელი" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input class="form-control" name="email" id="email" type="email" placeholder="ელ.ფოსტა" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="დაწერეთ კომენტარი"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="button button-contactForm">დამატება</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                    </div>
                                </div> -->
                    </div>
                    <div class="product_titles">
                        <div class="title_left_side">
                            <h2 class="font-neue" style="font-size: 18px;">ერთად იაფია</h2>
                        </div>
                    </div>
                    <div class="bundle-cont">
                        <div class="cheaper-content ">
                            <div class="cheaper-items">
                                <div class="cheaper_items_inside owl-carousel bundle-item cheaper-items-desktop">
                                    <div class="js-cheaper-item-outside">
                                        <div class="cheaper-item js-bundle-item js-bundle-item-main" data-productId="17950" data-bundleCategoryId="238">
                                            <div class="cheaper-image">
                                                <img src="https://img.zoommer.ge/zoommer-images/thumbs/0186124_samsung-galaxy-s23-ultra-5g-s918bds-12256gb-green_157.jpeg" />
                                            </div>
                                            <div class="cheaper-description">
                                                <div>
                                                    <div class="title">
                                                        Samsung Galaxy S23 Ultra 5G S918B...
                                                    </div>
                                                    <div class="cheaper_old_price">
                                                        
                                                    </div>
                                                    <div class="price ">
                                                        3&#xA0;299 ₾
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-cheaper-item-outside">
                                        <div class="cheaper-item-plus">+</div>
                                        <div class="cheaper-item js-bundle-item" data-productId="11691" data-bundleCategoryId="241">
                                            <div class="cheaper-image">
                                                    <span class="sale-r">
                                                        15%
                                                    </span>
                                                <img src="https://img.zoommer.ge/zoommer-images/thumbs/0153783_samsung-travel-adapter-25w-white_157.jpeg" />
                                            </div>
                                            <div class="cheaper-description">
                                                <div>
                                                    <a href="/samsung-travel-adapter-25w-white"  class="product_link" data-prd-id="241">
                                                        <div class="title">
                                                            Samsung Travel Adapter 25W White
                                                        </div>
                                                    </a>
                                                    <div class="cheaper_old_price">
                                                        59 ₾
                                                    </div>
                                                    <div class="price has_old_price">
                                                        50,15 ₾
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-cheaper-item-outside">
                                        <div class="cheaper-item-plus">+</div>
                                        <div class="cheaper-item js-bundle-item" data-productId="12390" data-bundleCategoryId="253">
                                            <div class="cheaper-image">
                                                    <span class="sale-r">
                                                        10%
                                                    </span>
                                                <img src="https://img.zoommer.ge/zoommer-images/thumbs/0187165_xiaomi-redmi-portable-power-bank-10000-mah-vxn4305gl-black_157.jpeg" />
                                            </div>
                                            <div class="cheaper-description">
                                                <div>
                                                    <a href="/xiaomi-redmi-portable-power-bank-10000-mah-vxn4305gl-black"  class="product_link" data-prd-id="253">
                                                        <div class="title">
                                                            Xiaomi Redmi Portable Power Bank ...
                                                        </div>
                                                    </a>
                                                    <div class="cheaper_old_price">
                                                        49 ₾
                                                    </div>
                                                    <div class="price has_old_price">
                                                        44,10 ₾
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="js-cheaper-item-outside">
                                        <div class="cheaper-item-plus">+</div>
                                        <div class="cheaper-item js-bundle-item" data-productId="17826" data-bundleCategoryId="251">
                                            <div class="cheaper-image">
                                                    <span class="sale-r">
                                                        5%
                                                    </span>
                                                <img src="https://img.zoommer.ge/zoommer-images/thumbs/0185488_xiaomi-50w-wireless-charging-stand-bhr6094gl-black_157.jpeg" />
                                            </div>
                                            <div class="cheaper-description">
                                                <div>
                                                    <a href="/xiaomi-50w-wireless-charging-stand-bhr6094gl-black"  class="product_link" data-prd-id="251">
                                                        <div class="title">
                                                            Xiaomi 50W Wireless Charging Stan...
                                                        </div>
                                                    </a>
                                                    <div class="cheaper_old_price">
                                                        199 ₾
                                                    </div>
                                                    <div class="price has_old_price">
                                                        189,05 ₾
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style type="text/css">
    .right_side_chat {
        position: fixed;
        width: 70px;
        height: 70px;
        right: 40px;
        bottom: 180px;
        background: #2491e0;
        padding: 20px 18px;
        border-radius: 35px;
    }
</style>
<a href="#" class="right_side_chat chat-expand">
    <img src="https://zoommer.ge/themes/zoommer/assets/images/chat.svg">
    <span class="chat_msg_num js-msg-num" data-num="0"></span>
</a>
@endsection

@section('js')
    <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
	<script src="https://chat.mallline.io/chat_widget.js?token=91378264"></script>
	@if(!empty($product_data->getVendorData->chat_id))

	@endif
	<script>
	$(document).on('click','.chat-expand,.panel-heading',function(){
		window.parent.postMessage('show_hide', '*');
		return false;
	});
	</script>
@endsection