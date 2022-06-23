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
use App\tblVideo;
use App\tblAssignedProgram;
use App\tblComments;


class VideoController extends Controller
{
    public function videomanagement()
    {
        if (!Auth::check()) { return redirect('/'); } else {
		
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_videos')->where(['instid' => $instid])->orderBy('id', 'asc')->get();
                $data['pgm'] = DB::table('tbl_programs')->where(['instid' => $instid])->orderBy('programname', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.videomanagement', $data);
                }
                else
                {
                    return view('institution.videomanagement');
                }
            } else { return redirect('/'); }
        }
    }
    public function videomanagementfind($pgm)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_videos')->where(['instid' => $instid, 'program' => $pgm])->orderBy('id', 'asc')->get();
                $data['pgm'] = DB::table('tbl_programs')->where(['instid' => $instid])->orderBy('programname', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.videomanagement', $data);
                }
                else
                {
                    return view('institution.videomanagement');
                }
            } else { return redirect('/'); }
        }
    }
    public function newvideo()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
               
                if(count($data) > 0)
                {
                   return view('institution.newvideo', $data);
                }
                else
                {
                   return view('institution.newvideo');
                }
            } else { return redirect('/'); }
        }
    }
    public function postvideo(Request $req)
    {
        $this->videovalidation($req);
        
        $url = $req->input('url');

        $image = $req->file('image1'); // Assignment
        $image2 = $req->file('image2'); // Downloads

        tblVideo::create($req->all());
        $pstid = DB::getPdo()->lastInsertId();

        // Vimeo management stars here

        if (strpos($url, 'youtube') > 0) {
            $type = 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
           $type = 'vimeo';
        } else {
            $type = 'unknown';
        }

        

        if(($type == 'vimeo') && ($url != ''))
        {
            $url = "http://vimeo.com/api/oembed.json?url=".$url;
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            $contents = curl_exec($ch);
            if (curl_errno($ch)) {
              echo curl_error($ch);
              echo "\n<br />";
              $contents = '';
            } else {
              curl_close($ch);
            }

            if (!is_string($contents) || !strlen($contents)) {
                $contents = '';
            }

                //if( !$vimeo_url ) return false;
                $data = json_decode( $contents );
               
                //if( !$data ) return false;
            $thumb = $data->thumbnail_url;
            
            if($thumb != '')
            {
                DB::table('tbl_videos')->where('id', $pstid)->update(['thumb_url' => $thumb]);
            }
        }
        

        if($image != "")
        {
        	$time = time();

			if ($_FILES['image1']['size'] > 1048576) {
				//return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add File due to large size!!']);
			}
			else
			{
				$add="video_uploads/".$time.$_FILES['image1']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

				if(move_uploaded_file ($_FILES['image1']['tmp_name'],$add)) 
				{

					$images[] = $add;
			        DB::table('tbl_videos')->where('id', $pstid)->update(['uploads' => $add]);

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
				$add1="video_downloads/".$time.$_FILES['image2']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

				if(move_uploaded_file ($_FILES['image2']['tmp_name'],$add1)) 
				{

					$images[] = $add1;
			        DB::table('tbl_videos')->where('id', $pstid)->update(['downloads' => $add1]);

				}
				/*else
				{
					return redirect('/video-management')->withErrors(['Video Details Added Successfully!! Unable to add file!!']);
				}*/
			}
			
			

		}
        //return redirect('/video-management')->withErrors(['Video Added Successfully!!']);
        return redirect()->back()->withErrors(['Video Added Successfully!!']);
        
    }
    public function videovalidation($request)
    {
    	return $this->Validate($request, [
            'course' => 'required',
            'topic' => 'required',
            'chapter' => 'required',
            'image1' => 'mimetypes:application/pdf|max:10000',
            'image2' => 'mimetypes:application/pdf|max:10000'
        ]);
    }
    
    public function viewvideo($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_videos')->where('id', '=', $id)->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewvideo', $data);
                }
                else
                {
                    return view('institution.viewvideo');
                }
            } else { return redirect('/'); }
        }
    }
	public function videocomments($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_comments')
				->select('*','tbl_comments.id as cid')
				->join('users', 'tbl_comments.user_id', '=', 'users.id')
				->where('video_id', '=', $id)->get();
                

                if(count($data) > 0)
                {
                    return view('institution.viewcomments', $data);
                }
                else
                {
                    return view('institution.viewcomments');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatevideo(Request $req)
    {
        $this->videovalidation($req);
        //$vimeo = '1';
        $id = $req->input('id');
        $image = $req->file('image1');
        $primage= $req->input('primage');
        $image1 = $req->file('image2');
        $prdownload= $req->input('prdownload');
        $thumb_url= $req->input('thumb_url');
        $url= $req->input('url');

        $userUpdate  = tblVideo::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }

        // Vimeo management stars here

        if (strpos($url, 'youtube') > 0) {
            $type = 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
           $type = 'vimeo';
        } else {
            $type = 'unknown';
        }
        if(($type == 'vimeo') && ($thumb_url == '') && ($url != ''))
        {
            $url = "http://vimeo.com/api/oembed.json?url=".$url;
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
            $contents = curl_exec($ch);
            if (curl_errno($ch)) {
              echo curl_error($ch);
              echo "\n<br />";
              $contents = '';
            } else {
              curl_close($ch);
            }

            if (!is_string($contents) || !strlen($contents)) {
                $contents = '';
            }

                //if( !$vimeo_url ) return false;
                $data = json_decode( $contents );
               
                //if( !$data ) return false;
            $thumb = $data->thumbnail_url;
            
            if($thumb != '')
            {
                DB::table('tbl_videos')->where('id', $id)->update(['thumb_url' => $thumb]);
            }
        }

        if($image != "")
        {
        	$time = time();

			if ($_FILES['image1']['size'] > 1048576) {
				//return redirect()->back()->withErrors(['Video Details Updated Successfully!! Unable to add File due to large size!!']);
			}
			else
			{
				$add="video_uploads/".$time.$_FILES['image1']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

				if(move_uploaded_file ($_FILES['image1']['tmp_name'],$add)) 
				{

					$images[] = $add;
			        DB::table('tbl_videos')->where('id', $id)->update(['uploads' => $add]);
			        File::delete($primage);

				}
				/*else
				{
					return redirect()->back()->withErrors(['Video Details Updated Successfully!! Unable to add file!!']);
				}*/
			}
			

		}
		if($image1 != "")
        {
        	$time = time();

			if ($_FILES['image2']['size'] > 1048576) {
				//return redirect()->back()->withErrors(['Video Details Updated Successfully!! Unable to add File due to large size!!']);
			}
			else
			{
				$add1="video_downloads/".$time.$_FILES['image2']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

				if(move_uploaded_file ($_FILES['image2']['tmp_name'],$add1)) 
				{

					$images[] = $add1;
			        DB::table('tbl_videos')->where('id', $id)->update(['downloads' => $add1]);
			        File::delete($prdownload);

				}
				/*else
				{
					return redirect()->back()->withErrors(['Video Details Updated Successfully!! Unable to add file!!']);
				}*/
			}
			

		}
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function videoremove($id)
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_videos')->where('id', '=', $id)->get();
            	$uploads = '';
            	foreach($data as $object)
            	{
            		$uploads = $object->uploads;
            	}

            	if($uploads != '')
            	{
            		File::delete($uploads);
            	}
                
                DB::table('tbl_videos')->where('id', $id)->delete();

                DB::table('tbl_assigned_programs')->where(['prid' => $id, 'type' => 'video'])->delete();

                return redirect('/video-management')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }

    }

    public function removevideoassignment($id)
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_videos')->where('id', '=', $id)->get();
            	$uploads = '';
            	foreach($data as $object)
            	{
            		$uploads = $object->uploads;
            	}

            	if($uploads != '')
            	{
            		File::delete($uploads);
            	}
                
                DB::table('tbl_videos')->where('id', $id)->update(['uploads' => '']);

                return redirect()->back()->withErrors(['Removed Successfully!!']);
            } else { return redirect('/'); }
        }
    }

    public function removevideodownload($id)
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_videos')->where('id', '=', $id)->get();
            	$downloads = '';
            	foreach($data as $object)
            	{
            		$downloads = $object->downloads;
            	}

            	if($downloads != '')
            	{
            		File::delete($downloads);
            	}
                
                DB::table('tbl_videos')->where('id', $id)->update(['downloads' => '']);

                return redirect()->back()->withErrors(['Removed Successfully!!']);
            } else { return redirect('/'); }
        }
    }

    public function videoprogram($id, $course)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data['data'] = DB::table('tbl_assigned_programs')->where(['prid' => $id, 'type' => 'video'])->orderBy('id', 'asc')->get();
                $data['program'] = DB::table('tbl_programs')->where(['status' => '1', 'course' => $course])->orderBy('id', 'asc')->get();
                
                if(count($data) > 0)
                {
                    return view('institution.videoprogram', $data);
                }
                else
                {
                    return view('institution.videoprogram');
                }
            } else { return redirect('/'); }
        }
    }

    // Assign Program Starts here

    public function postassignprogram(Request $req)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {

                $prid = $req->input('prid');   // Here Pr Id reffers to video ID - This is needed for 4 different Areas
                $programid = $req->input('programid');
                $type = $req->input('type');

                $data = DB::table('tbl_assigned_programs')->where(['prid' => $prid, 'programid' => $programid, 'type' => $type])->get();
                

                if(count($data) > 0)
                {
                	return redirect()->back()->withErrors(['Program Already Assigned!!']);
                }
                else
                {
                	tblAssignedProgram::create($req->all());

                	return redirect()->back()->withErrors(['Program Assigned Successfully!!']);
                }
            } else { return redirect('/'); }
        }
           
    }
    public function videoprogramremove($id)
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                DB::table('tbl_assigned_programs')->where('id', $id)->delete();

                return redirect()->back()->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
	public function replycomment(Request $req)
    {
       // $this->videovalidation($req);
        
        
		$video_id = $req->input('video_id');

        tblComments::create($req->all());
        //$pstid = DB::getPdo()->lastInsertId();
return redirect('/video-comments/'.$video_id);
       
        //return redirect('/video-management')->withErrors(['Video Added Successfully!!']);
       // return redirect()->back()->withErrors(['Comments Added Successfully!!']);
        
    }
}
