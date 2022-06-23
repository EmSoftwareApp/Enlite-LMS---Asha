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
use Image;
use App\Models\tblBatch;

class BatchController extends Controller
{
    public function studentbatch()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $check = DB::table('tbl_academicyears')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->get();
                $m = 0;
                $acdid = '';
                foreach($check as $object)
                {
                    if($m == 0)
                    {
                    	$acdid = $object->id;
                    }
                    $m++;
                }

                $data['data'] = DB::table('tbl_batches')->where(['instid' => $instid, 'acdyear' => $acdid])->orderBy('id', 'desc')->get();
                $data['acdyear'] = DB::table('tbl_academicyears')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.studentbatch', $data);
                }
                else
                {
                    return view('institution.studentbatch');
                }
            } else { return redirect('/'); }
        }
    }
    public function studentbatchfind($acdid)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_batches')->where(['instid' => $instid, 'acdyear' => $acdid])->orderBy('id', 'desc')->get();
                $data['acdyear'] = DB::table('tbl_academicyears')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.studentbatch', $data);
                }
                else
                {
                    return view('institution.studentbatch');
                }
            } else { return redirect('/'); }
        }
    }

    public function newbatch()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['acyr'] = DB::table('tbl_academicyears')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['course'] = DB::table('tbl_programs')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                if(count($data) > 0)
                {
                   return view('institution.newbatch', $data);
                }
                else
                {
                   return view('institution.newbatch');
                }
            } else { return redirect('/'); }
        }
    }
    public function zoomassignbatch($batch)
    {
	
	
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
               // $year = date('Y');
               $instid = Auth::user()->instid;
			   $data['data'] = DB::table('tbl_zoommeetings')->where(['instid' => $instid])->orderBy('id', 'desc')->get();
                /*$data['data'] = DB::table('tbl_faculties')
				->join('tbl_program_faculty_assigns', 'tbl_program_faculty_assigns.faculty', '=', 'tbl_faculties.id')
				->where(['tbl_program_faculty_assigns.program' => $coursebatch1])
				->where(['tbl_faculties.instid' => $instid])
				->orderBy('tbl_faculties.id', 'desc')->get();*/
				

                if(count($data) > 0)
                {
                    return view('institution.zoomassignbatch', $data);
                }
                else
                {
                    return view('institution.zoomassignbatch');
                }
            } else { return redirect('/'); }
        }
    }
    public function postbatch(Request $req)
    {
        $this->batchvalidation($req);

        $course = $req->input('course');
        $batchname = $req->input('batchname');
        $acdyear = $req->input('acdyear');
        $date =  date('Y-m-d');
        $year = date('Y');
    $instid = Auth::user()->instid;
        $entry = DB::table('tbl_batches')->where(['course' => $course, 'batchname' => $batchname, 'acdyear' => $acdyear])->get(); 
        $pstid = DB::getPdo()->lastInsertId();

        if(count($entry) > 0)
        {
            return redirect()->back()->withErrors(['Student Batch Already Present !!']);
        }

        tblBatch::create($req->all());
        $states = DB::table('tbl_program_batch_assigns')->insert(['batch' => $pstid, 'program' => $course, 'created' => $date, 'year' => $year, 'instid' => $instid]);

        return redirect()->back()->withErrors(['Student Batch Added Successfully!!']);
    }
    public function postnotification(Request $req)
    {
        $this->batchvalidation($req);

        $course = $req->input('course');
        $title = $req->input('title');
        $message = $req->input('message');

        $entry = DB::table('tbl_notifications')->where(['course' => $course, 'title' => $title, 'message' => $message])->get(); 
        
        if(count($entry) > 0)
        {
            return redirect()->back()->withErrors(['Notification Already Present !!']);
        }

        tblNotification::create($req->all());
         
        return redirect()->back()->withErrors(['Notification Added Successfully!!']);
    }
    public function batchvalidation($request)
    {
    	return $this->Validate($request, [
            'batchname' => 'required',
            'acdyear' => 'required',
            'noofstudents' => 'required',
        ]);
    }
    
    public function viewbatch($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_batches')->where('id', '=', $id)->get();
                $data['acyr'] = DB::table('tbl_academicyears')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['course'] = DB::table('tbl_programs')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewbatch', $data);
                }
                else
                {
                    return view('institution.viewbatch');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatebatch(Request $req)
    {
        
        $id = $req->input('id');
        $batchend = $req->input('batchend'); 
        $userUpdate  = tblBatch::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }

        DB::table('tbl_user_packages')->where('batchid', $id)->update(['pack_ends_on' => $batchend]);
        $states = DB::table('tbl_program_batch_assigns')->where('batch', $id)->update(['program' => $req->input('course')]);

        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function batchremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                DB::table('tbl_batches')->where('id', $id)->delete();

                return redirect('/student-batch')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }

    // Batch Assign to students

    public function studentassignbatch()
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $year = date('Y');
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('users')->where(['type' => '3', 'year' => $year, 'instid' => $instid])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.studentassignbatch', $data);
                }
                else
                {
                    return view('institution.studentassignbatch');
                }
            } else { return redirect('/'); }
        }
    }
    public function viewassignstudentdetails($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data['data'] = DB::table('users')->where('id', '=', $id)->get();

                if(count($data) > 0)
                {
                    return view('institution.viewassignstudentdetails', $data);
                }
                else
                {
                    return view('institution.viewassignstudentdetails');
                }
            } else { return redirect('/'); }
        }
    }
    public function studentassignbatchfind($batch,$year)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('users')->where(['type' => '3', 'year' => $year, 'instid' => $instid])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.studentassignbatch', $data);
                }
                else
                {
                    return view('institution.studentassignbatch');
                }
            } else { return redirect('/'); }
        }
    }

    // Program Assign to batch starts here

    public function programbatchassign()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $check = DB::table('tbl_academicyears')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->get();
                $m = 0;
                $acdid = '';
                foreach($check as $object)
                {
                    if($m == 0)
                    {
                        $acdid = $object->id;
                    }
                    $m++;
                }

                $data['data'] = DB::table('tbl_batches')->where(['instid' => $instid, 'acdyear' => $acdid])->orderBy('id', 'desc')->get();
                $data['acdyear'] = DB::table('tbl_academicyears')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.programbatchassign', $data);
                }
                else
                {
                    return view('institution.programbatchassign');
                }
            } else { return redirect('/'); }
        }
    }

    public function programbatchassignfind($pgmid, $acdid)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_batches')->where(['instid' => $instid, 'acdyear' => $acdid])->orderBy('id', 'desc')->get();
                $data['acdyear'] = DB::table('tbl_academicyears')->where(['instid' => $instid, 'status' => '1'])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.programbatchassign', $data);
                }
                else
                {
                    return view('institution.programbatchassign');
                }
            } else { return redirect('/'); }
        }
    }
}
