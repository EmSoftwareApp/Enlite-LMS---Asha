<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblProgramBatchAssign extends Model
{
    public static function ProgramBatchCount($x, $y) 
    {
      	$i = 0;

     	$agents1 = DB::table('tbl_program_batch_assigns')->where(['program' => $x, 'batch' => $y])->pluck('id'); 

      	foreach ($agents1 as $agent1=>$value1) {
          $i++;
    	}
    	return $i;
    }
}
