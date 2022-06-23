<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblVideo extends Model
{
    protected $fillable = [
        'course', 'topic', 'chapter', 'url', 'videocaption', 'description', 'duration_min', 'duration_sec', 'metatitle', 'keywords', 'metadescription', 'created', 'year', 'instid', 'program', 'language', 'regtime', 'addedby', 'updatedby', 'updatedon',
    ];
}
