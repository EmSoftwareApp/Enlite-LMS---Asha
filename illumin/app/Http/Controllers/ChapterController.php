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
use App\tblChapter;

class ChapterController extends Controller
{
    public function chaptermanagement()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                $data['data'] = DB::table('tbl_chapters')->where(['instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.chaptermanagement', $data);
                }
                else
                {
                    return view('institution.chaptermanagement');
                }
            } else { return redirect('/'); }
        }
    }
    public function newchapter()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
               
                if(count($data) > 0)
                {
                   return view('institution.newchapter', $data);
                }
                else
                {
                   return view('institution.newchapter');
                }
            } else { return redirect('/'); }
        }
    }
    public function postchapter(Request $req)
    {
        //$this->chaptervalidation($req);

        $tot = $req->input('tot');

        for($i=1; $i<=$tot; $i++)
        {
            $chaptername = $req->input('chaptername'.$i);
            $topic = $req->input('topic'.$i);
            $course = $req->input('course'.$i);

            if(($chaptername != '') && ($topic != '') && ($course != ''))
            {
                $req['chaptername'] = $chaptername;
                $req['topic'] = $topic;
                $req['course'] = $course;

                tblChapter::create($req->all());
                $pstid = DB::getPdo()->lastInsertId();
            }
        }

        //return redirect('/chapter-management')->withErrors(['Course Added Successfully!!']);
        return redirect()->back()->withErrors(['Chapter Added Successfully!!']);
        
    }
    public function chaptervalidation($request)
    {
    	return $this->Validate($request, [
            'course' => 'required',
            'topic' => 'required',
            'chaptername' => 'required',
        ]);
    }
    
    public function viewchapter($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_chapters')->where('id', '=', $id)->get();
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.viewchapter', $data);
                }
                else
                {
                    return view('institution.viewchapter');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatechapter(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblChapter::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function chapterremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                DB::table('tbl_chapters')->where('id', $id)->delete();

                return redirect('/chapter-management')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
}
