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

class FacultySigninController extends Controller
{
    //
	public function facultylogin(Request $req)
    {
        $this->Validate($req, [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:2',
        ]);
       
        $appcount = DB::table('tbl_faculties')->where('username','=', $req->email)
		->where('password','=',$req->password)
		->get(); 
      Session::put('id', $appcount[0]->id);
	  Session::put('type', 'Faculty');
	  /*echo '<pre>';
	  print_r($appcount);
	  echo '</pre>';*/
	  
        if(count($appcount) > 0)
        {
            return redirect('/facultyhome');
        }
        else
        {
        	return redirect('/lms/faculty-manager')->withErrors(['Ooops Something Wrong Happens!! Please try agian or Contact Admin!!']);
        }
    }
	
	public function facultyhome()
    {
        
       return view('institution.facultyhome');
          
    }
}
