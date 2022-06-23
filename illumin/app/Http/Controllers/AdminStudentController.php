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
use App\tblState;

class AdminStudentController extends Controller
{
    public function studentdetails()
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $year = date('Y');
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('users')->where(['type' => '3', 'year' => $year, 'instid' => $instid])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.studentdetails', $data);
                }
                else
                {
                    return view('institution.studentdetails');
                }
            } else { return redirect('/'); }
        }
    }
    public function studentdetailsfind($year)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                
                $data['data'] = DB::table('users')->where(['type' => '3', 'year' => $year, 'instid' => $instid])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.studentdetails', $data);
                }
                else
                {
                    return view('institution.studentdetails');
                }
            } else { return redirect('/'); }
        }
    }

    public function studentremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('users')->where('id', '=', $id)->get();

                $name = '';
                $contact = '';
                $email = '';
                $image = '';

                foreach($data as $object)
                {
                    $email = $object->email;
                    $contact = $object->contact;
                    $name = $object->name;
                    $image = $object->image;
                }
                if($image != '')
                {
                    File::delete($image);
                }

                if($email != '')
                {
                    $to = $email;
                        $subject = 'LMS Notification';
                        $message = "<h1>User Cancelation Details</h1>";
                        $message .= "<hr>";
                        $message .= '<p><b>Name:</b> '.$name.'</p>';
                        $message .= '<p><b>Email:</b> '.$email.'</p>';
                        $message .= '<p><b>Phone:</b> '.$contact.'</p>';
                        
                        $message .= '<p><b>Status:</b> Your Registration for LMS has been temporarly Remove. Please Register Again or Contact LMS team..</p>';
                        $message .= "<hr>";

                      
                        $headers  = 'MIME-Version: 1.0' . "\r\n";

                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        $headers .= 'From: Learning Management System <info@emhost.in>' . "\r\n";
                        //$headers .= 'Bcc: phpsupport@extrememedia.in' . "\r\n";
                        // send email
                        mail($to, $subject, $message, $headers);
                }
                
                DB::table('users')->where('id', $id)->delete();

                return redirect()->back()->withErrors(['Student Removed Successfully!!']);
            } else { return redirect('/'); }
        }

    }


    public function newstudent()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.newstudent');
            } else { return redirect('/'); }
        }
    }
    public function poststudent(Request $req)
    {
        $this->uservalidation($req);

        $email = $req->input('email');
        $cretepassword = $req->input('cretepassword');
        $psw_creator = $req->input('psw_creator');

        // String of all alphanumeric character 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
      
        // Shufle the $str_result and returns substring 
        // of specified length 
        $pass = substr(str_shuffle($str_result), 0, 8); 

        if(($psw_creator == '1') && ($cretepassword != ''))
        {
            $pass = $cretepassword;
        }


        $req['password'] = bcrypt($pass);
        User::create($req->all());
        $lastid = DB::getPdo()->lastInsertId();

        if(($psw_creator == '1') && ($cretepassword != ''))
        {
            DB::table('users')->where(['id' => $lastid])->update(['status' => '1', 'reg_status' => '1', 'ad_create_password' => $pass]);
        }
        else
        {
            DB::table('users')->where(['id' => $lastid])->update(['status' => '1', 'reg_status' => '1']);
        }
        

        $to = $email;
                $subject = 'LMS Register Notification';
                $message = "<h1>User Registartion Details</h1>";
                $message .= "<hr>";
                $message .= '<p>Your Registration for LMS has been Completed Successfully. Please Use the below details for login your Account..</p>';
                $message .= '<p><b>Email:</b> '.$email.'</p>';
                $message .= '<p><b>Password:</b> '.$pass.'</p>';
                $message .= '<p>Click <a href="https://illumin.in/lms/login">here</a> for login LMS</p>';
                
                $message .= "<hr>";

              
                $headers  = 'MIME-Version: 1.0' . "\r\n";

                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: Learning Management System <info@emhost.in>' . "\r\n";
                $headers .= 'Bcc: support@extrememedia.in' . "\r\n";
                // send email
                if(mail($to, $subject, $message, $headers))
                {

        return redirect()->back()->withErrors(['Registartion Completed Successfully!! Password will send to Registered Email !!']);
                }
                else
                {
                   return redirect()->back()->withErrors(['Mail Not Sent !!']); 
                }
    }
     
    public function uservalidation($request)
    {
        return $this->Validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'contact' => 'required|min:10',
        ]);
    }
    public function viewstudentdetails($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data['data'] = DB::table('users')->where('id', '=', $id)->get();

                if(count($data) > 0)
                {
                    return view('institution.viewstudentdetails', $data);
                }
                else
                {
                    return view('institution.viewstudentdetails');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatestate(Request $req)
    {
        
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $id = $req->input('id');

                $userUpdate  = tblState::where('id',$id)->first();
                if ($userUpdate) {
                   $speak = $userUpdate->update($req->all());
                }
                
                return redirect()->back()->withErrors(['Updation completed Successfully!!']);
            } else { return redirect('/'); }
        }
    } 
}
