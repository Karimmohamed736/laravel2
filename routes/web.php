<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


//call the function getoffers that show the database of table
Route::get('fill', [\App\Http\Controllers\CrudController::class, 'getoffers' ]); 
Route::get('fill2', [\App\Http\Controllers\CrudController::class, 'getusers' ]);

Route::group(['prefix'=>'offers'],function(){
    Route::group([
        'prefix' => LaravelLocalization::setLocale()], function(){
        

    Route::get('store',[CrudController::class,'store']);  //  offers/store


    Route::get('index',[CrudController::class,'index']);    // call function that view the form
    Route::post('insert', [CrudController::class,'insert'])->name('offers.insert'); //insert into database
    
});
});


