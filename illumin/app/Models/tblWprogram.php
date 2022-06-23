<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblWprogram extends Model
{
    //
	protected $fillable = [
        'title', 'subject', 'course', 'dop', 'adop', 'dvalidfrom', 'dvalidto', 'uvalidfrom',  'year', 'instid', 'uvalidto', 'regtime', 'addedby', 'updatedby', 'updatedon', 
    ];
}
