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
use App\tblAcademicyear;

class AcademicYearController extends Controller
{
    public function academicyear()
    {
        if (!Auth::check()) { return redirect('/'); } else {
        	if((Auth::user()->type == 2) || (Auth::user()->type == 4))
        	{
	        	$instid = Auth::user()->instid;

		        $data['data'] = DB::table('tbl_academicyears')->where(['instid' => $instid])->orderBy('id', 'desc')->get();

		        if(count($data) > 0)
		        {
		            return view('institution.academicyear', $data);
		        }
		        else
		        {
		            return view('institution.academicyear');
		        }
		    } else { return redirect('/'); }
	    }
    }
    public function newacdemicyear()
    {
        if (!Auth::check()) { return redirect('/'); } else {
        	if((Auth::user()->type == 2) || (Auth::user()->type == 4))
        	{
	        	return view('institution.newacdemicyear');
	        }else { return redirect('/'); }
        } 
    }
    public function postacademicyear(Request $req)
    {
        $this->acyrvalidation($req);

        tblAcademicyear::create($req->all());

        return redirect('/academic-year')->withErrors(['Academic Year Added Successfully!!']);
        
    }
    public function acyrvalidation($request)
    {
    	return $this->Validate($request, [
            'acdyear' => 'required',
        ]);
    }
    
    public function viewacademicdyear($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
        	if((Auth::user()->type == 2) || (Auth::user()->type == 4))
        	{
        		$data['data'] = DB::table('tbl_academicyears')->where('id', '=', $id)->get();

	        	if(count($data) > 0)
		        {
		            return view('institution.viewacademicdyear', $data);
		        }
		        else
		        {
		            return view('institution.viewacademicdyear');
		        }
        	} else { return redirect('/'); }
        }

        
    }
    public function updateacademicyear(Request $req)
    {

        $id = $req->input('id');

        $userUpdate  = tblAcademicyear::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function academicyearremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
        	if((Auth::user()->type == 2) || (Auth::user()->type == 4))
        	{
	        	DB::table('tbl_academicyears')->where('id', $id)->delete();

	        	return redirect('/academic-year')->withErrors(['Deleted Successfully!!']);
	        } else { return redirect('/'); }
        }
    }

    
}
