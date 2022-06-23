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
//use App\tblCourse;

class AppController extends Controller
{
    public function appcoursesettings()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_courses')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.appcoursesettings', $data);
                }
                else
                {
                    return view('institution.appcoursesettings');
                }
            } else { return redirect('/'); }
        }
    }
    public function viewappcourse($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data['data'] = DB::table('tbl_courses')->where('id', '=', $id)->get();

                if(count($data) > 0)
                {
                    return view('institution.viewappcourse', $data);
                }
                else
                {
                    return view('institution.viewappcourse');
                }
            } else { return redirect('/'); }
        }
    }
    public function updateappcourse(Request $req)
    {
        $id = $req->input('id'); 
        $image = $req->file('image'); // Assignment
        $image1 = $req->file('image1'); // Downloads
        
        if($image != "")
        {
            

            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) 
            {
                if($_FILES['image']['size'] < 1048576) 
                {
                	$filename_sm = $_FILES['image']['name'];
                	$ext_sm = \File::extension($filename_sm);

                	$time_sm = $id.'_sm.'.$ext_sm;

                    $Blogimge="app_image/course/".$time_sm;
	                //$Blogthgumimge="program/thumb/".$time.$_FILES['image1']['name'];

	                $add="app_image/course/".$time_sm; // the path with the file name where the file will be stored, upload is the directory name. 

	                if(move_uploaded_file ($_FILES['image']['tmp_name'],$add)) 
	                {

	                    ///////// Start the thumbnail generation//////////////
		                $n_width=245;          // Fix the width of the thumb nail images
		                $n_height=110;         // Fix the height of the thumb nail imaage
		                ////////////////////////////////////////////

		                $tsrc="app_image/course/".$time_sm;   // Path where thumb nail image will be stored

		                /////////////////////////////////////////////// Starting of GIF thumb nail creation///////////
		                
		                // Blog Image

		                if (@$_FILES['image']['type']=="image/gif")
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
		                if($_FILES['image']['type']=="image/jpeg")
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
		                if($_FILES['image']['type']=="image/png")
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

		                $images[] = $Blogimge;
	                    DB::table('tbl_courses')->where('id', $id)->update(['image_sm' => $Blogimge]);
	                }
                }
            }   
           
        }

        if($image1 != "")
        {
        	//$time = time();

            $check = getimagesize($_FILES["image1"]["tmp_name"]);
            if($check !== false) 
            {
                if($_FILES['image1']['size'] < 1048576) 
                {
                	$filename_lg = $_FILES['image1']['name'];
                	$ext_lg = \File::extension($filename_lg);

                	$time_lg = $id.'_lg.'.$ext_lg;

                    $Blogimge="app_image/course/".$time_lg;
	                //$Blogthgumimge="program/thumb/".$time.$_FILES['image1']['name'];

	                $add="app_image/course/".$time_lg; // the path with the file name where the file will be stored, upload is the directory name. 

	                if(move_uploaded_file ($_FILES['image1']['tmp_name'],$add)) 
	                {

	                    ///////// Start the thumbnail generation//////////////
		                $n_width=375;          // Fix the width of the thumb nail images
		                $n_height=250;         // Fix the height of the thumb nail imaage
		                ////////////////////////////////////////////

		                $tsrc="app_image/course/".$time_lg;   // Path where thumb nail image will be stored

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

		                $images[] = $Blogimge;
	                    DB::table('tbl_courses')->where('id', $id)->update(['image_lg' => $Blogimge]);
	                }
                }
            }  
			

		}
        //return redirect('/video-management')->withErrors(['Video Added Successfully!!']);
        return redirect()->back()->withErrors(['Added Successfully!!']);
    }
    public function removecourseimage($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_courses')->where('id', '=', $id)->get();
                $uploads = '';
                foreach($data as $object)
                {
                    $uploads = $object->image_sm;
                }

                if($uploads != '')
                {
                    File::delete($uploads);
                }
                
                DB::table('tbl_courses')->where('id', $id)->update(['image_sm' => '']);

                return redirect()->back()->withErrors(['Image Removed Successfully!!']);
            } else { return redirect('/'); }
        }

    }
    public function removecourseinnerimage($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_courses')->where('id', '=', $id)->get();
                $uploads = '';
                foreach($data as $object)
                {
                    $uploads = $object->image_lg;
                }

                if($uploads != '')
                {
                    File::delete($uploads);
                }
                
                DB::table('tbl_courses')->where('id', $id)->update(['image_lg' => '']);

                return redirect()->back()->withErrors(['Image Removed Successfully!!']);
            } else { return redirect('/'); }
        }

    }
}
