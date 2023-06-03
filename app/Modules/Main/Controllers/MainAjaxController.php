<?php

namespace App\Modules\Main\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Main\Models\Main;
use App\Modules\Main\Models\Wishlist;
use App\Modules\Main\Models\Compare;
use App\Modules\Main\Models\SearchHistory;
use App\Modules\Products\Models\Product;

use App\Modules\Api\Controllers\PaymentController;

use Cart;
use Auth;
use Session;
use Cookie;
use Response;
use Validator;

use Carbon\Carbon;

class MainAjaxController extends Controller
{

    public function __construct() {
        //
    }

    public function ajaxGeneralAddToCart(Request $Request) {
        if($Request->isMethod('POST')) {
            $Product = new Product();
            $ProductData = $Product::find($Request->product_id);

            if(!empty($ProductData->discount_price)) {
                $Price = $ProductData->discount_price;
            } else {
                $Price = $ProductData->getProductPrice->price;
            }

            if(is_int($Request->quantity)) {
                if(isset($Request->quantity) AND empty($Request->quantity)) {
                    $Quantity = 1;
                } else {
                    $Quantity = $Request->quantity;
                }
            } else {
                $Quantity = 1;
            }

            $checkItem = Cart::get($ProductData->id);

            if(!empty($Quantity) & $ProductData->count < $Quantity) {
                return Response::json(['status' => true, 'errors' => true, 'message' => [0 => 'ნაშთის რაოდენობა ნაკლებია მოთხოვნილზე!']]);
            } 

            else if(!empty($checkItem) && $checkItem->quantity >= $ProductData->count) {
                return Response::json(['status' => true, 'errors' => true, 'message' => [0 => 'ნაშთის რაოდენობა ნაკლებია მოთხოვნილზე!']]);
            }
            
            else{ 

               Cart::add([
                    'id' => $ProductData->id,
                    'name' => $ProductData->name_ge,
                    'price' => $Price / 100,
                    'quantity' => $Quantity,
                    'attributes' => [
                        'photo' => $ProductData->photo,
                        'count' => $ProductData->count,
                    ],
                ]);

                $CartData = Cart::getContent();
                return Response::json([
                    'status' => true, 
                    'errors' => false, 
                    'CartData' => Cart::getContent()->sort(),
                    'CartQuantity' => Cart::getTotalQuantity(),
                    'CartTotal' => Cart::getSubTotal(),
                    'message' => 'პროდუქტი დაემატა კალათაში',
                ]);
            }
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxGeneralClearCart(Request $Request) {
        if($Request->isMethod('POST')) {
            
            Cart::clear();

            return Response::json([
                'status' => true, 
                'CartData' => Cart::getContent(),
                'CartQuantity' => Cart::getTotalQuantity(),
                'CartTotal' => Cart::getSubTotal(),
                'translate' => [
                    'empty_cart' => trans('site.your_cart_is_empty'),
                ],
            ]);
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxGeneralQuantityCart(Request $Request) {
        if($Request->isMethod('POST') & $Request->item_id > 0) {

            $Product = new Product();
            $ProductData = $Product::find($Request->item_id);

            if($ProductData->count < $Request->quantity) {
                return Response::json([
                    'status' => true, 
                    'errors' => true, 
                    'CartData' => Cart::getContent()->sort(),
                    'CartQuantity' => Cart::getTotalQuantity(),
                    'CartTotal' => Cart::getSubTotal(),
                    'ItemCount' => $Request->quantity,
                    'message' => [0 => 'მარაგის რაოდენობა ნაკლებია მოთხოვნილზე!!!']
                ]);
                return Response::json(['status' => true, 'errors' => true, 'message' => [0 => 'მარაგის რაოდენობა ნაკლებია მოთხოვნილზე!!!']]);
            }
            
            Cart::update($Request->item_id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $Request->quantity,
                ],
            ]);

            if($Request->quantity <= 0) {
                Cart::remove($Request->item_id);
            }

            return Response::json([
                'status' => true, 
                'errors' => false, 
                'CartData' => Cart::getContent()->sort(),
                'CartQuantity' => Cart::getTotalQuantity(),
                'CartTotal' => Cart::getSubTotal(),
                'ItemCount' => $Request->quantity,
                'translate' => [
                    'empty_cart' => trans('site.your_cart_is_empty'),
                ],
            ]);
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxGeneralRemoveFromCart(Request $Request) {
        if($Request->isMethod('POST')) {

            Cart::remove($Request->product_id);

            return Response::json([
                'status' => true, 
                'CartData' => Cart::getContent(),
                'CartQuantity' => Cart::getTotalQuantity(),
                'CartTotal' => Cart::getSubTotal(),
                'translate' => [
                    'empty_cart' => trans('site.your_cart_is_empty'),
                ],
            ]);
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxGeneralProductCompare(Request $Request) {
        if($Request->isMethod('POST')) {

            if(Session::missing(['compare_id'])) {
                $CompareSession = md5(time().rand(1111, 9999));
                Session::put(['compare_id' => $CompareSession]);   
            } else {
                $CompareSession = $Request->session()->get('compare_id');
            }
			
            $Compare = new Compare();
            $CompareData = $Compare::where('product_id', $Request->product_id);
            $CompareCount = $Compare;

            if(Auth::check() == true) {
                $CompareData = $CompareData->where('user_id', Auth::user()->id)->where('session_id', $CompareSession);
                $CompareCount = $CompareCount->where('user_id', Auth::user()->id)->where('session_id', $CompareSession);
                $Auth = Auth::user()->id;
            } else {
                $CompareData = $CompareData->where('session_id', $CompareSession);
                $CompareCount = $CompareCount->where('session_id', $CompareSession);
                $Auth = 0;
            }

            $CompareData = $CompareData->where('deleted_at_int', '!=', 0)->get();
            $CompareCount = $CompareCount->where('deleted_at_int', '!=', 0)->get();


            if(count($CompareData) > 0) {
                return Response::json(['status' => true, 'errors' => true, 'message' => [0 => 'აღნიშნული პროდუქტი უკვე დამატაბულია შედარების სიაში!']]);
            } else if(count($CompareCount) >= 4) {
                return Response::json(['status' => true, 'errors' => true, 'message' => 'შესადარებელი პროდუქციის რაოდენობა აღემატება 2 ს, გთხოვთ წაშალოთ ერთი და სცადოთ თავიდან.']);
            } else {
                $Compare = new Compare();
                $Compare->user_id = $Auth;
                $Compare->product_id = $Request->product_id;
                $Compare->session_id = $CompareSession;
                $Compare->save();

                return Response::json(['status' => true, 'errors' => false, 'message' => 'ნივთი წარმატებით დაემატა შედარების სიაში !!!'], 200);
            }

        } else {
            return Response::json(['status' => false, 'errors' => true, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxGeneralProductCompareRemove(Request $Request) {
        if($Request->isMethod('POST')) {

            $Compare = new Compare();
            $Compare::where('product_id', $Request->product_id)->delete();

            return Response::json(['status' => true, 'errors' => false, 'message' => 'ნივთი წარმატებით წაიშალა შედარების სიიდან !!!'], 200);
        } else {
            return Response::json(['status' => false, 'errors' => true, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxMainWishlistAdd(Request $Request) {
        if($Request->isMethod('POST')) {
            if(Auth::check() == true) {

                $Wishlist = new Wishlist();
                $WishlistData = $Wishlist::where('product_id', $Request->product_id)->where('user_id', Auth::user()->id)->where('deleted_at_int', '!=', 0)->get();

                if(count($WishlistData) > 0) {
                    return Response::json(['status' => true, 'errors' => true, 'message' => [0 => 'აღნიშნული პროდუქტი უკვე დამატაბულია სურვილების სიაში!']]);
                } else {
                    $Wishlist = new Wishlist();
                    $Item = $Wishlist::create([
                        'user_id' => Auth::user()->id,
                        'product_id' => $Request->product_id,
                    ]);

                    $WishlistCount = $Wishlist->where('user_id', Auth::user()->id)->where('deleted_at_int', '!=', 0)->get()->count();

                    return Response::json(['status' => true, 'message' => [0 => 'პროდუქტი დაემატა სურვილების სია.'], 'count' => $WishlistCount, 'item_id' => $Item->id]);
                }

            } else {
                return Response::json(['status' => true, 'errors' => true, 'message' => [0 => 'სურვილების სიაში დასამატებლად გთხოვთ გაიაროთ ავტორიზაცია!']]);
            }
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }

    public function ajaxMainWishlistRemove(Request $Request) {
        if($Request->isMethod('POST')) {
            $Wishlist = new Wishlist();
            if($Request->type == 1) {
                $WishlistData = $Wishlist::where('user_id', Auth::user()->id)->where('product_id', $Request->wishlist_id)->update([
                    'deleted_at_int' => 0,
                    'deleted_at' => Carbon::now(),
                ]);
            } else {
                $WishlistData = $Wishlist::find($Request->wishlist_id)->update([
                    'deleted_at_int' => 0,
                    'deleted_at' => Carbon::now(),
                ]);
            }

            $Wishlist = new Wishlist();
            $WishlistCount = $Wishlist->where('deleted_at_int', '!=', 0);

            if(Auth::check() == true) {
                $WishlistCount  = $WishlistCount->where('user_id', Auth::user()->id)->where('deleted_at_int', '!=', 0)->get()->count();
            }

            return Response::json([
                'status' => true, 
                'count' => $WishlistCount, 
                'translate' => [
                    'wishlist_is_empty' => trans('site.wishlist_is_empty'),
                ],
            ]);
        }
    }

    public function ajaxSendContact(Request $Request) {
        if($Request->isMethod('POST')) {
            return Response::json(['status' => true]);
        } else {
            return Response::json(['status' => true, 'redirect_url' => route('actionUsersSignIn')]);
        }
    }

    public function ajaxCheckoutSubmit(
        Request $Request,
        PaymentController $PaymentController
    ) {
        if($Request->isMethod('POST')) {
            $messages = array(

            );
            $validator = Validator::make($Request->all(), [
            ], $messages);

            if ($validator->fails()) {
                return Response::json(['status' => false, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                if($Request->payment_method =='card') {
                    if($Request->card_payment == 'card_bog') {
                        $orderId=  rand(1111, 9999);
                        $Array = [
                           "intent" => "AUTHORIZE", 
                           "redirect_url" => 'https://mallline.io', 
                           "shop_order_id" => $orderId, 
                           "capture_method" => "AUTOMATIC", 
                           "locale" => "ka", 
                           "purchase_units" => [
                                [
                                "amount" => [
                                   "currency_code" => "GEL", 
                                   "value" => 10, 
                                ], 
                                "industry_type" => "ECOMMERCE" 
                                ] 
                              ], 
                            "items" => [], 
                        ];
                        
                        return Response::json([
                            'status' => true, 
                            'redirect' => true,
                            'key' => $Request->payment_method,
                            'array' => $Array,
                            'redirect_url' => $PaymentController->bogCreateOrder($Array, $orderId),
                        ]);
                    }

                    if($Request->card_payment == 'card_tbc') {
                        $Array = [
                           "amount" => [
                                 "currency" => "GEL", 
                                 "total" => 10, 
                                 "subTotal" => 0, 
                                 "tax" => 0, 
                                 "shipping" => 0 
                            ], 
                           "returnurl" => "http://shop.glimtrex.ge/checkout/returntbc", 
                           "userIpAddress" => $_SERVER['REMOTE_ADDR'], 
                           "expirationMinutes" => "5", 
                           "methods" => [
                                    5, 
                                    7, 
                                    8 
                            ], 
                           "callbackUrl" => "http://shop.glimtrex.ge/checkout/returntbc", 
                           "preAuth" => true, 
                           "language" => "GE" 
                        ];
                        return Response::json([
                            'status' => true, 
                            'redirect' => true,
                            'key' => $Request->payment_method,
                            'redirect_url' => $PaymentController->tbcGetPayment($Array)
                        ]);
                    }
                }
            }
        } else {
            return Response::json(['status' => true]);
        }
    }

    public function ajaxSubscribe(Request $Request) {
        $validator = Validator::make($Request->all(), [
            'subscribe_email' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return Response::json(['status' => true, 'errors' => true, 'message' => [0 =>  trans('site.subsctibe_required')]]);
        } else {
            return Response::json(['status' => true, 'errors' => false, 'message' => [0 =>  trans('site.subsctibe_success')]]);
        }
    }

    public function ajaxSearch(Request $Request) {
        if($Request->isMethod('GET')) {
            $Product = new Product();
            $ProductList = $Product::where('name_ge', 'LIKE', '%'.$Request->search_query.'%')
                                    ->orWhere('name_en', 'LIKE', '%'.$Request->search_query.'%')
                                    ->limit(5)
                                    ->get()
                                    ->load(['getCategoryData', 'getProductPrice']);
            if(count($ProductList) > 0) {
                return Response::json(['status' => true, 'errors' => false, 'product_list' => $ProductList]);
            } else {
                return Response::json(['status' => true, 'errors' => true, 'product_list' => []]);
            }
        }
    }

    public function ajaxSearchHistory() {
        if(Auth::check()) {
            $SearchHistory = new SearchHistory();
            $SearchHistoryData = $SearchHistory::where('user_id', Auth::user()->id)->limit(10)->get()->load(['getProductData','getProductData.getCategoryData','getProductData.getProductPrice']);

            return Response::json(['status' => true, 'search_list' => $SearchHistoryData]);
        } else {

        }
    }

    public function ajaxSearchSave(Request $Request) {
        if(Auth::check()) {
            $SearchHistory = new SearchHistory();
            $SearchHistoryData = $SearchHistory::create([
                'user_id' => Auth::user()->id, 'product_id' => $Request->product_id
            ]);
            return Response::json(['status' => true]);
        }
    }
}
