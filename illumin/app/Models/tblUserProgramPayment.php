<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblUserProgramPayment extends Model
{
    protected $fillable = [
        'userid', 'prgrmid', 'payment_type', 'created', 'year'
    ];

    // Check user paid or not

    public static function usercheck($x, $y) 
    {
      $par = 0;
      $batch = '';
      $cnt = 0;
      $date = date('Y-m-d');

      $age1 = DB::table('tbl_program_batch_assigns')->where(['program' => $y, 'status' => '1'])->pluck('batch'); 

      foreach ($age1 as $agen1=>$val1) {
          $batch = $val1;

          $age2 = DB::table('tbl_student_batch_assigns')->where(['batchid' => $batch, 'userid' => $x, 'status' => '1'])->pluck('id'); 
          foreach ($age2 as $agen2=>$val2) {
              $cnt++;
          }
      }

      if($cnt > 0)
      {
        $dt = '';
        $ag3 = DB::table('tbl_user_packages')->where(['batchid' => $batch, 'studentid' => $x])->pluck('pack_ends_on'); 
        foreach ($ag3 as $agn3=>$va2) {

              $dt = $va2;
          }
          if($date <= $dt)
          {
            $par = 1;
          }

          // Purchased Program

          $pa = 0;
          $agents1 = DB::table('tbl_user_program_payments')->where(['userid' => $x, 'prgrmid' => $y, 'status' => '1'])->pluck('id'); 

          foreach ($agents1 as $agent1=>$value1) {
              $pa++;
          }

          if($pa > 0)
          {
            $dt1 = '';
            $ag4 = DB::table('tbl_user_packages')->where(['pgmid' => $y, 'studentid' => $x])->pluck('pack_ends_on'); 
            foreach ($ag4 as $agn4=>$va4) {

                  $dt1 = $va4;
              }
              if($date <= $dt1)
              {
                $par = 1;
              }
          }
        
        return $par;
      }
      else
      {
        $pa = 0;
        $agents1 = DB::table('tbl_user_program_payments')->where(['userid' => $x, 'prgrmid' => $y, 'status' => '1'])->pluck('id'); 

        foreach ($agents1 as $agent1=>$value1) {
            $pa++;
        }

        if($pa > 0)
        {
          $dt = '';
          $ag3 = DB::table('tbl_user_packages')->where(['pgmid' => $y, 'studentid' => $x])->pluck('pack_ends_on'); 
          foreach ($ag3 as $agn3=>$va2) {

                $dt = $va2;
            }
            if($date <= $dt)
            {
              $par = 1;
            }
        }
        return $par;
      }
    }
}
