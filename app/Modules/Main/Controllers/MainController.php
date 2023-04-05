<?php

namespace App\Modules\Main\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Main\Models\Main;
use App\Modules\Main\Models\Slider;
use App\Modules\Products\Models\Product;
use App\Modules\Main\Models\ParameterSeo;
use App\Modules\Products\Models\ProductLastView;
use App\Modules\Products\Models\ProductCategory;
use App\Modules\Main\Models\Wishlist;
use App\Modules\Main\Models\Compare;
use App\Modules\Main\Models\DeliveryCity;
use App\Modules\Main\Models\PaymentCategory;
use App\Modules\Main\Models\Contact;
use App\Modules\Main\Models\Text;
use App\Modules\Main\Models\SponsoredItem;

use App\Modules\Api\Controllers\OptimoController;

use Cookie;
use Session;
use Auth;
use Cart;

class MainController extends Controller
{

    public function __construct() {
        //
    }

    public function actionMainIndex() {
        if (view()->exists('main.main_index')) {

            $Product = new Product();
            $ProductData = $Product::where('deleted_at_int', '!=', 0)->where('active', 1)->orderBy('id', 'DESC')->get();
			
            $ProductCategory = new ProductCategory();
            $ProductCategoryList = $ProductCategory::where('deleted_at_int','!=', 0)->where('active', 1)->where('parent_id', 0)->where('id', '!=', 1)->get();

            $ParameterSeo = new ParameterSeo();
            $SeoData = $ParameterSeo::find(1);

            $ProductList = [];

            foreach($ProductCategoryList as $Item) {
                $ProductList[$Item->id] = [
                    'id' => $Item->id,
                    'name' => $Item->name,
                    'products' =>  [],
                ];

                foreach($ProductData as $ProductItem) {
                    if($Item->id == $ProductItem->category_id) {
                        $ProductList[$ProductItem->category_id]['products'][] = $ProductItem;
                    }
                }
            }
			
			$PopularProduct = $Product::where('deleted_at_int', '!=', 0)->orderBy('id', 'DESC')->where('active', 1)->max('view');

            $SponsoredItem = new SponsoredItem();
            $SponsoredItemsData = $SponsoredItem::where('deleted_at_int', '!=', 0)->where('active', 1)->get();

            $Slider = new Slider();
            $SliderList = $Slider::where('active', 1)->where('deleted_at_int', '!=', 0)->get();

            if(Auth::check() == true) {
                $ProductLastView = new ProductLastView();
                $ProductLastViewList = $ProductLastView::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->limit(5)->get();
            } else {
                $ProductLastViewList = [];
            }

            $data = [
                'product_list' => $ProductList,
                'seo_data' => $SeoData,
                'slider_list' => $SliderList,
				'unsorted_products' => $ProductData,
				'view_const' => $PopularProduct / 100 * 80,
                'last_view' => $ProductLastViewList,
                'sponsored_items' => $SponsoredItemsData,
            ];
            
            return view('main.main_index', $data);
        } else {
            abort('404');
        }
    }

    public function actionMainCart() {
        //
        if (view()->exists('main.main_cart')) {

            $data = [
                
            ];
            
            return view('main.main_cart', $data);
        } else {
            abort('404');
        }
    }

    public function actionMainAboutUs() {
        //
        if (view()->exists('main.main_about')) {

            $Text = new Text();
            $TextData = $Text::find(1);

            $data = [
                'text_data' => $TextData,
            ];
            
            return view('main.main_about', $data);
        } else {
            abort('404');
        }
    }

    public function actionMainContact() {
        //
        if (view()->exists('main.main_contact')) {

            $Contact = new Contact();
            $ContactList =  $Contact::all();

            foreach($ContactList as $item) {
                $ContactArray[$item->key] = $item->value;
            }

            $data = [
                'contact_data' => $ContactArray,
            ];
            
            return view('main.main_contact', $data);
        } else {
            abort('404');
        }
    }

    public function actionMainHowToBuy() {
        //
        if (view()->exists('main.main_howtobuy')) {

            $data = [
            ];
            
            return view('main.main_howtobuy', $data);
        } else {
            abort('404');
        }
    }

    public function actionMainPrivacy() {
        //
        if (view()->exists('main.main_privacy')) {

            $data = [
            ];
            
            return view('main.main_privacy', $data);
        } else {
            abort('404');
        }
    }

    public function actionMainTerms() {
        //
        if (view()->exists('main.main_terms')) {

            $data = [
            ];
            
            return view('main.main_terms', $data);
        } else {
            abort('404');
        }
    }

    public function actionMainFaq() {
        //
        if (view()->exists('main.main_faq')) {

            $data = [
            ];
            
            return view('main.main_faq', $data);
        } else {
            abort('404');
        }
    }

    public function actionMainWishlist(Request $Request) {
        if (view()->exists('main.main_wishlist')) {

            if(Auth::check() == true) {
                $Wishlist = new Wishlist();
                $WishlistData = $Wishlist->where('user_id', Auth::user()->id)->where('deleted_at_int', '!=', 0)->with('getProductData')->get();
            } else {
                $WishlistData = [];
            }
			
            $data = [
                'wishlist_list' => $WishlistData,
            ];
            
            return view('main.main_wishlist', $data);
        } else {
            abort('404');
        }
    }

    public function actionMainCheckout() {
        if(Auth::check() AND count(Cart::getContent()) > 0) {
            if (view()->exists('main.main_checkout')) {

                $DeliveryCity = new DeliveryCity();
                $DeliveryCityList = $DeliveryCity::where('deleted_at_int', '!=', 0)->where('active', 1)->get();

                $PaymentCategory = new PaymentCategory();
                $PaymentCategoryList = $PaymentCategory::where('deleted_at_int', '!=', 0)->where('active', 1)->get();

                $data = [
                    'city_list' => $DeliveryCityList,
                    'payment_category_list' => $PaymentCategoryList,
                ];
                
                return view('main.main_checkout', $data);
            } else {
                abort('404');
            }
        } else {
            return redirect()->route('actionUsersSignIn');
        }
    }

    public function actionMainCompare(Request $Request) {
        if (view()->exists('main.main_compare')) {

            if(!empty($Request->session()->get('compare_id'))) {
                $CompareSession = $Request->session()->get('compare_id');
            } else {
                $CompareSession = '';
            }

            $Compare = new Compare();
            $CompareData = $Compare->where('deleted_at_int', '!=', 0);

            if(Auth::check() == true) {
                $CompareData  = $CompareData->where('user_id', Auth::user()->id)->orWhere('session_id', $CompareSession);
            } else {
                $CompareData  = $CompareData->where('session_id', $CompareSession);
            }

            $CompareData = $CompareData->get();
            
            $data = [
                'compare_list' => $CompareData,
            ];
            
            return view('main.main_compare', $data);
        } else {
            abort('404');
        }
    }
}
