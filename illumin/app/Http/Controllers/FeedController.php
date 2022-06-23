<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Session;
use Auth;
use File;
use App\Models\tbl_feedcategory;
use App\Models\tbl_labels;
use App\Models\tblFeeds;

use Carbon\Carbon;
use Illuminate\Support\Str;

class FeedController extends Controller
{
    //
    public function feedcategory()
    {
        
 if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_feedcategory')->orderBy('id', 'desc')->get();
                
              
                

                if(count($data) > 0)
                {
                    return view('institution.feedcategory', $data);
                }
                else
                {
                    return view('institution.feedcategory');
                }
            }
             else { return redirect('/'); }
        }
        return view('institution.feedcategory');
    }
  



 public function addfeedcategory()
    {

         if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
               return view('institution.newfeedcategory');
            } else { return redirect('/'); }
        }
        
    }

public function postfeedcategory(Request $req)
    {

        
        $instid = Auth::user()->instid;
        $category = $req->input('category');
        $newdata=Str::title($category);
        $createdat = $req->input('createdat');
        $year = $req->input('year');
         $time = $req->input('time');



          $ckfeedcat = DB::table('tbl_feedcategory')->where(['category' => $category])->value('id');


// print_r($ckfeedcat);
// exit;
        if($ckfeedcat != '')
        {

         $msg="ERROR:::CANNOT SUBMIT !!!!!!This category already Exist";

        }
        else
        {

        if($category != '')
        {
            // tbl_sn_feedcategory::create($req->all());

        $year = $req->input('year');
            $data=array('category'=>$newdata,"instid"=>$instid,"createdat"=>$createdat,"year"=>$year,"time"=>$time,);
            DB::table('tbl_feedcategory')->insert($data);
            
            
            
            
             $msg='Feed Category Added  Successfully!!';

             
        }
        else{
             $msg="Please Fill Feed Category name";
             }
        }
        
         return redirect()->back()->withErrors([$msg]);

    }

public function viewfeedcategory($id)//for diting feed
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_feedcategory')->where(['id' => $id])->get();
               
               // print_r($data);


                if(count($data) > 0)
                {
                    return view('institution.editfeedcategory', $data);
                }
                else
                {
                    return view('institution.editfeedcategory');
                }
            } else { return redirect('/'); }
        }
    }

 public function updatfeedcategory(Request $req)
    {
        
        $id = $req->input('id');
        $category = $req->input('category');
        $newdata=Str::title($category);
        $created = $req->input('created');
        $year = $req->input('year');
        $time = $req->input('time');
         $instid = $req->input('instid');
          



  $ckfeedcat = DB::table('tbl_feedcategory')->where(['category' => $category])->value('id');


// print_r($ckfeedcat);
// exit;
        if($ckfeedcat != '')
        {

         $msg="ERROR:::CANNOT SUBMIT !!!!!!This category already Exist";

        }
        else
        {
       
 
               if($category != '')
        {
             

             $updateDetails = [
                             'category' => $newdata,
                             'createdat' =>  $created,
                             'year' => $year,
                             'time' => $time,
                             'instid' => $instid
    
                              ];

                       DB::table('tbl_feedcategory')
                     ->where('id', $id)
                     ->update($updateDetails);
         
            

   
           
          $msg='Feed Category updated Successfully!!';

         }
        else{

                     


            $msg="Please Fill Feed Category";
          }
}
                return redirect()->back()->withErrors([$msg]);


      
    }

public function removefeedcategory($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                DB::table('tbl_feedcategory')->where(['id' => $id])->delete();

                return redirect('/feedcategory')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }

    public function labels()
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
            	$data['data'] = DB::table('tbl_labels')->orderBy('id', 'desc')->get();

                   if(count($data) > 0)
                      {
                      return view('institution.labels', $data);
                       }
                   else
                      {
                     return view('institution.labels');
                      }

            	 
            } else { return redirect('/'); }
        }
    }
    
     public function newlabel()
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {



            	 return view('institution.newlabel');
            } else { return redirect('/'); }
        }
    }
     public function postlabel(Request $req)
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {

                  $instid = Auth::user()->instid;
                  $labels = $req->input('labels');
                  $created = $req->input('created');
                  $year = $req->input('year');
                  $time = $req->input('time'); 
             $languagecheck = DB::table('tbl_labels')->where(['labels' => $labels])->value('id');
              if($languagecheck != '')
               {
                  $msg="ERROR:::CANNOT SUBMIT !!!!!!This Language Already Exist";

               }
               else
               {
                 if($labels != '')
                  {
                     $data=array('labels'=>$labels,"instid"=>$instid,"year"=>$year,"time"=>$time,"status"=>'1');
                      DB::table('tbl_labels')->insert($data);
                         $msg='Label Added  Successfully!!';
                  }      
                 else{$msg="Please Enter Label"; }
                }
        
             return redirect()->back()->withErrors([$msg]);
         } else { return redirect('/'); }
        }
    }
     public function viewlabel($id)
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
            $languagesar = DB::table('tbl_labels')->where(['id' => $id])->orderBy('id', 'desc')->get();

             
            	 return view('institution.viewlabel')->with('languagesar',$languagesar);
            } else { return redirect('/'); }
        }
    }
     public function updatelabel(Request $req)
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {



            	  $instid = Auth::user()->instid;
                  $labels = $req->input('labels');
                  $editeddate = $req->input('created');
                  $year = $req->input('year');
                  $time = $req->input('time');
                   $lanid = $req->input('lanid');


                  $languagecheck = DB::table('tbl_labels')->where(['labels' => $labels])->value('id');
                  if($languagecheck != '')
                 {
                  $msg="ERROR:::CANNOT SUBMIT !!!!!!This Label Already Exist";

                 }
                else
                {
                   if($labels != '')
                   {
                         $updateDetails = [
                             'labels' => $labels,
                             'editeddate' => $editeddate,
                             'editedby' =>  $instid,
                            
    
                              ];

                       DB::table('tbl_labels')
                     ->where('id', $lanid)
                     ->update($updateDetails);
                     $msg="Label  Updated Succesfully";

                     }      
                     else{$msg="Please Enter Label"; }
                }
        
             return redirect()->back()->withErrors([$msg]);
         } else { return redirect('/'); }
        }
    }
     public function removelabel($id)
    {
    	if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {

                DB::table('tbl_labels')->where(['id' => $id])->delete();

                return redirect('/labels')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }
    public function feeds() // feed view: admin panel
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['data'] = DB::table('tbl_feeds')->orderBy('id', 'desc')->get();
                
              
                

                if(count($data) > 0)
                {
                    return view('institution.feeds', $data);
                }
                else
                {
                    return view('institution.feeds');
                }
            }
             else { return redirect('/'); }
        }
        return view('institution.feeds');
    }




     public function newfeed()
    {

    	 if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                
                
                $feedcat = DB::table('tbl_feedcategory')->where('status', '1')->get();
                
              $feedlabels = DB::table('tbl_labels')->where('status', '1')->orderBy('labels','asc')->get();



               return view('institution.newfeed')->with('feedcat',$feedcat)->with('feedlabels',$feedlabels);
            } else { return redirect('/'); }
        }
    	
    }

    public function postfeed(Request $req)
    {

    	
        $instid = Auth::user()->instid;
        $category = $req->input('category');
        $tumbimage = $req->file('tumbimage');
        $realimage = $req->file('realimage');
        
      $author = $req->input('author');
       $labels= $req->input('labels');
       
        $articlelink = $req->input('articlelink');
          $pdf1 = $req->file('pdf1');
            

             
         /*  if($labels){

                   $labelstr = implode(', ', $labels);
        
           }
           else{*/
           $labelstr=$req->input('labels');
           //}
         $pdate = $req->input('pdate');
        
         

        if($category != '')
        {
             $destinationPath = 'upload/feed/thumb/';
             $destinationPath1 = 'upload/feed/real/';
              $destinationPath2 = 'upload/feed/pdf/';


              if ($tumbimage!='') {
               $fileName=$tumbimage->getClientOriginalName();
                $newfilename= $destinationPath.$fileName;
                  $tumbimage->move($destinationPath, $fileName);
                }  else{  $newfilename='0';  }

             if ($realimage!='') {
              $fileName1=$realimage->getClientOriginalName();
              $newfilename2= $destinationPath1.$fileName1;
              $realimage->move($destinationPath1, $fileName1);
              } else   {   $newfilename2='0';   }

              if ($pdf1!='') {
                  $fileName2=$pdf1->getClientOriginalName();
                  $newfilename3= $destinationPath2.$fileName2;
                  $pdf1->move($destinationPath2, $fileName2);
              }  else  {    $newfilename3='0';   }

               
              
              



                    tblfeeds::create($req->all());
                    $pstid = DB::getPdo()->lastInsertId();
                    
                    
            
             if($author != '')
             {

                    $updateDetails = [
                             'tumbimage' => $newfilename,
                             'realimage' =>  $newfilename2,
                             'pdate' =>  $pdate,
                              'author' =>  $author,
                              'articlelink'=>$articlelink,
                              'status' =>  '1',
                              'labelid' => $labelstr,
                              
                              
                                      ];
             }
             else
             {
                 $authorname = DB::table('users')->where('id',$instid)->value('name');
                 
                  $updateDetails = [
                             'tumbimage' => $newfilename,
                             'realimage' =>  $newfilename2,
                              'pdate' =>  $pdate,
                              'author' =>  $authorname,
                              'status' =>  '1',
                              'labelid' => $labelstr,
                              'pdf' =>  $newfilename3,
                                'articlelink'=>$articlelink,
                                      ];
             }

                           DB::table('tbl_feeds')
                               ->where('id', $pstid)
                               ->update($updateDetails);
            
            
          
                            $msg='feed Added  Successfully!!';

                         }else{
                           $msg="Please Fill feed Category name";
             }
        
         return redirect()->back()->withErrors([$msg]);

    }




public function viewfeed($id)//for diting feed
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data = DB::table('tbl_feeds')->where(['id' => $id])->get();
                
                $cal = DB::table('tbl_feeds')->where(['id' => $id])->value('category');
                
                
                 $feedcat = DB::table('tbl_feedcategory')->where('status', '1')->get();
                 $feedlabels = DB::table('tbl_labels')->where('status', '1')->orderBy('labels','asc')->get();

                //  print_r($feedcat);
                //  exit;
                

                if(count($data) > 0)
                {
                    return view('institution.viewfeed')->with('feedlabels',$feedlabels)->with('feedcat',$feedcat)->with('data',$data);
                }
                else
                {
                    return view('institution.viewfeed');
                }
            } else { return redirect('/'); }
        }
    }


 public function updatefeed(Request $req)
    {
        $labels= $req->input('labels');
        $id = $req->input('id');
        $category = $req->input('category');
        $title = $req->input('title');
        $description = $req->input('description');
        $pdate = $req->input('pdate');
       $articlelink = $req->input('articlelink');
$author = $req->input('author');
        $tumbimage = $req->file('tumbimage');

       $thumb_img = $req->input('thumb_img');

       $realimage = $req->file('realimage');

       $orginal_img = $req->input('orginal_img');
       
        $pdf1 = $req->file('pdf1');
        $oldpdf = $req->input('oldpdf');

            
               


 $destinationPath = 'upload/feed/thumb/';
             $destinationPath1 = 'upload/feed/real/';
              $destinationPath2 = 'upload/feed/pdf/';


              if ($tumbimage!='') {
               $fileName=$tumbimage->getClientOriginalName();
                $newfilename= $destinationPath.$fileName;
                  $tumbimage->move($destinationPath, $fileName);
                }  else{  $newfilename=$thumb_img;  }

             if ($realimage!='') {
              $fileName1=$realimage->getClientOriginalName();
              $newfilename2= $destinationPath1.$fileName1;
              $realimage->move($destinationPath1, $fileName1);
              } else   {   $newfilename2=$orginal_img;   }

              if ($pdf1!='') {
                  $fileName2=$pdf1->getClientOriginalName();
                  $newfilename3= $destinationPath2.$fileName2;
                  $pdf1->move($destinationPath2, $fileName2);
              }  else  {    $newfilename3= $oldpdf;   }
       
 


                                   $updateDetails = [
                                    'category' => $category,
                                    'title' =>  $title,
                                    'description' => $description,
                                    'tumbimage' => $newfilename,
                                    'realimage' => $newfilename2,
                                    'pdate' =>  $pdate,
                                     'articlelink'=>$articlelink,
									 'author' =>$author,
                                     'pdf' =>  $newfilename3,
                                    'labelid' => $labels,
    
                                                    ];

                                     DB::table('tbl_feeds')
                                         ->where('id', $id)
                                         ->update($updateDetails);
                               $msg='feed updated Successfully!!';

                            
           
         

                return redirect()->back()->withErrors([$msg]);


      
    }




     public function removefeed($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                DB::table('tbl_feeds')->where(['id' => $id])->delete();

                return redirect('/feeddetails')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }

  public function popularfapprove(Request $request)



  {
  
  
  
   
  
    $states = DB::table('tbl_feeds')->where(['id' => $request->db_id])->update(['popularstatus' => '1']);
  
   
  
      
  
  
  
      return "Success";
  
  
  
  }
  
  
  
  
  
  
  
  public function popularfreject(Request $request)
  
  
  
  {
  
  
  
      $states = DB::table('tbl_feeds')->where(['id' => $request->db_id])->update(['popularstatus' => '0']);
  
  
  
      return "Success";
  
  
  
  }
  public function newscategory()
    {
      if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
              $data['data'] = DB::table('tbl_newscategory')->orderBy('id', 'desc')->get();

                   if(count($data) > 0)
                      {
                      return view('institution.newscat', $data);
                       }
                   else
                      {
                     return view('institution.newscat');
                      }

               
            } else { return redirect('/'); }
        }
    }
    public function newnewscategory()
    {
      if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {



               return view('institution.newnewscategory');
            } else { return redirect('/'); }
        }
    }
     public function postnewscategory(Request $req)
    {
      if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {

                  $instid = Auth::user()->instid;
                  $labels = $req->input('labels');
                  $created = $req->input('created');
                  $year = $req->input('year');
                  $time = $req->input('time'); 
             $languagecheck = DB::table('tbl_newscategory')->where(['category' => $labels])->value('id');
              if($languagecheck != '')
               {
                  $msg="ERROR:::CANNOT SUBMIT !!!!!!This News Category Already Exist";

               }
               else
               {
                 if($labels != '')
                  {
                     $data=array('category'=>$labels,"instid"=>$instid,"year"=>$year,"time"=>$time,"status"=>'1');
                      DB::table('tbl_newscategory')->insert($data);
                         $msg='News Category Added  Successfully!!';
                  }      
                 else{$msg="Please Enter News Category "; }
                }
        
             return redirect()->back()->withErrors([$msg]);
         } else { return redirect('/'); }
        }
    }
     public function viewnewscategory($id)
    {
      if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
            $languagesar = DB::table('tbl_newscategory')->where(['id' => $id])->orderBy('id', 'desc')->get();

             
               return view('institution.viewnewscategory')->with('languagesar',$languagesar);
            } else { return redirect('/'); }
        }
    }
     public function updatenewscategory(Request $req)
    {
      if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {



                $instid = Auth::user()->instid;
                  $labels = $req->input('labels');
                  $editeddate = $req->input('created');
                  $year = $req->input('year');
                  $time = $req->input('time');
                   $lanid = $req->input('lanid');


                  $languagecheck = DB::table('tbl_newscategory')->where(['category' => $labels])->value('id');
                  if($languagecheck != '')
                 {
                  $msg="ERROR:::CANNOT SUBMIT !!!!!!This News Category Already Exist";

                 }
                else
                {
                   if($labels != '')
                   {
                         $updateDetails = [
                             'category' => $labels,
                             'editeddate' => $editeddate,
                             'editedby' =>  $instid,
                            
    
                              ];

                       DB::table('tbl_newscategory')
                     ->where('id', $lanid)
                     ->update($updateDetails);
                     $msg="News Category  Updated Succesfully";

                     }      
                     else{$msg="Please Enter News Category"; }
                }
        
             return redirect()->back()->withErrors([$msg]);
         } else { return redirect('/'); }
        }
    }
     public function removenewscategory($id)
    {
      if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {

                DB::table('tbl_newscategory')->where(['id' => $id])->delete();

                return redirect('/newscategory')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }

//newnew
public function newsdetails() // news view: admin panel
    {


       if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data['news'] = DB::table('tbl_news')->orderBy('id','desc')->get();
                
                /*echo count($data);
              echo "<pre>";
           print_r($data);

               echo "</pre>";

               exit;*/

                if(count($data)>0)
                {
                    return view('institution.viewnews',$data);
                }
                else
                {
                    return view('institution.viewnews');
                }
            }
             else { return redirect('/'); }
        }
    	return view('institution.viewnews');
    }




     public function newnews()
    {

    	 if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                
                
                $newscat = DB::table('tblsn_newscategory')->where('status', '1')->get();
                
              $newslabels = DB::table('sn_labels')->where('status', '1')->orderBy('labels','asc')->get();



               return view('institution.newnews')->with('newscat',$newscat)->with('newslabels',$newslabels);
            } else { return redirect('/'); }
        }
    	
    }

    public function postnews(Request $req)
    {

    	
        $instid = Auth::user()->instid;
        $category = $req->input('category');
        $tumbimage = $req->file('tumbimage');
        $realimage = $req->file('realimage');
        
      $author = $req->input('author');
       $labels= $req->input('labels');
       
        $articlelink = $req->input('articlelink');
          $pdf1 = $req->file('pdf1');
             $visitor = $req->input('visitor');
              $guest = $req->input('guest');
               $subscriber = $req->input('subscriber');
                $core = $req->input('core');

                if ($visitor=='') {
                 $visitor='0';
                }
                 if ($guest=='') {
                 $guest='0';
                }
                 if ($subscriber=='') {
                 $subscriber='0';
                }
                 if ($core=='') {
                 $core='0';
                }

             
           

                   $labelstr = implode(', ', $labels);
        
        
         $pdate = $req->input('pdate');
        
         

        if($category != '')
        {
             $destinationPath = 'upload/news/thumb/';
             $destinationPath1 = 'upload/news/real/';
              $destinationPath2 = 'upload/news/pdf/';


              if ($tumbimage!='') {
               $fileName=$tumbimage->getClientOriginalName();
                $newfilename= $destinationPath.$fileName;
                  $tumbimage->move($destinationPath, $fileName);
                }  else{  $newfilename='0';  }

             if ($realimage!='') {
              $fileName1=$realimage->getClientOriginalName();
              $newfilename2= $destinationPath1.$fileName1;
              $realimage->move($destinationPath1, $fileName1);
              } else   {   $newfilename2='0';   }

              if ($pdf1!='') {
                  $fileName2=$pdf1->getClientOriginalName();
                  $newfilename3= $destinationPath2.$fileName2;
                  $pdf1->move($destinationPath2, $fileName2);
              }  else  {    $newfilename3='0';   }

               
              
              



                    tblnews::create($req->all());
                    $pstid = DB::getPdo()->lastInsertId();
                    
                    
            
             if($author != '')
             {

                    $updateDetails = [
                             'tumbimage' => $newfilename,
                             'realimage' =>  $newfilename2,
                             'pdate' =>  $pdate,
                              'author' =>  $author,
                              'articlelink'=>$articlelink,
                              'status' =>  '1',
                              'labelid' => $labelstr,
                              
                              'visitor' =>  $visitor,
                               'guest' =>  $guest,
                               'subscriber' =>  $subscriber,
                               'coreuser' =>  $core,


                                      ];
             }
             else
             {
                 $authorname = DB::table('users')->where('id',$instid)->value('name');
                 
                  $updateDetails = [
                             'tumbimage' => $newfilename,
                             'realimage' =>  $newfilename2,
                              'pdate' =>  $pdate,
                              'author' =>  $authorname,
                              'status' =>  '1',
                              'labelid' => $labelstr,
                              'pdf' =>  $newfilename3,
                               'visitor' =>  $visitor,
                               'guest' =>  $guest,
                               'subscriber' =>  $subscriber,
                               'coreuser' =>  $core,
                                'articlelink'=>$articlelink,
                                      ];
             }

                           DB::table('tbl_news')
                               ->where('id', $pstid)
                               ->update($updateDetails);
            
            
          
                            $msg='news Added  Successfully!!';

                         }else{
                           $msg="Please Fill news Category name";
             }
        
         return redirect()->back()->withErrors([$msg]);

    }




public function updatenews($id)//for diting news
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $data = DB::table('tbl_news')->where(['id' => $id])->get();
                
                $cal = DB::table('tbl_news')->where(['id' => $id])->value('category');
                
                
                 $newscat = DB::table('tblsn_newscategory')->where('status', '1')->where('category','!=', $cal)->get();
                 
                //  print_r($newscat);
                //  exit;
                

                if(count($data) > 0)
                {
                    return view('institution.editnews')->with('newscat',$newscat)->with('data',$data);
                }
                else
                {
                    return view('institution.editnews');
                }
            } else { return redirect('/'); }
        }
    }


 public function updatenewsdata(Request $req)
    {
        
        $id = $req->input('id');
        $category = $req->input('category');
        $title = $req->input('title');
        $description = $req->input('description');
        $pdate = $req->input('pdate');
       $articlelink = $req->input('articlelink');
$author = $req->input('author');
        $tumbimage = $req->file('tumbimage');

       $thumb_img = $req->input('thumb_img');

       $realimage = $req->file('realimage');

       $orginal_img = $req->input('orginal_img');
       
        $pdf1 = $req->file('pdf1');
        $oldpdf = $req->input('oldpdf');

            $visitor = $req->input('visitor');
              $guest = $req->input('guest');
               $subscriber = $req->input('subscriber');
                $core = $req->input('core');

                if ($visitor=='') {
                 $visitor='0';
                }
                 if ($guest=='') {
                 $guest='0';
                }
                 if ($subscriber=='') {
                 $subscriber='0';
                }
                 if ($core=='') {
                 $core='0';
                }


 $destinationPath = 'upload/news/thumb/';
             $destinationPath1 = 'upload/news/real/';
              $destinationPath2 = 'upload/news/pdf/';


              if ($tumbimage!='') {
               $fileName=$tumbimage->getClientOriginalName();
                $newfilename= $destinationPath.$fileName;
                  $tumbimage->move($destinationPath, $fileName);
                }  else{  $newfilename=$thumb_img;  }

             if ($realimage!='') {
              $fileName1=$realimage->getClientOriginalName();
              $newfilename2= $destinationPath1.$fileName1;
              $realimage->move($destinationPath1, $fileName1);
              } else   {   $newfilename2=$orginal_img;   }

              if ($pdf1!='') {
                  $fileName2=$pdf1->getClientOriginalName();
                  $newfilename3= $destinationPath2.$fileName2;
                  $pdf1->move($destinationPath2, $fileName2);
              }  else  {    $newfilename3= $oldpdf;   }
       
 


                                   $updateDetails = [
                                    'category' => $category,
                                    'title' =>  $title,
                                    'description' => $description,
                                    'tumbimage' => $newfilename,
                                    'realimage' => $newfilename2,
                                    'pdate' =>  $pdate,
                                     'articlelink'=>$articlelink,
									 'author' =>$author,
                                     'pdf' =>  $newfilename3,
                                    'visitor' =>  $visitor,
                                    'guest' =>  $guest,
                                    'subscriber' =>  $subscriber,
                                    'coreuser' =>  $core,
    
                                                    ];

                                     DB::table('tbl_news')
                                         ->where('id', $id)
                                         ->update($updateDetails);
                               $msg='news updated Successfully!!';

                            
           
         

                return redirect()->back()->withErrors([$msg]);


      
    }




     public function removenews($id)
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;

                DB::table('tbl_news')->where(['id' => $id])->delete();

                return redirect('/newsdetails')->withErrors(['Deleted Successfully!!']);
            } else { return redirect('/'); }
        }
    }




}
