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
use App\tblFaculty;
use App\tblBatch;
use App\tblAttendance;

class FacultyController extends Controller
{
    public function facultymanagement()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_faculties')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.facultymanagement', $data);
                }
                else
                {
                    return view('institution.facultymanagement');
                }
            } else { return redirect('/'); }
        }
    }
	public function facultytasklist()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_faculties')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.facultytasklist', $data);
                }
                else
                {
                    return view('institution.facultytasklist');
                }
            } else { return redirect('/'); }
        }
    }
	
    public function newfaculty()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
               
                if(count($data) > 0)
                {
                   return view('institution.newfaculty', $data);
                }
                else
                {
                   return view('institution.newfaculty');
                }
            } else { return redirect('/'); }
        }
    }
    public function postfaculty(Request $req)
    {
        // $this->uservalidation($req);
        // if ($error->fails()) {
            // if(isset($errors)&&count($errors)>0){
            //     return redirect()
            //         ->back()
            //         ->withInput($request->all())
            //         ->withErrors();
            // }
        $email = $req->input('email');
        $pass = $req->input('password');
        $photoName='No Image';
        $time = time();
        // $req['image'] = $photoName;
        tblFaculty::create($req->all());
        // $lastid = DB::getPdo()->lastInsertId();
        // $id=$lastid;
        //     DB::table($table_name)->where(['id' => $lastid])->update(['status' => '1', 'reg_status' => '1', 'ad_create_password' => $pass]);
       
        // Remove empty strings in phone_restrictions array, remove repeated numbers
        // $input = $req->all();
        // if(!empty($req->input('industry_id'))){
        //     foreach ($req->input('industry_id') as $index  => $industry_id) {
        //         if($industry_id!=""){
        //         DB::table('tbl_studentemploymentdetails')->insert([
        //             'student_id' => $lastid,
        //             'industry_id' => $industry_id,
        //             'emp_name' => $req->emp_name[$index],
        //             'emp_address' => $req->emp_address[$index],
        //             'designation' => $req->designation[$index],
        //             'duration' => $req->duration[$index]
                    
        //         ]);
        //         }
        //     }
        // }
        


        //return redirect('/chapter-management')->withErrors(['Course Added Successfully!!']);
        return redirect()->back()->withErrors(['Faculty Added Successfully!!']);
        
    }
    public function chaptervalidation($request)
    {
    	return $this->Validate($request, [
            'course' => 'required',
            'topic' => 'required',
            'chaptername' => 'required',
        ]);
    }
    
    public function viewfaculty($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_faculties')->where('id', '=', $id)->get();
                // $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewfaculty', $data);
                }
                else
                {
                    return view('institution.viewfaculty');
                }
            } else { return redirect('/'); }
        }
    }
	public function facultycourses()
    {
       
$id = Session::get('id');

                $data['data'] = DB::table('tbl_program_faculty_assigns')
				->join('tbl_programs', 'tbl_program_faculty_assigns.program', '=', 'tbl_programs.id')
				->where('tbl_program_faculty_assigns.faculty', '=', $id)->get();
                // $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.facultycourses', $data);
                }
                else
                {
                    return view('institution.facultycourses');
                }
           
    }
	 public function facultystudents()
    {
    	
               $id = Session::get('id');

                

                $data['data'] = DB::table('users')
				->join('tbl_student_batch_assigns', 'tbl_student_batch_assigns.userid', '=', 'users.id')
				->join('tbl_faculty_batch_assigns', 'tbl_faculty_batch_assigns.batchid', '=', 'tbl_student_batch_assigns.batchid')
				->where('tbl_faculty_batch_assigns.userid', '=', $id)
				->where(['type' => '3'])
				->orderBy('users.id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.facultystudents', $data);
                }
                else
                {
                    return view('institution.facultystudents');
                }
            
        }
		public function viewassignmentdetails($userid,$batch)
		{
		$data['data'] = DB::table('tbl_stud_assignments')
		->select('*', 'tbl_stud_assignments.id as stud_as_id')
		->join('tbl_assignments', 'tbl_assignments.id', '=', 'tbl_stud_assignments.as_id')
		->join('tbl_programs', 'tbl_stud_assignments.program_id', '=', 'tbl_programs.id')
		->where(['tbl_stud_assignments.stud_id' => $userid])
		->orderBy('tbl_stud_assignments.id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.studentassignmentdetails', $data);
                }
                else
                {
                    return view('institution.studentassignmentdetails');
                }
		}
		public function facultybatchstudents($batch)
		{
		$data['data'] = DB::table('users')
		->join('tbl_student_batch_assigns', 'tbl_student_batch_assigns.userid', '=', 'users.id')
		->where(['tbl_student_batch_assigns.batchid' => $batch])
		->orderBy('users.id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.facultybatchstudents', $data);
                }
                else
                {
                    return view('institution.facultybatchstudents');
                }
		}
		public function facultybatchstudentsattendance($batch)
		{
		$data['data'] = DB::table('users')
		->join('tbl_student_batch_assigns', 'tbl_student_batch_assigns.userid', '=', 'users.id')
		->where(['tbl_student_batch_assigns.batchid' => $batch])
		->orderBy('users.id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.facultybatchstudentsattendance', $data);
                }
                else
                {
                    return view('institution.facultybatchstudentsattendance');
                }
		}
		public function studentattendancefind($batch,$acdid)
    {
        
            $data1['students'] = DB::table('tbl_student_batch_assigns')->where(['batchid' => $batch])->orderBy('id', 'desc')->get();
			foreach($data1['students'] as $students)
			{
			$appcount = DB::table('tbl_attendance')->where(['student_id' => $students->userid, 'attendance_date' => $acdid])->get(); 
			
			if(count($appcount) > 0)
			{
			
			}
			else
			{
			DB::table('tbl_attendance')->insert(array('student_id' => $students->userid, 'attendance_date' => $acdid, 'status' => '1'));
			}
			} 

                //$data['data'] = DB::table('tbl_attendance')->where(['attendance_date' => $acdid])->orderBy('id', 'desc')->get();
               // $data['acdyear'] = DB::table('tbl_academicyears')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->get();
$data['data'] = DB::table('users')
->select('*','users.id as userid')
		->join('tbl_student_batch_assigns', 'tbl_student_batch_assigns.userid', '=', 'users.id')
		->where(['tbl_student_batch_assigns.batchid' => $batch])
		->orderBy('users.id', 'desc')->get();
                if(count($data) > 0)
                {
                    return view('institution.facultybatchstudentsattendance', $data);
                }
                else
                {
                    return view('institution.facultybatchstudentsattendance');
                }
            
        
    }
	public function facultybatches()
    {
       
$id = Session::get('id');

                $data['data'] = DB::table('tbl_faculty_batch_assigns')
				->join('tbl_batches', 'tbl_faculty_batch_assigns.batchid', '=', 'tbl_batches.id')
				->where('tbl_faculty_batch_assigns.userid', '=', $id)->get();
                // $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.facultybatches', $data);
                }
                else
                {
                    return view('institution.facultybatches');
                }
           
    }
    public function updatefaculty(Request $req)
    {
        
        $id = $req->input('id');
         $userUpdate  =tblFaculty::where('id',$id)->first();
         if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function facultyremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                DB::table('tbl_faculties')->where('id', $id)->delete();

                return redirect('/faculty-management')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
	// Faculty Assign to program starts here

    public function programfacultyassign()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                /*$check = DB::table('tbl_academicyears')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->get();
                $m = 0;
                $acdid = '';
                foreach($check as $object)
                {
                    if($m == 0)
                    {
                        $acdid = $object->id;
                    }
                    $m++;
                }*/

                $data['data'] = DB::table('tbl_faculties')->where(['instid' => $instid])->orderBy('id', 'desc')->get();
               // $data['acdyear'] = DB::table('tbl_academicyears')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.programfacultyassign', $data);
                }
                else
                {
                    return view('institution.programfacultyassign');
                }
            } else { return redirect('/'); }
        }
    }
	// Batch Assign to Faculties

    public function facultyassignbatch($batch)
    {
	
	/*$coursebatch = DB::table('tbl_program_batch_assigns')->select('program')->where(['batch' => $batch])->get();
	
	
	$coursebatch1=$coursebatch[0]->program;*/
	
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
               // $year = date('Y');
               $instid = Auth::user()->instid;
			   $data['data'] = DB::table('tbl_faculties')->where(['instid' => $instid])->orderBy('id', 'desc')->get();
                /*$data['data'] = DB::table('tbl_faculties')
				->join('tbl_program_faculty_assigns', 'tbl_program_faculty_assigns.faculty', '=', 'tbl_faculties.id')
				->where(['tbl_program_faculty_assigns.program' => $coursebatch1])
				->where(['tbl_faculties.instid' => $instid])
				->orderBy('tbl_faculties.id', 'desc')->get();*/
				

                if(count($data) > 0)
                {
                    return view('institution.facultyassignbatch', $data);
                }
                else
                {
                    return view('institution.facultyassignbatch');
                }
            } else { return redirect('/'); }
        }
    }
    public function viewassignfacultydetails($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data['data'] = DB::table('tbl_faculties')->where('id', '=', $id)->get();

                if(count($data) > 0)
                {
                    return view('institution.viewassignfacultydetails', $data);
                }
                else
                {
                    return view('institution.viewassignfacultydetails');
                }
            } else { return redirect('/'); }
        }
    }
    public function facultyassignbatchfind($batch,$year)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_faculties')->where(['instid' => $instid])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.facultyassignbatch', $data);
                }
                else
                {
                    return view('institution.facultyassignbatch');
                }
            } else { return redirect('/'); }
        }
    }
	public function studasremove($id)
    {
       
                $data = DB::table('tbl_stud_assignments')->where('id', '=', $id)->get();

                
                $assignment = '';

                foreach($data as $object)
                {
                   
                    $assignment = $object->assignment;
                }

                
                if($assignment != '')
                {
                    File::delete($assignment);
                }
                

                DB::table('tbl_stud_assignments')->where('id', $id)->delete();
                
                return redirect('/faculty-batches')->withErrors(['Deleted Successfully!!']);
            

    }
	public function facultytasks()
    {
        $id = Session::get('id');

                $data['data'] = DB::table('tbl_writings')
				->join('users', 'tbl_writings.student_id', '=', 'users.id')
				->join('tbl_wprograms', 'tbl_writings.writing_id', '=', 'tbl_wprograms.id')
				->select('*', 'tbl_writings.id as writing_id')
				->where('tbl_writings.faculty_id','=',$id)
				->orderBy('tbl_writings.id', 'asc')->get();
				$data['faculties'] = DB::table('tbl_faculties')->where(['status' => 1])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.facultytasks', $data);
                }
                else
                {
                    return view('institution.facultytasks');
                }
            
    }
	function uploadanswerpdf(Request $req)
	{
	$answer_pdf = $req->file('userImage');
	$mark = $req->input('mark');
	$wsid = $req->input('wsid');

	if($answer_pdf != "")
        {
            $time = time();

            if ($_FILES['userImage']['size'] > 1048576) {
                //return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add File due to large size!!']);
            }
            else
            {
                $add="writing/faculty_pdf/".$time.$_FILES['userImage']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['userImage']['tmp_name'],$add)) 
                {

                    $images[] = $add;
                   		DB::table('tbl_writings')->where(['id' => $wsid])->update(['fanswer_pdf' => $add, 'mark' => $mark]);


                }
                /*else
                {
                    return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add file!!']);
                }*/
            }
            

        }
		return redirect()->back()->withErrors(['Updation completed Successfully!!']);
		
	}
}
