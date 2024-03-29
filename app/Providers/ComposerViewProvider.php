<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

use View;
use Auth;

use App\Modules\Main\Models\Navigation;
use App\Modules\Main\Models\ParameterSocial;
use App\Modules\Main\Models\Wishlist;
use App\Modules\Products\Models\ProductCategory;
use App\Modules\Dashboard\Models\WebParameter;
use App\Modules\Dashboard\Models\InfoParameter;

class ComposerViewProvider extends ServiceProvider
{
    
    public function register()
    {
        //
        $Request = Request();
        View::composer('*', function($view) use ($Request) {

            $Navigation = new Navigation();
            $NavigationList = $Navigation::where('deleted_at_int', '!=', 0)->where('active', 1)->orderBy('sortable', 'ASC')->get();
            
            $ProductCategory = new ProductCategory();
            $ProductCategoryList = $ProductCategory::where('deleted_at_int', '!=', 0)->where('active', 1)->where('id', '!=', 1)->where('parent_id', 0)->orderBy('sortable', 'ASC')->get();
            $ProductCategoryList = $ProductCategory::where('deleted_at_int', '!=', 0)->where('active', 1)->where('id', '!=', 1)->orderBy('id', 'ASC')->get();

            $ParameterSocial = new ParameterSocial();
            $ParameterSocialData = $ParameterSocial::where('deleted_at_int', '!=', 0)->where('active', 1)->get();

            foreach($ParameterSocialData as $ParameterSocialItem) {
                $ParameterArray[$ParameterSocialItem->key] = $ParameterSocialItem->value;
            }
            
            $WebParameter = new WebParameter();
            $WebParameterData = $WebParameter::find(1);

            $InfoParameter = new InfoParameter();
            $InfoParameterData = $InfoParameter::all();

            foreach($InfoParameterData as $InfoItem) {
                $ParameterArray[$InfoItem->key]  = $InfoItem->value;
            }

            if(Auth::check() == true) {
                $Wishlist = new Wishlist();
                $WishlistData = $Wishlist->where('deleted_at_int', '!=', 0)->where('user_id', Auth::user()->id)->where('deleted_at_int', '!=', 0)->get();
                $WishlistIds = [];

                foreach($WishlistData as $WishlistItem) {
                    $WishlistIds[] = $WishlistItem->product_id;
                }

                $view->with('wishlist_count', $WishlistData->count());
                $view->with('wishlist_item_ids', $WishlistIds);
            } else {
                $view->with('wishlist_count', 0);
            }

            $view->with('parametersArray', $ParameterArray);
            $view->with('navigation_list', $NavigationList);
            $view->with('category_list', $ProductCategoryList);
            $view->with('web_data', $WebParameterData);
        });
    }

    
    public function boot()
    {
        //
    }
}
