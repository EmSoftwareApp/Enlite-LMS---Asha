<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblDistrict extends Model
{
    protected $fillable = [
        'state', 'district', 'created', 'year', 'instid',
    ];
}
