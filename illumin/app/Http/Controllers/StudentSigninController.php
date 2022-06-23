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
use App\user;
use App\tblLog;

class StudentSigninController extends Controller
{
    public function studentlogin(Request $req)
    {
        $link = ltrim($req->input('prviouslink'), '/');
        $random = rand(100000, 999999);

        $this->Validate($req, [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password, 'status' => '1', 'type' => '3'])){
            if($link == ""){
                $req->session()->put('rand',$random);
                
                DB::table('users')->where(['email' => $req->email])->update(['random' => $random]);
				$date = date("Y-m-d");
    $time = date("h:i:s");
	$id=Auth::user()->id;
				DB::table('tbl_log')->insert(array('login_date' => $date, 'login_time' => $time, 'user_id' => $id));
                return redirect('/studenthome');
            }
            else{
                $req->session()->put('rand',$random);
                DB::table('users')->where(['email' => $req->email])->update(['random' => $random]);
				$date = date("Y-m-d");
    $time = date("h:i:s");
	$id=Auth::user()->id;
				DB::table('tbl_log')->insert(array('login_date' => $date, 'login_time' => $time, 'user_id' => $id));
                return redirect()->intended($link);
            }
            
        }
        else
        {
        	return redirect('/')->withErrors(['Ooops Something Wrong Happens!! Please try agian or Contact LMS Team!!']);
        }
    }
    public function home()
    {

        return view('site.home');
    }
    public function studenthome()
    {
        $data['notifications']=DB::table('tbl_notifications')->where('status','=', '1')->get();
        $data['news']=DB::table('tbl_news')->where('status','=', '1')->get();

        return view('student.home',$data);
    }
    public function logout() 
    {
	$date = date("Y-m-d");
    $time = date("h:i:s");
	$id=Auth::user()->id;
	$updateDetails = [
    'logout_date' => $date,
	'logout_time' => $time
];
	//DB::table('tbl_log')->insert(array('logout_date' => $date, 'logout_time' => $time, 'user_id' => $id));
	DB::table('tbl_log')
    ->where('user_id', $id)
    ->update($updateDetails);
        Auth::logout(); // logout user
        Session::flush();
        Redirect::back();
        $url = 'https://illumin.in/';
        return Redirect::to($url);
        //return redirect('/')->withErrors(['You are Loggedout Succesfully!!']);
    }
    public function postforgotpassword(Request $req)
    {
        $email = $req->input('email');
        //$count = tblLoginVenue::where(['owneremail' => $email])->count();
        $id = "";
        $regemail = "";
        $username = "";

        $data = DB::table('users')->where(['email' => $email])->get(); 

        foreach ($data as $object) {
            $id = $object->id;
            $regemail = $object->email;
        }
        
        if($id != '')
        {
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
            $newpassword = substr(str_shuffle($str_result), 0, 8);
            $systemname = '';
            $systememail = '';

            $password = bcrypt($newpassword);

            DB::table('users')->where('id', $id)->update(['password' => $password]);

            $vals = DB::table('tbl_system_settigs')->get(); 

            foreach ($vals as $args) {
                $systemname = $args->systemname;
                $systememail = $args->email;
            }

            $subject = $systemname." Forgot Password";

            $message = "
            <html>
            <head>
            <title>".$systemname." Forgot Password</title>
            </head>
            <body>
            <p>Welcome to ".$systemname." Family!!</p>
            <table>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>".$regemail."</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>".$newpassword."</td>
            </tr>
            <tr>
                <td>You can use this username and password for login ".$systemname." Account</td>
                <td></td>
                <td></td>
            </tr>
            </table>
            </body>
            </html>
            ";

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <'.$systememail.'>' . "\r\n";

            mail($regemail,$subject,$message,$headers);
            
            return redirect('/login')->withErrors(['Please check your Registered Mail Id for your new Login credentials!!']);
        }
        else{
            return redirect('/forgotpassword')->withErrors(['Your Registered Mail Id is not match with the email you are enter!! Please enter Registered mail ID!!']);
        }
        
    }
    
}
