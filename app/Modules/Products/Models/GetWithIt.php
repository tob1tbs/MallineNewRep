<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetWithIt extends Model
{
    use HasFactory;

    protected $table = "new_get_with_it";

    public function getProduct() {
        return $this->hasOne('App\Modules\Products\Models\Product', 'id', 'product_id');
    }
}
