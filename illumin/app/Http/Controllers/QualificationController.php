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
use App\tblQualification;

class QualificationController extends Controller
{
    public function qualificationmanagement()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_qualifications')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.qualificationmanagement', $data);
                }
                else
                {
                    return view('institution.qualificationmanagement');
                }
            } else { return redirect('/'); }
        }
    }
    public function newqualification()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.newqualification');
            } else { return redirect('/'); }
        }
    }
    public function postqualification(Request $req)
    {
        $this->qualificationvalidation($req);

        $qualification = $req->input('qualification');
        $instid = Auth::user()->instid;

        $entry = DB::table('tbl_qualifications')->where(['qualification' => $qualification, 'instid' => $instid])->get(); 
        
        if(count($entry) > 0)
        {
            return redirect()->back()->withErrors(['Qualification Already Taken !!']);
        }

        tblQualification::create($req->all());
        $pstid = DB::getPdo()->lastInsertId();

        //return redirect('/qualification-management')->withErrors(['Qualification Added Successfully!!']);
        return redirect()->back()->withErrors(['Qualification Added Successfully!!']);
        
    }
    public function qualificationvalidation($request)
    {
    	return $this->Validate($request, [
            'qualification' => 'required|max:255',
        ]);
    }
    
    public function viewqualification($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data['data'] = DB::table('tbl_qualifications')->where('id', '=', $id)->get();

                if(count($data) > 0)
                {
                    return view('institution.viewqualification', $data);
                }
                else
                {
                    return view('institution.viewqualification');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatequalification(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblQualification::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function qualificationremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                DB::table('tbl_qualifications')->where('id', $id)->delete();

                return redirect('/qualification-management')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
}
