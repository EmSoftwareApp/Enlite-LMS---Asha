<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblProgram extends Model
{
    protected $fillable = [
        'programname', 'programcode', 'course', 'duraion', 'durtype', 'qualification', 'amount', 'about', 'created', 'year', 'instid', 'overview', 'display_order', 'program_status', 'instructor', 'time_hh', 'time_mm', 'time_ss', 'offername', 'offerstart', 'offerend', 'offeramount', 'description', 'regtime', 'addedby', 'updatedby', 'updatedon', 'demovideo', 'videoprogram', 'testprogram',
    ];

    // Find Details from program table using ID

    public static function programfinder($x, $y, $z) 
    {
      $par = '';

      $agents1 = DB::table('tbl_programs')->where([$y => $x])->pluck($z); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    public static function multiprogramfinder($userid, $progrmid) 
    {
      $par = 0;

      $agents1 = DB::table('tbl_user_program_payments')->where(['userid' => $userid, 'prgrmid' => $progrmid])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par++;
      }
      return $par;
    }

    // Batch end date find starts here

    public static function batchendate($batchid, $userid) 
    {
      
      $par = 0;
      $inst = '';

        $ag1 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

        foreach ($ag1 as $ags1=>$val1) {
            $inst = $val1;
        }
        $instid = $inst;

      $agents1 = DB::table('tbl_user_packages')->where(['studentid' => $userid, 'batchid' => $batchid, 'instid' => $instid])->pluck('pack_ends_on'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }
}
