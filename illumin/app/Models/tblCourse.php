<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblCourse extends Model
{
    protected $fillable = [
        'coursename', 'courseshortname', 'created', 'year', 'instid', 'addedby', 'updatedby', 'updatedon',
    ];

    public static function totalvideos($progrmid) 
    {
      $par = 0;

      $agents1 = DB::table('tbl_videos')->where(['program' => $progrmid])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par++;
      }
      return $par;
    }
}
