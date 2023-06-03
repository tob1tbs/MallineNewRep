<?php

namespace App\Modules\Products\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\ProductCategory;
use App\Modules\Products\Models\ProductOption;
use App\Modules\Main\Models\ParameterSeo;
use App\Modules\Products\Models\ProductOptionValue;
use App\Modules\Products\Models\ProductBrand;
use App\Modules\Products\Models\ProductLastView;
use App\Modules\Products\Models\GetWithIt;
use App\Modules\Vendors\Models\Vendor;

use Cookie;
use Auth;
use Artisan;
use Session;


class ProductsController extends Controller
{

    public function __construct() {
        //
    }

    public function actionProductsIndex(Request $Request) {
        //
        if (view()->exists('products.products_index')) {

            $ParameterSeo = new ParameterSeo();
            $SeoData = $ParameterSeo::find(2);

            $ProductCategory = new ProductCategory();
            $ProductCategoryList = $ProductCategory::where('deleted_at_int', '!=', 0)->where('id', '!=', 1)->where('active', 1)->get();

            $Product = new Product();
            $ProductAll = $Product::rightJoin('new_product_price', 'new_product_price.product_id', '=', 'new_products.id')->get();
            $ProductList = $Product::select('new_products.*', 'new_product_price.*', 'new_product_price.id as price_id')->where('new_products.deleted_at_int', '!=', 0)->where('new_products.active', 1)->leftJoin('new_product_price', 'new_product_price.product_id', '=', 'new_products.id');
            $ProductOptionList = [];
            $ProductOptionValueList = [];
            $ProductOption = new ProductOption();
            $ProductOptionValue = new ProductOptionValue();

            $ProductBrand = new ProductBrand();
            $ProductBrandList = $ProductBrand::where('deleted_at_int', '!=', 0);

            if(!empty($Request->search_query)) {
                $ProductList = $ProductList->where('new_products.name_ge', 'LIKE', '%'.$Request->search_query.'%')
                                            ->orWhere('new_products.name_en', 'LIKE', '%'.$Request->search_query.'%');
            }

            if(!empty($Request->sale)) {
                $ProductList = $ProductList->whereNotNull('new_products.discount_price');
            }

            if(!empty($Request->category_id)) {
                $ProductList = $ProductList->where('category_id', $Request->category_id);
                $ProductBrandList = $ProductBrandList->where('category_id', $Request->category_id);
            }

            if(!empty($Request->child_category_id)) {
                $ProductList = $ProductList->where('child_category_id', $Request->child_category_id);

                $ProductBrandList = $ProductBrandList->where('child_category_id', $Request->child_category_id);
            }

            if(!empty($Request->sub_category_id)) {
                $ProductList = $ProductList->where('sub_category_id', $Request->sub_category_id);
                $ProductBrandList = $ProductBrandList->where('sub_category_id', $Request->sub_category_id);
                $ProductOptionList = $ProductOption::where('sub_category_id', $Request->sub_category_id)->where('deleted_at_int', '!=', '0')->where('active', 1)->get();
                $ProductOptionValueList = $ProductOptionValue::where('deleted_at_int', '!=', '0')->where('active', 1)->get();
            }

            if($Request->has('vendor')) {
                foreach($Request->vendor as $vendor_key => $vendor_id) {
					if(count($Request->vendor) == 1) {
						$ProductList = $ProductList->where('vendor_id', $vendor_id);
					} else {
						if($vendor_key == 0) {
							$ProductList = $ProductList->where('vendor_id', $vendor_id);
						} else {
							$ProductList = $ProductList->orWhere('vendor_id', $vendor_id);	
						}
					}
				}					
            }

            if(!empty($Request->sort)) {
                if($Request->sort == 'DATE_NEW') {
                    $ProductList = $ProductList->orderBy('new_products.id', 'DESC');
                }

                if($Request->sort == 'DATE_OLD') {
                    $ProductList = $ProductList->orderBy('new_products.id', 'ASC');
                }
            } else {
                $ProductList = $ProductList->orderBy('new_products.id', 'DESC');
            }

            if($Request->has('price_from')) {
                $ProductList = $ProductList->where('new_product_price.price', '>=', $Request->price_from * 100);
            }

            if($Request->has('price_to')) {
                $ProductList = $ProductList->where('new_product_price.price', '<=', $Request->price_to * 100);
            }

            if($Request->has('discounted') && $Request->discounted == 1) {
                $ProductList = $ProductList->where('new_products.discount_price', '!=', 0);
            }

            if($Request->has($Request->price_from)) {
                $ProductList = $ProductList->where('new_products.discount_price', '>=', $Request->price_from * 100);
            }

            if($Request->has($Request->price_to)) {
                $ProductList = $ProductList->where('new_products.discount_price', '<=', $Request->price_to * 100);
            }
 			
            if(!empty($Request->show) && $Request->show != 30) {
                $ProductList = $ProductList->paginate($Request->show);
            } else {
                $ProductList = $ProductList->paginate(30);
				
            }
			
            $ProductBrandList = $ProductBrandList->get();

            $Vendor = new Vendor();
            $VendorList = $Vendor::where('active', 1)->where('deleted_at_int', '!=', 0)->get();

            $data = [
                'product_list' => $ProductList,
                'product_all' => $ProductAll,
                'product_category_list' => $ProductCategoryList,
                'product_brand_list' => $ProductBrandList,
                'product_options_list' => $ProductOptionList,
                'product_options_value_list' => $ProductOptionValueList,
                'product_vendor_list' => $VendorList,
                'seo_data' => $SeoData,
                'show_list' => $this->showList(),
                'sort_list' => $this->sortList(),
            ];
            
            return view('products.products_index', $data);
        } else {
            abort('404');
        }
    }

    public function actionProductsView(Request $Request) {
        if (view()->exists('products.products_view')) {

            $Product = new Product();
            $ProductData = $Product::find($Request->product_id);

            if(Auth::check() == true) {
                $ProductLastView = new ProductLastView();
                $ProductLastViewList = $ProductLastView::where('product_id', $ProductData->id)->where('user_id', Auth::user()->id)->get();
                
                if(count($ProductLastViewList) > 0) {
                   
                } else {
                    $ProductLastView = new ProductLastView();
                    $ProductLastView->product_id = $Request->product_id;
                    $ProductLastView->user_id = Auth::user()->id;
                    $ProductLastView->save();
                }
            }

            $GetWithIt = new GetWithIt();
            $GetWithItData = $GetWithIt::where('parent_id', $Request->product_id)->where('deleted_at_int', '!=', 0)->where('active', 1)->get();

            $data = [
                'product_data' => $ProductData,
                'get_with_it' => $GetWithItData,
            ];
			
			$ProductData->update(['view' => $ProductData->view + 1]);
            
            return view('products.products_view', $data);
        } else {
            abort('404');
        }
    }
}
