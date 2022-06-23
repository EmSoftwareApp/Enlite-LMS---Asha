<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblWriting extends Model
{
    //
	protected $fillable = [
        'writing_id', 'student_id', 'wstatus', 'ques', 'updated_at', 'created_at'
    ];
}
