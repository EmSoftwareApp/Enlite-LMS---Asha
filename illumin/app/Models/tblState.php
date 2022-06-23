<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblState extends Model
{
    protected $fillable = [
        'state', 'created', 'year', 'instid',
    ];
}
