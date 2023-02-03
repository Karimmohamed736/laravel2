<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//middleware to check the age if adult
class CheckAge
{

    public function handle(Request $request, Closure $next)
    {
        $age = Auth::user()->age;  //call the table db
        
        //checking if age not suitable, don`t enter to the page
        if ($age < 15) {
            return redirect()-> route('dash');
        }
        return $next($request);
    }
}
