<?php

namespace App\Modules\Dashboard\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebParameter extends Model
{
    use HasFactory;

    protected $table = "new_webparameters";
	
	protected $fillable = ['logotype', 'fb_auth', 'fb_auth_key', 'google_auth', 'google_auth_key', 'smsoffice', 'name_ge', 'name_en'];
}
