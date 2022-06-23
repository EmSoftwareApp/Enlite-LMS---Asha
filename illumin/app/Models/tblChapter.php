<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblChapter extends Model
{
    protected $fillable = [
        'course', 'topic', 'chaptername', 'description', 'created', 'year', 'instid', 'addedby', 'updatedby', 'updatedon',
    ];
}
