<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblProgramTest extends Model
{
    protected $fillable = [
        'test', 'program', 'created', 'year', 'instid',
    ];
}
