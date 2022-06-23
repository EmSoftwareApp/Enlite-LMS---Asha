<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblSubject extends Model
{
    //
	protected $fillable = [
        'subject', 'created', 'year', 'instid',
    ];
}
