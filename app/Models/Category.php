<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='category_files';
    protected $fillable=['name','category_id'];
}
