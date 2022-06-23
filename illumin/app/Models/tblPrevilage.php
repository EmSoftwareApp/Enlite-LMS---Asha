<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblPrevilage extends Model
{
    public static function previlagefind($x, $y, $z) 
    {
      $i = 0;

      $agents1 = DB::table('tbl_previlages')->where(['previlage' => $x, 'user' => $y, 'instid' => $z])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $i++;
    	}
    	return $i;
    }
}
