<?php

namespace App\Modules\Dashboard\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoParameter extends Model
{
    use HasFactory;

    protected $table = "new_info_parameters";
	
	protected $fillable = ['email', 'phone', 'address'];
}
