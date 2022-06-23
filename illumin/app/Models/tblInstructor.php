<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblInstructor extends Model
{
    protected $fillable = [
        'instructorname', 'mobile', 'empcode', 'email','qualification', 'course', 'address', 'description', 'created', 'year', 'instid',
    ];
}
