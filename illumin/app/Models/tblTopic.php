<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblTopic extends Model
{
    protected $fillable = [
        'topicname', 'course', 'description', 'created', 'year', 'instid', 'addedby', 'updatedby', 'updatedon',
    ];
}
