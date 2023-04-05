<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = "new_product_category";

    public function getProductData() {
        return $this->hasMany('App\Modules\Products\Models\Product', 'category_id', 'id');
    }

    public function getProductCount() {
        return $this->hasMany('App\Modules\Products\Models\Product', 'category_id', 'id');
    }

    public function getProductCountChild() {
        return $this->hasMany('App\Modules\Products\Models\Product', 'child_category_id', 'id');
    }

    public function getProductCountSub() {
        return $this->hasMany('App\Modules\Products\Models\Product', 'sub_category_id', 'id');
    }
}
