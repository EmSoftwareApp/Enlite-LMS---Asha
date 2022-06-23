<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gname', 'gender', 'dob', 'email', 'password', 'type', 'year', 'instid', 'contact', 'lcontact', 'address', 'course', 'board', 'syear', 'grade', 'hcourse', 'hboard', 'hyear', 'hgrade',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
