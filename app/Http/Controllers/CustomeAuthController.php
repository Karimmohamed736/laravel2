<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomeAuthController extends Controller
{
    public function adult(){
        return view('CustomeAuth.index');
    }
}
