<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblFreevideo extends Model
{
    protected $fillable = [
        'course', 'url', 'videocaption', 'description', 'created', 'year', 'instid', 'addedby', 'updatedby', 'updatedon',
    ];
}
