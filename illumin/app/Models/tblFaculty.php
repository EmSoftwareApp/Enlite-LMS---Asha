<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class tblFaculty extends Model
{
    protected $fillable = [
        'fname', 'lname', 'email', 'fbid', 'whatsapp', 'mobile', 'username', 'password', 'qualif','experience','skillset','showcase','instid'
    ];
}