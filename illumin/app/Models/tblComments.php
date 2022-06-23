<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblComments extends Model
{
    //
	 protected $fillable = [
        'course_id', 'video_id', 'user_id', 'comments', 'comment_id', 'userid'
    ];
}
