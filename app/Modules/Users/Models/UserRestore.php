<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRestore extends Model
{
    use HasFactory;

    protected $table = "new_user_restore_codes";
	
	protected $fillable = ['user_id','phone', 'code', 'status'];
}
