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
use App\tblFreevideo;
use App\Models\tblMaterial;

class FreeMeterialController extends Controller
{
    public function freevideo()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_freevideos')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.freevideo', $data);
                }
                else
                {
                    return view('institution.freevideo');
                }
            } else { return redirect('/'); }
        }
    }
    public function newfreevideo()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
               
                if(count($data) > 0)
                {
                   return view('institution.newfreevideo', $data);
                }
                else
                {
                   return view('institution.newfreevideo');
                }
            } else { return redirect('/'); }
        }
    }
    public function postfreevideo(Request $req)
    {
        $this->freevideovalidation($req);

        tblFreevideo::create($req->all());

        return redirect()->back()->withErrors(['Free Video Added Successfully!!']);
        
    }
    public function freevideovalidation($request)
    {
    	return $this->Validate($request, [
            'course' => 'required',
            'url' => 'required',
        ]);
    }
    
    public function viewfreevideo($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_freevideos')->where(['id' => $id , 'instid' => $instid])->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewfreevideo', $data);
                }
                else
                {
                    return view('institution.viewfreevideo');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatefreevideo(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblFreevideo::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function freevideoremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                DB::table('tbl_freevideos')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/free-video')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }

    public function materialmanagement()
    {
        if (!Auth::check()) { return redirect('/'); } else {
		
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_materials')->where(['instid' => $instid])->orderBy('id', 'asc')->get();
                $data['pgm'] = DB::table('tbl_programs')->where(['instid' => $instid])->orderBy('programname', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.materialmanagement', $data);
                }
                else
                {
                    return view('institution.materialmanagement');
                }
            } else { return redirect('/'); }
        }
    }
    public function materialmanagementfind($pgm)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_materials')->where(['instid' => $instid, 'program' => $pgm])->orderBy('id', 'asc')->get();
                $data['pgm'] = DB::table('tbl_programs')->where(['instid' => $instid])->orderBy('programname', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.materialmanagement', $data);
                }
                else
                {
                    return view('institution.materialmanagement');
                }
            } else { return redirect('/'); }
        }
    }
    public function newmaterial()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_programs')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['labels'] = DB::table('tbl_labels')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                   return view('institution.newmaterial', $data);
                }
                else
                {
                   return view('institution.newmaterial');
                }
            } else { return redirect('/'); }
        }
    }
    public function postmaterial(Request $req)
    {
        $this->materialvalidation($req);
        
       

        $file1 = $req->file('file1'); // Assignment
        

        tblMaterial::create($req->all());
        $pstid = DB::getPdo()->lastInsertId();

        // Vimeo management stars here


        if($file1 != "")
        {
        	$time = time();

			if ($_FILES['file1']['size'] > 1048576) {
				//return redirect('/audio-management')->withErrors(['Audio Details Added Successfully!! Unable to add File due to large size!!']);
			}
			else
			{
                $dirpath = realpath(dirname(getcwd()));
				$add="material_uploads/".$time.$_FILES['file1']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

				if(move_uploaded_file ($_FILES['file1']['tmp_name'],$dirpath.'/'.$add)) 
				{

					$images[] = $add;
			        DB::table('tbl_materials')->where('id', $pstid)->update(['material' => $add]);

				}
				/*else
				{
					return redirect('/audio-management')->withErrors(['Audio Details Added Successfully!! Unable to add file!!']);
				}*/
			}
			

		}

	
        //return redirect('/audio-management')->withErrors(['Audio Added Successfully!!']);
        return redirect()->back()->withErrors(['Material Added Successfully!!']);
        
    }
    public function materialvalidation($request)
    {
    	return $this->Validate($request, [
            'program' => 'required',
            //'topic' => 'required',
            //'chapter' => 'required',
            'file1' => 'mimetypes:application/pdf|max:10000',
           // 'image2' => 'mimetypes:application/pdf|max:10000'
        ]);
    }
    public function viewmaterial($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_materials')->where('id', '=', $id)->get();
                $data['course'] = DB::table('tbl_programs')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['labels'] = DB::table('tbl_labels')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewmaterial', $data);
                }
                else
                {
                    return view('institution.viewmaterial');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatematerial(Request $req)
    {
        $this->materialvalidation($req);
        //$vimeo = '1';
        $id = $req->input('id');
        $file1 = $req->file('file1');
        $primage= $req->input('primage');
       
        

        $userUpdate  = tblMaterial::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }

        // Vimeo management stars here


        if($file1 != "")
        {
        	$time = time();

			if ($_FILES['file1']['size'] > 1048576) {
				//return redirect()->back()->withErrors(['Audio Details Updated Successfully!! Unable to add File due to large size!!']);
			}
			else
			{
				$add="material_uploads/".$time.$_FILES['file1']['name']; // the path with the file name where the file will be stored, upload is the directory name. 

				if(move_uploaded_file ($_FILES['file1']['tmp_name'],$add)) 
				{

					$images[] = $add;
			        DB::table('tbl_materials')->where('id', $id)->update(['material' => $add]);
			        File::delete($primage);

				}
				/*else
				{
					return redirect()->back()->withErrors(['Audio Details Updated Successfully!! Unable to add file!!']);
				}*/
			}
			

		}
		
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function materialremove($id)
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $data = DB::table('tbl_materials')->where('id', '=', $id)->get();
            	$uploads = '';
            	foreach($data as $object)
            	{
            		$uploads = $object->material;
            	}

            	if($uploads != '')
            	{
            		File::delete($uploads);
            	}
                
                DB::table('tbl_materials')->where('id', $id)->delete();

                //DB::table('tbl_assigned_programs')->where(['prid' => $id, 'type' => 'audio'])->delete();

                return redirect('/material-management')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }

    }
}
