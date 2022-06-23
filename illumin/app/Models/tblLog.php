<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblLog extends Model
{
    //
	protected $fillable = [
        'user_id', 'login_date', 'login_time', 'logout_date', 'logout_time',
    ];
}
