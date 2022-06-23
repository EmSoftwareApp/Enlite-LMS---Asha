<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblZoomMeetings extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic_name', 'zoom_hours', 'zoom_minutes', 'start_date', 'zoom_id', 'passcode', 'link', 'description', 'batch', 'instid',
    ];
}
