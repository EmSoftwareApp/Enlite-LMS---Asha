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
use App\tblCourse;

class CourseController extends Controller
{
    public function coursemanagement()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_courses')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.coursemanagement', $data);
                }
                else
                {
                    return view('institution.coursemanagement');
                }
            } else { return redirect('/'); }
        }
    }
    public function newcourse()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.newcourse');
            } else { return redirect('/'); }
        }
    }
    public function postcourse(Request $req)
    {
        //$this->coursevalidation($req);

        $tot = $req->input('tot');
        $instid = Auth::user()->instid;

        for($i=1; $i<=$tot; $i++)
        {
            $coursename = $req->input('coursename'.$i);
            $courseshortname = $req->input('courseshortname'.$i);

            if(($coursename != '') && ($courseshortname != ''))
            {
                $req['coursename'] = $coursename;
                $req['courseshortname'] = $courseshortname;

                $entry = DB::table('tbl_courses')->where(['coursename' => $coursename, 'instid' => $instid])->get(); 
        
                if(count($entry) == 0)
                {
                    tblCourse::create($req->all());
                }

            }
        }




        /*$coursename = $req->input('coursename');

        $instid = Auth::user()->instid;

        $entry = DB::table('tbl_courses')->where(['coursename' => $coursename, 'instid' => $instid])->get(); 
        
        if(count($entry) > 0)
        {
            return redirect()->back()->withErrors(['Course Already Taken !!']);
        }

        tblCourse::create($req->all());
        $pstid = DB::getPdo()->lastInsertId();*/

        return redirect()->back()->withErrors(['Course Added Successfully!!']);
        //return redirect('/course-management')->withErrors(['Course Added Successfully!!']);
        
    }
    public function coursevalidation($request)
    {
    	return $this->Validate($request, [
            'coursename' => 'required|max:255',
            'courseshortname' => 'required|max:255',
        ]);
    }
    
    public function viewcourse($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data['data'] = DB::table('tbl_courses')->where('id', '=', $id)->get();

                if(count($data) > 0)
                {
                    return view('institution.viewcourse', $data);
                }
                else
                {
                    return view('institution.viewcourse');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatecourse(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblCourse::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function courseremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                DB::table('tbl_courses')->where('id', $id)->delete();

                return redirect('/course-management')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
}
