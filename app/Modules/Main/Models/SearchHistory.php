<?php

namespace App\Modules\Main\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory;

    protected $table = "new_search_history";

    protected $fillable = ['user_id', 'product_id'];

    public function getProductData() {
        return $this->hasOne('App\Modules\Products\Models\Product', 'id', 'product_id');
    }
}
