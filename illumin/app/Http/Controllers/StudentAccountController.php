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

class StudentAccountController extends Controller
{
    public function accountsettings()
    {
        $userid = Auth::user()->id;

        $data['data'] = DB::table('users')->where(['status' => '1', 'id' => $userid])->orderBy('id', 'asc')->get();
        $data['state'] = DB::table('tbl_states')->where(['status' => '1'])->orderBy('id', 'asc')->get();

        if(count($data) > 0)
        {
            return view('site.accountsettings', $data);
        }
        else
        {
            return view('site.accountsettings');
        }
    }
    public function updateaccount(Request $req)
    {
        $this->profilevalidation($req);

        $id = $req->input('id');
        $image = $req->file('image1');
        $primage= $req->input('primage');

        $pin = $req->input('pin');
        $whatsapp = $req->input('whatsapp');
        $state = $req->input('state');
        $district = $req->input('district');

        $userUpdate  = User::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }

        DB::table('users')->where('id', $id)->update(['pin' => $pin, 'whatsapp' => $whatsapp, 'state' => $state, 'district' => $district]);

        if($image != "")
        {
        	$time = time();

			if ($_FILES['image1']['size'] > 1048576) {
				//return redirect()->back()->withErrors(['Video Details Updated Successfully!! Unable to add File due to large size!!']);
			}
			else
			{
				$add="profile/".$time.$_FILES['image1']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

				if(move_uploaded_file ($_FILES['image1']['tmp_name'],$add)) 
				{

					$images[] = $add;
			        DB::table('users')->where('id', $id)->update(['image' => $add]);
			        File::delete($primage);

			        ///////// Start the thumbnail generation//////////////
	                $n_width=100;          // Fix the width of the thumb nail images
	                $n_height=100;         // Fix the height of the thumb nail imaage
	                ////////////////////////////////////////////

	                $tsrc="profile/".$time.$_FILES['image1']['name'];   // Path where thumb nail image will be stored

	                /////////////////////////////////////////////// Starting of GIF thumb nail creation///////////
	                
	                // Blog Image

	                if (@$_FILES['image1']['type']=="image/gif")
	                {
	                    $im=ImageCreateFromGIF($add);
	                    $width=ImageSx($im);              // Original picture width is stored
	                    $height=ImageSy($im);                  // Original picture height is stored
	                    $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
	                    $newimage=imagecreatetruecolor($n_width,$n_height);
	                    imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
	                    if (function_exists("imagegif")) {
	                    Header("Content-type: image/gif");
	                    ImageGIF($newimage,$tsrc);
	                    }
	                    elseif (function_exists("imagejpeg")) {
	                    Header("Content-type: image/jpeg");
	                    ImageJPEG($newimage,$tsrc);
	                    }
	                    chmod("$tsrc",0777);
	                }////////// end of gif file thumb nail creation//////////

	                ////////////// starting of JPG thumb nail creation//////////
	                if($_FILES['image1']['type']=="image/jpeg")
	                {
	                    $im=ImageCreateFromJPEG($add); 
	                    $width=ImageSx($im);              // Original picture width is stored
	                    $height=ImageSy($im);             // Original picture height is stored
	                    $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
	                    $newimage=imagecreatetruecolor($n_width,$n_height);  
	                    $white = imagecolorallocate($newimage, 255, 255, 255); 
	                    imagefill($newimage, 0, 0, $white);                
	                    imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
	                    ImageJpeg($newimage,$tsrc);
	                    chmod("$tsrc",0777);
	                }
	                if($_FILES['image1']['type']=="image/png")
	                {
	                    $im=imagecreatefrompng($add); 
	                    $width=ImageSx($im);              // Original picture width is stored
	                    $height=ImageSy($im);             // Original picture height is stored
	                    $n_height=($n_width/$width) * $height; // Add this line to maintain aspect ratio
	                    $newimage=imagecreatetruecolor($n_width,$n_height); 
	                    $white = imagecolorallocate($newimage, 255, 255, 255); 
	                    imagefill($newimage, 0, 0, $white);                 
	                    imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
	                    Imagepng($newimage,$tsrc);
	                }

				}
			}
			

		}
        
        return redirect()->back()->withErrors(['Account Details updated Successfully!!']);
    } 
    public function profilevalidation($request)
    {
    	return $this->Validate($request, [
            'pin' => 'required',
            'contact' => 'required',
            'name' => 'required',
			'gname' => 'required',
            'image1' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024',
        ]);
    }

    public function removeprofilepic($id)
    {
    	$data = DB::table('users')->where('id', '=', $id)->get();
    	$uploads = '';
    	foreach($data as $object)
    	{
    		$uploads = $object->image;
    	}

    	if($uploads != '')
    	{
    		File::delete($uploads);
    	}
        
        DB::table('users')->where('id', $id)->update(['image' => '']);

        return redirect()->back()->withErrors(['Profile picture removed Successfully!!']);

    }

    // My Profile Starts here

    public function myprofile()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if(Auth::user()->type == 3)
            {
            	$userid = Auth::user()->id;
            	$instid = Auth::user()->instid;

		        $data['data'] = DB::table('tbl_user_program_payments')->where(['userid' => $userid, 'payment_type' => '1'])->orderBy('id', 'asc')->get();

		        $data['batch'] = DB::table('tbl_student_batch_assigns')->where(['userid' => $userid, 'instid' => $instid, 'status' => '1'])->orderBy('id', 'asc')->get();
		        
		        if(count($data) > 0)
		        {
		            return view('site.profile', $data);
		        }
		        else
		        {
		            return view('site.profile');
		        }
		    } else { return redirect('/'); }
        }
    }
    public function mywall()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if(Auth::user()->type == 3)
            {
            	$userid = Auth::user()->id;

		        $data['data'] = DB::table('tbl_user_program_payments')->where(['userid' => $userid, 'payment_type' => '1'])->orderBy('id', 'asc')->get();

		        $data['batch'] = DB::table('tbl_student_batch_assigns')->where(['userid' => $userid, 'status' => '1'])->orderBy('id', 'asc')->get();
		        
		        if(count($data) > 0)
		        {
		            return view('site.mywall', $data);
		        }
		        else
		        {
		            return view('site.mywall');
		        }
		    } else { return redirect('/'); }
        }
    }

    // Sudent Purchased Programs

    public function pgmpurchased($x)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
            	$userid = $x;
            	$instid = Auth::user()->instid;

		        $data['data'] = DB::table('tbl_user_program_payments')->where(['userid' => $userid, 'payment_type' => '1'])->orderBy('id', 'asc')->get();

		        $data['batch'] = DB::table('tbl_student_batch_assigns')->where(['userid' => $userid, 'instid' => $instid, 'status' => '1'])->orderBy('id', 'asc')->get();
		        
		        if(count($data) > 0)
		        {
		            return view('institution.pgmpurchased', $data);
		        }
		        else
		        {
		            return view('institution.pgmpurchased');
		        }
		    } else { return redirect('/'); }
        }
    }
}
