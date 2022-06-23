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
use App\tblInstructor;

class InstructorController extends Controller
{
    public function instructor()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_instructors')->where(['instid' => $instid])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.instructor', $data);
                }
                else
                {
                    return view('institution.instructor');
                }
            } else { return redirect('/'); }
        }
    }
    public function newinstructor()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                   return view('institution.newinstructor', $data);
                }
                else
                {
                   return view('institution.newinstructor');
                }
            } else { return redirect('/'); }
        }
    }
    public function postinstructor(Request $req)
    {
        $this->instructorvalidation($req);

        $image = $req->file('image1'); 

        tblInstructor::create($req->all());
        $pstid = DB::getPdo()->lastInsertId();

        if($image != "")
        {
            $time = time();

            $check = getimagesize($_FILES["image1"]["tmp_name"]);
            if($check !== false) 
            {
                if ($_FILES['image1']['size'] > 1048576) {
                    return redirect()->back()->withErrors(['Instructor Added Successfully!! Unable to add Iamge due to large size!!']);
                }
                
                // Move Blog Image
                $Blogimge="instructor/".$time.$_FILES['image1']['name'];
                //$Blogthgumimge="program/thumb/".$time.$_FILES['image1']['name'];

                $add="instructor/".$time.$_FILES['image1']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['image1']['tmp_name'],$add)) 
                {

                    $images[] = $Blogimge;
                    DB::table('tbl_instructors')->where('id', $pstid)->update(['image' => $Blogimge]);
                }
                else
                {
                    return redirect()->back()->withErrors(['Instructor Details Added Successfully!! Unable to add image due to large size!!']);
                }

                ///////// Start the thumbnail generation//////////////
                $n_width=200;          // Fix the width of the thumb nail images
                $n_height=150;         // Fix the height of the thumb nail imaage
                ////////////////////////////////////////////

                $tsrc="instructor/".$time.$_FILES['image1']['name'];   // Path where thumb nail image will be stored

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
                return redirect()->back()->withErrors(['Instructor Added Successfully!!']);
            }
            else
            {
                return redirect()->back()->withErrors(['Instructor Added Successfully!! Unable to add image due to Not an Image!!']);
            }
        }
        return redirect()->back()->withErrors(['Instructor Added Successfully!!']);
    }
    public function instructorvalidation($request)
    {
    	return $this->Validate($request, [
            'instructorname' => 'required',
            'mobile' => 'required',
        ]);
    }
    
    public function viewinstructor($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_instructors')->where('id', '=', $id)->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewinstructor', $data);
                }
                else
                {
                    return view('institution.viewinstructor');
                }
            } else { return redirect('/'); }
        }
    }
    public function updateinstructor(Request $req)
    {
        
        $id = $req->input('id');
        $image = $req->file('image1'); 
        $primage = $req->input('primage');

        $userUpdate  = tblInstructor::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        

        if($image != "")
        {
            $time = time();

            $check = getimagesize($_FILES["image1"]["tmp_name"]);
            if($check !== false) 
            {
                if ($_FILES['image1']['size'] > 1048576) {
                    return redirect()->back()->withErrors(['Updation completed Successfully!! Unable to add Iamge due to large size!!']);
                }
                
                // Move Blog Image
                $Blogimge="instructor/".$time.$_FILES['image1']['name'];
                //$Blogthgumimge="program/thumb/".$time.$_FILES['image1']['name'];

                $add="instructor/".$time.$_FILES['image1']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['image1']['tmp_name'],$add)) 
                {

                    $images[] = $Blogimge;
                    DB::table('tbl_instructors')->where('id', $id)->update(['image' => $Blogimge]);

                    File::delete($primage);

                }
                else
                {
                    return redirect()->back()->withErrors(['Updation completed Successfully!! Unable to add image due to large size!!']);
                }

                ///////// Start the thumbnail generation//////////////
                $n_width=200;          // Fix the width of the thumb nail images
                $n_height=150;         // Fix the height of the thumb nail imaage
                ////////////////////////////////////////////

                $tsrc="instructor/".$time.$_FILES['image1']['name'];   // Path where thumb nail image will be stored

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
                return redirect()->back()->withErrors(['Updation completed Successfully!!']);
            }
            else
            {
                return redirect()->back()->withErrors(['Updation completed Successfully!! Unable to add image due to Not an Image!!']);
            }
        }
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function removeinstructorimage($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_instructors')->where('id', '=', $id)->get();

                $uploads = '';
                foreach($data as $object)
                {
                    $uploads = $object->image;
                }

                if($uploads != '')
                {
                    File::delete($uploads);
                }

                DB::table('tbl_instructors')->where('id', $id)->update(['image' => '']);

                return redirect()->back()->withErrors(['Removed Successfully!!']);
            } else { return redirect('/'); }
        }

    }

    public function instructorremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_instructors')->where('id', '=', $id)->get();
                $uploads = '';
                foreach($data as $object)
                {
                    $uploads = $object->image;
                }

                if($uploads != '')
                {
                    File::delete($uploads);
                }
                
                DB::table('tbl_instructors')->where('id', $id)->delete();

                return redirect('/instructor')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
}
