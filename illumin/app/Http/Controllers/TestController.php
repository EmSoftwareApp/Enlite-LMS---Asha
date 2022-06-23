<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;
use DB;
use View;
use Session;
use Auth;
use File;
use App\tblTestQuestion;
use App\tblProgramTest;
use App\tblUserTestLog;

class TestController extends Controller
{
    public function testquestions(Request $req)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
            	$req->session()->put('course','');
		        $req->session()->put('program', '');
		        $req->session()->put('topic', '');
		        $req->session()->put('chapter', '');

                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_test_questions')->where(['instid' => $instid])->orderBy('id', 'desc')->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.testquestions', $data);
                }
                else
                {
                    return view('institution.testquestions');
                }
            } else { return redirect('/'); }
        }
    }
    public function newquestions()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['diff'] = DB::table('tbl_test_difficulties')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
               
                if(count($data) > 0)
                {
                   return view('institution.newquestions', $data);
                }
                else
                {
                   return view('institution.newquestions');
                }
            } else { return redirect('/'); }
        }
    }
    public function postquestions(Request $req)
    {
        $this->questionvalidation($req);

        $course = $req->input('course');
        $program = $req->input('program');
        $topic = $req->input('topic');
        $chapter = $req->input('chapter');
        
        tblTestQuestion::create($req->all());

        $req->session()->put('course',$course);
        $req->session()->put('program', $program);
        $req->session()->put('topic',$topic);
        $req->session()->put('chapter', $chapter);

        //session()->get('userid')

        return redirect()->back()->withErrors(['Question Added Successfully!!']);
        
    }
    public function questionvalidation($request)
    {
        return $this->Validate($request, [
            'course' => 'required',
            'program' => 'required',
            'topic' => 'required',
            'chapter' => 'required',
            'question' => 'required',
            'answer_a' => 'required',
            'answer_b' => 'required',
            'answer_c' => 'required',
            'answer_d' => 'required',
            'correct_answer' => 'required',
            'score' => 'required',
        ]);
    }
    public function viewquestions($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {   
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_test_questions')->where(['id' => $id, 'instid' => $instid])->get();

                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['diff'] = DB::table('tbl_test_difficulties')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewquestions', $data);
                }
                else
                {
                    return view('institution.viewquestions');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatequestions(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblTestQuestion::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function removequestions($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                DB::table('tbl_test_questions')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/test-questions')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }

    // Test assign for Program

    public function testprogrmassign($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['pgm'] = DB::table('tbl_programs')->where(['status' => '1', 'testprogram' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['pgmtest'] = DB::table('tbl_program_tests')->where(['test' => $id, 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.testprogrmassign', $data);
                }
                else
                {
                    return view('institution.testprogrmassign');
                }
            } else { return redirect('/'); }
        }
    }

    public function posttestprogram(Request $req)
    {
        //$this->topicvalidation($req);

        $test = $req->input('test');
        $program = $req->input('program');
        $instid = Auth::user()->instid;

        

            if(($test != '') && ($program != ''))
            {
                $entry = DB::table('tbl_program_tests')->where(['test' => $test, 'program' => $program, 'instid' => $instid])->get(); 
                if(count($entry) == 0)
                {
                    tblProgramTest::create($req->all());

                    return redirect()->back()->withErrors(['Assigned Successfully!!']);
                }
                else{
                    return redirect()->back()->withErrors(['Combination Already Present!!']);
                }

            }
            else
            {
                return redirect()->back()->withErrors(['Test name & Program Required!!']);
            }
        
    }

    public function testprogramremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                DB::table('tbl_program_tests')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect()->back()->withErrors(['Removed Successfully!!']);
            } else { return redirect('/'); }
        }
    }
    public function questionsassigned(Request $req, $id)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_test_assigned_questions')->where(['instid' => $instid, 'testno' => $id])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.questionsassigned', $data);
                }
                else
                {
                    return view('institution.questionsassigned');
                }
            } else { return redirect('/'); }
        }
    }
    public function testquestionassign(Request $req)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                /*$req->session()->put('course','');
                $req->session()->put('program', '');
                $req->session()->put('topic', '');
                $req->session()->put('chapter', '');*/

                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_test_questions')->where(['instid' => $instid])->orderBy('id', 'desc')->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['pgm'] = DB::table('tbl_programs')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.testquestionassign', $data);
                }
                else
                {
                    return view('institution.testquestionassign');
                }
            } else { return redirect('/'); }
        }
    }
     public function viewassignquestions($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {   
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_test_questions')->where(['id' => $id, 'instid' => $instid])->get();

                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['diff'] = DB::table('tbl_test_difficulties')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewassignquestions', $data);
                }
                else
                {
                    return view('institution.viewassignquestions');
                }
            } else { return redirect('/'); }
        }
    }
    public function assignedquestionremove($id, $testno)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                DB::table('tbl_test_assigned_questions')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/questions-assigned/'.$testno)->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
    public function findquestionassign(Request $req, $qtn, $pgm)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $req->session()->put('course','');
                $req->session()->put('program', '');
                $req->session()->put('topic', '');
                $req->session()->put('chapter', '');

                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_test_questions')->where(['instid' => $instid, 'program' => $pgm])->orderBy('id', 'desc')->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['pgm'] = DB::table('tbl_programs')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.testquestionassign', $data);
                }
                else
                {
                    return view('institution.testquestionassign');
                }
            } else { return redirect('/'); }
        }
    }
    public function assignallquestions(Request $req, $test, $pgm)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {

                $instid = Auth::user()->instid;
                $date = date('Y-m-d');

                $data = DB::table('tbl_test_questions')->where(['instid' => $instid, 'program' => $pgm])->orderBy('id', 'desc')->get();
                foreach($data as $obj)
                {
                    $entry = DB::table('tbl_test_assigned_questions')->where(['question_no' => $obj->id, 'testno' => $test, 'instid' => $instid])->get(); 
        
                    if(count($entry) == 0)
                    {
                        $states = DB::table('tbl_test_assigned_questions')->insert(['question_no' => $obj->id, 'testno' => $test, 'instid' => $instid, 'date' => $date]);
                    }
                    
                }


                $data['data'] = DB::table('tbl_test_questions')->where(['instid' => $instid, 'program' => $pgm])->orderBy('id', 'desc')->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['pgm'] = DB::table('tbl_programs')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.testquestionassign', $data);
                }
                else
                {
                    return view('institution.testquestionassign');
                }
            } else { return redirect('/'); }
        }
    }

    public function test($pmgidid, $testid)
    {
        /*if (!Auth::check()) { return redirect('/'); } else {
            if(Auth::user()->type == 3)
            {*/
                $course = '';
                $program = "";
                $agents1 = DB::table('tbl_programs')->where(['regtime' => $pmgidid])->pluck('course', 'id'); 

                foreach ($agents1 as $agent1=>$value1) {
                    $course = $value1;
                    $program = $agent1;
                }
                $instid = Auth::user()->instid;

                //$data['cour'] = DB::table('tbl_topics')->where(['course' => $course])->get();

                $data['data'] = DB::table('tbl_test_assigned_questions')
                                ->where(['testno' => $testid, 'instid' => $instid])
                                ->orderBy('id', 'asc')->get();
                $data['test'] = DB::table('tbl_test_names')->where(['id' => $testid, 'instid' => $instid])
                                ->get();


                if(count($data) > 0)
                {
                    return view('site.test', $data);
                }
                else
                {
                    return view('site.test');
                }
            /*} else { return redirect('/'); }
        }*/
    }

    public function posttest(Request $req)
    {
        date_default_timezone_set("Asia/Kolkata"); //India time (GMT+5:30) echo date('d-m-Y H:i:s')
        $totalquestions = $req->input('totalquestions');
        /*$negativemarks = $req->input('negativemarks');
        $date = date('Y-m-d');*/
        $test_time = date("H:i");
        
        $req['test_time'] = $test_time;
        $req['regtime'] = time();

        tblUserTestLog::create($req->all());
        $pstid = DB::getPdo()->lastInsertId();
               
        for($i=1; $i<=$totalquestions; $i++)
        {
            $question_no = $req->input('question_no'.$i);
            $option = $req->input('option'.$i);
            $correctanswer = $req->input('correctanswer'.$i);

            if($option == '') { $status = '0'; }
            if($option == $correctanswer) { $status = '1'; } else { $status = '2'; }

            if($option == '') { $attend = '0'; } else { $attend = '1'; }
 
            DB::table('tbl_user_test_details_logs')->insert(['logid' => $pstid, 'question_no' => $question_no, 'answer' => $option, 'correct_answer' => $correctanswer, 'status' => $status, 'attend' => $attend]);
        }

        $data['data'] = DB::table('tbl_user_test_logs')->where(['id' => $pstid])->get();

        if(count($data) > 0)
        {
            return view('site.testanalysis', $data);
        }
        else
        {
            return view('site.testanalysis');
        }
    }

    // Test Review Starts here

    public function testreview($regtime)
    {
        /*if (!Auth::check()) { return redirect('/'); } else {
            if(Auth::user()->type == 3)
            {*/
                $testid = "";
                $agents1 = DB::table('tbl_user_test_logs')->where(['regtime' => $regtime])->pluck('testno'); 

                foreach ($agents1 as $agent1=>$value1) {
                    $testid = $value1;
                }
                $instid = Auth::user()->instid;

                //$data['cour'] = DB::table('tbl_topics')->where(['course' => $course])->get();

                $data['data'] = DB::table('tbl_test_assigned_questions')
                                ->where(['testno' => $testid, 'instid' => $instid])
                                ->orderBy('id', 'asc')->get();
                $data['test'] = DB::table('tbl_test_names')->where(['id' => $testid, 'instid' => $instid])
                                ->get();


                if(count($data) > 0)
                {
                    return view('site.testreview', $data);
                }
                else
                {
                    return view('site.testreview');
                }
            /*} else { return redirect('/'); }
        }*/
    }
}
