<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblStudentBatchAssign extends Model
{
    public static function StudentBatchCount($x, $y) 
    {
      $i = 0;

      $agents1 = DB::table('tbl_student_batch_assigns')->where(['batchid' => $x, 'userid' => $y])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $i++;
    	}
    	return $i;
    }
    
    // Batch Date find

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
