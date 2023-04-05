<?php

namespace App\Modules\Vendors\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = "new_vendors_host";

    public function vendorProductCount() {
        return $this->hasMany('App\Modules\Products\Models\Product', 'vendor_id', 'id');
    }
}
