<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblFaq extends Model
{
    protected $fillable = [
        'question', 'answer', 'programid', 'created', 'year', 'instid', 'addedby', 'updatedby', 'updatedon',
    ];
}
