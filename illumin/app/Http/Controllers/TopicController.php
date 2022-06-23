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
use App\tblTopic;
use App\Models\tblProgramTopic;

class TopicController extends Controller
{
    public function topicmanagement()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_topics')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.topicmanagement', $data);
                }
                else
                {
                    return view('institution.topicmanagement');
                }
            } else { return redirect('/'); }
        }
    }
    public function newtopic()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
               
                if(count($data) > 0)
                {
                   return view('institution.newtopic', $data);
                }
                else
                {
                   return view('institution.newtopic');
                }
            } else { return redirect('/'); }
        }
    }
    public function posttopic(Request $req)
    {
        //$this->topicvalidation($req);

        $tot = $req->input('tot');
        $instid = Auth::user()->instid;

        for($i=1; $i<=$tot; $i++)
        {
            $topicname = $req->input('topicname'.$i);
            $course = $req->input('course'.$i);

            if(($topicname != '') && ($course != ''))
            {
                $req['topicname'] = $topicname;
                $req['course'] = $course;

                $entry = DB::table('tbl_topics')->where(['topicname' => $topicname, 'course' => $course])->get(); 
                if(count($entry) == 0)
                {
                    tblTopic::create($req->all());
                }

            }
        }

        return redirect()->back()->withErrors(['Topic Added Successfully!!']);
        
    }
    public function topicvalidation($request)
    {
    	return $this->Validate($request, [
            'topicname' => 'required',
            'course' => 'required',
        ]);
    }
    
    public function viewtopic($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_topics')->where(['id' => $id , 'instid' => $instid])->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewtopic', $data);
                }
                else
                {
                    return view('institution.viewtopic');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatetopic(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblTopic::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function topicremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                DB::table('tbl_topics')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/topic-management')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }

    public function topicprogrmassign($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_topics')->where(['id' => $id , 'instid' => $instid])->get();
                $data['pgm'] = DB::table('tbl_programs')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['pgmtopic'] = DB::table('tbl_program_topics')->where(['topic' => $id, 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.topicprogrmassign', $data);
                }
                else
                {
                    return view('institution.topicprogrmassign');
                }
            } else { return redirect('/'); }
        }
    }

    public function posttopicprogram(Request $req)
    {
        //$this->topicvalidation($req);

        $topic = $req->input('topic');
        $program = $req->input('program');
        $instid = Auth::user()->instid;

        

            if(($topic != '') && ($program != ''))
            {
                $entry = DB::table('tbl_program_topics')->where(['topic' => $topic, 'program' => $program, 'instid' => $instid])->get(); 
                if(count($entry) == 0)
                {
                    tblProgramTopic::create($req->all());

                    return redirect()->back()->withErrors(['Assigned Successfully!!']);
                }
                else{
                    return redirect()->back()->withErrors(['Combination Already Present!!']);
                }

            }
            else
            {
                return redirect()->back()->withErrors(['Topic & Program Required!!']);
            }
        
    }

    public function topicprogramremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                DB::table('tbl_program_topics')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect()->back()->withErrors(['Removed Successfully!!']);
            } else { return redirect('/'); }
        }
    }

    // Topic Program Ordering Starts here

    public function topicorder()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['pgm'] = DB::table('tbl_programs')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.topicorder', $data);
                }
                else
                {
                    return view('institution.topicorder');
                }
            } else { return redirect('/'); }
        }
    }
    public function posttopicorder(Request $req)
    {
        //$this->topicvalidation($req);
        $program = $req->input('program');
        $instid = Auth::user()->instid;
        
        $data['pgm'] = DB::table('tbl_programs')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
        $data['data'] = DB::table('tbl_program_topics')->where(['program' => $program, 'instid' => $instid])->orderBy('display_order', 'asc')->get();
        if(count($data) > 0)
        {
            return view('institution.topicorderlist', $data);
        }
        else
        {
            return view('institution.topicorderlist');
        }
    }
}
