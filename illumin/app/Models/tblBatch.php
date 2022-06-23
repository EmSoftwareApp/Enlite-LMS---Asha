<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblBatch extends Model
{
    protected $fillable = [
        'batchname', 'acdyear', 'batchstart', 'batchend', 'noofstudents', 'description', 'instid', 'created', 'year', 'course', 'addedby', 'updatedby', 'updatedon',
    ];

    // Find Academic year from id

    public static function acdyearfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_academicyears')->where(['id' => $x])->pluck('acdyear'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
    	}
    	return $par;
    }
}
