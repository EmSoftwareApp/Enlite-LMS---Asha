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
use App\Models\User;

class InstSigninController extends Controller
{
    public function instregister(Request $req)
    {
        $this->instvalidation($req);
        $pass = $req->input('password');

        $req['password'] = bcrypt($pass);
        User::create($req->all());
        $lastid = DB::getPdo()->lastInsertId();

         DB::table('users')->where('id', $lastid)->update(['instid' => $lastid]);
        
        return redirect('/site-manager')->withErrors(['Registartion Completed Successfully!! Waiting for Admin Approval!!']);
    }
    public function instvalidation($request)
    {
    	return $this->Validate($request, [
    		'name' => 'required|max:255',
    		'email' => 'required|unique:users|max:255',
            'password' => 'required|string|min:6',
        ]);
    }
    public function instpostforgotpassword(Request $req)
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
            
            return redirect('/site-manager')->withErrors(['Please check your Registered Mail Id for your new Login credentials!!']);
        }
        else{
            return redirect('/inst-forgotpassword')->withErrors(['Your Registered Mail Id is not match with the email you are enter!! Please enter Registered mail ID!!']);
        }
        
    }

    public function instlogin(Request $req)
    {
        $this->Validate($req, [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password, 'status' => '1', 'type' => '2'])){
            return redirect('/insthome');
        }
        elseif(Auth::attempt(['email' => $req->email, 'password' => $req->password, 'status' => '1', 'type' => '4'])){
            return redirect('/insthome');
        }
        else
        {
        	return redirect('/site-manager')->withErrors(['Ooops Something Wrong Happens!! Please try agian or Contact Admin!!']);
        }
    }
    public function insthome()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.home');
            } else { return redirect('/'); }
        }
    }
    public function instlogout() 
    {
        Auth::logout(); // logout user
        Session::flush();
        Redirect::back();
        return redirect('/site-manager')->withErrors(['Logout Succesfully!!']);
    }
}
