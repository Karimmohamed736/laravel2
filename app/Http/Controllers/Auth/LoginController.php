<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

        //override the method from AuthenticatesUsers trait and change on it 
    public function username()
    {
        //to login by email and mobile 
        //request to call all request i need then the input names identify
        $value = request()->input('mobile');
        $field = filter_var($value,FILTER_VALIDATE_EMAIL)? 'email' : 'mobile' ;  //that are in user models 
        request()->merge([$field => $value]);
        return $field;
    }
}
