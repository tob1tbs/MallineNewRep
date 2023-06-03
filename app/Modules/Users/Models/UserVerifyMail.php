<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerifyMail extends Model
{
    use HasFactory;

    protected $table = "new_verify_email";
	
	protected $fillable = ['user_id','hash', 'status'];
}
