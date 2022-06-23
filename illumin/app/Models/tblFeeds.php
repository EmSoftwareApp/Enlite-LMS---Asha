<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblFeeds extends Model
{
    use HasFactory;
    protected $fillable = [
        'category', 'title', 'tumbimage', 'realimage', 'description', 'edescription',
    ];
}
