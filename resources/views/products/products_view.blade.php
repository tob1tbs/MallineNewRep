@extends('layout.layout')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
@endsection

@section('content')
<main class="main">
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-12 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-8 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <h2 class="title-detail">{{ $product_data->{"name_" . app()->getLocale()} }}</h2>
                            <span style="margin-top: 5px;">SKU: {{ $product_data->sku }}</span>
                            <div style="margin-top: 0px; display: flex; justify-content: space-between;">
                                <div>
                                    <div class="mb-5">კატეგორია: <a href="{{ route('actionProductsIndex', ['category_id' => $product_data->getCategoryData->id]) }}">{{ json_decode($product_data->getCategoryData->name)->{app()->getLocale()} }}</a></div>
                                </div>
                                @if(!empty($product_data->getVendorData))
                                <div>{{ trans('site.seller') }}: <a target="_blank" href="https://{{ $product_data->getVendorData->host }}">{{ json_decode($product_data->getVendorData->data)->{"name_" . app()->getLocale()} }}</a></div>
                                @endif
                            </div>
                            <div class="detail-gallery" style="height: 400px;">
                                <div class="Sirv" data-options="zoom.mode:right;thumbnails.position:left;zoom.hint.text.hover:{{ trans('site.zoom') }};">
                                    <div data-src="https://demo.sirv.com/spins/test123/Duplo/duplo-zoo-9.jpg" data-type="zoom"></div>
                                    <div data-src="https://demo.sirv.com/spins/test123/Duplo/duplo-zoo-9.jpg" data-type="zoom"></div>
                                    <div data-src="https://demo.sirv.com/spins/test123/Duplo/duplo-zoo-9.jpg" data-type="zoom"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <div style="display: flex; justify-content: space-between; height: 34px; margin-top: 10px; margin-bottom: 10px;">
                                    @if($product_data['count'] < 1)
                                    <span class="stock-status out-stock" style="color: #f74b81;">არ არის მარაგში</span>
                                    @endif
                                    @if(!empty($product_data->discount_price))
                                        @if(!empty($product_data->discount_price))
                                        <div class="clearfix product-price-cover" style="position: relative; top: 7px;">
                                            <div class="product-price primary-color float-left">
                                                <span class="current-price text-brand" style="font-size: 25px;">₾{{ $product_data->discount_price / 100 }}</span>
                                                <span>
                                                    <span class="old-price" style="font-size: 18px; margin-left: 10px;">₾{{ $product_data->getProductPrice->price / 100 }}</span>
                                                </span>
                                                <span class="stock-status discount" style="margin-bottom: 0;">- {{ $product_data->discount_percent }}% </span>
                                            </div>
                                        </div>
                                        @else
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <span class="current-price text-brand">₾{{ $product_data->getProductPrice->price / 100 }}</span>
                                            </div>
                                        </div>
                                        @endif
                                    @endif
                                    <div>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" style="margin-right: 10px;" onclick="AddToWishlist({{ $product_data->id }})"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="javascript:;" onclick="ProductCompare({{ $product_data->id }})"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                </div>
                                <div class="product-extra-link2" style="width: 100%">
                                    <div>
                                        <p class="products-installment-note font-neue" style="margin-bottom: 10px; font-size: 14px;">თვეში <span>9₾</span> -დან</p>
                                    </div>
                                    <div style="display: flex; justify-content: space-between;">
                                    @if($product_data['count'] > 0)
                                    <button type="button" style="width: 80%; margin-bottom: 10px; height: 40px; font-size: 13px; line-height: 40px; background: #252525;" class="button button-add-to-cart font-neue" onclick="AddToCart({{ $product_data->id }})">ყიდვა</button>
                                    <a aria-label="Add to cart" class="action-btn hover-up" style="background: #2491e0; color: #fff; margin: 0 0 10px 0; height: 40px; width: 43px; line-height: 47px;" onclick="AddToCart({{ $product_data->id }})"><i class="fi-rs-shopping-cart" style="opacity: 1"></i></a>
                                    </div>
                                    <button type="button" style="width: 100%; margin-bottom: 10px; height: 40px; font-size: 13px; line-height: 40px; background: #dedede; color: #252525;" class="button button-add-to-cart font-neue" onclick="AddToCart({{ $product_data->id }})">განვადება</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <div class="product_titles">
                            <div class="title_left_side">
                                <h2 class="font-neue" style="font-size: 18px;">ერთად იაფია</h2>
                            </div>
                        </div>
                        <div class="bundle-cont">
                            <div class="cheaper-content ">
                                <div class="cheaper-items">
                                    <div class="cheaper_items_inside bundle-item cheaper-items-desktop" style="display: flex;">
                                        <div class="js-cheaper-item-outside" style="width: 220px !important;height: 230px;">
                                            <div class="cheaper-item js-bundle-item js-bundle-item-main" data-productId="17950" data-bundleCategoryId="238">
                                                <div class="cheaper-image">
                                                    <img src="https://img.zoommer.ge/zoommer-images/thumbs/0186124_samsung-galaxy-s23-ultra-5g-s918bds-12256gb-green_157.jpeg" />
                                                </div>
                                                <div class="cheaper-description">
                                                    <div>
                                                        <div class="price font-neue">
                                                            3&#xA0;299 ₾
                                                        </div>
                                                        <div class="title">
                                                            Samsung Galaxy S23 Ultra Samsung Galaxy S23 Ultra 5G S918B...
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="js-cheaper-item-outside" style="width: 220px !important;height: 230px;">
                                            <div class="cheaper-item js-bundle-item js-bundle-item-main" data-productId="17950" data-bundleCategoryId="238">
                                                <div class="cheaper-image">
                                                    <img src="https://img.zoommer.ge/zoommer-images/thumbs/0186124_samsung-galaxy-s23-ultra-5g-s918bds-12256gb-green_157.jpeg" />
                                                </div>
                                                <div class="cheaper-description">
                                                    <div>
                                                        <div class="price font-neue">
                                                            3&#xA0;299 ₾
                                                        </div>
                                                        <div class="title">
                                                            Samsung Galaxy S23 Ultra Samsung Galaxy S23 Ultra 5G S918B...
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="js-cheaper-item-outside" style="width: 220px !important;height: 230px;">
                                            <div class="cheaper-item js-bundle-item js-bundle-item-main" data-productId="17950" data-bundleCategoryId="238">
                                                <div class="cheaper-image">
                                                    <img src="https://img.zoommer.ge/zoommer-images/thumbs/0186124_samsung-galaxy-s23-ultra-5g-s918bds-12256gb-green_157.jpeg" />
                                                </div>
                                                <div class="cheaper-description">
                                                    <div>
                                                        <div class="price font-neue">
                                                            3&#xA0;299 ₾
                                                        </div>
                                                        <div class="title">
                                                            Samsung Galaxy S23 Ultra Samsung Galaxy S23 Ultra 5G S918B...
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
                    <div style="margin-bottom: 40px;">
                        <div style="margin-bottom: 0px;">
                            <div class="product_titles" style="margin-bottom: 10px;">
                                <div class="title_left_side">
                                    <h2 class="font-neue" style="font-size: 18px;">{{ $product_data->{"name_" . app()->getLocale()} }}</h2>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                                <br>
                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
                            </p>
                        </div>
                    </div>
                    <div>
                        <div style="margin-bottom: 0px;">
                            <div class="product_titles" style="margin-bottom: 0">
                                <div class="title_left_side">
                                    <h2 class="font-neue" style="font-size: 18px;">დამატებითი მახასიათებლები</h2>
                                </div>
                            </div>
                        </div>
                        <table>
                            <tbody>
                                <tr class="stand-up" style="height: 40px;">
                                    <th class="font-neue" style="border: none; padding: 0; font-weight: bold;">ადექი</th>
                                    <td style="border: none; padding: 0"><p>35″L x 24″W x 37-45″H (წინა უკანა ბორბალი)</p></td>
                                </tr>
                                <tr class="stand-up" style="height: 40px;">
                                    <th class="font-neue" style="border: none; padding: 0; font-weight: bold;">პროცესორის ტიპი</th>
                                    <td style="border: none; padding: 0"><p>Apple M2</p></td>
                                </tr>
                                <tr class="stand-up" style="height: 40px;">
                                    <th class="font-neue" style="border: none; padding: 0; font-weight: bold;">პროცესორის მოდელი</th>
                                    <td style="border: none; padding: 0"><p>M2</p></td>
                                </tr>
                                <tr class="stand-up" style="height: 40px;">
                                    <th class="font-neue" style="border: none; padding: 0; font-weight: bold;">ბირთვების რაოდენობა</th>
                                    <td style="border: none; padding: 0"><p>8</p></td>
                                </tr>
                            </tbody>
                        </table>
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
    
@endsection