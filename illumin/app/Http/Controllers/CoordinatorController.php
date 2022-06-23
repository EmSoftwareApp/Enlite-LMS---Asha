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
use App\tblCoordinator;
use App\tblBatch;
use App\tblAttendance;

class CoordinatorController extends Controller
{
    public function coordinatormanagement()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_coordinators')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.coordinatormanagement', $data);
                }
                else
                {
                    return view('institution.coordinatormanagement');
                }
            } else { return redirect('/'); }
        }
    }
	public function coordinatortask()
    {
        

                $data['data'] = DB::table('tbl_writings')
				->join('users', 'tbl_writings.student_id', '=', 'users.id')
				->join('tbl_wprograms', 'tbl_writings.writing_id', '=', 'tbl_wprograms.id')
				->select('*', 'tbl_writings.id as writing_id')
				->orderBy('tbl_writings.id', 'asc')->get();
				$data['faculties'] = DB::table('tbl_faculties')->where(['status' => 1])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.coordinatortasks', $data);
                }
                else
                {
                    return view('institution.coordinatortasks');
                }
            
    }
    public function newcoordinator()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
               
                if(count($data) > 0)
                {
                   return view('institution.newcoordinator', $data);
                }
                else
                {
                   return view('institution.newcoordinator');
                }
            } else { return redirect('/'); }
        }
    }
    public function postcoordinator(Request $req)
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
        tblCoordinator::create($req->all());
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
        return redirect()->back()->withErrors(['Coordinator Added Successfully!!']);
        
    }
    public function chaptervalidation($request)
    {
    	return $this->Validate($request, [
            'course' => 'required',
            'topic' => 'required',
            'chaptername' => 'required',
        ]);
    }
    
    public function viewcoordinator($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_coordinators')->where('id', '=', $id)->get();
                // $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewcoordinator', $data);
                }
                else
                {
                    return view('institution.viewcoordinator');
                }
            } else { return redirect('/'); }
        }
    }
	public function coordinatorcourses()
    {
       
$id = Session::get('id');

                $data['data'] = DB::table('tbl_program_coordinator_assigns')
				->join('tbl_programs', 'tbl_program_coordinator_assigns.program', '=', 'tbl_programs.id')
				->where('tbl_program_coordinator_assigns.coordinator', '=', $id)->get();
                // $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.coordinatorcourses', $data);
                }
                else
                {
                    return view('institution.coordinatorcourses');
                }
           
    }
	 public function coordinatorstudents()
    {
    	
               $id = Session::get('id');

                

                $data['data'] = DB::table('users')
				->join('tbl_student_batch_assigns', 'tbl_student_batch_assigns.userid', '=', 'users.id')
				->join('tbl_coordinators_batch_assigns', 'tbl_coordinators_batch_assigns.batchid', '=', 'tbl_student_batch_assigns.batchid')
				->where('tbl_coordinators_batch_assigns.userid', '=', $id)
				->where(['type' => '3'])
				->orderBy('users.id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.coordinatorstudents', $data);
                }
                else
                {
                    return view('institution.coordinatorstudents');
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
		public function coordinatorbatchstudents($batch)
		{
		$data['data'] = DB::table('users')
		->join('tbl_student_batch_assigns', 'tbl_student_batch_assigns.userid', '=', 'users.id')
		->where(['tbl_student_batch_assigns.batchid' => $batch])
		->orderBy('users.id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.coordinatorbatchstudents', $data);
                }
                else
                {
                    return view('institution.coordinatorbatchstudents');
                }
		}
		public function coordinatorbatchstudentsattendance($batch)
		{
		$data['data'] = DB::table('users')
		->join('tbl_student_batch_assigns', 'tbl_student_batch_assigns.userid', '=', 'users.id')
		->where(['tbl_student_batch_assigns.batchid' => $batch])
		->orderBy('users.id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.coordinatorbatchstudentsattendance', $data);
                }
                else
                {
                    return view('institution.coordinatorbatchstudentsattendance');
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
                    return view('institution.coordinatorbatchstudentsattendance', $data);
                }
                else
                {
                    return view('institution.coordinatorbatchstudentsattendance');
                }
            
        
    }
	public function coordinatorbatches()
    {
       
$id = Session::get('id');

                $data['data'] = DB::table('tbl_coordinators_batch_assigns')
				->join('tbl_batches', 'tbl_coordinators_batch_assigns.batchid', '=', 'tbl_batches.id')
				->where('tbl_coordinators_batch_assigns.userid', '=', $id)->get();
                // $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.coordinatorbatches', $data);
                }
                else
                {
                    return view('institution.coordinatorbatches');
                }
           
    }
    public function updatecoordinator(Request $req)
    {
        
        $id = $req->input('id');
         $userUpdate  =tblCoordinator::where('id',$id)->first();
         if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function coordinatorremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                DB::table('tbl_coordinators')->where('id', $id)->delete();

                return redirect('/coordinator-management')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
	// Coordinator Assign to program starts here

    public function programcoordinatorassign()
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

                $data['data'] = DB::table('tbl_coordinators')->where(['instid' => $instid])->orderBy('id', 'desc')->get();
               // $data['acdyear'] = DB::table('tbl_academicyears')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.programcoordinatorassign', $data);
                }
                else
                {
                    return view('institution.programcoordinatorassign');
                }
            } else { return redirect('/'); }
        }
    }
	// Batch Assign to Faculties

    public function coordinatorassignbatch($batch)
    {
	
	/*$coursebatch = DB::table('tbl_program_batch_assigns')->select('program')->where(['batch' => $batch])->get();
	
	
	$coursebatch1=$coursebatch[0]->program;*/
	
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
               // $year = date('Y');
               $instid = Auth::user()->instid;
			   $data['data'] = DB::table('tbl_coordinators')->where(['instid' => $instid])->orderBy('id', 'desc')->get();
                /*$data['data'] = DB::table('tbl_coordinators')
				->join('tbl_program_coordinator_assigns', 'tbl_program_coordinator_assigns.coordinator', '=', 'tbl_coordinators.id')
				->where(['tbl_program_coordinator_assigns.program' => $coursebatch1])
				->where(['tbl_coordinators.instid' => $instid])
				->orderBy('tbl_coordinators.id', 'desc')->get();*/
				

                if(count($data) > 0)
                {
                    return view('institution.coordinatorassignbatch', $data);
                }
                else
                {
                    return view('institution.coordinatorassignbatch');
                }
            } else { return redirect('/'); }
        }
    }
    public function viewassigncoordinatordetails($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data['data'] = DB::table('tbl_coordinators')->where('id', '=', $id)->get();

                if(count($data) > 0)
                {
                    return view('institution.viewassigncoordinatordetails', $data);
                }
                else
                {
                    return view('institution.viewassigncoordinatordetails');
                }
            } else { return redirect('/'); }
        }
    }
    public function coordinatorassignbatchfind($batch,$year)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_coordinators')->where(['instid' => $instid])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.coordinatorassignbatch', $data);
                }
                else
                {
                    return view('institution.coordinatorassignbatch');
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
                
                return redirect('/coordinator-batches')->withErrors(['Deleted Successfully!!']);
            

    }
	public function set_status(Request $req)
	{
	$status = $req->input('status');
		 $task = $req->input('task');
		 $updateDetails = [
    'faculty_id' => $status
];
DB::table('tbl_writings')
    ->where('id', $task)
    ->update($updateDetails);
	echo 'Faculty Updated Successfully!!';
	//return redirect('/tasks')->withErrors(['Contents Added Successfully!!']);
	}
	public function acceptwprogram($id)
	{
	DB::table('tbl_writings')->where('id', $id)->update(['wstatus' => 1]);
	//echo 'Faculty Updated Successfully!!';
	return redirect('/coordinatortasks')->withErrors(['Status Updated Successfully!!']);
	}
	public function rejectwprogram(Request $req)
	{
	$comments = $req->input('comments');
		 $wsid = $req->input('wsid');
		 $updateDetails = [
    'comments' => $comments,
	'wstatus' => 2,
	
];
DB::table('tbl_writings')
    ->where('id', $wsid)
    ->update($updateDetails);
	
	return redirect('/coordinatortasks')->withErrors(['File Rejected!!']);
	}
}
