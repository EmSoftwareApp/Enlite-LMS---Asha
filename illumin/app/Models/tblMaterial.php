<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblMaterial extends Model
{
    use HasFactory;
    protected $fillable = [
        'label', 'materialcaption', 'description', 'created', 'year', 'instid', 'program', 'regtime', 'addedby', 'updatedby', 'updatedon',
    ];
}
