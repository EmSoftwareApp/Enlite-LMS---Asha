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
//use App\Models\tblSystemSettigs;

class CentreController extends Controller
{
    public function admincentres()
    {
        $data['data'] = DB::table('users')->where(['type' => '2'])->orderBy('id', 'asc')->get();

        if(count($data) > 0)
        {
            return view('admin.admincentres', $data);
        }
        else
        {
            return view('admin.admincentres');
        }
    }
    public function admininstremove($id)
	{
		DB::table('users')->where('id', $id)->delete();      

        return redirect('/admin-centres')->withErrors(['Centre Removed Successfully!!']);
	}
}
