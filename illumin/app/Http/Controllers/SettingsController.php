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
use App\Models\tblSystemSettigs;
use App\Models\tblNotification;


class SettingsController extends Controller
{
    // Admin System Settings Starts here

    public function adminsyssettings()
    {
        $data['data'] = DB::table('tbl_system_settigs')->orderBy('id', 'asc')->get();

        if(count($data) > 0)
        {
            return view('admin.adminsyssettings', $data);
        }
        else
        {
            return view('admin.adminsyssettings');
        }
    }
    public function postnotification(Request $req)
    {
        //$this->batchvalidation($req);

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
    public function notifications()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

               
                $data['data'] = DB::table('tbl_notifications')->where(['instid' => $instid])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.notifications', $data);
                }
                else
                {
                    return view('institution.notifications');
                }
            } else { return redirect('/'); }
        }
    }
    public function notificationremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                DB::table('tbl_notifications')->where('id', $id)->delete();

                return redirect('/notifications')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
    public function viewnotification($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_notifications')->where('id', '=', $id)->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewnotification', $data);
                }
                else
                {
                    return view('institution.viewnotification');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatenotification(Request $req)
    {
        
        $id = $req->input('id');
        $userUpdate  = tblNotification::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }

        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function newnotification()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                if(count($data) > 0)
                {
                   return view('institution.newnotification', $data);
                }
                else
                {
                   return view('institution.newnotification');
                }
            } else { return redirect('/'); }
        }
    }
    public function adminsystemupdate($id)
    {
        $data['data'] = DB::table('tbl_system_settigs')->where(['id' => $id])->get();

        if(count($data) > 0)
        {
            return view('admin.adminsystemupdate', $data);
        }
        else
        {
            return view('admin.adminsystemupdate');
        }
    }
    public function updatesystemsettings(Request $req)
    {
                
        $id = $req->input('id');
        $prlogo = $req->input('prlogo');
        $time = time();
        $img = $_FILES['file']['name'];

        $userUpdate  = tblSystemSettigs::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        if ($img != ''){
              
              $imagename = $_FILES['file']['name'];
              $ext = pathinfo($imagename, PATHINFO_EXTENSION);
              $source = $_FILES['file']['tmp_name'];
              $target = "logo/".$time.'.'.$ext;
              
              move_uploaded_file($source, $target);

              $imagepath = $ext;
              $save = "logo/" .$time.'.'.$imagepath; //This is the new file you saving
              $file = "logo/" .$time.'.'.$imagepath; //This is the original file

              list($width, $height) = getimagesize($file) ;

              $modwidth = 150;

              $diff = $width / $modwidth;

              $modheight = 150;
              $tn = imagecreatetruecolor($modwidth, $modheight) ;
              if(($ext == 'png') || ($ext == 'PNG'))
              {
                  $image = @imagecreatefrompng($file);
              }
              else if(($ext == 'jpg') || ($ext == 'jpeg') || ($ext == 'JPG') || ($ext == 'JPEG'))
              {
                  $image = imagecreatefromjpeg($file) ;
              }
              else if(($ext == 'gif') || ($ext == 'GIF'))
              {
                  $image = @imagecreatefromgif($file);
              }
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

              imagejpeg($tn, $save, 100) ;

            //if(move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_file)){
                //insert file information into db table
                DB::table('tbl_system_settigs')->where('id', $id)->update(['logo' => $time.'.'.$ext]);
                if($prlogo != ''){
                	unlink('logo/'.$prlogo);
                }
            //} 
        }

        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    }

    // Admin Settings Starts here

    public function adminsettings()
    {
        return view('admin.adminsettings');
    }
    public function updateadminpassword(Request $req)
    {
        $this->setiingvalidation($req);
        //$req['password'] = bcrypt($req->password);
       
        $username = $req->input('username');
        $password = $req->input('password');
        $user = $req->input('user');

        $new = bcrypt($password);

        $agents = DB::table('users')->where([
                ['id', '=', $user],
                ['username', '=', $username],
                ])->pluck( 'id');

        if($agents != '[]')
        {
            DB::table('users')
            ->where('id', $user)
            ->update(['password' => $new]);
            return redirect('/adminlogout')->withErrors(['Password Updated Succesfully!!']);
        }
        else
        {
            return redirect('/adminsettings')->withErrors(['Unable to Process!!']);
        }
    }
    public function setiingvalidation($request)
    {
        return $this->Validate($request, [
            'username' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    // Institution Settings Starts here

    public function instsettings()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.instsettings');
            } else { return redirect('/'); }
        }
    }
    public function updateinstpassword(Request $req)
    {
        $this->instvalidation($req);
        //$req['password'] = bcrypt($req->password);
       
        $email = $req->input('email');
        $password = $req->input('password');
        $user = $req->input('user');

        $new = bcrypt($password);

        $agents = DB::table('users')->where([
                ['id', '=', $user],
                ['email', '=', $email],
                ])->pluck( 'id');

        if($agents != '[]')
        {
            DB::table('users')
            ->where('id', $user)
            ->update(['password' => $new]);
            return redirect('/instlogout')->withErrors(['Password Updated Succesfully!! Please login with your new Password!!']);
        }
        else
        {
            return redirect('/instsettings')->withErrors(['Unable to Process!! Please try again!!']);
        }
    }
    public function instvalidation($request)
    {
        return $this->Validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    // Centre Basic Sttings STarts Here

    public function basicsettings()
    {
        return view('admin.basicsettings');
    }

    // User Settings Starts here

    public function passwordsettings()
    {
        return view('site.passwordsettings');
    }
    public function updatepassword(Request $req)
    {
        $this->passvalidation($req);
       
        $email = $req->input('email');
        $password = $req->input('password');
        $user = $req->input('user');

        $new = bcrypt($password);

        
        if(Auth::attempt(['email' => $req->email, 'password' => $req->oldpassword, 'status' => '1', 'type' => '3'])){
            DB::table('users')
            ->where('id', $user)
            ->update(['password' => $new]);
            return redirect()->back()->withErrors(['Password Updated Succesfully!! Please login with your new Password!!']);
        }
        else
        {
            return redirect('/passwordsettings')->withErrors(['Unable to Process!! Please try again!!']);
        }
    }
    public function passvalidation($request)
    {
        return $this->Validate($request, [
            'email' => 'required|email',
            'oldpassword' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

}
