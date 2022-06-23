<?php

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblSystemSettigs extends Model
{
    protected $fillable = [
        'systemname', 'emailcontent', 'smscontent', 'contact', 'email', 'address1', 'address2', 'address3', 'description', 'updated', 'year'
    ];

    public static function systemname($x) 
    {
      $par = "";

      $agents1 = DB::table('tbl_system_settigs')->pluck($x); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
    	}
    	return $par;
    }
    public static function randomcheck($x) 
    {
      $par = "";

      $agents1 = DB::table('users')->where('id', $x)->pluck('random'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }
}
