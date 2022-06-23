<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblTestName extends Model
{
    protected $fillable = [
        'course', 'testname', 'testshortname', 'totalquestions', 'totaltime', 'totalmarks', 'negativemarks', 'created', 'year', 'instid', 'addedby', 'updatedby', 'updatedon',
    ];
}
