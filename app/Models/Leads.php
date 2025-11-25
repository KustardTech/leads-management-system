<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table='leads_data';
    protected $fillable=['name','email','mobile','image','message','category_file_id'];
}
