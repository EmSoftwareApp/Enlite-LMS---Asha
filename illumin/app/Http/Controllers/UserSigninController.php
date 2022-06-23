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
use App\User;

class UserSigninController extends Controller
{
    public function usersignup(Request $req)
    {
        $this->uservalidation($req);
        $pass = $req->input('password');

        $req['password'] = bcrypt($pass);
        User::create($req->all());
        $lastid = DB::getPdo()->lastInsertId();

        DB::table('users')->where('id', $lastid)->update(['status' => 1]);
		//mail sending to student
		$to=$req->input('email');

		$subject = "Registration Successful - From Illumin";

            $message = "
            <html>
            <body>
            <p>Dear Student,</p>
            <p>Thank you for Registering with us. Do not hesitate to contact us if you have any questions.</p>
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .='X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

            // More headers
            $headers .= 'From: <info@illumin.in>' . "\r\n";

            mail($to,$subject,$message,$headers);
		//end mail sending
        return redirect('/login')->withErrors(['Registartion Completed Successfully!!']);
    }
    
    public function uservalidation($request)
    {
    	return $this->Validate($request, [
    		'name' => 'required|max:255',
    		'email' => 'required|unique:users|max:255',
    		'contact' => 'required|min:10',
            'password' => 'required|string|min:6',
        ]);
    }
}
