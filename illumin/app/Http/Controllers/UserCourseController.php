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
use App\Models\tblComments;
use App\Models\tblWprograms;
use App\Models\tblWriting;

//use App\tblDistrict;

class UserCourseController extends Controller
{
    public function home()
    {
        $par = '';

        $agents1 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

        foreach ($agents1 as $agent1=>$value1) {
            $par = $value1;
        }
        $instid = $par;
        
        $data['data'] = DB::table('tbl_programs')->where(['instid' => $instid])->orderBy('id', 'desc')->limit(4)->get();
       
        if(count($data) > 0)
        {
            return view('site.index', $data);
        }
        else
        {
            return view('site.index');
        }
    }
    public function courses()
    {
        $par = '';

        $agents1 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

        foreach ($agents1 as $agent1=>$value1) {
            $par = $value1;
        }
        $instid = $par;

        $data['data'] = DB::table('tbl_programs')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->paginate(9);
        $data['course'] = DB::table('tbl_courses')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->paginate(9);

        if(count($data) > 0)
        {
            return view('student.courses', $data);
        }
        else
        {
            return view('student.courses');
        }
    }
    public function oldcourses()
    {
        $par = '';

        $agents1 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

        foreach ($agents1 as $agent1=>$value1) {
            $par = $value1;
        }
        $instid = $par;

        $data['data'] = DB::table('tbl_programs')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->paginate(9);
        $data['course'] = DB::table('tbl_courses')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->paginate(9);

        if(count($data) > 0)
        {
            return view('site.courses', $data);
        }
        else
        {
            return view('site.courses');
        }
    }

    public function coursefilter($param)
    {
        $par = '';

        $agents1 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

        foreach ($agents1 as $agent1=>$value1) {
            $par = $value1;
        }
        $instid = $par;

        $data['data'] = DB::table('tbl_programs')->where(['course' => $param, 'instid' => $instid])->orderBy('id', 'desc')->paginate(9);
        $data['course'] = DB::table('tbl_courses')->where(['instid' => $instid])->orderBy('id', 'desc')->paginate(9);

        if(count($data) > 0)
        {
            return view('site.courses', $data);
        }
        else
        {
            return view('site.courses');
        }
    }
    public function coursedetails($id)
    {

        $data['data'] = DB::table('tbl_programs')->where(['id' => $id])->get();
        $data['topic'] = DB::table('tbl_program_topics')->where(['program' => $id])->orderBy('display_order', 'asc')->get();

        if(count($data) > 0)
        {
            return view('site.coursedetails', $data);
        }
        else
        {
            return view('site.coursedetails');
        }
    }
    public function courseenroll($regtime)
    {
        $course = '';
        $program = '';
        $par = '';

        $ag2 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

        foreach ($ag2 as $agt2=>$val2) {
            $par = $val2;
        }
        $instid = $par;

        $agents1 = DB::table('tbl_programs')->where(['regtime' => $regtime])->pluck('course', 'id'); 

        foreach ($agents1 as $agent1=>$value1) {
              $course = $value1;
              $program = $agent1;
        }
        

        //$data['data'] = DB::table('tbl_topics')->where(['course' => $course])->get();

        $data['data'] = DB::table('tbl_topics')
                        ->join('tbl_program_topics', 'tbl_topics.id', '=', 'tbl_program_topics.topic')
                        //->join('tbl_program_topics', 'tbl_topics.program', '=', $program)
                        ->select('tbl_topics.*')
                        ->where(['tbl_topics.course' => $course])
                        ->where(['tbl_program_topics.program' => $program])
                        ->where(['tbl_program_topics.instid' => $instid])
                        ->where(['tbl_program_topics.status' => '1'])
                        ->orderBy('tbl_program_topics.display_order', 'asc')->get();

        

        $data['pgm'] = DB::table('tbl_programs')->where(['regtime' => $regtime])->get();

        if(count($data) > 0)
        {
            return view('site.courseenroll', $data);
        }
        else
        {
            return view('site.courseenroll');
        }
    }
 public function coursewritingprogram($regtime)
    {
        $course = '';
        $program = '';
        $par = '';

       $ag2 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

        foreach ($ag2 as $agt2=>$val2) {
            $par = $val2;
        }
        $instid = $par;

        $agents1 = DB::table('tbl_programs')->where(['regtime' => $regtime])->pluck('course', 'id'); 

        foreach ($agents1 as $agent1=>$value1) {
              $course = $value1;
              $program = $agent1;
        }
        

        //$data['data'] = DB::table('tbl_topics')->where(['course' => $course])->get();

        $data['data'] = DB::table('tbl_wprograms')
                        ->join('tbl_subjects', 'tbl_wprograms.subject', '=', 'tbl_subjects.id')
                        //->join('tbl_program_topics', 'tbl_topics.program', '=', $program)
                        ->select('*','tbl_wprograms.id as wid')
                        ->where(['tbl_wprograms.course' => $program])
                       // ->where(['tbl_program_topics.program' => $program])
                        //->where(['tbl_program_topics.instid' => $instid])
                        //->where(['tbl_program_topics.status' => '1'])
                        ->orderBy('tbl_wprograms.id', 'desc')->get();

        

        $data['pgm'] = DB::table('tbl_programs')->where(['regtime' => $regtime])->get();

        if(count($data) > 0)
        {
            return view('site.coursewritingprogram', $data);
        }
        else
        {
            return view('site.coursewritingprogram');
        }
    }

    public function courselearn($pmgidid, $videoidid)
    {
        $course = '';
        $program = "";
        $agents1 = DB::table('tbl_programs')->where(['regtime' => $pmgidid])->pluck('course', 'id'); 

        foreach ($agents1 as $agent1=>$value1) {
            $course = $value1;
            $program = $agent1;
        }
        $instid = Auth::user()->instid;

        //$data['cour'] = DB::table('tbl_topics')->where(['course' => $course])->get();

        $data['cour'] = DB::table('tbl_topics')
                        ->join('tbl_program_topics', 'tbl_topics.id', '=', 'tbl_program_topics.topic')
                        //->join('tbl_program_topics', 'tbl_topics.program', '=', $program)
                        ->select('tbl_topics.*')
                        ->where(['tbl_topics.course' => $course])
                        ->where(['tbl_program_topics.program' => $program])
                        ->where(['tbl_program_topics.instid' => $instid])
                        ->where(['tbl_program_topics.status' => '1'])
                        ->orderBy('tbl_program_topics.display_order', 'asc')->get();


        $data['pgm'] = DB::table('tbl_programs')->where(['regtime' => $pmgidid])->get();
        $data['data'] = DB::table('tbl_videos')->where(['regtime' => $videoidid])->get();
		$userid = Auth::user()->id;
		/*echo $videoidid;
		echo $program;*/
		/* $data['comments'] = DB::table('tbl_comments')
		 ->where(['video_id' => $videoidid])
		 ->where(['user_id' => $userid])
		 ->where(['course_id' => $program])
		 ->orwhere(['userid' => $program])
		 ->get();*/
		// echo "SELECT * FROM tbl_comments where video_id='$videoidid'  and (user_id='$userid' or user_id='23') and course_id='$program'";
		 $data['comments'] = DB::select( DB::raw("SELECT * FROM tbl_comments cm,users u where u.id=cm.user_id and cm.video_id='$videoidid'  and (cm.user_id='$userid' or cm.user_id='23') and cm.course_id='$program'") );
		 
        if(count($data) > 0)
        {
            return view('site.courselearn', $data);
        }
        else
        {
            return view('site.courselearn');
        }
    }
	 public function videocourses()
    {
        $par = '';

        $agents1 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

        foreach ($agents1 as $agent1=>$value1) {
            $par = $value1;
        }
        $instid = $par;

        $data['data'] = DB::table('tbl_programs')->where(['instid' => $instid, 'videoprogram' => '1', 'status' => '1'])->orderBy('id', 'desc')->paginate(9);
        $data['course'] = DB::table('tbl_courses')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->paginate(9);

        if(count($data) > 0)
        {
            return view('site.courses', $data);
        }
        else
        {
            return view('site.courses');
        }
    }
    public function testcourses()
    {
        $par = '';

        $agents1 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

        foreach ($agents1 as $agent1=>$value1) {
            $par = $value1;
        }
        $instid = $par;

        $data['data'] = DB::table('tbl_programs')->where(['instid' => $instid, 'testprogram' => '1', 'status' => '1'])->orderBy('id', 'desc')->paginate(9);
        $data['course'] = DB::table('tbl_courses')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->paginate(9);

        if(count($data) > 0)
        {
            return view('site.courses', $data);
        }
        else
        {
            return view('site.courses');
        }
    }

    // Test Area Starts here

    public function testcoursedetails($id)
    {

        $data['data'] = DB::table('tbl_programs')->where(['id' => $id])->get();
        $data['topic'] = DB::table('tbl_program_topics')->where(['program' => $id])->orderBy('display_order', 'asc')->get();

        if(count($data) > 0)
        {
            return view('site.testcoursedetails', $data);
        }
        else
        {
            return view('site.testcoursedetails');
        }
    }
    public function testenroll($regtime)
    {
        $course = '';
        $program = '';
        $par = '';

        $ag2 = DB::table('users')->where(['center_active' => '1'])->pluck('id'); 

        foreach ($ag2 as $agt2=>$val2) {
            $par = $val2;
        }
        $instid = $par;

        $agents1 = DB::table('tbl_programs')->where(['regtime' => $regtime])->pluck('course', 'id'); 

        foreach ($agents1 as $agent1=>$value1) {
              $course = $value1;
              $program = $agent1;
        }
        

        //$data['data'] = DB::table('tbl_topics')->where(['course' => $course])->get();

        $data['data'] = DB::table('tbl_test_names')
                        ->join('tbl_program_tests', 'tbl_test_names.id', '=', 'tbl_program_tests.test')
                        //->join('tbl_program_topics', 'tbl_topics.program', '=', $program)
                        ->select('tbl_test_names.*')
                        ->where(['tbl_program_tests.program' => $program])
                        ->where(['tbl_program_tests.instid' => $instid])
                        ->where(['tbl_program_tests.status' => '1'])
                        ->orderBy('id', 'asc')->get();

        

        $data['pgm'] = DB::table('tbl_programs')->where(['regtime' => $regtime])->get();

        if(count($data) > 0)
        {
            return view('site.testenroll', $data);
        }
        else
        {
            return view('site.testenroll');
        }
    }
	public function postcomment(Request $req)
    {
       // $this->videovalidation($req);
        
        
		

        tblComments::create($req->all());
        //$pstid = DB::getPdo()->lastInsertId();

       
        //return redirect('/video-management')->withErrors(['Video Added Successfully!!']);
        return redirect()->back()->withErrors(['Comments Added Successfully!!']);
        
    }
	public function writinganswerupload($wid)
    {
       
		//$userid = Auth::user()->id;
        //$states = DB::table('writing_student')->insert(['writing_id' => $wid, 'student_id' => $userid, 'sanswer_pdf' => $date, 'wstatus' => $request->year, 'instid' => $request->instid]);
        //return "Success";
		$data['data'] = DB::table('tbl_wprograms')
                        ->join('tbl_subjects', 'tbl_subjects.id', '=', 'tbl_wprograms.subject')
                        //->join('tbl_program_topics', 'tbl_topics.program', '=', $program)
                        
                        ->where(['tbl_wprograms.id' => $wid]);
                        
                        
		return view('site.writinganswerupload', $data);
    }
	public function answerupload(Request $req)
    {
     
		$answer_pdf = $req->file('userImage');
        $student_id = $req->input('student_id');
		$writing_id = $req->input('writing_id');
		$pgm = $req->input('pgm');
	   $appcount = DB::table('tbl_writings')->where(['student_id' => $student_id],['writing_id' => $writing_id])->get(); 
      
        if(count($appcount) > 0)
        {
		if($answer_pdf != "")
        {
            $time = time();

            if ($_FILES['userImage']['size'] > 1048576) {
                //return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add File due to large size!!']);
            }
            else
            {
                $add="writing/student_pdf/".$time.$_FILES['userImage']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['userImage']['tmp_name'],$add)) 
                {

                    $images[] = $add;
                   		DB::table('tbl_writings')->where(['student_id' => $student_id],['writing_id' => $writing_id])->update(['sanswer_pdf' => $add],['wstatus' => 3]);


                }
                /*else
                {
                    return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add file!!']);
                }*/
            }
            

        }
		}
		
		else
		{

        tblWriting::create($req->all());
        $pstid = DB::getPdo()->lastInsertId();

        

        if($answer_pdf != "")
        {
            $time = time();

            if ($_FILES['userImage']['size'] > 1048576) {
                //return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add File due to large size!!']);
            }
            else
            {
                $add="writing/student_pdf/".$time.$_FILES['userImage']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['userImage']['tmp_name'],$add)) 
                {

                    $images[] = $add;
                    DB::table('tbl_writings')->where('id', $pstid)->update(['sanswer_pdf' => $add]);

                }
                /*else
                {
                    return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add file!!']);
                }*/
            }
            

        }
		}

        //return redirect('/program-management')->withErrors(['Course Added Successfully!!']);
        return redirect('course-writing-program/'.$pgm)->withErrors(['Details Added Successfully!!']);;
        
    }
}
