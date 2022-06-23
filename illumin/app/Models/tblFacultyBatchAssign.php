<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblFacultyBatchAssign extends Model
{
    use HasFactory;
     public static function FacultyBatchCount($x, $y) 
    {
      $i = 0;
      $agents1 = DB::table('tbl_faculty_batch_assigns')->where(['batchid' => $x, 'userid' => $y])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $i++;
    	}
    	return $i;
    }
	public static function batchdatefind($x, $y) 
    {
      $i = '';

      $agents1 = DB::table('tbl_batches')->where(['id' => $x])->pluck($y); 

      foreach ($agents1 as $agent1=>$value1) {
          $i = $value1;
    	}
    	return $i;
    }
}
