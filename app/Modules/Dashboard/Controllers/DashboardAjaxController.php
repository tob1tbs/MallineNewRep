<?php

namespace App\Modules\Dashboard\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Dashboard\Models\InfoParameter;
use App\Modules\Dashboard\Models\SocialParameter;
use App\Modules\Dashboard\Models\Navigation;
use App\Modules\Dashboard\Models\WebParameter;
use App\Modules\Dashboard\Models\Slider;
use App\Modules\Dashboard\Models\Product;
use App\Modules\Dashboard\Models\ProductMeta;
use App\Modules\Dashboard\Models\ProductPrice;
use App\Modules\Users\Models\User;
use App\Modules\Dashboard\Models\ProductGallery;
use Auth;
use Str;
use Response;
use Validator;
use Artisan;
use Carbon\Carbon;
use Hash;

class DashboardAjaxController extends Controller
{

    public function __construct() {
        //
    }
    
    public function sendParameters($data) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://mallline.ge/builder/api/parameters',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($data, JSON_UNESCAPED_UNICODE),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
          ),
        ));
        $response = curl_exec($curl);
        return $response;
    }
    
    public function deleteProducts($Request) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://dashboard.mallline.ge/products/ajax/delete/api',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($Request->all(), JSON_UNESCAPED_UNICODE),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
          ),
        ));
        $response = curl_exec($curl);
        return $response;
    }
    
    public function sendProducts($Request) {    
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://dashboard.mallline.ge/products/ajax/submit/api',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($Request->all(), JSON_UNESCAPED_UNICODE),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
          ),
        ));
        $response = curl_exec($curl);
        return $response;
    }

    public function ajaxDashboardContact(Request $Request) {
        if($Request->isMethod('POST')) {
            
            Artisan::call('storage:link');
            
            foreach($Request->only(['email', 'phone', 'address']) as $info_key => $info_item) {
                $InfoParameter = new InfoParameter();
                $InfoParameter::where('key', $info_key)->update(['value' => $info_item]);
            }
            
            foreach($Request->only(['facebook', 'youtube', 'instagram']) as $social_key => $social_item) {
                $SocialParameter = new SocialParameter();
                $SocialParameter::where('key', $social_key)->update(['value' => $social_item]);
            }
            
            if($Request->has('logotype') && !empty($Request->logotype)) {
                $Logotype = $Request->logotype;
                $LogotypeName =  md5(Str::random(20).time().$Logotype).'.'.$Logotype->getClientOriginalExtension();
                $Logotype->move(public_path('uploads/logotype/'), $LogotypeName);
                
                $WebParameter = new WebParameter();
                $WebParameter::find(1)->update(['logotype' => $LogotypeName]);
            } else {
                $WebParameter = new WebParameter();
                $LogotypeName = $WebParameter::find(1)->logotype;
            }
            
            foreach($Request->only(['fb_auth_key', 'google_auth_key', 'google_auth', 'fb_auth']) as $auth_key => $auth_item) {
                $WebParameter = new WebParameter();
                $WebParameter::find(1)->update([$auth_key => $auth_item]);
            }
            
            
            foreach($Request->only(['name_ge', 'name_en']) as $name_key => $name_item) {
                $WebParameter = new WebParameter();
                $WebParameter::find(1)->update([$name_key => $name_item]);
            }
            
            if($Request->has('sms_office') && !empty($Request->sms_office)) {
                $WebParameter = new WebParameter();
                $WebParameter::find(1)->update(['smsoffice' => $Request->sms_office]);
            }
                
            $data = [
                'host' => $WebParameter::find(1)->host,
                'logotype' => $LogotypeName,
                'email' => $Request->email,
                'phone' => $Request->phone,
                'address' => $Request->address,
                'name_ge' => $Request->name_ge,
                'name_en' => $Request->name_en,
            ];
                        
            return Response::json(['status' => true, 'message' => 'პარამეტრები წარმატებით განახლდა']); 
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან']);
        }
    }
    
    public function ajaxDashboardNavigation(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->navigation_id) && $Request->navigation_id > 1) {

            $Navigation = new Navigation();
            $Navigation::find($Request->navigation_id)->update([
                'active' => $Request->navigation_active,
            ]);

            return Response::json(['status' => true]);

        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!']);
        }
    }
    
    public function ajaxDashboardSliderAdd(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'required' => 'გთხოვთ შეავსოთ ყველა აუცილებელი ველი!!!',
                'slider_photo.required' => 'გთხოვთ აირჩიოთ ფოტო !!!',
            );

            $validator = Validator::make($Request->all(), [
                'slider_small_text_ge' => 'required|max:255',
                'slider_big_text_ge' => 'required|max:255',
                'slider_photo' => 'required|max:255',
            ], $messages);

            if ($validator->fails()) {
                return Response::json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $Array = [
                    'small_text_ge' => $Request->slider_small_text_ge,
                    'small_text_en' => $Request->slider_small_text_en,
                    'big_text_ge' => $Request->slider_big_text_ge,
                    'big_text_en' => $Request->slider_big_text_en,
                ];

                $Slider = new Slider();
                $SliderPhoto = $Slider::updateOrCreate(
                    ['id' => $Request->slider_id],
                    [
                        'id' => $Request->slider_id,
                        'text' => json_encode($Array),
                        'path' => $Request->slider_photo,
                        'is_banner' => $Request->is_banner,
                        'url' => $Request->slider_url,
                    ],
                );
            }

            return Response::json(['status' => true, 'errors' => false, 'message' => 'სურათი წარმატებით დაემატა.']);
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }       
    }
    
    public function ajaxSliderDeletePhoto(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->slider_id)) {
            $Slider = new Slider();
            $Slider::find($Request->slider_id)->update([
                'deleted_at' => Carbon::now(),
                'deleted_at_int' => 0,
            ]);

            return Response::json(['status' => true, 'message' => 'სურათი წარმატებით წაიშალა !!!']);
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }
    
    public function ajaxDashboardProductAdd(Request $Request) {
        if($Request->isMethod('POST')) {
                            
            $messages = array(
                'product_name_ge.required' => 'გთხოვთ შეიყვანოთ პროდუქტის დასახელება',
                'product_category.required' => 'გთხოვთ აირჩიოთ პროდუქტის კატეგორია',
                'product_category.not_in' => 'გთხოვთ აირჩიოთ პროდუქტის კატეგორია',
                'product_meta_keywords_ge.required' => 'გთხოვთ შეიყვანოთ მეტა ქივორდები',
                'product_meta_description_ge.required' => 'გთხოვთ შეიყვანოთ მეტა აღწერა',
                'product_price.required' => 'გთხოვთ შეიყვანოთ პროდუქტის ფასი',
                'product_photo.required' => 'გთხოვთ აირჩიოთ პროდუქტის სურათი',
                'product_count.required' => 'გთხოვთ შეიყვანოთ რაოდენობა',
                'not_in' => 'გთხოვთ აირჩიოთ ყველა აუცილებელი ველი',
            );

            $validator = Validator::make($Request->all(), [
                'product_name_ge' => 'required|max:255',
                'product_category' => 'required|max:255:not_in:0',
                'product_meta_keywords_ge' => 'required|max:255',
                'product_meta_description_ge' => 'required|max:255',
                'product_price' => 'required|max:255|not_in:0',
                'product_photo' => 'required|max:255',
                'product_count' => 'required|max:255',
            ], $messages);

            if ($validator->fails()) {
                return Response::json(['status' => false, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()], 200);
            } else {
                $DescriptionArray = [
                    'ge' => $Request->product_description_ge,
                    'en' => $Request->product_description_en,
                ];

                $Product = new Product();
                $ProductData = $Product::updateOrCreate(
                    ['id' => $Request->product_id],
                    [
                        'id' => $Request->product_id,
                        'name_ge' => $Request->product_name_ge,
                        'name_en' => $Request->product_name_en,
                        'category_id' => $Request->product_category,
                        'description' => json_encode($DescriptionArray),
                        'photo' => $Request->product_photo,
                        'child_category_id' => $Request->product_child_category,
                        'discount_price' => $Request->product_discount_price * 100,
                        'discount_percent' => $Request->product_discount_percent,
                        'count' => $Request->product_count,
                        'stock' => 1,
                        'preorder' => $Request->product_preorder,
                        'status' => 1,
                        'used' => 0,
                    ],
                );
                
                $ProductMeta = new ProductMeta();
                $ProductMeta->product_id = $ProductData->id;

                $MetaKeywordsArray = [
                    'ge' => $Request->product_meta_keywords_ge,
                    'en' => $Request->product_meta_keywords_en,
                ];

                $MetaDescriptionArray = [
                    'ge' => $Request->product_meta_description_ge,
                    'en' => $Request->product_meta_description_en,
                ];
                
                $ProductMeta = new ProductMeta();
                $ProductMeta::updateOrCreate(
                    ['id' => $Request->product_meta_id],
                    ['id' => $Request->product_meta_id, 'product_id' => $ProductData->id, 'keywords' => json_encode($MetaKeywordsArray), 'description' => json_encode($MetaDescriptionArray)],
                );

                $ProductPrice = new ProductPrice();

                if(!empty($Request->product_price)) {
                    $ProductPrice::updateOrCreate(
                        ['id' => $Request->product_price_id],
                        ['id' => $Request->product_price_id, 'product_id' => $ProductData->id, 'price' => $Request->product_price * 100,],
                    );
                } else {
                    $ProductPrice->product_id = $ProductData->id;
                    $ProductPrice->price = 0;
                    $ProductPrice->save();
                }

                if(!empty($Request->product_option)) {
                    foreach($Request->product_option as $OptionKey => $OptionItem) {
                        $ProductOptionItem = new ProductOptionItem();
                        $ProductOptionItem->updateOrCreate(
                            [
                                'id' => $Request->product_option_id[$OptionKey]
                            ],
                            [
                                'id' => $Request->product_option_id[$OptionKey], 
                                'product_id' => $ProductData->id, 
                                'key' => $OptionKey, 
                                'value' => $OptionItem
                            ],
                        );
                    }
                }

                if(!empty($Request->gallery_photo)) {
                    $ProductGallery = new ProductGallery();
                    $ProductGallery::where('product_id', $ProductData->id)->delete();

                    $GalleryPath = explode(',', $Request->gallery_photo);
                    if(count($GalleryPath) <= 5) {

                        foreach($GalleryPath as $GalleryItem) {
                            $ProductGallery = new ProductGallery();
                            $ProductGallery->path = $GalleryItem;
                            $ProductGallery->product_id = $ProductData->id;
                            $ProductGallery->save();
                        }
                    } else {
                        return Response::json(['status' => true, 'errors' => true, 'message' => ['0' => 'დამატებითი სურათების რაოდენობა აღემატება 5ს']]);
                    }
                }
                $Request->request->add(['product_id' => $ProductData->id]);
                
                $this->sendProducts($Request);
                
                $SendResponse = json_decode($this->sendProducts($Request));
                $Product = new Product();
                $Product::find($ProductData->id)->update(['root_id' => $SendResponse->root_id]);
                
                return Response::json(['status' => true, 'message' => 'პროდუქტი წარმატებით დაემატა']);
            }

        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!']);
        }
    }
    
    public function ajaxProductDelete(Request $Request) {
        if($Request->isMethod('POST') && !empty($Request->product_id)) {
            $Product = new Product();
            $Product::find($Request->product_id)->update([
                'deleted_at' => Carbon::now(),
                'deleted_at_int' => 0,
            ]);
            
            return $this->deleteProducts($Request);
            
            return Response::json(['status' => true, 'message' => 'სურათი წარმატებით წაიშალ/.ა !!!']);
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა, გთხოვთ სცადოთ თავიდან !!!']);
        }
    }
    
    public function ajaxApiCreateData(Request $Request) {
        $get_data = json_decode($Request->getContent(), true);
        
        $WebParameter = new WebParameter();
        $WebParameter::find(1)->update(['vendor_id' => $get_data['vendor_inner_id']]);
    }
}
