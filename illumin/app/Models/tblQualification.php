<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblQualification extends Model
{
    protected $fillable = [
        'qualification', 'created', 'year', 'instid',
    ];
}
