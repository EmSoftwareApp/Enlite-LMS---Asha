<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblProgramTopic extends Model
{
    protected $fillable = [
        'topic', 'program', 'created', 'year', 'instid', 'display_order',
    ];
}
