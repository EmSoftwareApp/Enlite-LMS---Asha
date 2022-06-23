<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tblTestQuestion extends Model
{
    protected $fillable = [
        'course', 'program', 'topic', 'chapter', 'question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'explanation', 'correct_answer', 'score', 'difficulty_levels', 'description', 'regtime', 'created', 'year', 'instid', 'addedby', 'updatedby', 'updatedon',
    ];
}
