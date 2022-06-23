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
use Image;
//use App\tblBatch;

class PackageController extends Controller
{
    public function packageexpiry()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $year = date('Y');
                $today = date('Y-m-d');
                
                $data['data'] = DB::table('tbl_user_packages')
                                ->where(['instid' => $instid, 'year' => $year])
                                ->where('pack_ends_on', '>=', $today)
                                ->orderBy('pack_ends_on', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.packageexpiry', $data);
                }
                else
                {
                    return view('institution.packageexpiry');
                }
            } else { return redirect('/'); }
        }
    }
    public function packageexpiryfind($year)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $today = date('Y-m-d');

                $data['data'] = DB::table('tbl_user_packages')
                ->where(['instid' => $instid, 'year' => $year])
                ->where('pack_ends_on', '>=', $today)
                ->orderBy('pack_ends_on', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.packageexpiry', $data);
                }
                else
                {
                    return view('institution.packageexpiry');
                }
            } else { return redirect('/'); }
        }
    }
    public function packageexpired()
    {
        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $year = date('Y');
                $today = date('Y-m-d');
                
                $data['data'] = DB::table('tbl_user_packages')
                                ->where(['instid' => $instid, 'year' => $year])
                                ->where('pack_ends_on', '<', $today)
                                ->orderBy('pack_ends_on', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.packageexpired', $data);
                }
                else
                {
                    return view('institution.packageexpired');
                }
            } else { return redirect('/'); }
        }
    }
    public function packageexpiredfind($year)
    {

        if (!Auth::check()) { return redirect('/'); } else {
            if((Auth::user()->type == 2) || (Auth::user()->type == 4))
            {
                $instid = Auth::user()->instid;
                $today = date('Y-m-d');

                $data['data'] = DB::table('tbl_user_packages')
                ->where(['instid' => $instid, 'year' => $year])
                ->where('pack_ends_on', '>=', $today)
                ->orderBy('pack_ends_on', 'asc')->get();

                if(count($data) > 0)
                {
                    return view('institution.packageexpired', $data);
                }
                else
                {
                    return view('institution.packageexpired');
                }
            } else { return redirect('/'); }
        }
    }
}
