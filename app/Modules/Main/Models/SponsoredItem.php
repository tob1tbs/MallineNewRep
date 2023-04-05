<?php

namespace App\Modules\Main\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsoredItem extends Model
{
    use HasFactory;

    protected $table = "new_sponsored_items";

    public function getProduct() {
        return $this->hasOne('App\Modules\Products\Models\Product', 'id', 'product_id');
    }
}
