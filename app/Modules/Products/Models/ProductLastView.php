<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLastView extends Model
{
    use HasFactory;

    protected $table = "new_product_last_view";
	
	protected $fillable = [
        'product_id',
        'user_id',
    ];

    public function getProduct() {
        return $this->hasOne('App\Modules\Products\Models\Product', 'id', 'product_id');
    }
}
