<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCourseController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\AjaxDemoController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\UserSigninController;
use App\Http\Controllers\InstSigninController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\StudentSigninController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FreeMeterialController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/oldcourses', [UserCourseController::class, 'oldcourses']);
Route::get('/home', function () { return view('student.home'); });
Route::get('/studenthome', [StudentSigninController::class, 'studenthome']);

Route::get('/', function () { return view('student.login'); });
Route::get('/courses', [UserCourseController::class, 'courses']);

// feed data in masterdata admin panel
Route::get('/feedcategory',[FeedController::class, 'feedcategory']);// viewing feed category at masterdata
Route::get('/new-feedcategory',[FeedController::class, 'addfeedcategory']);// add new feed category at masterdata
Route::post('/post-feedcategory', [FeedController::class, 'postfeedcategory']); // post feed category new to db
Route::post('feedcategory-approve', ['as'=>'feedcategory-approve','uses'=>[AjaxDemoController::class, 'feedcategoryapprove']]);
Route::post('feedcategory-reject', ['as'=>'feedcategory-reject','uses'=>[AjaxDemoController::class, 'feedcategoryreject']]);

 Route::get('/view-feedcategory/{id}',[FeedController::class, 'viewfeedcategory']);// editing form for feed category at masterdata
  Route::post('/update-feedcategory',[FeedController::class, 'updatfeedcategory']);//updation
  Route::get('/feedcategory-remove/{id}',[FeedController::class, 'removefeedcategory']);//deletion

Route::get('/new-notification', [BatchController::class, 'newnotification']);
Route::post('/post-notification', [BatchController::class, 'postnotification']);
Route::post('notification-approve', ['as'=>'notification-approve','uses'=>[AjaxDemoController::class, 'notificationapprove']]);
Route::post('notification-reject', ['as'=>'notification-reject','uses'=>[AjaxDemoController::class, 'notificationreject']]);
Route::get('/view-notification/{id}', [BatchController::class, 'viewnotification']);
Route::post('/update-notification',[BatchController::class, 'updatenotification']);
Route::get('/notification-remove/{id}',[BatchController::class, 'notificationremove']);

Route::get('/labels',[FeedController::class, 'labels']);// View labels
 Route::get('/new-labels',[FeedController::class, 'newlabel']);// adding new labels at masterdata
 Route::post('/post-labels', [FeedController::class, 'postlabel']); // submitting new labels
 Route::post('labels-approve', ['as'=>'labels-approve','uses'=>[AjaxDemoController::class, 'labelsaccept']]);
Route::post('labels-reject', ['as'=>'labels-reject','uses'=>[AjaxDemoController::class, 'labelsreject']]);
 Route::get('/view-labels/{id}',[FeedController::class, 'viewlabel']);// editing form for labels at masterdata
  Route::post('/update-labels',[FeedController::class, 'updatelabel']);//updation labels
  Route::get('/labels-remove/{id}',[FeedController::class, 'removelabel']);//deletion labels

  Route::get('/feeds',[FeedController::class, 'feeds']);// view feed at admin panel page
Route::get('/new-feed',[FeedController::class, 'newfeed']);// view form for  new feed details : admin panel
Route::get('/view-feed/{id}',[FeedController::class, 'viewfeed']);// view form for  new feed details : admin panel
Route::post('/post-feed', [FeedController::class, 'postfeed']); // db updation new feed
Route::post('feed-approve', ['as'=>'feed-approve','uses'=>[AjaxDemoController::class, 'feedapprove']]);// feed approve for front view
Route::post('feed-reject', ['as'=>'feed-reject','uses'=>[AjaxDemoController::class, 'feedreject']]);// rejecting from viewing front
Route::get('/update-feed/{id}', [FeedController::class, 'updatefeed']);// update or editfeed page
Route::get('/feed-remove/{id}',[FeedController::class, 'removefeed']);
Route::post('/update-feed', [FeedController::class, 'updatefeed']); // db updation new feed


Route::post('popular-fapprove', ['as'=>'popular-fapprove','uses'=>[FeedController::class, 'popularfapprove']]);
 Route::post('popular-freject', ['as'=>'popular-freject','uses'=>[FeedController::class, 'popularfreject']]);

 Route::post('popular-bapprove', ['as'=>'popular-bapprove','uses'=>[FeedController::class, 'popularbapprove']]);
 Route::post('popular-breject', ['as'=>'popular-breject','uses'=>[FeedController::class, 'popularbreject']]);


 Route::get('/material-management',[FreeMeterialController::class, 'materialmanagement']);
 Route::get('/material-management-find/{id}',[FreeMeterialController::class, 'materialmanagementfind']);
 Route::get('/new-material', [FreeMeterialController::class, 'newmaterial']);
 Route::post('/post-material', [FreeMeterialController::class, 'postmaterial']);
 Route::post('material-approve', ['as'=>'material-approve','uses'=>[AjaxDemoController::class, 'materialapprove']]);
 Route::post('material-reject', ['as'=>'material-reject','uses'=>[AjaxDemoController::class, 'materialreject']]);
 Route::get('/view-material/{id}', [FreeMeterialController::class, 'viewmaterial']);
 Route::post('/update-material',[FreeMeterialController::class, 'updatematerial']);
 Route::get('/material-remove/{id}',[FreeMeterialController::class, 'materialremove']);

 Route::get('/newscategory',[FeedController::class, 'newscategory']);// View labels
 Route::get('/new-newscategory',[FeedController::class, 'newnewscategory']);// adding new labels at masterdata
 Route::post('/post-newscategory', [FeedController::class, 'postnewscategory']); // submitting new labels
 Route::post('newscategory-approve', ['as'=>'newscategory-approve','uses'=>[AjaxDemoController::class, 'newscategoryaccept']]);
Route::post('newscategory-reject', ['as'=>'newscategory-reject','uses'=>[AjaxDemoController::class, 'newscategoryreject']]);
 Route::get('/view-newscategory/{id}',[FeedController::class, 'viewnewscategory']);// editing form for labels at masterdata
  Route::post('/update-newscategory',[FeedController::class, 'updatenewscategory']);//updation labels
  Route::get('/newscategory-remove/{id}',[FeedController::class, 'removenewscategory']);//deletion labels
  Route::get('/newsdetails',[FeedController::class, 'newsdetails']);// view blog at admin panel page

Route::get('/new-newsdetails',[FeedController::class, 'newblog']);// view form for  new blog details : admin panel
Route::post('/post-newsdetails', [FeedController::class, 'postBlog']); // db updation new blog
Route::post('news-approve', ['as'=>'news-approve','uses'=>[AjaxDemoController::class, 'newsdetailsapprove']]);// blog approve for front view
Route::post('news-reject', ['as'=>'news-reject','uses'=>[AjaxDemoController::class, 'newsdetailsreject']]);// rejecting from viewing front
Route::get('/view-newsdetails/{id}', [FeedController::class, 'updateblog']);// update or editblog page
Route::get('/newsdetails-remove/{id}',[FeedController::class, 'removeblog']);
Route::post('/update-newsdetails', [FeedController::class, 'updateblogdata']); // db updation new blog

Route::get('/site-manager', function () { return view('institution.login'); });
Route::post('/inst-login', [InstSigninController::class, 'instlogin']);
Route::get('/inst-signup', function () { return view('institution.signup'); });
Route::post('/inst-register', [InstSigninController::class, 'instregister']);
Route::get('/inst-forgotpassword', function () { return view('institution.forgotpassword'); });
Route::post('/inst-postforgotpassword', [InstSigninController::class, 'instpostforgotpassword']);

Route::get('/insthome', [InstSigninController::class, 'insthome']);
Route::get('/instlogout', [InstSigninController::class, 'instlogout']);
Route::get('/instsettings', [SettingsController::class, 'instsettings']);
Route::post('/update-instpassword', [SettingsController::class, 'updateinstpassword']);

Route::get('/login', function () { return view('site.login'); });

Route::get('/user-login', function () { return view('site.userlogin'); });
Route::get('/courses',  [UserCourseController::class, 'courses']);
Route::get('/signup', function () { return view('site.signup'); });
Route::post('/user-signup',  [UserSigninController::class, 'usersignup']);
Route::get('/video-courses',  [UserCourseController::class, 'videocourses']);
Route::get('/test-courses',  [UserCourseController::class, 'testcourses']);
Route::post('/student-login',  [StudentSigninController::class, 'studentlogin']);
Route::get('/oldhome',  [StudentSigninController::class, 'home']);
Route::get('/logout',  [StudentSigninController::class, 'logout']);
Route::get('/passwordsettings', [SettingsController::class, 'passwordsettings']);
Route::post('/update-password', [SettingsController::class, 'updatepassword']);
Route::get('/forgotpassword', function () { return view('site.forgotpassword'); });
Route::post('/post-forgotpassword',  [StudentSigninController::class, 'postforgotpassword']);

Route::get('/accountsettings', [StudentAccountController::class, 'accountsettings']);
Route::post('/update-account', [StudentAccountController::class, 'updateaccount']);
Route::post('select-district-level', ['as'=>'select-district-level','uses'=>[AjaxDemoController::class, 'selectdistrictlevel']]);
Route::get('/remove-profile-pic/{id}', [StudentAccountController::class, 'removeprofilepic']);
Route::get('/myprofile', [StudentAccountController::class, 'myprofile']);
Route::get('/mywall', [StudentAccountController::class, 'mywall']);

Route::get('/new-faculty', [FacultyController::class, 'newfaculty']);
Route::post('/post-faculty',  [FacultyController::class, 'postfaculty']);
Route::get('/faculty-management', [FacultyController::class, 'facultymanagement']);
Route::get('/faculty-tasklist', [FacultyController::class, 'facultytasklist']);
Route::post('faculty-approve', ['as'=>'faculty-approve','uses'=>[AjaxDemoController::class, 'facultyapprove']]);
Route::post('faculty-reject', ['as'=>'faculty-reject','uses'=>[AjaxDemoController::class, 'facultyreject']]);
Route::get('/faculty-remove/{id}', [FacultyController::class, 'facultyremove']);
Route::get('/view-faculty/{id}', [FacultyController::class, 'viewfaculty']);
Route::post('/update-faculty', [FacultyController::class, 'updatefaculty']);
Route::get('/faculty-tasks', [FacultyController::class, 'facultytasks']);
Route::post('/upload_answerpdf', [FacultyController::class, 'uploadanswerpdf']);
Route::get('/new-coordinator',  [CoordinatorController::class, 'newcoordinator']);
Route::post('/post-coordinator',  [CoordinatorController::class, 'postcoordinator']);
Route::get('/coordinator-management',  [CoordinatorController::class, 'coordinatormanagement']);
Route::post('coordinator-approve', ['as'=>'coordinator-approve','uses'=>[AjaxDemoController::class, 'coordinatorapprove']]);
Route::post('coordinator-reject', ['as'=>'coordinator-reject','uses'=>[AjaxDemoController::class, 'coordinatorreject']]);
Route::get('/coordinator-remove/{id}',  [CoordinatorController::class, 'coordinatorremove']);
Route::get('/view-coordinator/{id}',  [CoordinatorController::class, 'viewcoordinator']);
Route::post('/update-coordinator',  [CoordinatorController::class, 'updatecoordinator']);
Route::get('/coordinatortasks',  [CoordinatorController::class, 'coordinatortask']);
Route::post('/set_status',  [CoordinatorController::class, 'set_status']);
Route::get('/accept-wprogram/{id}',  [CoordinatorController::class, 'acceptwprogram']);
Route::post('/reject-wprogram',  [CoordinatorController::class, 'rejectwprogram']);

Route::get('/faculty-manager', function () { return view('institution.facultylogin'); });
Route::post('/faculty-login', [FacultySigninController::class, 'facultylogin']);
Route::get('/facultyhome', [FacultySigninController::class, 'facultyhome']);
Route::get('/coordinator-manager', function () { return view('institution.coordinatorlogin'); });
Route::post('/coordinator-login',  [CoordinatorSigninController::class, 'coordinatorlogin']);
Route::get('/coordinatorhome',  [CoordinatorSigninController::class, 'coordinatorhome']);

Route::get('/course-details/{id}',  [UserCourseController::class, 'coursedetails']);
Route::get('/course/{id}',  [UserCourseController::class, 'coursefilter']);
Route::get('/course-enroll/{id}',  [UserCourseController::class, 'courseenroll']);
Route::get('/course-writing-program/{id}',  [UserCourseController::class, 'coursewritingprogram']);
 Route::get('/writinganswer-upload/{id}/{pgm}',  [UserCourseController::class, 'writinganswerupload']);
 Route::post('/answer-upload',  [UserCourseController::class, 'answerupload']);

 Route::get('/test-course-details/{id}',  [UserCourseController::class, 'testcoursedetails']);
Route::get('/test-enroll/{id}',  [UserCourseController::class, 'testenroll']);

Route::post('/post-comment',  [UserCourseController::class, 'postcomment']);
Route::post('/replycomment',  [VideoController::class, 'replycomment']);
Route::get('/video-comments/{id}',  [VideoController::class, 'videocomments']);

Route::get('/digital', function () { return view('site.digital'); });
Route::get('/details', function () { return view('site.details'); });
Route::get('/car', function () { return view('site.car'); });

Route::get('/userpay/{id}',  [PaymentController::class, 'userpay']);
Route::post('/payment',  [PaymentController::class, 'payment']);
Route::get('/redirect/{id}',  [PaymentController::class, 'redirect']);

Route::get('/learn/{pmgidid}/lectures/{videoidid}',  [UserCourseController::class, 'courselearn']);

Route::get('/test/{pmgidid}/{id}',  [TestController::class, 'test']);
Route::post('/post-test',  [TestController::class, 'posttest']);

Route::get('/test-review/{regtime}',  [TestController::class, 'testreview']);

// Login with Facebook

Route::get('/login/facebook', [Auth\LoginController::class, 'redirectToProvider']);
Route::get('/login/facebook/callback', [Auth\LoginController::class, 'handleProviderCallback']);

// Login with Google

Route::get('/login/google', [Auth\LoginController::class, 'redirectTogoogleProvider']);
Route::get('/login/google/callback', [Auth\LoginController::class, 'handlegoogleProviderCallback']);
// Admin Area Starts here

Route::get('/admin-manager', function () { return view('admin.login'); });
Route::post('/adminsignin',  [AdminSigninController::class, 'adminsignin']);
Route::get('/adminhome',  [AdminSigninController::class, 'adminhome']);
Route::get('/adminlogout',  [AdminSigninController::class, 'adminlogout']);

Route::get('/adminsettings', [SettingsController::class, 'adminsettings']);
Route::post('/update-adminpassword', [SettingsController::class, 'updateadminpassword']);

Route::get('/adminsyssettings',  [SettingsController::class, 'adminsyssettings']);
Route::get('/admin-system-update/{id}',  [SettingsController::class, 'adminsystemupdate']);
Route::post('/update-systemsettings',  [SettingsController::class, 'updatesystemsettings']);

Route::get('/admin-centres', [CentreController::class, 'admincentres']);
Route::post('centre-approve', ['as'=>'centre-approve','uses'=>[AjaxDemoController::class, 'centreapprove']]);
Route::post('centre-reject', ['as'=>'centre-reject','uses'=>[AjaxDemoController::class, 'centrereject']]);
Route::post('centre-active', ['as'=>'centre-active','uses'=>[AjaxDemoController::class, 'centreactive']]);
Route::get('/admin-inst-remove/{id}', [CentreController::class, 'admininstremove']);

Route::get('/basic-settings/{id}',  [SettingsController::class, 'basicsettings']);
Route::post('basic-setting-add', ['as'=>'basic-setting-add','uses'=>[AjaxDemoController::class, 'basicsettingadd']]);
Route::post('basic-setting-remove', ['as'=>'basic-setting-remove','uses'=>[AjaxDemoController::class, 'basicsettingremove']]);

// Instiution Area starts here

Route::get('/course-management',  [CourseController::class, 'coursemanagement']);
Route::get('/new-course',  [CourseController::class, 'newcourse']);
Route::post('/post-course',  [CourseController::class, 'postcourse']);
Route::post('course-approve', ['as'=>'course-approve','uses'=>[AjaxDemoController::class, 'courseapprove']]);
Route::post('course-reject', ['as'=>'course-reject','uses'=>[AjaxDemoController::class, 'coursereject']]);
Route::get('/view-course/{id}',  [CourseController::class, 'viewcourse']);
Route::post('/update-course',  [CourseController::class, 'updatecourse']);
Route::get('/course-remove/{id}',  [CourseController::class, 'courseremove']);

Route::get('/qualification-management',  [QualificationController::class, 'qualificationmanagement']);
Route::get('/new-qualification',  [QualificationController::class, 'newqualification']);
Route::post('/post-qualification',  [QualificationController::class, 'postqualification']);
Route::post('qualification-approve', ['as'=>'qualification-approve','uses'=>[AjaxDemoController::class, 'qualificationapprove']]);
Route::post('qualification-reject', ['as'=>'qualification-reject','uses'=>[AjaxDemoController::class, 'qualificationreject']]);
Route::get('/view-qualification/{id}',  [QualificationController::class, 'viewqualification']);
Route::post('/update-qualification',  [QualificationController::class, 'updatequalification']);
Route::get('/qualification-remove/{id}',  [QualificationController::class, 'qualificationremove']);

Route::get('/program-management',[ProgramController::class, 'programmanagement']);
Route::get('/new-program', [ProgramController::class, 'newprogram']);
Route::post('/post-program', [ProgramController::class, 'postprogram']);
Route::post('program-approve', ['as'=>'program-approve','uses'=>[AjaxDemoController::class, 'programapprove']]);
Route::post('program-reject', ['as'=>'program-reject','uses'=>[AjaxDemoController::class, 'programreject']]);
Route::get('/view-program/{id}', [ProgramController::class, 'viewprogram']);
Route::post('/update-program',[ProgramController::class, 'updateprogram']);
Route::get('/program-remove/{id}',[ProgramController::class, 'programremove']);

Route::post('feat-pgm-approve', ['as'=>'feat-pgm-approve','uses'=>[AjaxDemoController::class, 'featpgmapprove']]);
Route::post('feat-pgm-reject', ['as'=>'feat-pgm-reject','uses'=>[AjaxDemoController::class, 'featpgmreject']]);

Route::post('app-pgm-approve', ['as'=>'app-pgm-approve','uses'=>[AjaxDemoController::class, 'apppgmapprove']]);
Route::post('app-pgm-reject', ['as'=>'app-pgm-reject','uses'=>[AjaxDemoController::class, 'apppgmreject']]);

Route::get('/remove-program-image/{id}',[ProgramController::class, 'removeprogramimage']);
Route::get('/remove-pgm-brouchre/{id}',[ProgramController::class, 'removepgmbrouchre']);
Route::get('/remove-pgm-syllabus/{id}',[ProgramController::class, 'removepgmsyllabus']);

Route::get('/program-faq/{id}',[ProgramController::class, 'programfaq']);
Route::get('/new-faq/{id}', [ProgramController::class, 'newfaq']);
Route::post('/post-faq', [ProgramController::class, 'postfaq']);
Route::get('/view-faq/{id}', [ProgramController::class, 'viewfaq']);
Route::post('/update-faq',[ProgramController::class, 'updatefaq']);
Route::get('/faq-remove/{id}',[ProgramController::class, 'faqremove']);


Route::get('/writing-program',[ProgramController::class, 'writingprogram']);
Route::get('/new-wprogram-question', [ProgramController::class, 'newwprogramquestion']);
Route::post('/post-wprogram', [ProgramController::class, 'postwprogram']);
Route::post('wprogram-approve', ['as'=>'wprogram-approve','uses'=>[AjaxDemoController::class, 'wprogramapprove']]);
Route::post('wprogram-reject', ['as'=>'wprogram-reject','uses'=>[AjaxDemoController::class, 'wprogramreject']]);
Route::get('/view-wprogram/{id}', [ProgramController::class, 'viewwprogram']);
Route::post('/update-wprogram',[ProgramController::class, 'updatewprogram']);
Route::get('/wprogram-remove/{id}',[ProgramController::class, 'wprogramremove']);


Route::post('program-faq-approve', ['as'=>'program-faq-approve','uses'=>[AjaxDemoController::class, 'programfaqapprove']]);
Route::post('program-faq-reject', ['as'=>'program-faq-reject','uses'=>[AjaxDemoController::class, 'programfaqreject']]);

Route::get('/topic-management',[TopicController::class, 'topicmanagement']);
Route::get('/new-topic', [TopicController::class, 'newtopic']);
Route::post('/post-topic', [TopicController::class, 'posttopic']);
Route::post('topic-approve', ['as'=>'topic-approve','uses'=>[AjaxDemoController::class, 'topicapprove']]);
Route::post('topic-reject', ['as'=>'topic-reject','uses'=>[AjaxDemoController::class, 'topicreject']]);
Route::get('/view-topic/{id}', [TopicController::class, 'viewtopic']);
Route::post('/update-topic',[TopicController::class, 'updatetopic']);
Route::get('/topic-remove/{id}',[TopicController::class, 'topicremove']);

Route::get('/topic-progrm-assign/{id}',[TopicController::class, 'topicprogrmassign']);
Route::post('/post-topic-program', [TopicController::class, 'posttopicprogram']);
Route::get('/topic-program-remove/{id}',[TopicController::class, 'topicprogramremove']);

Route::post('topic-order-assign', ['as'=>'topic-order-assign','uses'=>[AjaxDemoController::class, 'topicorderassign']]);

Route::get('/topic-order',[TopicController::class, 'topicorder']);
Route::post('/post-topic-order', [TopicController::class, 'posttopicorder']);

Route::get('/chapter-management',[ChapterController::class, 'chaptermanagement']);
Route::get('/new-chapter', [ChapterController::class, 'newchapter']);
Route::post('/post-chapter', [ChapterController::class, 'postchapter']);
Route::post('chapter-approve', ['as'=>'chapter-approve','uses'=>[AjaxDemoController::class, 'chapterapprove']]);
Route::post('chapter-reject', ['as'=>'chapter-reject','uses'=>[AjaxDemoController::class, 'chapterreject']]);
Route::get('/view-chapter/{id}', [ChapterController::class, 'viewchapter']);
Route::post('/update-chapter',[ChapterController::class, 'updatechapter']);
Route::get('/chapter-remove/{id}',[ChapterController::class, 'chapterremove']);

Route::post('select-state-level', ['as'=>'select-state-level','uses'=>[AjaxDemoController::class, 'selectstatelevel']]);
Route::post('select-chapter-level', ['as'=>'select-chapter-level','uses'=>[AjaxDemoController::class, 'selectchapterlevel']]);
Route::post('select-pgm-level', ['as'=>'select-pgm-level','uses'=>[AjaxDemoController::class, 'selectpgmlevel']]);

Route::get('/video-management',[VideoController::class, 'videomanagement']);
Route::get('/video-management-find/{id}',[VideoController::class, 'videomanagementfind']);
Route::get('/new-video',  [VideoController::class, 'newvideo']);
Route::post('/post-video',  [VideoController::class, 'postvideo']);
Route::post('video-approve', ['as'=>'video-approve','uses'=>[AjaxDemoController::class, 'videoapprove']]);
Route::post('video-reject', ['as'=>'video-reject','uses'=>[AjaxDemoController::class, 'videoreject']]);
Route::get('/view-video/{id}',  [VideoController::class, 'viewvideo']);
Route::post('/update-video',[VideoController::class, 'updatevideo']);
Route::get('/video-remove/{id}',[VideoController::class, 'videoremove']);

Route::post('/post-assignprogram',  [VideoController::class, 'postassignprogram']);

Route::get('/video-program/{id}/{course}',[VideoController::class, 'videoprogram']);
Route::post('video-approve', ['as'=>'video-approve','uses'=>[AjaxDemoController::class, 'videoapprove']]);
Route::post('video-program-approve', ['as'=>'video-program-approve','uses'=>[AjaxDemoController::class, 'videoprogramapprove']]);
Route::post('video-program-reject', ['as'=>'video-program-reject','uses'=>[AjaxDemoController::class, 'videoprogramreject']]);
Route::get('/video-program-remove/{id}',[VideoController::class, 'videoprogramremove']);

Route::get('/remove-video-assignment/{id}',[VideoController::class, 'removevideoassignment']);
Route::get('/remove-video-download/{id}',[VideoController::class, 'removevideodownload']);

Route::get('/master-data',  [BasicController::class, 'masterdata']);

Route::get('/states',  [BasicController::class, 'states']);
Route::get('/new-state',  [BasicController::class, 'newstate']);
Route::post('/post-state',  [BasicController::class, 'poststate']);
Route::post('state-approve', ['as'=>'state-approve','uses'=>[AjaxDemoController::class, 'stateapprove']]);
Route::post('state-reject', ['as'=>'state-reject','uses'=>[AjaxDemoController::class, 'statereject']]);
Route::get('/view-state/{id}',  [BasicController::class, 'viewstate']);
Route::post('/update-state',  [BasicController::class, 'updatestate']);
Route::get('/state-remove/{id}',  [BasicController::class, 'stateremove']);
Route::get('/district',  [BasicController::class, 'district']);
Route::get('/new-district',  [BasicController::class, 'newdistrict']);
Route::post('/post-district',  [BasicController::class, 'postdistrict']);
Route::post('district-approve', ['as'=>'district-approve','uses'=>[AjaxDemoController::class, 'districtapprove']]);
Route::post('district-reject', ['as'=>'district-reject','uses'=>[AjaxDemoController::class, 'districtreject']]);
Route::get('/view-district/{id}',  [BasicController::class, 'viewdistrict']);
Route::post('/update-district',  [BasicController::class, 'updatedistrict']);
Route::get('/district-remove/{id}',  [BasicController::class, 'districtremove']);

Route::get('/designation',  [BasicController::class, 'designation']);
Route::get('/new-designation',  [BasicController::class, 'newdesignation']);
Route::post('/post-designation',  [BasicController::class, 'postdesignation']);
Route::post('designation-approve', ['as'=>'designation-approve','uses'=>[AjaxDemoController::class, 'desigapprove']]);
Route::post('designation-reject', ['as'=>'designation-reject','uses'=>[AjaxDemoController::class, 'desigreject']]);
Route::get('/view-designation/{id}',  [BasicController::class, 'viewdesignation']);
Route::post('/update-designation',  [BasicController::class, 'updatedesignation']);
Route::get('/designation-remove/{id}',  [BasicController::class, 'designationremove']);
Route::get('/optionalsubject',  [BasicController::class, 'optionalsubject']);
Route::get('/new-optionalsubject',  [BasicController::class, 'newoptionalsubject']);
Route::post('/post-optionalsubject',  [BasicController::class, 'postoptionalsubject']);
Route::post('optionalsubject-approve', ['as'=>'optionalsubject-approve','uses'=>[AjaxDemoController::class, 'desigapprove']]);
Route::post('optionalsubject-reject', ['as'=>'optionalsubject-reject','uses'=>[AjaxDemoController::class, 'desigreject']]);
Route::get('/view-optionalsubject/{id}',  [BasicController::class, 'viewoptionalsubject']);
Route::post('/update-optionalsubject',  [BasicController::class, 'updateoptionalsubject']);
Route::get('/optionalsubject-remove/{id}',  [BasicController::class, 'optionalsubjectremove']);


Route::get('/subject',  [BasicController::class, 'subject']);
Route::get('/new-subject',  [BasicController::class, 'newsubject']);
Route::post('/post-subject',  [BasicController::class, 'postsubject']);
Route::post('subject-approve', ['as'=>'subject-approve','uses'=>[AjaxDemoController::class, 'subjectapprove']]);
Route::post('subject-reject', ['as'=>'subject-reject','uses'=>[AjaxDemoController::class, 'subjectreject']]);
Route::get('/view-subject/{id}',  [BasicController::class, 'viewsubject']);
Route::post('/update-subject',  [BasicController::class, 'updatesubject']);
Route::get('/subject-remove/{id}',  [BasicController::class, 'subjectremove']);
Route::get('/student-details',  [AdminStudentController::class, 'studentdetails']);
Route::get('/student-details-find/{id}',  [AdminStudentController::class, 'studentdetailsfind']);
Route::get('/new-student',  [AdminStudentController::class, 'newstudent']);
Route::post('/post-student',  [AdminStudentController::class, 'poststudent']);
Route::post('student-approve', ['as'=>'student-approve','uses'=>[AjaxDemoController::class, 'studentapprove']]);
Route::post('student-reject', ['as'=>'student-reject','uses'=>[AjaxDemoController::class, 'studentreject']]);
Route::get('/view-student-details/{id}',  [AdminStudentController::class, 'viewstudentdetails']);
Route::get('/student-remove/{id}',  [AdminStudentController::class, 'studentremove']);

Route::get('/instructors',  [InstructorController::class, 'instructor']);
Route::get('/new-instructor',  [InstructorController::class, 'newinstructor']);
Route::post('/post-instructor',  [InstructorController::class, 'postinstructor']);
Route::post('ins-approve', ['as'=>'ins-approve','uses'=>[AjaxDemoController::class, 'insapprove']]);
Route::post('ins-reject', ['as'=>'ins-reject','uses'=>[AjaxDemoController::class, 'insreject']]);
Route::get('/view-instructor/{id}',  [InstructorController::class, 'viewinstructor']);
Route::post('/update-instructor',  [InstructorController::class, 'updateinstructor']);
Route::get('/remove-instructor-image/{id}',  [InstructorController::class, 'removeinstructorimage']);
Route::get('/instructor-remove/{id}',  [InstructorController::class, 'instructorremove']);
Route::get('/staff',  [StaffController::class, 'staff']);
Route::get('/new-staff', [StaffController::class, 'newstaff']);
Route::post('/post-staff', [StaffController::class, 'poststaff']);
Route::post('staff-approve', ['as'=>'staff-approve','uses'=>[AjaxDemoController::class, 'staffapprove']]);
Route::post('staff-reject', ['as'=>'staff-reject','uses'=>[AjaxDemoController::class, 'staffreject']]);
Route::get('/view-staff/{id}', [StaffController::class, 'viewstaff']);
Route::post('/update-staff',  [StaffController::class, 'updatestaff']);
Route::get('/remove-staff-image/{id}',  [StaffController::class, 'removestaffimage']);
Route::get('/staff-remove/{id}',  [StaffController::class, 'staffremove']);

Route::get('/previlage/{id}',  [StaffController::class, 'previlage']);
Route::post('previlage-assign', ['as'=>'previlage-assign','uses'=>[AjaxDemoController::class, 'previlageassign']]);
Route::post('previlage-reject', ['as'=>'previlage-reject','uses'=>[AjaxDemoController::class, 'previlagereject']]);
Route::get('/academic-year',[AcademicYearController::class, 'academicyear']);
Route::get('/new-acdemicyear', [AcademicYearController::class, 'newacdemicyear']);
Route::post('/post-academicyear', [AcademicYearController::class, 'postacademicyear']);
Route::get('/view-academicyear/{id}', [AcademicYearController::class, 'viewacademicdyear']);
Route::post('/update-academicyear',[AcademicYearController::class, 'updateacademicyear']);
Route::get('/academicyear-remove/{id}',[AcademicYearController::class, 'academicyearremove']);

Route::get('/student-batch',[BatchController::class, 'studentbatch']);
Route::get('/student-batch-find/{id}',[BatchController::class, 'studentbatchfind']);
Route::get('/new-batch', [BatchController::class, 'newbatch']);
Route::post('/post-batch', [BatchController::class, 'postbatch']);
Route::post('batch-approve', ['as'=>'batch-approve','uses'=>[AjaxDemoController::class, 'batchapprove']]);
Route::post('batch-reject', ['as'=>'batch-reject','uses'=>[AjaxDemoController::class, 'batchreject']]);
Route::get('/view-batch/{id}', [BatchController::class, 'viewbatch']);
Route::post('/update-batch',[BatchController::class, 'updatebatch']);
Route::get('/batch-remove/{id}',[BatchController::class, 'batchremove']);

Route::get('/new-notification', [SettingsController::class, 'newnotification']);
Route::post('/post-notification', [SettingsController::class, 'postnotification']);
Route::post('notification-approve', ['as'=>'notification-approve','uses'=>[AjaxDemoController::class, 'notificationapprove']]);
Route::post('notification-reject', ['as'=>'notification-reject','uses'=>[AjaxDemoController::class, 'notificationreject']]);
Route::get('/view-notification/{id}', [SettingsController::class, 'viewnotification']);
Route::post('/update-notification',[SettingsController::class, 'updatenotification']);
Route::get('/notification-remove/{id}',[SettingsController::class, 'notificationremove']);
Route::get('/notifications', [SettingsController::class, 'notifications']);

Route::get('/student-assign-batch/{id}',[BatchController::class, 'studentassignbatch']);
Route::get('/view-assignstudent-details/{id}', [BatchController::class, 'viewassignstudentdetails']);
Route::get('/student-assign-batch-find/{id}/{year}',[BatchController::class, 'studentassignbatchfind']);
Route::post('student-batch_assign', ['as'=>'student-batch_assign','uses'=>[AjaxDemoController::class, 'studentbatchassign']]);
Route::post('student-batch_ressign', ['as'=>'student-batch_ressign','uses'=>[AjaxDemoController::class, 'studentbatchressign']]);

Route::get('/faculty-assign-batch/{id}',[FacultyController::class, 'facultyassignbatch']);
Route::get('/view-assignfaculty-details/{id}', [FacultyController::class, 'viewassignfacultydetails']);
Route::get('/faculty-assign-batch-find/{id}/{year}',[FacultyController::class, 'facultyassignbatchfind']);
Route::post('faculty-batch_assign', ['as'=>'faculty-batch_assign','uses'=>[AjaxDemoController::class, 'facultybatchassign']]);
Route::post('faculty-batch_ressign', ['as'=>'faculty-batch_ressign','uses'=>[AjaxDemoController::class, 'facultybatchressign']]);

Route::get('/program-batch-assign/{id}',[BatchController::class, 'programbatchassign']);
Route::get('/program-batch-assign-find/{id}/{acdid}',[BatchController::class, 'programbatchassignfind']);
Route::get('/zoom-assign-batch/{id}',[BatchController::class, 'zoomassignbatch']);

Route::post('program-batch-assign-ajx', ['as'=>'program-batch-assign-ajx','uses'=>[AjaxDemoController::class, 'programbatchassignajx']]);
Route::post('program-batch-ressign-ajx', ['as'=>'program-batch-ressign-ajx','uses'=>[AjaxDemoController::class, 'programbatchressignajx']]);

Route::get('/package-expiry',[PackageController::class, 'packageexpiry']);
Route::get('/package-expiry-find/{id}',[PackageController::class, 'packageexpiryfind']);
Route::post('packageextend', ['as'=>'packageextend','uses'=>[AjaxDemoController::class, 'packageextend']]);
Route::get('/package-expired',[PackageController::class, 'packageexpired']);
Route::get('/package-expired-find/{id}',[PackageController::class, 'packageexpiredfind']);

Route::get('/test-difficulty',  [BasicController::class, 'testdifficulty']);
Route::get('/new-test-difficulty',  [BasicController::class, 'newtestdifficulty']);
Route::post('/post-test-difficulty',  [BasicController::class, 'posttestdifficulty']);
Route::post('test-difficulty-approve', ['as'=>'test-difficulty-approve','uses'=>[AjaxDemoController::class, 'testdifficultyapprove']]);
Route::post('test-difficulty-reject', ['as'=>'test-difficulty-reject','uses'=>[AjaxDemoController::class, 'testdifficultyreject']]);
Route::get('/view-test-difficulty/{id}',  [BasicController::class, 'viewtestdifficulty']);
Route::post('/update-test-difficulty',  [BasicController::class, 'updatetestdifficulty']);
Route::get('/test-difficulty-remove/{id}',  [BasicController::class, 'testdifficultyremove']);

Route::get('/test-names',  [BasicController::class, 'testnames']);
Route::get('/new-test-names',  [BasicController::class, 'newtestnames']);
Route::post('/post-test-name',  [BasicController::class, 'posttestname']);
Route::post('test-name-approve', ['as'=>'test-name-approve','uses'=>[AjaxDemoController::class, 'testnameapprove']]);
Route::post('test-name-reject', ['as'=>'test-name-reject','uses'=>[AjaxDemoController::class, 'testnamereject']]);
Route::get('/view-test-names/{id}',  [BasicController::class, 'viewtestnames']);
Route::post('/update-test-name',  [BasicController::class, 'updatetestname']);
Route::get('/test-name-remove/{id}',  [BasicController::class, 'testnameremove']);

Route::get('/test-questions',  [TestController::class, 'testquestions']);
Route::get('/new-questions',  [TestController::class, 'newquestions']);
Route::post('/post-questions',  [TestController::class, 'postquestions']);
Route::post('questions-approve', ['as'=>'questions-approve','uses'=>[AjaxDemoController::class, 'questionsapprove']]);
Route::post('questions-reject', ['as'=>'questions-reject','uses'=>[AjaxDemoController::class, 'questionsreject']]);
Route::get('/view-questions/{id}',  [TestController::class, 'viewquestions']);
Route::post('/update-questions',  [TestController::class, 'updatequestions']);
Route::get('/remove-questions/{id}',  [TestController::class, 'removequestions']);

Route::get('/app-course-settings',  [AppController::class, 'appcoursesettings']);
Route::get('/view-app-course/{id}',  [AppController::class, 'viewappcourse']);
Route::post('/update-app-course',  [AppController::class, 'updateappcourse']);
Route::get('/remove-course-image/{id}',  [AppController::class, 'removecourseimage']);
Route::get('/remove-course-inner-image/{id}',  [AppController::class, 'removecourseinnerimage']);

Route::get('/free-video',  [FreeMeterialController::class, 'freevideo']);
Route::get('/new-free-video',  [FreeMeterialController::class, 'newfreevideo']);
Route::post('/post-freevideo',  [FreeMeterialController::class, 'postfreevideo']);
Route::post('free-video-approve', ['as'=>'free-video-approve','uses'=>[AjaxDemoController::class, 'freevideoapprove']]);
Route::post('free-video-reject', ['as'=>'free-video-reject','uses'=>[AjaxDemoController::class, 'freevideoreject']]);
Route::get('/view-free-video/{id}',  [FreeMeterialController::class, 'viewfreevideo']);
Route::post('/update-freevideo',  [FreeMeterialController::class, 'updatefreevideo']);
Route::get('/free-video-remove/{id}',  [FreeMeterialController::class, 'freevideoremove']);

Route::get('/pgm-purchased/{id}', [StudentAccountController::class, 'pgmpurchased']);

Route::get('/test-progrm-assign/{id}',  [TestController::class, 'testprogrmassign']);
Route::post('/post-test-program',  [TestController::class, 'posttestprogram']);
Route::get('/test-program-remove/{id}',  [TestController::class, 'testprogramremove']);

Route::get('/test-question-assign/{id}',  [TestController::class, 'testquestionassign']);
Route::get('/view-assign-questions/{id}',  [TestController::class, 'viewassignquestions']);
Route::post('question-test-assign', ['as'=>'question-test-assign','uses'=>[AjaxDemoController::class, 'questiontestassign']]);
Route::post('question-test-reject', ['as'=>'question-test-reject','uses'=>[AjaxDemoController::class, 'questiontestreject']]);
Route::get('/questions-assigned/{id}',  [TestController::class, 'questionsassigned']);
Route::get('/assigned-question-remove/{id}/{testno}',  [TestController::class, 'assignedquestionremove']);
Route::get('/find-question-assign/{id}/{testno}',  [TestController::class, 'findquestionassign']);
Route::get('/assign-all-questions/{id}/{pgm}',  [TestController::class, 'assignallquestions']);
/*





*/