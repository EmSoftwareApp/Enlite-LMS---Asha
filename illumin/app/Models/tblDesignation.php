<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblDesignation extends Model
{
    protected $fillable = [
        'designation', 'created', 'year', 'instid',
    ];
}
