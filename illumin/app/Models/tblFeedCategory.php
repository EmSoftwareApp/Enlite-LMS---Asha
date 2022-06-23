<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class tblFeedCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category', 'date', 'time', 'instid','createdat'
    ];
    public static function feedcategory($x) 
    {
      $par = "";

      $agents1 = DB::table('tbl_feedcategory')->where('id',$x)->pluck('category'); 

      foreach ($agents1 as $agent1=>$value1) {
          $par = $value1;
    	}
    	return $par;
    }
}
