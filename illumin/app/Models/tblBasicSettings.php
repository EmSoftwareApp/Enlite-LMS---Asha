<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class tblBasicSettings extends Model
{
    public static function basettings($x, $y) 
    {
      $i = 0;

      $agents1 = DB::table('tbl_basic_settings')->where(['user' => $x, 'value' => $y])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $i++;
    	}
    	return $i;
    }

    public static function instname($x, $y) 
    {
      $par = '';

      $agents1 = DB::table('users')->where(['id' => $x])->pluck($y); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
    	}
    	return $par;
    }

    // Find Qualification from ID 

    public static function qualificationfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_qualifications')->where(['id' => $x])->pluck('qualification'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // Find Course from ID 

    public static function coursefind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_courses')->where(['id' => $x])->pluck('coursename'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }
	 public static function facultyfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_faculties')->where(['id' => $x])->pluck('fname'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }
public static function subjectfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_subjects')->where(['id' => $x])->pluck('subject'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }
    // Find Topic From ID

    public static function topicfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_topics')->where(['id' => $x])->pluck('topicname'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // Find Chapter From ID

    public static function chapterfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_chapters')->where(['id' => $x])->pluck('chaptername'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // Find Video Details from ID

    public static function videofind($x, $y) 
    {
      $par = '';

      $agents1 = DB::table('tbl_videos')->where(['id' => $x])->pluck($y); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // Find Program From ID

    public static function programfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_programs')->where(['id' => $x])->pluck('programname'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // Find District From ID

    public static function distfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_districts')->where(['id' => $x])->pluck('district'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // Find State From ID

    public static function statefind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_states')->where(['id' => $x])->pluck('state'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // Find Batch name From ID

    public static function batchfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_batches')->where(['id' => $x])->pluck('batchname'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // To find active institutions ID during student regiatration

    public static function activeinst() 
    {
      $par = '';

      $agents1 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // To find designation namefrm ID

    public static function designationfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_designations')->where(['id' => $x])->pluck('designation'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }
	// Find Test Name From ID

    public static function testfind($x) 
    {
      $par = '';

      $agents1 = DB::table('tbl_test_names')->where(['id' => $x])->pluck('testname'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // Find Question Assign Count

    public static function qstfind($qst, $test, $inst) 
    {
      $par = 0;

      $agents1 = DB::table('tbl_test_assigned_questions')->where(['question_no' => $qst, 'testno' => $test, 'instid' => $inst])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par++;
      }
      return $par;
    }
    public static function testquestionfind($qst, $parameter) 
    {
      $par = '';

      $agents1 = DB::table('tbl_test_questions')->where(['id' => $qst])->pluck($parameter); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    public static function assignedqts($qst) 
    {
      /*$par = '';
      $i = 0;
      $instid = Auth::user()->instid;

      $data = DB::table('tbl_test_names')->get();

      foreach($data as $obj)
      {
        $test = $obj->id;

        $agents1 = DB::table('tbl_test_assigned_questions')->where(['testno' => $test, 'question_no' => $qst, 'instid' => $instid])->count(); 

        if($agents1 > 0)
        {
          if($i == '0')
          {
            $par = $obj->testname;
          }
          
          else{
            $par = $par.", ".$obj->testname;
          }
        }
        $i++;
      }*/
      $i = 0;
      $tst = '';
      $par = '';
      
      $instid = Auth::user()->instid;
      $data = DB::table('tbl_test_names')->where(['question_no' => $qst, 'instid' => $instid])->get();
      foreach($data as $obj)
      {
        $agents1 = DB::table('tbl_test_names')->where(['id' => $obj->testno])->pluck('testname');
        foreach ($agents1 as $agent1=>$value1) {
          $tst = $value1;
        }
        if($i == '0')
          {
            $par = $tst;
          }
          
          else{
            $par = $par.", ".$tst;
        }
        $i++;
      }
      return $par;
    }


    // Question find

    public static function qustionfind($id, $field) 
    {
      $par = "";

      $agents1 = DB::table('tbl_test_questions')->where(['id' => $id])->pluck($field); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // Test analysis find

    public static function testanalysisfind_attend($id) 
    {
      $par = 0;

      $agents1 = DB::table('tbl_user_test_details_logs')->where(['logid' => $id, 'attend' => '1'])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par++;
      }
      return $par;
    }
    public static function testanalysisfind_correct($id) 
    {
      $par = 0;

      $agents1 = DB::table('tbl_user_test_details_logs')->where(['logid' => $id, 'attend' => '1', 'status' => '1'])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par++;
      }
      return $par;
    }
    public static function testanalysisfind_wrong($id) 
    {
      $par = 0;

      $agents1 = DB::table('tbl_user_test_details_logs')->where(['logid' => $id, 'attend' => '1', 'status' => '2'])->pluck('id'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par++;
      }
      return $par;
    }

    // Find marks per question

    public static function markperqtn($id) 
    {
      $par = "";

      $agents1 = DB::table('tbl_test_names')->where(['id' => $id])->pluck('totalquestions', 'totalmarks'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1/$agent1;
      }
      return $par;
    }

    public static function pgmregfind($id) 
    {
      $par = "";

      $agents1 = DB::table('tbl_programs')->where(['id' => $id])->pluck('regtime'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
    }

    // My answer

    public static function myanswer($regtime, $no) 
    {
      $par = '';
      $logid = '';

      $data = DB::table('tbl_user_test_logs')->where(['regtime' => $regtime])->get();

      foreach($data as $obj)
      {
        $logid = $obj->id;
      }

      $agents1 = DB::table('tbl_user_test_details_logs')->where(['logid' => $logid, 'question_no' => $no])->pluck('answer');

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
      }
      return $par;
      
    }

    //// Earnings calculation

    public static function janearn($from, $to) 
    {
      $amount = 0;

      $agents1 = DB::table('tbl_payments')->whereBetween('paidon', [$from, $to])->pluck('amount');

      foreach ($agents1 as $agent1=>$value1) {
          $amount = $amount+$value1;
      }
      return $amount;

    }
    
}
