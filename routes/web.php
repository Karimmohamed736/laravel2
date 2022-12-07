<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// added automatically that include routes of auth folder in views (login , resgister , password,..)
Auth::routes(['verify'=>true]);   //verify the email

//Login home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified'); //verified email
