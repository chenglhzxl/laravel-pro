<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
//    protected $connection = 'access_db';
    protected $table = 'users';
    protected $guarded = ['id'];
    public $timestamps = false;
}
