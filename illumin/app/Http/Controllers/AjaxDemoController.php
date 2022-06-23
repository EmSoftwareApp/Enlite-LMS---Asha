<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxDemoController extends Controller
{
    // Centre Approve Starts here

    public function centreapprove(Request $request)
    {
        $states = DB::table('users')->where('id', $request->db_id)->update(['status' => '1']);
        return "Success";
    }

    public function centrereject(Request $request)
    {
        $states = DB::table('users')->where('id', $request->db_id)->update(['status' => '0']);
        return "Success";
    }

    public function centreactive(Request $request)
    {
        $states = DB::table('users')->update(['center_active' => '0']);
        

        $sta = DB::table('users')->where('id', $request->db_id)->update(['center_active' => '1']);
        return "Success";
    }

    // Basic Setings Starts here

    public function basicsettingadd(Request $request)
    {
        $states = DB::table('tbl_basic_settings')->insert(['user' => $request->id, 'value' => $request->val]);
        return "Success";
    }

    public function basicsettingremove(Request $request)
    {
        $states = DB::table('tbl_basic_settings')->where(['user' => $request->id, 'value' => $request->val])->delete();
        return "Success";
    }

    // Course Approve Starts here

    public function courseapprove(Request $request)
    {
        $states = DB::table('tbl_courses')->where('id', $request->db_id)->update(['status' => '1']);
        return "Success";
    }

    public function coursereject(Request $request)
    {
        $states = DB::table('tbl_courses')->where('id', $request->db_id)->update(['status' => '0']);
        return "Success";
    }

    // Qualification Approve Starts here

    public function qualificationapprove(Request $request)
    {
        $states = DB::table('tbl_qualifications')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function qualificationreject(Request $request)
    {
        $states = DB::table('tbl_qualifications')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Program Approve Starts here

    public function programapprove(Request $request)
    {
        $states = DB::table('tbl_programs')->where(['id' => $request->db_id])->update(['status' => '1']);
        $states = DB::table('tbl_program_batch_assigns')->where(['program' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function programreject(Request $request)
    {
        $states = DB::table('tbl_programs')->where(['id' => $request->db_id])->update(['status' => '0']);
        $states = DB::table('tbl_program_batch_assigns')->where(['program' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Topic Approve Starts here

    public function topicapprove(Request $request)
    {
        $states = DB::table('tbl_topics')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function topicreject(Request $request)
    {
        $states = DB::table('tbl_topics')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    //  Load Topic name from Course

    public function selectstatelevel(Request $request)
    {
        $states = DB::table('tbl_topics')->where(['course' => $request->id_country, 'status' => '1'])->pluck("topicname","id")->all();
        $data = view('institution.ajax-select',compact('states'))->render();
        return response()->json(['options'=>$data]);
    }

    //  Load Chapter name from Topic

    public function selectchapterlevel(Request $request)
    {
        $states = DB::table('tbl_chapters')->where(['topic' => $request->id_country, 'status' => '1'])->pluck("chaptername","id")->all();
        $data = view('institution.chapter-select',compact('states'))->render();
        return response()->json(['options'=>$data]);
    }

    // Approve Chapter

    public function chapterapprove(Request $request)
    {
        $states = DB::table('tbl_chapters')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function chapterreject(Request $request)
    {
        $states = DB::table('tbl_chapters')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Approve Video

    public function videoapprove(Request $request)
    {
        $states = DB::table('tbl_videos')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function videoreject(Request $request)
    {
        $states = DB::table('tbl_videos')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Approve Video Program

    public function videoprogramapprove(Request $request)
    {
        $states = DB::table('tbl_assigned_programs')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function videoprogramreject(Request $request)
    {
        $states = DB::table('tbl_assigned_programs')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Approve Program FAQ

    public function programfaqapprove(Request $request)
    {
        $states = DB::table('tbl_faqs')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function programfaqreject(Request $request)
    {
        $states = DB::table('tbl_faqs')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Approve State

    public function stateapprove(Request $request)
    {
        $states = DB::table('tbl_states')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function statereject(Request $request)
    {
        $states = DB::table('tbl_states')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    //  District Approve Starts here

    public function districtapprove(Request $request)
    {
        $states = DB::table('tbl_districts')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function districtreject(Request $request)
    {
        $states = DB::table('tbl_districts')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    //  Student Approve Starts here

    public function studentapprove(Request $request)
    {
        $states = DB::table('users')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function studentreject(Request $request)
    {
        $states = DB::table('users')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    //  Load District from State

    public function selectdistrictlevel(Request $request)
    {
        $states = DB::table('tbl_districts')->where(['state' => $request->id_country, 'status' => '1'])->pluck("district","id")->all();
        $data = view('site.ajax-district-select',compact('states'))->render();
        return response()->json(['options'=>$data]);
    }

    
    //  Instructor Approve Starts here

    public function insapprove(Request $request)
    {
        $states = DB::table('tbl_instructors')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function insreject(Request $request)
    {
        $states = DB::table('tbl_instructors')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    //  Load Program name from Course

    public function selectpgmlevel(Request $request)
    {
        $states = DB::table('tbl_programs')->where(['course' => $request->id_country, 'status' => '1'])->pluck("programname","id")->all();
        $data = view('institution.ajax-pgm-select',compact('states'))->render();
        return response()->json(['options'=>$data]);
    }

    //  Batch Approve Starts here

    public function batchapprove(Request $request)
    {
        $states = DB::table('tbl_batches')->where(['id' => $request->db_id])->update(['status' => '1']);
        $states1 = DB::table('tbl_program_batch_assigns')->where(['batch' => $request->db_id])->update(['status' => '1']);
        $states2 = DB::table('tbl_student_batch_assigns')->where(['batchid' => $request->db_id])->update(['status' => '1']);

        return "Success";
    }

    public function batchreject(Request $request)
    {
        $states = DB::table('tbl_batches')->where(['id' => $request->db_id])->update(['status' => '0']);
        $states1 = DB::table('tbl_program_batch_assigns')->where(['batch' => $request->db_id])->update(['status' => '0']);
        $states2 = DB::table('tbl_student_batch_assigns')->where(['batchid' => $request->db_id])->update(['status' => '0']);

        return "Success";
    } 
    public function notificationapprove(Request $request)
    {
        $states = DB::table('tbl_notifications')->where(['id' => $request->db_id])->update(['status' => '1']);
       
        return "Success";
    }

    public function notificationreject(Request $request)
    {
        $states = DB::table('tbl_notification')->where(['id' => $request->db_id])->update(['status' => '0']);
        
        return "Success";
    } 

    // Batch Assign Starts here

    public function studentbatchassign(Request $request)
    {
        $date =  date('Y-m-d');
        $states = DB::table('tbl_student_batch_assigns')->insert(['batchid' => $request->batch, 'userid' => $request->user, 'created' => $date, 'year' => $request->year, 'instid' => $request->instid]);

        $states1 = DB::table('tbl_user_packages')->insert(['studentid' => $request->user, 'batchid' => $request->batch, 'purchased_on' => $request->batchstart, 'pack_ends_on' => $request->batchend, 'created' => $date, 'year' => $request->year, 'instid' => $request->instid]);

        return "Success";
    }

    public function studentbatchressign(Request $request)
    {
        $states = DB::table('tbl_student_batch_assigns')->where(['batchid' => $request->batch, 'userid' => $request->user])->delete();

        $states1 = DB::table('tbl_user_packages')->where(['studentid' => $request->user, 'batchid' => $request->batch])->delete();

        return "Success";
    }

    // Program Assign Starts here

    public function programbatchassignajx(Request $request)
    {
        $date =  date('Y-m-d');
        $states = DB::table('tbl_program_batch_assigns')->insert(['batch' => $request->batch, 'program' => $request->pgmid, 'created' => $date, 'year' => $request->year, 'instid' => $request->instid]);
        return "Success";
    }

    public function programbatchressignajx(Request $request)
    {
        $states = DB::table('tbl_program_batch_assigns')->where(['batch' => $request->batch, 'program' => $request->pgmid])->delete();
        return "Success";
    }

    //  Package Extension Starts here

    public function packageextend(Request $request)
    {
        $states = DB::table('tbl_user_packages')->where(['id' => $request->id])->update(['pack_ends_on' => $request->dt]);
        return "Success";
    }

    // Approve Designation

    public function desigapprove(Request $request)
    {
        $states = DB::table('tbl_designations')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function desigreject(Request $request)
    {
        $states = DB::table('tbl_designations')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Staff Approve starts here

    public function staffapprove(Request $request)
    {
        $states = DB::table('users')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function staffreject(Request $request)
    {
        $states = DB::table('users')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Previlages Starts here

    public function previlageassign(Request $request)
    {
        $states = DB::table('tbl_previlages')->insert(['previlage' => $request->val, 'user' => $request->userid, 'instid' => $request->instid]);

        return "Success";
    }

    public function previlagereject(Request $request)
    {
        $states = DB::table('tbl_previlages')->where(['previlage' => $request->val, 'user' => $request->userid, 'instid' => $request->instid])->delete();

        return "Success";
    }
    
    // Order update for topic

    public function topicorderassign(Request $request)
    {
        $states = DB::table('tbl_program_topics')->where('id', $request->id)->update(['display_order' => $request->val]);
        return "Success";
    }

    // Approve test difficulty starts here

    public function testdifficultyapprove(Request $request)
    {
        $states = DB::table('tbl_test_difficulties')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function testdifficultyreject(Request $request)
    {
        $states = DB::table('tbl_test_difficulties')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Approve Questions starts here

    public function questionsapprove(Request $request)
    {
        $states = DB::table('tbl_test_questions')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function questionsreject(Request $request)
    {
        $states = DB::table('tbl_test_questions')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Approve Free Video starts here

    public function freevideoapprove(Request $request)
    {
        $states = DB::table('tbl_freevideos')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function freevideoreject(Request $request)
    {
        $states = DB::table('tbl_freevideos')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Featured Program Approve Starts here

    public function featpgmapprove(Request $request)
    {
        $states = DB::table('tbl_programs')->where(['id' => $request->db_id])->update(['featured' => '1']);
        return "Success";
    }

    public function featpgmreject(Request $request)
    {
        $states = DB::table('tbl_programs')->where(['id' => $request->db_id])->update(['featured' => '0']);
        return "Success";
    }

    // App Program Approve Starts here

    public function apppgmapprove(Request $request)
    {
        $states = DB::table('tbl_programs')->where(['id' => $request->db_id])->update(['app' => '1']);
        return "Success";
    }

    public function apppgmreject(Request $request)
    {
        $states = DB::table('tbl_programs')->where(['id' => $request->db_id])->update(['app' => '0']);
        return "Success";
    }

    // Test Name Approve Starts here

    public function testnameapprove(Request $request)
    {
        $states = DB::table('tbl_test_names')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function testnamereject(Request $request)
    {
        $states = DB::table('tbl_test_names')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    // Assign Questions Starts here

    public function questiontestassign(Request $request)
    {
        $date = date('Y-m-d');
        $states = DB::table('tbl_test_assigned_questions')->insert(['question_no' => $request->qtsNo, 'testno' => $request->testno, 'instid' => $request->instid, 'date' => $date]);
        return "Success";
    }

    public function questiontestreject(Request $request)
    {
        $states = DB::table('tbl_test_assigned_questions')->where(['question_no' => $request->qtsNo, 'testno' => $request->testno, 'instid' => $request->instid])->delete();
        return "Success";
    }
    
    public function feedcategoryapprove(Request $request)
    {
        $states = DB::table('tbl_feedcategory')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    public function feedcategoryreject(Request $request)
    {
        $states = DB::table('tbl_feedcategory')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }
    public function labelsaccept(Request $request)
    {
        $states = DB::table('tbl_labels')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }

    public function labelsreject(Request $request)
    {
        $states = DB::table('tbl_labels')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }
    // Approve Material

    public function materialapprove(Request $request)
    {
        $states = DB::table('tbl_materials')->where(['id' => $request->db_id])->update(['status' => '1']);
        return "Success";
    }

    public function materialreject(Request $request)
    {
        $states = DB::table('tbl_materials')->where(['id' => $request->db_id])->update(['status' => '0']);
        return "Success";
    }
    public function newscategoryaccept(Request $request)

    {



        $languages = DB::table('tbl_newscategory')->where(['id' => $request->db_id])->update(['status' => '1']);

        return "Success";

    }



    public function newscategoryreject(Request $request)

    {

        $languages = DB::table('tbl_newscategory')->where(['id' => $request->db_id])->update(['status' => '0']);

        return "Success";

    }
    public function newsdetailsapprove(Request $request)

    {



        $languages = DB::table('tbl_news')->where(['id' => $request->db_id])->update(['status' => '1']);

        return "Success";

    }



    public function newsdetailsreject(Request $request)

    {

        $languages = DB::table('tbl_news')->where(['id' => $request->db_id])->update(['status' => '0']);

        return "Success";

    }
}
