<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserData extends Authenticatable
{
    protected $table='user_data';
    protected $fillable=['name','email','password'];
    
}
