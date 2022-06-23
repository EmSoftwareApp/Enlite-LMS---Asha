<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblOptionalSubject extends Model
{
    use HasFactory;
    protected $fillable = [
        'optionalsubject', 'created', 'year', 'instid',
    ];
}
