<?php

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
Route::get('/','UserCourseController@courses');
//Route::get('/', 'UserCourseController@home');
Route::get('/login', function () { return view('site.login'); });
Route::get('/user-login', function () { return view('site.userlogin'); });
Route::get('/courses', 'UserCourseController@courses');
Route::get('/signup', function () { return view('site.signup'); });
Route::post('/user-signup', 'UserSigninController@usersignup');
Route::get('/video-courses', 'UserCourseController@videocourses');
Route::get('/test-courses', 'UserCourseController@testcourses');

Route::post('/student-login', 'StudentSigninController@studentlogin');
Route::get('/home', 'StudentSigninController@home');
Route::get('/logout', 'StudentSigninController@logout');
Route::get('/passwordsettings','SettingsController@passwordsettings');
Route::post('/update-password','SettingsController@updatepassword');
Route::get('/forgotpassword', function () { return view('site.forgotpassword'); });
Route::post('/post-forgotpassword', 'StudentSigninController@postforgotpassword');

Route::get('/accountsettings','StudentAccountController@accountsettings');
Route::post('/update-account','StudentAccountController@updateaccount');
Route::post('select-district-level', ['as'=>'select-district-level','uses'=>'AjaxDemoController@selectdistrictlevel']);
Route::get('/remove-profile-pic/{id}','StudentAccountController@removeprofilepic');
Route::get('/myprofile','StudentAccountController@myprofile');
Route::get('/mywall','StudentAccountController@mywall');

Route::get('/new-faculty','FacultyController@newfaculty');
Route::post('/post-faculty', 'FacultyController@postfaculty');
Route::get('/faculty-management','FacultyController@facultymanagement');
Route::get('/faculty-tasklist','FacultyController@facultytasklist');
Route::post('faculty-approve', ['as'=>'faculty-approve','uses'=>'AjaxDemoController@facultyapprove']);
Route::post('faculty-reject', ['as'=>'faculty-reject','uses'=>'AjaxDemoController@facultyreject']);
Route::get('/faculty-remove/{id}','FacultyController@facultyremove');
Route::get('/view-faculty/{id}','FacultyController@viewfaculty');
Route::post('/update-faculty','FacultyController@updatefaculty');
Route::get('/faculty-tasks','FacultyController@facultytasks');
Route::post('/upload_answerpdf','FacultyController@uploadanswerpdf');
Route::get('/new-coordinator','CoordinatorController@newcoordinator');
Route::post('/post-coordinator', 'CoordinatorController@postcoordinator');
Route::get('/coordinator-management','CoordinatorController@coordinatormanagement');
Route::post('coordinator-approve', ['as'=>'coordinator-approve','uses'=>'AjaxDemoController@coordinatorapprove']);
Route::post('coordinator-reject', ['as'=>'coordinator-reject','uses'=>'AjaxDemoController@coordinatorreject']);
Route::get('/coordinator-remove/{id}','CoordinatorController@coordinatorremove');
Route::get('/view-coordinator/{id}','CoordinatorController@viewcoordinator');
Route::post('/update-coordinator','CoordinatorController@updatecoordinator');
Route::get('/coordinatortasks','CoordinatorController@coordinatortask');
Route::post('/set_status', 'CoordinatorController@set_status');
Route::get('/accept-wprogram/{id}','CoordinatorController@acceptwprogram');
Route::post('/reject-wprogram','CoordinatorController@rejectwprogram');

Route::get('/faculty-manager', function () { return view('institution.facultylogin'); });
Route::post('/faculty-login', 'FacultySigninController@facultylogin');
Route::get('/facultyhome', 'FacultySigninController@facultyhome');
Route::get('/coordinator-manager', function () { return view('institution.coordinatorlogin'); });
Route::post('/coordinator-login', 'CoordinatorSigninController@coordinatorlogin');
Route::get('/coordinatorhome', 'CoordinatorSigninController@coordinatorhome');

Route::get('/course-details/{id}', 'UserCourseController@coursedetails');
Route::get('/course/{id}', 'UserCourseController@coursefilter');
Route::get('/course-enroll/{id}', 'UserCourseController@courseenroll');
Route::get('/course-writing-program/{id}', 'UserCourseController@coursewritingprogram');
 Route::get('/writinganswer-upload/{id}/{pgm}', 'UserCourseController@writinganswerupload');
 Route::post('/answer-upload', 'UserCourseController@answerupload');

Route::get('/test-course-details/{id}', 'UserCourseController@testcoursedetails');
Route::get('/test-enroll/{id}', 'UserCourseController@testenroll');

Route::post('/post-comment', 'UserCourseController@postcomment');
Route::post('/replycomment', 'VideoController@replycomment');
Route::get('/video-comments/{id}', 'VideoController@videocomments');

Route::get('/digital', function () { return view('site.digital'); });
Route::get('/details', function () { return view('site.details'); });
Route::get('/car', function () { return view('site.car'); });

Route::get('/userpay/{id}', 'PaymentController@userpay');
Route::post('/payment', 'PaymentController@payment');
Route::get('/redirect/{id}', 'PaymentController@redirect');

Route::get('/learn/{pmgidid}/lectures/{videoidid}', 'UserCourseController@courselearn');

Route::get('/test/{pmgidid}/{id}', 'TestController@test');
Route::post('/post-test', 'TestController@posttest');

Route::get('/test-review/{regtime}', 'TestController@testreview');

// Login with Facebook

Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

// Login with Google

Route::get('/login/google', 'Auth\LoginController@redirectTogoogleProvider');
Route::get('/login/google/callback', 'Auth\LoginController@handlegoogleProviderCallback');

// Admin Area Starts here

Route::get('/admin-manager', function () { return view('admin.login'); });
Route::post('/adminsignin', 'AdminSigninController@adminsignin');
Route::get('/adminhome', 'AdminSigninController@adminhome');
Route::get('/adminlogout', 'AdminSigninController@adminlogout');

Route::get('/adminsettings','SettingsController@adminsettings');
Route::post('/update-adminpassword','SettingsController@updateadminpassword');

Route::get('/adminsyssettings', 'SettingsController@adminsyssettings');
Route::get('/admin-system-update/{id}', 'SettingsController@adminsystemupdate');
Route::post('/update-systemsettings', 'SettingsController@updatesystemsettings');

Route::get('/admin-centres', 'CentreController@admincentres');
Route::post('centre-approve', ['as'=>'centre-approve','uses'=>'AjaxDemoController@centreapprove']);
Route::post('centre-reject', ['as'=>'centre-reject','uses'=>'AjaxDemoController@centrereject']);
Route::post('centre-active', ['as'=>'centre-active','uses'=>'AjaxDemoController@centreactive']);
Route::get('/admin-inst-remove/{id}', 'CentreController@admininstremove');

Route::get('/basic-settings/{id}', 'SettingsController@basicsettings');
Route::post('basic-setting-add', ['as'=>'basic-setting-add','uses'=>'AjaxDemoController@basicsettingadd']);
Route::post('basic-setting-remove', ['as'=>'basic-setting-remove','uses'=>'AjaxDemoController@basicsettingremove']);

// Instiution Area starts here

Route::get('/site-manager', function () { return view('institution.login'); });
Route::get('/inst-signup', function () { return view('institution.signup'); });
Route::post('/inst-register', 'InstSigninController@instregister');
Route::get('/inst-forgotpassword', function () { return view('institution.forgotpassword'); });
Route::post('/inst-postforgotpassword', 'InstSigninController@instpostforgotpassword');
Route::post('/inst-login', 'InstSigninController@instlogin');
Route::get('/insthome', 'InstSigninController@insthome');
Route::get('/instlogout', 'InstSigninController@instlogout');
Route::get('/instsettings','SettingsController@instsettings');
Route::post('/update-instpassword','SettingsController@updateinstpassword');

Route::get('/course-management','CourseController@coursemanagement');
Route::get('/new-course', 'CourseController@newcourse');
Route::post('/post-course', 'CourseController@postcourse');
Route::post('course-approve', ['as'=>'course-approve','uses'=>'AjaxDemoController@courseapprove']);
Route::post('course-reject', ['as'=>'course-reject','uses'=>'AjaxDemoController@coursereject']);
Route::get('/view-course/{id}', 'CourseController@viewcourse');
Route::post('/update-course','CourseController@updatecourse');
Route::get('/course-remove/{id}','CourseController@courseremove');

Route::get('/qualification-management','QualificationController@qualificationmanagement');
Route::get('/new-qualification', 'QualificationController@newqualification');
Route::post('/post-qualification', 'QualificationController@postqualification');
Route::post('qualification-approve', ['as'=>'qualification-approve','uses'=>'AjaxDemoController@qualificationapprove']);
Route::post('qualification-reject', ['as'=>'qualification-reject','uses'=>'AjaxDemoController@qualificationreject']);
Route::get('/view-qualification/{id}', 'QualificationController@viewqualification');
Route::post('/update-qualification','QualificationController@updatequalification');
Route::get('/qualification-remove/{id}','QualificationController@qualificationremove');

Route::get('/program-management','ProgramController@programmanagement');
Route::get('/new-program', 'ProgramController@newprogram');
Route::post('/post-program', 'ProgramController@postprogram');
Route::post('program-approve', ['as'=>'program-approve','uses'=>'AjaxDemoController@programapprove']);
Route::post('program-reject', ['as'=>'program-reject','uses'=>'AjaxDemoController@programreject']);
Route::get('/view-program/{id}', 'ProgramController@viewprogram');
Route::post('/update-program','ProgramController@updateprogram');
Route::get('/program-remove/{id}','ProgramController@programremove');

Route::post('feat-pgm-approve', ['as'=>'feat-pgm-approve','uses'=>'AjaxDemoController@featpgmapprove']);
Route::post('feat-pgm-reject', ['as'=>'feat-pgm-reject','uses'=>'AjaxDemoController@featpgmreject']);

Route::get('/remove-program-image/{id}','ProgramController@removeprogramimage');
Route::get('/remove-pgm-brouchre/{id}','ProgramController@removepgmbrouchre');
Route::get('/remove-pgm-syllabus/{id}','ProgramController@removepgmsyllabus');

Route::get('/program-faq/{id}','ProgramController@programfaq');
Route::get('/new-faq/{id}', 'ProgramController@newfaq');
Route::post('/post-faq', 'ProgramController@postfaq');
Route::get('/view-faq/{id}', 'ProgramController@viewfaq');
Route::post('/update-faq','ProgramController@updatefaq');
Route::get('/faq-remove/{id}','ProgramController@faqremove');


Route::get('/writing-program','ProgramController@writingprogram');
Route::get('/new-wprogram-question', 'ProgramController@newwprogramquestion');
Route::post('/post-wprogram', 'ProgramController@postwprogram');
Route::post('wprogram-approve', ['as'=>'wprogram-approve','uses'=>'AjaxDemoController@wprogramapprove']);
Route::post('wprogram-reject', ['as'=>'wprogram-reject','uses'=>'AjaxDemoController@wprogramreject']);
Route::get('/view-wprogram/{id}', 'ProgramController@viewwprogram');
Route::post('/update-wprogram','ProgramController@updatewprogram');
Route::get('/wprogram-remove/{id}','ProgramController@wprogramremove');


Route::post('program-faq-approve', ['as'=>'program-faq-approve','uses'=>'AjaxDemoController@programfaqapprove']);
Route::post('program-faq-reject', ['as'=>'program-faq-reject','uses'=>'AjaxDemoController@programfaqreject']);

Route::get('/topic-management','TopicController@topicmanagement');
Route::get('/new-topic', 'TopicController@newtopic');
Route::post('/post-topic', 'TopicController@posttopic');
Route::post('topic-approve', ['as'=>'topic-approve','uses'=>'AjaxDemoController@topicapprove']);
Route::post('topic-reject', ['as'=>'topic-reject','uses'=>'AjaxDemoController@topicreject']);
Route::get('/view-topic/{id}', 'TopicController@viewtopic');
Route::post('/update-topic','TopicController@updatetopic');
Route::get('/topic-remove/{id}','TopicController@topicremove');

Route::get('/topic-progrm-assign/{id}','TopicController@topicprogrmassign');
Route::post('/post-topic-program', 'TopicController@posttopicprogram');
Route::get('/topic-program-remove/{id}','TopicController@topicprogramremove');

Route::post('topic-order-assign', ['as'=>'topic-order-assign','uses'=>'AjaxDemoController@topicorderassign']);

Route::get('/topic-order','TopicController@topicorder');
Route::post('/post-topic-order', 'TopicController@posttopicorder');

Route::get('/chapter-management','ChapterController@chaptermanagement');
Route::get('/new-chapter', 'ChapterController@newchapter');
Route::post('/post-chapter', 'ChapterController@postchapter');
Route::post('chapter-approve', ['as'=>'chapter-approve','uses'=>'AjaxDemoController@chapterapprove']);
Route::post('chapter-reject', ['as'=>'chapter-reject','uses'=>'AjaxDemoController@chapterreject']);
Route::get('/view-chapter/{id}', 'ChapterController@viewchapter');
Route::post('/update-chapter','ChapterController@updatechapter');
Route::get('/chapter-remove/{id}','ChapterController@chapterremove');

Route::post('select-state-level', ['as'=>'select-state-level','uses'=>'AjaxDemoController@selectstatelevel']);
Route::post('select-chapter-level', ['as'=>'select-chapter-level','uses'=>'AjaxDemoController@selectchapterlevel']);
Route::post('select-pgm-level', ['as'=>'select-pgm-level','uses'=>'AjaxDemoController@selectpgmlevel']);

Route::get('/video-management','VideoController@videomanagement');
Route::get('/video-management-find/{id}','VideoController@videomanagementfind');
Route::get('/new-video', 'VideoController@newvideo');
Route::post('/post-video', 'VideoController@postvideo');
Route::post('video-approve', ['as'=>'video-approve','uses'=>'AjaxDemoController@videoapprove']);
Route::post('video-reject', ['as'=>'video-reject','uses'=>'AjaxDemoController@videoreject']);
Route::get('/view-video/{id}', 'VideoController@viewvideo');
Route::post('/update-video','VideoController@updatevideo');
Route::get('/video-remove/{id}','VideoController@videoremove');

Route::post('/post-assignprogram', 'VideoController@postassignprogram');

Route::get('/video-program/{id}/{course}','VideoController@videoprogram');
Route::post('video-approve', ['as'=>'video-approve','uses'=>'AjaxDemoController@videoapprove']);
Route::post('video-program-approve', ['as'=>'video-program-approve','uses'=>'AjaxDemoController@videoprogramapprove']);
Route::post('video-program-reject', ['as'=>'video-program-reject','uses'=>'AjaxDemoController@videoprogramreject']);
Route::get('/video-program-remove/{id}','VideoController@videoprogramremove');

Route::get('/remove-video-assignment/{id}','VideoController@removevideoassignment');
Route::get('/remove-video-download/{id}','VideoController@removevideodownload');

Route::get('/master-data','BasicController@masterdata');

Route::get('/states','BasicController@states');
Route::get('/new-state', 'BasicController@newstate');
Route::post('/post-state', 'BasicController@poststate');
Route::post('state-approve', ['as'=>'state-approve','uses'=>'AjaxDemoController@stateapprove']);
Route::post('state-reject', ['as'=>'state-reject','uses'=>'AjaxDemoController@statereject']);
Route::get('/view-state/{id}', 'BasicController@viewstate');
Route::post('/update-state','BasicController@updatestate');
Route::get('/state-remove/{id}','BasicController@stateremove');

Route::get('/district','BasicController@district');
Route::get('/new-district', 'BasicController@newdistrict');
Route::post('/post-district', 'BasicController@postdistrict');
Route::post('district-approve', ['as'=>'district-approve','uses'=>'AjaxDemoController@districtapprove']);
Route::post('district-reject', ['as'=>'district-reject','uses'=>'AjaxDemoController@districtreject']);
Route::get('/view-district/{id}', 'BasicController@viewdistrict');
Route::post('/update-district','BasicController@updatedistrict');
Route::get('/district-remove/{id}','BasicController@districtremove');

Route::get('/designation','BasicController@designation');
Route::get('/new-designation', 'BasicController@newdesignation');
Route::post('/post-designation', 'BasicController@postdesignation');
Route::post('designation-approve', ['as'=>'designation-approve','uses'=>'AjaxDemoController@desigapprove']);
Route::post('designation-reject', ['as'=>'designation-reject','uses'=>'AjaxDemoController@desigreject']);
Route::get('/view-designation/{id}', 'BasicController@viewdesignation');
Route::post('/update-designation','BasicController@updatedesignation');
Route::get('/designation-remove/{id}','BasicController@designationremove');

Route::get('/optionalsubject','BasicController@optionalsubject');
Route::get('/new-optionalsubject', 'BasicController@newoptionalsubject');
Route::post('/post-optionalsubject', 'BasicController@postoptionalsubject');
Route::post('optionalsubject-approve', ['as'=>'optionalsubject-approve','uses'=>'AjaxDemoController@desigapprove']);
Route::post('optionalsubject-reject', ['as'=>'optionalsubject-reject','uses'=>'AjaxDemoController@desigreject']);
Route::get('/view-optionalsubject/{id}', 'BasicController@viewoptionalsubject');
Route::post('/update-optionalsubject','BasicController@updateoptionalsubject');
Route::get('/optionalsubject-remove/{id}','BasicController@optionalsubjectremove');


Route::get('/subject','BasicController@subject');
Route::get('/new-subject', 'BasicController@newsubject');
Route::post('/post-subject', 'BasicController@postsubject');
Route::post('subject-approve', ['as'=>'subject-approve','uses'=>'AjaxDemoController@subjectapprove']);
Route::post('subject-reject', ['as'=>'subject-reject','uses'=>'AjaxDemoController@subjectreject']);
Route::get('/view-subject/{id}', 'BasicController@viewsubject');
Route::post('/update-subject','BasicController@updatesubject');
Route::get('/subject-remove/{id}','BasicController@subjectremove');

Route::get('/student-details','AdminStudentController@studentdetails');
Route::get('/student-details-find/{id}','AdminStudentController@studentdetailsfind');
Route::get('/new-student', 'AdminStudentController@newstudent');
Route::post('/post-student', 'AdminStudentController@poststudent');
Route::post('student-approve', ['as'=>'student-approve','uses'=>'AjaxDemoController@studentapprove']);
Route::post('student-reject', ['as'=>'student-reject','uses'=>'AjaxDemoController@studentreject']);
Route::get('/view-student-details/{id}', 'AdminStudentController@viewstudentdetails');
Route::get('/student-remove/{id}','AdminStudentController@studentremove');

Route::get('/instructors','InstructorController@instructor');
Route::get('/new-instructor', 'InstructorController@newinstructor');
Route::post('/post-instructor', 'InstructorController@postinstructor');
Route::post('ins-approve', ['as'=>'ins-approve','uses'=>'AjaxDemoController@insapprove']);
Route::post('ins-reject', ['as'=>'ins-reject','uses'=>'AjaxDemoController@insreject']);
Route::get('/view-instructor/{id}', 'InstructorController@viewinstructor');
Route::post('/update-instructor','InstructorController@updateinstructor');
Route::get('/remove-instructor-image/{id}','InstructorController@removeinstructorimage');
Route::get('/instructor-remove/{id}','InstructorController@instructorremove');

Route::get('/staff','StaffController@staff');
Route::get('/new-staff', 'StaffController@newstaff');
Route::post('/post-staff', 'StaffController@poststaff');
Route::post('staff-approve', ['as'=>'staff-approve','uses'=>'AjaxDemoController@staffapprove']);
Route::post('staff-reject', ['as'=>'staff-reject','uses'=>'AjaxDemoController@staffreject']);
Route::get('/view-staff/{id}', 'StaffController@viewstaff');
Route::post('/update-staff','StaffController@updatestaff');
Route::get('/remove-staff-image/{id}','StaffController@removestaffimage');
Route::get('/staff-remove/{id}','StaffController@staffremove');

Route::get('/previlage/{id}','StaffController@previlage');
Route::post('previlage-assign', ['as'=>'previlage-assign','uses'=>'AjaxDemoController@previlageassign']);
Route::post('previlage-reject', ['as'=>'previlage-reject','uses'=>'AjaxDemoController@previlagereject']);

Route::get('/academic-year','AcademicYearController@academicyear');
Route::get('/new-acdemicyear', 'AcademicYearController@newacdemicyear');
Route::post('/post-academicyear', 'AcademicYearController@postacademicyear');
Route::get('/view-academicyear/{id}', 'AcademicYearController@viewacademicdyear');
Route::post('/update-academicyear','AcademicYearController@updateacademicyear');
Route::get('/academicyear-remove/{id}','AcademicYearController@academicyearremove');

Route::get('/student-batch','BatchController@studentbatch');
Route::get('/student-batch-find/{id}','BatchController@studentbatchfind');
Route::get('/new-batch', 'BatchController@newbatch');
Route::post('/post-batch', 'BatchController@postbatch');
Route::post('batch-approve', ['as'=>'batch-approve','uses'=>'AjaxDemoController@batchapprove']);
Route::post('batch-reject', ['as'=>'batch-reject','uses'=>'AjaxDemoController@batchreject']);
Route::get('/view-batch/{id}', 'BatchController@viewbatch');
Route::post('/update-batch','BatchController@updatebatch');
Route::get('/batch-remove/{id}','BatchController@batchremove');

Route::get('/student-assign-batch/{id}','BatchController@studentassignbatch');
Route::get('/view-assignstudent-details/{id}', 'BatchController@viewassignstudentdetails');
Route::get('/student-assign-batch-find/{id}/{year}','BatchController@studentassignbatchfind');
Route::post('student-batch_assign', ['as'=>'student-batch_assign','uses'=>'AjaxDemoController@studentbatchassign']);
Route::post('student-batch_ressign', ['as'=>'student-batch_ressign','uses'=>'AjaxDemoController@studentbatchressign']);

Route::get('/program-batch-assign/{id}','BatchController@programbatchassign');
Route::get('/program-batch-assign-find/{id}/{acdid}','BatchController@programbatchassignfind');

Route::post('program-batch-assign-ajx', ['as'=>'program-batch-assign-ajx','uses'=>'AjaxDemoController@programbatchassignajx']);
Route::post('program-batch-ressign-ajx', ['as'=>'program-batch-ressign-ajx','uses'=>'AjaxDemoController@programbatchressignajx']);

Route::get('/package-expiry','PackageController@packageexpiry');
Route::get('/package-expiry-find/{id}','PackageController@packageexpiryfind');
Route::post('packageextend', ['as'=>'packageextend','uses'=>'AjaxDemoController@packageextend']);
Route::get('/package-expired','PackageController@packageexpired');
Route::get('/package-expired-find/{id}','PackageController@packageexpiredfind');

Route::get('/test-difficulty','BasicController@testdifficulty');
Route::get('/new-test-difficulty', 'BasicController@newtestdifficulty');
Route::post('/post-test-difficulty', 'BasicController@posttestdifficulty');
Route::post('test-difficulty-approve', ['as'=>'test-difficulty-approve','uses'=>'AjaxDemoController@testdifficultyapprove']);
Route::post('test-difficulty-reject', ['as'=>'test-difficulty-reject','uses'=>'AjaxDemoController@testdifficultyreject']);
Route::get('/view-test-difficulty/{id}', 'BasicController@viewtestdifficulty');
Route::post('/update-test-difficulty','BasicController@updatetestdifficulty');
Route::get('/test-difficulty-remove/{id}','BasicController@testdifficultyremove');

Route::get('/test-names','BasicController@testnames');
Route::get('/new-test-names', 'BasicController@newtestnames');
Route::post('/post-test-name', 'BasicController@posttestname');
Route::post('test-name-approve', ['as'=>'test-name-approve','uses'=>'AjaxDemoController@testnameapprove']);
Route::post('test-name-reject', ['as'=>'test-name-reject','uses'=>'AjaxDemoController@testnamereject']);
Route::get('/view-test-names/{id}', 'BasicController@viewtestnames');
Route::post('/update-test-name','BasicController@updatetestname');
Route::get('/test-name-remove/{id}','BasicController@testnameremove');

Route::get('/test-questions','TestController@testquestions');
Route::get('/new-questions', 'TestController@newquestions');
Route::post('/post-questions', 'TestController@postquestions');
Route::post('questions-approve', ['as'=>'questions-approve','uses'=>'AjaxDemoController@questionsapprove']);
Route::post('questions-reject', ['as'=>'questions-reject','uses'=>'AjaxDemoController@questionsreject']);
Route::get('/view-questions/{id}', 'TestController@viewquestions');
Route::post('/update-questions','TestController@updatequestions');
Route::get('/remove-questions/{id}','TestController@removequestions');

Route::get('/app-course-settings','AppController@appcoursesettings');
Route::get('/view-app-course/{id}', 'AppController@viewappcourse');
Route::post('/update-app-course','AppController@updateappcourse');
Route::get('/remove-course-image/{id}','AppController@removecourseimage');
Route::get('/remove-course-inner-image/{id}','AppController@removecourseinnerimage');

Route::get('/free-video','FreeMeterialController@freevideo');
Route::get('/new-free-video', 'FreeMeterialController@newfreevideo');
Route::post('/post-freevideo', 'FreeMeterialController@postfreevideo');
Route::post('free-video-approve', ['as'=>'free-video-approve','uses'=>'AjaxDemoController@freevideoapprove']);
Route::post('free-video-reject', ['as'=>'free-video-reject','uses'=>'AjaxDemoController@freevideoreject']);
Route::get('/view-free-video/{id}', 'FreeMeterialController@viewfreevideo');
Route::post('/update-freevideo','FreeMeterialController@updatefreevideo');
Route::get('/free-video-remove/{id}','FreeMeterialController@freevideoremove');

Route::get('/pgm-purchased/{id}','StudentAccountController@pgmpurchased');

Route::get('/test-progrm-assign/{id}','TestController@testprogrmassign');
Route::post('/post-test-program', 'TestController@posttestprogram');
Route::get('/test-program-remove/{id}','TestController@testprogramremove');

Route::get('/test-question-assign/{id}','TestController@testquestionassign');
Route::get('/view-assign-questions/{id}', 'TestController@viewassignquestions');
Route::post('question-test-assign', ['as'=>'question-test-assign','uses'=>'AjaxDemoController@questiontestassign']);
Route::post('question-test-reject', ['as'=>'question-test-reject','uses'=>'AjaxDemoController@questiontestreject']);
Route::get('/questions-assigned/{id}','TestController@questionsassigned');
Route::get('/assigned-question-remove/{id}/{testno}','TestController@assignedquestionremove');
Route::get('/find-question-assign/{id}/{testno}','TestController@findquestionassign');
Route::get('/assign-all-questions/{id}/{pgm}','TestController@assignallquestions');