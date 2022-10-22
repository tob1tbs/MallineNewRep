<?php

namespace App\Modules\Dashboard\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Dashboard\Models\InfoParameter;
use App\Modules\Dashboard\Models\SocialParameter;
use App\Modules\Dashboard\Models\Navigation;
use App\Modules\Dashboard\Models\WebParameter;
use App\Modules\Dashboard\Models\Product;
use App\Modules\Dashboard\Models\ProductCategory;
use App\Modules\Dashboard\Models\Slider;
use Auth;

class DashboardController extends Controller
{

    public function __construct() {
        //
    }

    public function actionDashboardSetup(Request $Request) {
    	$WebParameter = new WebParameter();
        $WebParameterData = $WebParameter::find(1);
        
        if($WebParameterData->active == 1) {
        	return redirect()->route('actionDashboardWaiting');
        } else {
			if (view()->exists('dashboard.dashboard_setup')) {

				$WebParameter = new WebParameter();
	            $WebParameterData = $WebParameter::find(1);
	            
	            if($WebParameterData->prestage == 1) {
	            	return redirect()->route('actionDashboardWaiting');
	            } else {
					$InfoParameter = new InfoParameter();
					$InfoParameterData = $InfoParameter::all();

					$data = [
						'info_parameter' => $InfoParameterData,
					];
					return view('dashboard.dashboard_setup', $data);
	            }
			} else {
				abort('404');
			}
		}
    }

    public function actionDashboardWaiting() {
    	if (view()->exists('dashboard.dashboard_waiting')) {

			$data = [
			];

			return view('dashboard.dashboard_waiting', $data);
		} else {
			abort('404');
		}
    }

    public function actionDashboardIndex() {
		if(Auth::check() && Auth::user()->is_admin == 1) {
			
			if (view()->exists('dashboard.dashboard_index')) {
				
				$InfoParameter = new InfoParameter();
				$InfoParameterData = $InfoParameter::all();
				
				$SocialParameter = new SocialParameter();
				$SocialParameterData = $SocialParameter::all();
				
				$Navigation = new Navigation();
				$NavigationData = $Navigation::all();
				
				$Product = new Product();
				$ProductList = $Product::where('deleted_at_int', '!=', 0)->orderBy('id', 'DESC')->get();
				
				$ProductCategory = new ProductCategory();
				$ProductCategoryList = $ProductCategory::where('deleted_at_int', '!=', 0)->where('id', '!=', 1)->where('id', '!=', 2)->get();
				
				$Slider = new Slider();
				$SliderList = $Slider::where('deleted_at_int', '!=', 0)->get();

				$data = [
					'info_parameter' => $InfoParameterData,
					'social_parameter' => $SocialParameterData,
					'dash_navigation_list' => $NavigationData,
					'dash_product_list' => $ProductList,
					'dash_product_category_list' => $ProductCategoryList,
					'dash_slider_list' => $SliderList,
				];
				
				return view('dashboard.dashboard_index', $data);
			} else {
				abort('404');
			}
		}
		else {
			return redirect()->route('actionUsersSignIn');
		}
    }
}