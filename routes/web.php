<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\CustomeAuthController;
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


Route::group([
    'prefix' => LaravelLocalization::setLocale(),  //{lang}/index	  to select the language
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ] //middlewares
],
function(){  
// Route::group(['perfix'=> 'offers'], function(){

    Route::get('index',[CrudController::class,'form']);    // call function that view the form
        Route::get('store',[CrudController::class,'store']);  //  offers/store
        Route::post('insert', [CrudController::class,'insert'])->name('offers.insert'); //insert into database


//Crud operation
    //show the DB
    Route::get('all',[CrudController::class,'index'])->name('offer.all');  

    //Update
    Route::get('edit/{offer_id}', [CrudController::class,'EditOffer'])->name('offer.edit');  //get the form edit by id
    Route::post('update/{offer_id}', [CrudController::class,'UpdateOffer'])->name('offers.update'); //insert the new update
    
    //Delete
    Route::get('delete/{offer_id}',[CrudController::class,'DeleteOffer'])->name('offer.delete');
    
//event listener
    Route::get('youtube',[CrudController::class,'getVideo']);

});
Route::get('/dash', function () {
    return 'Not allowed';
})->name('dash');

#########################    Authentication and Guards     ###################
//route for middleware for the adults people
Route::group(['middleware'=>'CheckAge'], function () {
    Route::get('adult', [CustomeAuthController::class,'adult'])->name('auth'); 
});


