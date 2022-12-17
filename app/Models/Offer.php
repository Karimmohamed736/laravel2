<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';
    protected $fillable = ['name_ar','name_en', 'price', 'created_at', 'updated_at'];   //fill the none inserted with null
    protected $hidden = ['created_at', 'updated_at'];     // hide the secret things for showing
    // public $timestamps = false;  //to set timestamps with null
    //then make route

}
