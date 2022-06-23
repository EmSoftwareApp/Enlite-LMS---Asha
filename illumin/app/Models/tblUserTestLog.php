<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblUserTestLog extends Model
{
    protected $fillable = [
        'pgmid', 'testno', 'totalquestions', 'negativemarks', 'date', 'test_time', 'userid', 'year', 'regtime',
    ];
}
