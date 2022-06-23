<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblTestDifficulty extends Model
{
    protected $fillable = [
        'level', 'shortname', 'instid', 'created', 'year',
    ];
}
