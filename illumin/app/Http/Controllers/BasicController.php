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
use App\Models\tblState;
use App\Models\tblDistrict;
use App\Models\tblDesignation;
use App\Models\tblOptionalSubject;
use App\Models\tblSubject;
use App\Models\tblTestDifficulty;
use App\Models\tblTestName;

class BasicController extends Controller
{

    //  Master data starts here

    public function masterdata()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.masterdata');
            } else { return redirect('/'); }
        }
    }

    //  States Starts here

    public function states()
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_states')->where(['status' => '1', 'instid' => $instid])->orderBy('state', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.states', $data);
                }
                else
                {
                    return view('institution.states');
                }
            } else { return redirect('/'); }
        }
    }
    public function newstate()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.newstate');
            } else { return redirect('/'); }
        }
    }
    public function poststate(Request $req)
    {
        //$this->statevalidation($req);

        $tot = $req->input('tot');
        $instid = Auth::user()->instid;

        for($i=1; $i<=$tot; $i++)
        {
            $state = $req->input('state'.$i);

            if($state != '')
            {
                $req['state'] = $state;

                $entry = DB::table('tbl_states')->where(['state' => $state, 'instid' => $instid])->get(); 
        
                if(count($entry) == 0)
                {
                    tblState::create($req->all());
                }

            }
        }


        /*$state = $req->input('state');

        $entry = DB::table('tbl_states')->where(['state' => $state])->get(); 
        
        if(count($entry) > 0)
        {
            return redirect()->back()->withErrors(['State Already Taken !!']);
        }

        tblState::create($req->all());
        $pstid = DB::getPdo()->lastInsertId();*/

        return redirect()->back()->withErrors(['State Added Successfully!!']);
        
    }
    public function statevalidation($request)
    {
        return $this->Validate($request, [
            'state' => 'required|max:255',
        ]);
    }
    public function viewstate($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {   
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_states')->where(['id' => $id, 'instid' => $instid])->get();

                if(count($data) > 0)
                {
                    return view('institution.viewstate', $data);
                }
                else
                {
                    return view('institution.viewstate');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatestate(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblState::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function stateremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                DB::table('tbl_states')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/states')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }

    //  District Management Starts here

    public function district()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_districts')->where(['status' => '1', 'instid' => $instid])->orderBy('state', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.district', $data);
                }
                else
                {
                    return view('institution.district');
                }
            } else { return redirect('/'); }
        }
    }
    public function newdistrict()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['state'] = DB::table('tbl_states')->where(['status' => '1', 'instid' => $instid])->orderBy('state', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.newdistrict', $data);
                }
                else
                {
                    return view('institution.newdistrict');
                }
            } else { return redirect('/'); }
        }
    }
    public function postdistrict(Request $req)
    {
        //$this->districtvalidation($req);

        $tot = $req->input('tot');
        $instid = Auth::user()->instid;

        for($i=1; $i<=$tot; $i++)
        {
            $state = $req->input('state'.$i);
            $district = $req->input('district'.$i);

            if(($state != '') && ($district != ''))
            {
                $req['state'] = $state;
                $req['district'] = $district;

                $entry = DB::table('tbl_districts')->where(['state' => $state, 'district' => $district, 'instid' => $instid])->get(); 
        
                if(count($entry) == 0)
                {
                    tblDistrict::create($req->all());
                }

            }
        }


        /*$state = $req->input('state');
        $district = $req->input('district');

        $entry = DB::table('tbl_districts')->where(['state' => $state, 'district' => $district])->get(); 
        
        if(count($entry) > 0)
        {
            return redirect()->back()->withErrors(['District Already Taken !!']);
        }

        tblDistrict::create($req->all());
        $pstid = DB::getPdo()->lastInsertId();*/

        return redirect()->back()->withErrors(['Districts Added Successfully!!']);
        
    }
    public function districtvalidation($request)
    {
        return $this->Validate($request, [
            'state' => 'required',
            'district' => 'required|max:255',
        ]);
    }
    public function viewdistrict($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_districts')->where('id', '=', $id)->get();
                $data['state'] = DB::table('tbl_states')->where(['status' => '1', 'instid' => $instid])->orderBy('state', 'asc')->get();
                
                if(count($data) > 0)
                {
                    return view('institution.viewdistrict', $data);
                }
                else
                {
                    return view('institution.viewdistrict');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatedistrict(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblDistrict::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function districtremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                DB::table('tbl_districts')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/district')->withErrors(['Deleted Successfully!!']);
                
            } else { return redirect('/'); }
        }

    }

    // Designation Starts here
    
    public function designation()
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_designations')->where(['status' => '1', 'instid' => $instid])->orderBy('designation', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.designation', $data);
                }
                else
                {
                    return view('institution.designation');
                }
            } else { return redirect('/'); }
        }
    }
    public function optionalsubject()
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_optional_subjects')->where(['status' => '1', 'instid' => $instid])->orderBy('optionalsubject', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.optionalsubject', $data);
                }
                else
                {
                    return view('institution.optionalsubject');
                }
            } else { return redirect('/'); }
        }
    }
	 public function subject()
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_subjects')->where(['status' => '1', 'instid' => $instid])->orderBy('subject', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.subject', $data);
                }
                else
                {
                    return view('institution.subject');
                }
            } else { return redirect('/'); }
        }
    }
   public function newdesignation()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.newdesignation');
            } else { return redirect('/'); }
        }
    }
    public function newoptionalsubject()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.newoptionalsubject');
            } else { return redirect('/'); }
        }
    }
    public function postdesignation(Request $req)
    {

        $tot = $req->input('tot');
        $instid = Auth::user()->instid;

        for($i=1; $i<=$tot; $i++)
        {
            $designation = $req->input('designation'.$i);

            if($designation != '')
            {
                $req['designation'] = $designation;

                $entry = DB::table('tbl_designations')->where(['designation' => $designation, 'instid' => $instid])->get(); 
        
                if(count($entry) == 0)
                {
                    tblDesignation::create($req->all());
                }

            }
        }
        return redirect()->back()->withErrors(['designations Added Successfully!!']);
        
    }
    public function postoptionalsubject(Request $req)
    {

        $tot = $req->input('tot');
        $instid = Auth::user()->instid;

        for($i=1; $i<=$tot; $i++)
        {
            $optionalsubject = $req->input('optionalsubject'.$i);

            if($optionalsubject != '')
            {
                $req['optionalsubject'] = $optionalsubject;

                $entry = DB::table('tbl_optional_subjects')->where(['optionalsubject' => $optionalsubject, 'instid' => $instid])->get(); 
        
                if(count($entry) == 0)
                {
                    tblOptionalSubject::create($req->all());
                }

            }
        }
        return redirect()->back()->withErrors(['optional subjects Added Successfully!!']);
        
    }
     
    public function viewdesignation($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_designations')->where(['id' => $id, 'instid' => $instid])->get();

                if(count($data) > 0)
                {
                    return view('institution.viewdesignation', $data);
                }
                else
                {
                    return view('institution.viewdesignation');
                }
            } else { return redirect('/'); }
        }
    }
    public function viewoptionalsubject($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_optional_subjects')->where(['id' => $id, 'instid' => $instid])->get();

                if(count($data) > 0)
                {
                    return view('institution.viewoptionalsubject', $data);
                }
                else
                {
                    return view('institution.viewoptioanalsubject');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatedesignation(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblDesignation::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function updateoptionalsubject(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblOptionalSubject::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function designationremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                DB::table('tbl_designations')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/designation')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
    public function optionalsubjectremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                DB::table('tbl_optional_subjects')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/optionalsubject')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
//subject
public function newsubject()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.newsubject');
            } else { return redirect('/'); }
        }
    }
    public function postsubject(Request $req)
    {

        $tot = $req->input('tot');
        $instid = Auth::user()->instid;

        for($i=1; $i<=$tot; $i++)
        {
            $subject = $req->input('subject'.$i);

            if($subject != '')
            {
                $req['subject'] = $subject;

                $entry = DB::table('tbl_subjects')->where(['subject' => $subject, 'instid' => $instid])->get(); 
        
                if(count($entry) == 0)
                {
                    tblSubject::create($req->all());
                }

            }
        }
        return redirect()->back()->withErrors(['subject Added Successfully!!']);
        
    }
    
    public function viewsubject($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_subjects')->where(['id' => $id, 'instid' => $instid])->get();

                if(count($data) > 0)
                {
                    return view('institution.viewsubject', $data);
                }
                else
                {
                    return view('institution.viewsubject');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatesubject(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblSubject::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function subjectremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                DB::table('tbl_subjects')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/subject')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
    // Test difficulty Starts here
    
    public function testdifficulty()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_test_difficulties')->where([ 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.testdifficulty', $data);
                }
                else
                {
                    return view('institution.testdifficulty');
                }
            } else { return redirect('/'); }
        }
    }
    public function newtestdifficulty()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                return view('institution.newtestdifficulty');
            } else { return redirect('/'); }
        }
    }
    public function posttestdifficulty(Request $req)
    {
        $tot = $req->input('tot');
        $instid = Auth::user()->instid;

        for($i=1; $i<=$tot; $i++)
        {
            $level = $req->input('level'.$i);
            $shortname = $req->input('shortname'.$i);

            if($level != '')
            {
                $req['level'] = $level;
                $req['shortname'] = $shortname;

                $entry = DB::table('tbl_test_difficulties')->where(['level' => $level, 'instid' => $instid])->get(); 
        
                if(count($entry) == 0)
                {
                    tblTestDifficulty::create($req->all());
                }

            }
        }
        return redirect()->back()->withErrors(['Test difficulty Added Successfully!!']);
        
    }
    
    public function viewtestdifficulty($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_test_difficulties')->where(['id' => $id, 'instid' => $instid])->get();

                if(count($data) > 0)
                {
                    return view('institution.viewtestdifficulty', $data);
                }
                else
                {
                    return view('institution.viewtestdifficulty');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatetestdifficulty(Request $req)
    {
        
        $id = $req->input('id');

        $userUpdate  = tblTestDifficulty::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function testdifficultyremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                DB::table('tbl_test_difficulties')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/test-difficulty')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }

     // Test Name Starts here
    
    public function testnames()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_test_names')->where([ 'instid' => $instid])->orderBy('id', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.testnames', $data);
                }
                else
                {
                    return view('institution.testnames');
                }
            } else { return redirect('/'); }
        }
    }
    public function newtestnames()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                if(count($data) > 0)
                {
                    return view('institution.newtestnames', $data);
                }
                else
                {
                    return view('institution.newtestnames');
                }
            } else { return redirect('/'); }
        }
    }
    public function posttestname(Request $req)
    {
        $tot = $req->input('tot');
        $instid = Auth::user()->instid;
        $course = $req->input('course');

        for($i=1; $i<=$tot; $i++)
        {
            $testname = $req->input('testname'.$i);
            $testshortname = $req->input('testshortname'.$i);

            $totalquestions = $req->input('totalquestions'.$i);
            $totaltime = $req->input('totaltime'.$i);
            $totalmarks = $req->input('totalmarks'.$i);
            $negativemarks = $req->input('negativemarks'.$i);

            if($testname != '')
            {
                $req['testname'] = $testname;
                $req['testshortname'] = $testshortname;
                $req['totalquestions'] = $totalquestions;
                $req['totaltime'] = $totaltime;
                $req['totalmarks'] = $totalmarks;
                $req['negativemarks'] = $negativemarks;

                $entry = DB::table('tbl_test_names')->where(['testname' => $testname, 'instid' => $instid])->get(); 
        
                if(count($entry) == 0)
                {
                    tblTestName::create($req->all());
                }

            }
        }
        return redirect()->back()->withErrors(['Test Name Added Successfully!!']);
        
    }
    
    public function viewtestnames($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['course'] = DB::table('tbl_courses')->where(['status' => '1', 'instid' => $instid])->orderBy('id', 'asc')->get();
                $data['data'] = DB::table('tbl_test_names')->where(['id' => $id, 'instid' => $instid])->get();

                if(count($data) > 0)
                {
                    return view('institution.viewtestnames', $data);
                }
                else
                {
                    return view('institution.viewtestnames');
                }
            } else { return redirect('/'); }
        }
    }
    public function updatetestname(Request $req)
    {
        $id = $req->input('id');

        $userUpdate  = tblTestName::where('id',$id)->first();
        if ($userUpdate) {
           $speak = $userUpdate->update($req->all());
        }
        
        return redirect()->back()->withErrors(['Updation completed Successfully!!']);
    } 
    public function testnameremove($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                DB::table('tbl_test_names')->where(['id' => $id, 'instid' => $instid])->delete();

                return redirect('/test-names')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
}
