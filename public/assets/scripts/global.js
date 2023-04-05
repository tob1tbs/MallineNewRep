function ShowHidePassword(elem, eye) {
    if($('.'+elem).prop("type") == 'password') {
        console.log(1);
        $('.'+elem).prop("type", "text");
        $('.'+eye).removeClass('fi-rs-eye-crossed').addClass('fi-rs-eye');
    } else {
        console.log(2);
        $('.'+elem).prop("type", "password");
        $('.'+eye).removeClass('fi-rs-eye').addClass('fi-rs-eye-crossed');
    }
}

function LoginModal() {
    $("#user_password, #user_email").removeClass('input-error');
    $("#exampleModalCenter").modal('show');
}

function ShowPasswordRestoreModal() {


    const myModalEl = document.getElementById('exampleModalCenter');
    const modal = new mdb.Modal(myModalEl);
    modal.hide();
    
    const myModalE2 = document.getElementById('password_restore_modal');
    const modal2 = new mdb.Modal(myModalE2);
    modal2.show();
}

function AddToCart(product_id) {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/cart/add",
        type: "POST",
        data: {
        	product_id: product_id,
            quantity: parseInt($(".item-quantity-"+product_id).val()),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
                toastr.options = {
                  "closeButton": true,
                  "positionClass": "toast-bottom-right",
                }
                if(data['errors'] == true) {
                     toastr.warning(data['message'][0]);
                } else {
                    $(".header-cart-body, .cart-item-count, .cart-price-total").html('');
                    $(".cart-item-count").append(data['CartQuantity']);
                    $(".cart-price-total").append((data['CartTotal'] / 100).toFixed(2));
                    html = ``;
                    $.each(data['CartData'], function(key, value) {
                    html +=`
                        <div class="comp-product cart-item-`+value['id']+`">
                            <div class="comp-product-remove" onclick="RemoveFromCart(`+value['id']+`)"></div>
                            <div class="comp-product-img" style="background-image: url(`+value['attributes']['photo']+`)">
                            </div>
                            <div class="comp-product-inf">
                                <span style="cursor:pointer;" onclick="location.href = '{{ route('actionProductsView', `+value['id']+`) }}'" class="font-neue">`+value['name']+`</span>
                                <span class="font-neue">`+value['quantity']+` × </span>₾ `+value['price']+`</span>
                            </div>
                        </div>`;
                    });
                    html += `
                    <div>
                        <a href="/cart" class="comp-product-start">
                            სრული კალათა
                        </a>
                        <div class="comp-product-start white" onclick="location.href = '/checkout'">
                            ჩექაუთი
                        </div>
                    </div>
                    <div class="c-circle-right" id="compare-close" onclick="CloseCart()"></div>
                    `;
                    $(".cart-body").html('').append(html);
                    toastr.success(data['message']);
                }
            }
        }
    });
}

function ClearCart() {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/cart/clear",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
                $(".header-cart-body, .cart-item-count, .cart-price-total").html('');
                $(".cart-item-count").append(data['CartQuantity']);
                $(".cart-price-total").append((data['CartTotal']).toFixed(2));
                $(".cart-body").html('').append(`
                    <div class="alert alert-primary text-center" role="alert" style="margin-bottom: 0">`+data['translate']['empty_cart']+`</div>
                `);
                $(".cart-body-s").html('').append(`
                    <div class="container mb-80 mt-50">
                        <div class="alert alert-primary" role="alert">`+data['translate']['empty_cart']+`</div>
                    </div>
                `);
            }
        }
    });
}

function RemoveFromCart(product_id) {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/cart/remove",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            product_id: product_id,
        },
        success: function(data) {
            if(data['status'] == true) {
                $(".cart-item-count, .cart-price-total").html('');
                $(".cart-item-count").append(data['CartQuantity']);
                $(".cart-price-total").append((data['CartTotal']).toFixed(2));
                $(".cart-item-s-"+product_id).remove();
                $(".cart-item-"+product_id).remove();
                if(data['CartData'].length < 1) {
                    $(".cart-body").html('').append(`
                        <div class="alert alert-primary text-center" role="alert" style="margin-bottom: 0">`+data['translate']['empty_cart']+`</div>
                    `);
                    $(".cart-body-s").html('').append(`
                        <div class="container mb-80 mt-50">
                            <div class="alert alert-primary" role="alert">`+data['translate']['empty_cart']+`</div>
                        </div>
                    `);
                }
            }
        }
    });
}

function ProductQuickView(product_id) {
	$.ajax({
        dataType: 'json',
        url: "/main/ajax/quick/",
        type: "GET",
        data: {
        	product_id: product_id,
        },
        success: function(data) {
            $(".quiq-view-heading").html('');
            $(".quick-view-slider").html('');
            $(".quick-view-thumbs").html('');
            $(".quiq-current-price").html('');
            $(".quiq-old-price").html('');
            $(".quantity-quiq").html('');
            $(".sale-percent-badge").html('');
            $(".product-stock-badge").html('');
            if(data['status'] == true) {
                photo_html = `
                <figure class="border-radius-10">
                    <img src="`+data['ProductData']['photo']+`" alt="product image">
                </figure>
                `;

                if(data['ProductData']['discount_price'] > 0) {
                    $(".sale-percent-badge").append(`<span class="stock-status in-stock">`+data['ProductData']['discount_percent']+` %</span>`);
                    $(".quiq-current-price").append(data['ProductData']['discount_price'] / 100+' ₾');
                    $(".quiq-old-price").append(data['ProductData']['get_product_price']['price'] / 100+' ₾');
                } else {
                    $(".quiq-current-price").append(data['ProductData']['get_product_price']['price'] / 100+' ₾');
                }

                thumb_html = `
                    <div><img src="`+data['ProductData']['photo']+`" alt="product image" /></div>
                `;

                if(data['ProductData']['count'] > 0) {
                    $(".quantity-quiq").append(`
                        <div class="detail-qty border radius">
                            <a href="javascript:;" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                            <input type="number" value="1" class="qty-val item-quantity-`+data['ProductData']['id']+`">
                            <a href="javascript:;" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                        </div>
                        <div class="product-extra-link2">
                            <button type="button" class="button button-add-to-cart" onclick="AddToCart(`+data['ProductData']['id']+`)"><i class="fi-rs-shopping-cart"></i>`+data['translate']['add_to_cart']+`</button>
                        </div>
                    `);
                } else {
                    $(".product-stock-badge").append('<span class="stock-status out-stock mb-1" style="color: #f74b81;">'+data['translate']['out_of_stock']+'</span>');
                }
                $.each(data['ProductData']['get_product_gallery'], function(key, value) {
                    photo_html += `
                        <figure class="border-radius-10">
                            <img src="`+value['path']+`" alt="product image">
                        </figure>
                    `;

                    thumb_html += `
                        <div><img src="`+value['path']+`" alt="product image" /></div>
                    `;
                });

                $(".quick-view-slider").append(photo_html);
                $(".quick-view-thumbs").append(thumb_html);
            	$(".quiq-view-heading").append(data['ProductData']['name_ge']);
                $('.detail-qty').each(function () {
                    var qtyval = parseInt($(this).find(".qty-val").val(), 10);

                    $('.qty-up').on('click', function (event) {
                        event.preventDefault();
                        qtyval = qtyval + 1;   
                        $(this).prev().val(qtyval);
                    });

                     $(".qty-down").on("click", function (event) {
                         event.preventDefault(); 
                         qtyval = qtyval - 1;
                         if (qtyval > 1) {
                             $(this).next().val(qtyval);
                         } else {
                             qtyval = 1;
                             $(this).next().val(qtyval);
                         }
                     });
                });

                $('.product-image-slider').slick('unslick').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: false,
                    asNavFor: '.slider-nav-thumbnails',
                });

                $('.slider-nav-thumbnails').slick('unslick').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    asNavFor: '.product-image-slider',
                    dots: false,
                    focusOnSelect: true,
                    
                    prevArrow: '<button type="button" class="slick-prev"><i class="fi-rs-arrow-small-left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="fi-rs-arrow-small-right"></i></button>'
                });

       			$("#quickViewModal").modal('show');
            }
        }
    });
}

function ProductCompare(product_id) {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/compare/add",
        type: "POST",
        data: {
            product_id: product_id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
                if(data['errors'] == true) {
                    toastr.warning(data['message']);   
                } else {
                    toastr.success(data['message']);   
                }
            }
        }
    });
}

function AddToWishlist(product_id) {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/wishlist/add",
        type: "POST",
        data: {
            product_id: product_id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
                if(data['errors'] == true) {
                    toastr.warning(data['message'][0]);   
                } else {
                    $(".wishlist_counter2").html('').append(data['count']);
                    $(".wishlist_counter1").html('').append(data['count']);
                    $(".wishlist-product-item-"+product_id).html('');
                    $(".wishlist-product-item-"+product_id).append(`
                        <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="RemoveFromWishlist(1, `+product_id+`)">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="_x_stroke-1.6 ng-star-inserted _x_stroke-purple _x_fill-purple" id="addWishList_1"><path d="M18.99 6.10136C18.613 5.73919 18.1678 5.45546 17.6803 5.26664C17.1928 5.07781 16.6726 4.98764 16.15 5.00136V5.00136C15.5114 5.00638 14.881 5.14609 14.3 5.41136C13.7186 5.6754 13.2003 6.06067 12.78 6.54136L12.09 7.32136L11.41 6.54136C10.9897 6.06067 10.4714 5.6754 9.89 5.41136C9.31074 5.14103 8.67923 5.00107 8.04 5.00136V5.00136C7.51343 4.99468 6.99052 5.08975 6.5 5.28136C5.76735 5.57769 5.13889 6.08442 4.69396 6.73758C4.24902 7.39075 4.00754 8.16108 4 8.95136C4 11.9014 7.47 14.9514 9 16.2914L9.4 16.6514C10.31 17.4914 11.4 18.4914 12.13 19.0914C12.82 18.4914 13.96 17.4914 14.87 16.6514L15.27 16.2914C16.76 14.9714 20.27 11.8914 20.27 8.94136C20.255 7.88628 19.8237 6.87988 19.07 6.14136L18.99 6.10136Z"></path></svg>
                        </div>
                    `);
                }
            }
        }
    });
}

function RemoveFromCompare(product_id) {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/compare/remove",
        type: "POST",
        data: {
            product_id: product_id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
                location.reload();
            }
        }
    });   
}

function UpdateQuantityPlus(item_id) {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/cart/quantity",
        type: "POST",
        data: {
            quantity: parseInt($(".item-quantity-"+item_id).val()) + 1,
            item_id: item_id ,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $(".detail-qty-overlay").css("visibility", "visible");
        },
        success: function(data) {
            setTimeout(function(){
                $(".detail-qty-overlay").css("visibility", "hidden");
            }, 2500);
            if(data['status'] == true) {
                if(data['CartData'].length < 1) {
                    $(".cart-body").html('').append(`
                        <div class="alert alert-primary text-center" role="alert" style="margin-bottom: 0">`+data['translate']['empty_cart']+`</div>
                    `);
                    $(".cart-body-s").html('').append(`
                        <div class="container mb-80 mt-50">
                            <div class="alert alert-primary" role="alert">`+data['translate']['empty_cart']+`</div>
                        </div>
                    `);
                }

                $(".header-cart-body, .cart-item-count, .cart-price-total, .cart-body-page").html('');
                $(".cart-item-count").append(data['CartQuantity']);
                $(".cart-price-total").append((data['CartTotal'] / 100).toFixed(2));
                html = `<ul class="header-cart-body" style="overflow-y: scroll; max-height: 300px;">`;
                $.each(data['CartData'], function(key, value) {
                html +=`
                    <li class="cart-item-`+value['id']+`">
                        <div class="shopping-cart-img">
                            <a href="products_single.html"><img alt="Molline" src="`+value['attributes']['photo']+`" /></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="products_single.html">`+value['name']+`</a></h4>
                            <h4><span>`+value['quantity']+` × </span>₾ `+value['price']+`</h4>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="javascript:;" onclick="RemoveFromCart(`+value['id']+`)"><i class="fi-rs-cross-small"></i></a>
                        </div>
                    </li>`;

                    $(".cart-body-page").append(`
                        <tr class="pt-30 cart-item-s-`+value['id']+`">
                            <td class="custome-checkbox pl-30"></td>
                            <td class="image product-thumbnail pt-40"><img src="`+value['attributes']['photo']+`" alt="#"></td>
                            <td class="product-des product-name">
                                <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="products_single.html">`+value['name']+`</a></h6>
                                <p class="mt-10">მარაგშია <span class="text-brand">`+value['attributes']['count']+`</span> ერთეული</p>
                            </td>
                            <td class="price" data-title="Price">
                                <h4 class="text-body">₾`+value['price'].toFixed(2)+`</h4>
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                <div class="detail-extralink" style="position: relative;">
                                    <div class="detail-qty border radius">
                                        <a href="javascript:;" onclick="UpdateQuantityMinus(`+value['id']+`)" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="number" value="`+value['quantity']+`" class="qty-val item-quantity-`+value['id']+`">
                                        <a href="javascript:;" onclick="UpdateQuantityPlus(`+value['id']+`)" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="detail-qty-overlay" style="visibility: hidden;"></div>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h4 class="text-brand total-price-`+value['id']+`">₾`+(value['quantity'] * value['price']).toFixed(2)+`</h4>
                            </td>
                            <td class="action text-center" data-title="წაშლა"><a href="javascript:;" onclick="RemoveFromCart(`+value['id']+`)" class="text-body"><i class="fi-rs-trash"></i></a></td>
                        </tr>
                    `);
                    $('.detail-qty').each(function () {
                        var qtyval = parseInt($(this).find(".qty-val").val(), 10);

                        $('.qty-up').on('click', function (event) {
                            event.preventDefault();
                            qtyval = qtyval + 1;   
                            $(this).prev().val(qtyval);
                        });

                         $(".qty-down").on("click", function (event) {
                             event.preventDefault(); 
                             qtyval = qtyval - 1;
                             if (qtyval > 1) {
                                 $(this).next().val(qtyval);
                             } else {
                                 qtyval = 1;
                                 $(this).next().val(qtyval);
                             }
                         });
                    });
                });
                html += `
                </ul>
                <div class="shopping-cart-footer">
                    <div class="shopping-cart-total">
                        <h4>ჯამი: <span class="cart-price-total">₾ `+(data['CartTotal']).toFixed(2)+`</span></h4>
                    </div>
                    <div class="shopping-cart-button">
                        <a href="/cart" class="outline">კალათა</a>
                        <a href="/checkout">ჩექაუთი</a>
                    </div>
                </div>`;
                $(".cart-body").html('').append(html);
            }
        }
    });
}

function UpdateQuantityMinus(item_id) {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/cart/quantity",
        type: "POST",
        data: {
            quantity: parseInt($(".item-quantity-"+item_id).val()) - 1,
            item_id: item_id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function() {
            $(".detail-qty-overlay").css("visibility", "visible");
        },
        success: function(data) {
            setTimeout(function(){
                $(".detail-qty-overlay").css("visibility", "hidden");
            }, 2500);
            if(data['status'] == true) {
                
                if(data['CartData'].length < 1) {
                    $(".cart-body").html('').append(`
                        <div class="alert alert-primary text-center" role="alert" style="margin-bottom: 0">`+data['translate']['empty_cart']+`</div>
                    `);
                    $(".cart-body-s").html('').append(`
                        <div class="container mb-80 mt-50">
                            <div class="alert alert-primary" role="alert">`+data['translate']['empty_cart']+`</div>
                        </div>
                    `);
                }

                $(".header-cart-body, .cart-item-count, .cart-price-total, .cart-body-page").html('');
                $(".cart-item-count").append(data['CartQuantity']);
                $(".cart-price-total").append((data['CartTotal'] / 100).toFixed(2));
                html = `<ul class="header-cart-body" style="overflow-y: scroll; max-height: 300px;">`;
                $.each(data['CartData'], function(key, value) {
                html +=`
                    <li class="cart-item-`+value['id']+`">
                        <div class="shopping-cart-img">
                            <a href="products_single.html"><img alt="Molline" src="`+value['attributes']['photo']+`" /></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="products_single.html">`+value['name']+`</a></h4>
                            <h4><span>`+value['quantity']+` × </span>₾ `+value['price']+`</h4>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="javascript:;" onclick="RemoveFromCart(`+value['id']+`)"><i class="fi-rs-cross-small"></i></a>
                        </div>
                    </li>`;

                    $(".cart-body-page").append(`
                        <tr class="pt-30 cart-item-s-`+value['id']+`">
                            <td class="custome-checkbox pl-30"></td>
                            <td class="image product-thumbnail pt-40"><img src="`+value['attributes']['photo']+`" alt="#"></td>
                            <td class="product-des product-name">
                                <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="products_single.html">`+value['name']+`</a></h6>
                                <p class="mt-10">მარაგშია <span class="text-brand">`+value['attributes']['count']+`</span> ერთეული</p>
                            </td>
                            <td class="price" data-title="Price">
                                <h4 class="text-body">₾`+value['price'].toFixed(2)+`</h4>
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                <div class="detail-extralink" style="position: relative;">
                                    <div class="detail-qty border radius">
                                        <a href="javascript:;" onclick="UpdateQuantityMinus(`+value['id']+`)" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="number" value="`+value['quantity']+`" class="qty-val item-quantity-`+value['id']+`">
                                        <a href="javascript:;" onclick="UpdateQuantityPlus(`+value['id']+`)" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="detail-qty-overlay" style="visibility: hidden;"></div>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h4 class="text-brand total-price-`+value['id']+`">₾`+(value['quantity'] * value['price']).toFixed(2)+`</h4>
                            </td>
                            <td class="action text-center" data-title="წაშლა"><a href="javascript:;" onclick="RemoveFromCart(`+value['id']+`)" class="text-body"><i class="fi-rs-trash"></i></a></td>
                        </tr>
                    `);
                    $('.detail-qty').each(function () {
                        var qtyval = parseInt($(this).find(".qty-val").val(), 10);

                        $('.qty-up').on('click', function (event) {
                            event.preventDefault();
                            qtyval = qtyval + 1;   
                            $(this).prev().val(qtyval);
                        });

                         $(".qty-down").on("click", function (event) {
                             event.preventDefault(); 
                             qtyval = qtyval - 1;
                             if (qtyval > 1) {
                                 $(this).next().val(qtyval);
                             } else {
                                 qtyval = 1;
                                 $(this).next().val(qtyval);
                             }
                         });
                    });
                });
                html += `
                </ul>
                <div class="shopping-cart-footer">
                    <div class="shopping-cart-total">
                        <h4>ჯამი: <span class="cart-price-total">₾ `+(data['CartTotal']).toFixed(2)+`</span></h4>
                    </div>
                    <div class="shopping-cart-button">
                        <a href="/cart" class="outline">კალათა</a>
                        <a href="/checkout">ჩექაუთი</a>
                    </div>
                </div>`;
                $(".cart-body").html('').append(html);
            }
        }
    });
}


function RemoveFromWishlist(type = null, wishlist_id, product_id) {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/wishlist/remove",
        type: "POST",
        data: {
            wishlist_id: wishlist_id,
            type: type,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
                $(".wishlist_counter2").html('').append(data['count']);
                $(".wishlist_counter1").html('').append(data['count']);
                if(data['count'] == 0) {
                    $(".wishlist-content").html(`
                        <div class="container mb-80 mt-50">
                            <div class="alert alert-primary" role="alert">`+data['translate']['wishlist_is_empty']+`</div>
                        </div>
                    `);
                }
                $(".wishlist-product-item-"+wishlist_id).html('');
                $(".wishlist-product-item-"+wishlist_id).append(`
                    <div style="position: absolute; top: 15px; right: 15px; cursor: pointer;" href="javascript:;" onclick="AddToWishlist(`+wishlist_id+`)">
                        <img src="https://mallline.io/assets/imgs/theme/icons/icon-heart.svg" width="18" height="18">
                    </div>
                `);
                $(".wishlist-item-"+wishlist_id).remove();
            }
        }
    });   
}

function SubscribeButton() {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/subscribe",
        type: "POST",
        data: {
            subscribe_email: $("#subscribe_email").val(),
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            if(data['status'] == true) {
                if(data['errors'] == true) {
                    toastr.warning(data['message'][0]);   
                } else {
                    toastr.success(data['message'][0]);   
                }
            }
        }
    }); 
}

$(".search_query").keyup(function() {
    if($(this).val().length >= 3) {
        $.ajax({
            dataType: 'json',
            url: "/main/ajax/search",
            type: "GET",
            data: {
                search_query: $(this).val(),
            },
            success: function(data) {
                if(data['status'] == true) {
                    if(data['product_list'].length > 0) {
                        $(".navbar-search__results").html('');
                        $.each(data['product_list'], function(key, value) {
                            if(value['get_product_price'] != null) {
                                $(".navbar-search__results").append(`
                                    <a href="/products/view/`+value['id']+`" class="navbar-search__item" onclick="SaveSearchHistory(`+value['id']+`)">
                                        <span class="navbar-search__item-img">
                                            <img src="`+value['photo']+`" alt="">
                                        </span>
                                        <div class="navbar-search__item-info">
                                            <h2>`+value['name_ge']+`</h2>
                                            <p style="font-size: 12px;">`+jQuery.parseJSON(value['get_category_data']['name'])['ge']+`</p>
                                        </div>
                                        <div class="navbar-search__item-price">`+value['get_product_price']['price'] / 100+` ₾</div>
                                    </a>
                                `);
                            }
                        });
                        $("#ajaxsearchcontent").show();
                    } else {
                        $(".navbar-search__results").html('');
                        $(".navbar-search__results").append(`
                            <span class="navbar-search__notfound font-neue">შენი საძიებო სიტყვა ვერ ვიპოვეთ ☹️</span>
                            <span class="navbar-search__notfound_text">დარწმუნდი, რომ ბრენდისა და მოდელის სახელს სწორად წერ.</span>
                        `);
                        $("#ajaxsearchcontent").show();
                    }
                }
            }
        });
    } else {
        $("#ajaxsearchcontent").hide();
    }
});

$(".search_query").click(function() {
    if($(this).val().length >= 3) {
        $.ajax({
            dataType: 'json',
            url: "/main/ajax/search",
            type: "GET",
            data: {
                search_query: $(this).val(),
            },
            success: function(data) {
                if(data['status'] == true) {
                    if(data['product_list'].length > 0) {
                        $(".navbar-search__results").html('');
                        $.each(data['product_list'], function(key, value) {
                            if(value['get_product_price'] != null) {
                                $(".navbar-search__results").append(`
                                    <a href="/products/view/`+value['id']+`" class="navbar-search__item" onclick="SaveSearchHistory(`+value['id']+`)">
                                        <span class="navbar-search__item-img">
                                            <img src="`+value['photo']+`" alt="">
                                        </span>
                                        <div class="navbar-search__item-info">
                                            <h2>`+value['name_ge']+`</h2>
                                            <p>`+jQuery.parseJSON(value['get_category_data']['name'])['ge']+`</p>
                                        </div>
                                        <div class="navbar-search__item-price">`+value['get_product_price']['price'] / 100+`₾</div>
                                    </a>
                                `);
                            }
                        });
                        $("#ajaxsearchcontent").show();
                    } else {
                        $(".navbar-search__results").html('');
                        $(".navbar-search__results").append(`
                            <span class="navbar-search__notfound font-neue">შენი საძიებო სიტყვა ვერ ვიპოვეთ ☹️</span>
                            <span class="navbar-search__notfound_text">დარწმუნდი, რომ ბრენდისა და მოდელის სახელს სწორად წერ.</span>
                        `);
                        $("#ajaxsearchcontent").show();
                    }
                }
            }
        });
    } else {
        $.ajax({
            dataType: 'json',
            url: "/main/ajax/search/history",
            type: "GET",
            data: {
            },
            success: function(data) {
                if(data['status'] == true) {
                    if(data['search_list'].length > 0) {
                        $(".navbar-search__results").html('');
                        $.each(data['search_list'], function(key, value) {
                                $(".navbar-search__results").append(`
                                    <a href="/products/view/`+value['get_product_data']['id']+`" class="navbar-search__item" onclick="SaveSearchHistory(`+value['get_product_data']['id']+`)">
                                        <span class="navbar-search__item-img">
                                            <img src="`+value['get_product_data']['photo']+`" alt="">
                                        </span>
                                        <div class="navbar-search__item-info">
                                            <h2>`+value['get_product_data']['name_ge']+`</h2>
                                            <p>`+jQuery.parseJSON(value['get_product_data']['get_category_data']['name'])['ge']+`</p>
                                        </div>
                                        <div class="navbar-search__item-price">`+value['get_product_data']['get_product_price']['price'] / 100+`₾</div>
                                    </a>
                                `);
                            });
                        $("#ajaxsearchcontent").show();
                    } else {
                        $(".navbar-search__results").html('');
                        $(".navbar-search__results").append(`
                            <span class="navbar-search__notfound font-neue">ძებნის ისტორია ცარიელია</span>
                        `);
                        $("#ajaxsearchcontent").show();
                    }
                }
            }
        });
    }
});

function SaveSearchHistory(product_id) {
    $.ajax({
        dataType: 'json',
        url: "/main/ajax/search/save",
        type: "POST",
        data: {
            product_id: product_id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
            
        }
    });
}