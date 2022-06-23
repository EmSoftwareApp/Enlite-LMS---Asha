<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblAssignedProgram extends Model
{
    protected $fillable = [
        'prid', 'programid', 'type', 'created', 'year', 'instid',
    ];
}
