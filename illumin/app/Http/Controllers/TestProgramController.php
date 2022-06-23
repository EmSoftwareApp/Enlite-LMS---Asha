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
use App\Models\tblProgram;

class TestProgramController extends Controller
{
    public function testprogrammanagement()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_programs')->where(['instid' => $instid])->orderBy('id', 'desc')->get();

                if(count($data) > 0)
                {
                    return view('institution.testprogrammanagement', $data);
                }
                else
                {
                    return view('institution.testprogrammanagement');
                }
            } else { return redirect('/'); }
        }
    }
    public function newtestprogram()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                //$data['quali'] = DB::table('tbl_qualifications')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['inst'] = DB::table('tbl_instructors')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();


                if(count($data) > 0)
                {
                   return view('institution.newtestprogram', $data);
                }
                else
                {
                   return view('institution.newtestprogram');
                }
            } else { return redirect('/'); }
        }
    }
    public function postprogram(Request $req)
    {
        $this->programvalidation($req);

        //echo $coursename = $req->input('course');exit();

        /*$entry = DB::table('tbl_courses')->where(['coursename' => $coursename])->get(); 
        
        if(count($entry) > 0)
        {
            return redirect()->back()->withErrors(['Course Already Taken !!']);
        }*/
        $image = $req->file('image1');
        $image2 = $req->file('image2'); // Brouchre
        $image3 = $req->file('image3'); // Syllabus

        tblProgram::create($req->all());
        $pstid = DB::getPdo()->lastInsertId();

        if($image3 != "")
        {
            $time = time();

            if ($_FILES['image3']['size'] > 1048576) {
                //return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add File due to large size!!']);
            }
            else
            {
                $add="syllabus/video/".$time.$_FILES['image3']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['image3']['tmp_name'],$add)) 
                {

                    $images[] = $add;
                    DB::table('tbl_programs')->where('id', $pstid)->update(['syllabus' => $add]);

                }
                /*else
                {
                    return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add file!!']);
                }*/
            }
            

        }

        if($image2 != "")
        {
            $time = time();

            if ($_FILES['image2']['size'] > 1048576) {
                //return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add File due to large size!!']);
            }
            else
            {
                $add1="brouchre/video/".$time.$_FILES['image2']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['image2']['tmp_name'],$add1)) 
                {

                    $images[] = $add1;
                    DB::table('tbl_programs')->where('id', $pstid)->update(['brouchre' => $add1]);

                }
                /*else
                {
                    return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add file!!']);
                }*/
            }
            
            

        }

        if($image != "")
        {
            $time = time();

            
                if ($_FILES['image1']['size'] > 1048576) {
                    return redirect()->back()->withErrors(['Program Added Successfully!! Unable to add Iamge due to large size!!']);
                }
                
                // Move Blog Image
                $Blogimge="program/".$time.$_FILES['image1']['name'];
                //$Blogthgumimge="program/thumb/".$time.$_FILES['image1']['name'];

                $add="program/".$time.$_FILES['image1']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['image1']['tmp_name'],$add)) 
                {

                    $images[] = $Blogimge;
                        DB::table('tbl_programs')->where('id', $pstid)->update(['image' => $Blogimge]);
                        //DB::table('courses')->where('id', $pstid)->update(['photothumb' => $Blogthgumimge]);
                        //return redirect('/ShowBlog')->withErrors(['Contents Added Successfully!!']);

                }
                else
                {
                    return redirect()->back()->withErrors(['Program Details Added Successfully!! Unable to add image due to large size!!']);
                }

                ///////// Start the thumbnail generation//////////////
                $n_width=350;          // Fix the width of the thumb nail images
                $n_height=200;         // Fix the height of the thumb nail imaage
                ////////////////////////////////////////////

                $tsrc="program/".$time.$_FILES['image1']['name'];   // Path where thumb nail image will be stored

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
               // return redirect()->back()->withErrors(['Program Added Successfully!!']);
            
        }

        //return redirect('/program-management')->withErrors(['Course Added Successfully!!']);
        return redirect()->back()->withErrors(['Program Added Successfully!!']);
        
    }
    public function programvalidation($request)
    {
    	return $this->Validate($request, [
            'programname' => 'required',
            'course' => 'required',
            'duraion' => 'required',
            /*'qualification' => 'required',*/
            'amount' => 'required',
            'image1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'mimetypes:application/pdf|max:10000',
            'image3' => 'mimetypes:application/pdf|max:10000'
        ]);
    }
    
    public function viewprogram($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_programs')->where('id', '=', $id)->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                //$data['quali'] = DB::table('tbl_qualifications')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['inst'] = DB::table('tbl_instructors')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewprogram', $data);
                }
                else
                {
                    return view('institution.viewprogram');
                }
            } else { return redirect('/'); }
        }
    }
    public function updateprogram(Request $req)
    {
        $this->programvalidation($req);

        $id = $req->input('id');
        $image = $req->file('image1'); 
        $primage = $req->input('primage');

        $image2 = $req->file('image2'); // Brouchre
        $image3 = $req->file('image3'); // Syllabus
        $prbrouchre = $req->input('prbrouchre');
        $prsyllabus = $req->input('prsyllabus');

        $userUpdate  = tblProgram::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        if($image3 != "")
        {
            $time = time();

            if ($_FILES['image3']['size'] > 1048576) {
                //return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add File due to large size!!']);
            }
            else
            {
                $add="syllabus/video/".$time.$_FILES['image3']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['image3']['tmp_name'],$add)) 
                {

                    $images[] = $add;
                    DB::table('tbl_programs')->where('id', $id)->update(['syllabus' => $add]);
                    File::delete($prsyllabus);
                }
                /*else
                {
                    return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add file!!']);
                }*/
            }
            

        }

        if($image2 != "")
        {
            $time = time();

            if ($_FILES['image2']['size'] > 1048576) {
                //return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add File due to large size!!']);
            }
            else
            {
                $add1="brouchre/video/".$time.$_FILES['image2']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['image2']['tmp_name'],$add1)) 
                {

                    $images[] = $add1;
                    DB::table('tbl_programs')->where('id', $id)->update(['brouchre' => $add1]);
                    File::delete($prbrouchre);
                }
                /*else
                {
                    return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add file!!']);
                }*/
            }
            
            

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
                $Blogimge="program/".$time.$_FILES['image1']['name'];
                //$Blogthgumimge="program/thumb/".$time.$_FILES['image1']['name'];

                $add="program/".$time.$_FILES['image1']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

                if(move_uploaded_file ($_FILES['image1']['tmp_name'],$add)) 
                {

                    $images[] = $Blogimge;
                    DB::table('tbl_programs')->where('id', $id)->update(['image' => $Blogimge]);

                    File::delete($primage);

                }
                else
                {
                    return redirect()->back()->withErrors(['Updation completed Successfully!! Unable to add image due to large size!!']);
                }

                ///////// Start the thumbnail generation//////////////
                $n_width=350;          // Fix the width of the thumb nail images
                $n_height=200;         // Fix the height of the thumb nail imaage
                ////////////////////////////////////////////

                $tsrc="program/".$time.$_FILES['image1']['name'];   // Path where thumb nail image will be stored

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
    public function programremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_programs')->where('id', '=', $id)->get();

                $uploads = '';
                $brouchre = '';
                $syllabus = '';

                foreach($data as $object)
                {
                    $uploads = $object->image;
                    $brouchre = $object->brouchre;
                    $syllabus = $object->syllabus;
                }

                if($uploads != '')
                {
                    File::delete($uploads);
                }
                if($brouchre != '')
                {
                    File::delete($brouchre);
                }
                if($syllabus != '')
                {
                    File::delete($syllabus);
                }
                

                DB::table('tbl_programs')->where('id', $id)->delete();
                DB::table('tbl_program_batch_assigns')->where('program', $id)->delete();

                return redirect('/program-management')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }

    }

    public function removeprogramimage($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_programs')->where('id', '=', $id)->get();
                $uploads = '';
                foreach($data as $object)
                {
                    $uploads = $object->image;
                }

                if($uploads != '')
                {
                    File::delete($uploads);
                }
                
                DB::table('tbl_programs')->where('id', $id)->update(['image' => '']);

                return redirect()->back()->withErrors(['Image Removed Successfully!!']);
            } else { return redirect('/'); }
        }

    }

    public function removepgmbrouchre($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_programs')->where('id', '=', $id)->get();
                $uploads = '';
                foreach($data as $object)
                {
                    $uploads = $object->brouchre;
                }

                if($uploads != '')
                {
                    File::delete($uploads);
                }
                
                DB::table('tbl_programs')->where('id', $id)->update(['brouchre' => '']);

                return redirect()->back()->withErrors(['Brouchre Removed Successfully!!']);
            } else { return redirect('/'); }
        }
    }

    public function removepgmsyllabus($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_programs')->where('id', '=', $id)->get();
                $uploads = '';
                foreach($data as $object)
                {
                    $uploads = $object->syllabus;
                }

                if($uploads != '')
                {
                    File::delete($uploads);
                }
                
                DB::table('tbl_programs')->where('id', $id)->update(['syllabus' => '']);

                return redirect()->back()->withErrors(['Syllabus Removed Successfully!!']);
            } else { return redirect('/'); }
        }
    }
}
