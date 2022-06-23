<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'course', 'title', 'message', 'till_date', 'instid',
    ];
}
