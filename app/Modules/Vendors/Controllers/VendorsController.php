<?php

namespace App\Modules\Vendors\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Vendors\Models\Vendor;

use DB;

class VendorsController extends Controller
{

    public function __construct() {
        //
    }

    public function actionVendorsIndex(Request $Request) {
        if (view()->exists('vendors.vendors_index')) {

            $Vendor = new Vendor();
            $VendorsList = $Vendor::where('active', 1)->whereNotNull('data')->where('deleted_at_int', '!=', 0);

            if($Request->has('vendor_search_query')) {
                $VendorsList = $VendorsList->where(DB::raw('lower(json_extract(data, "$.name_ge"))'), 'LIKE', '%'.strtolower($Request->vendor_search_query).'%');
            }

            $VendorsList = $VendorsList->paginate(10);

            $data = [
                'vendors_list' => $VendorsList,
				'vendors_count' => $Vendor::where('active', 1)->whereNotNull('data')->where('deleted_at_int', '!=', 0)->count(),
            ];
            
            return view('vendors.vendors_index', $data);
        } else {
            abort('404');
        }
    }

    public function actionVendorsView() {
        if (view()->exists('vendors.vendors_view')) {

            $data = [
			
            ];
            
            return view('vendors.vendors_view', $data);
        } else {
            abort('404');
        }
    }

    public function actionVendorsGuide() {
        if (view()->exists('vendors.vendors_guide')) {

            $data = [
			
            ];
            
            return view('vendors.vendors_guide', $data);
        } else {
            abort('404');
        }
    }
}
