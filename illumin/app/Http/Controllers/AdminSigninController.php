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

class AdminSigninController extends Controller
{
    public function adminsignin(Request $req)
    {
        $this->Validate($req, [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);
        
        if(Auth::attempt(['username' => $req->username, 'password' => $req->password])){
            return redirect('/adminhome');
        }
        else
        {
        	return redirect('/admin-manager')->withErrors(['Ooops Something Wrong Happens!! Please try agian or Contact Admin!!']);
        }
    }
    public function adminhome()
    {
        return view('admin.home');
    }
    public function adminlogout() 
    {
        Auth::logout(); // logout user
        Session::flush();
        Redirect::back();
        return redirect('/admin-manager')->withErrors(['Logout Succesfully!!']);
    }
}
