<?php

namespace App\Modules\Dashboard\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "new_products";
	
	protected $fillable = ['id', 'name_ge', 'name_en', 'category_id', 'description', 'discount_price', 'discount_percent', 'photo', 'count', 'stock', 'used', 'preorder', 'vendor_id', 'status', 'active', 'facebook', 'deleted_at', 'deleted_at_int', 'root_id'];

    public function getProductGallery() {
        return $this->hasMany('App\Modules\Products\Models\ProductGallery', 'product_id', 'id');
    }

    public function getCategoryData() {
        return $this->hasOne('App\Modules\Products\Models\ProductCategory', 'id', 'category_id');
    }

    public function getProductPrice() {
        return $this->hasOne('App\Modules\Products\Models\ProductPrice', 'product_id', 'id');
    }
}
