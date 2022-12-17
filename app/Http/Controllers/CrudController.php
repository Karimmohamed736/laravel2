<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CrudController extends Controller
{
    public function getoffers(){

       return Offer::get();  //return all columns
    }
    public function getusers(){
        return User::select('name', 'email')-> get();
    }

    //to insert
    public function store(){
        Offer::create([
            'name_ar'=>'لابتوب',
            'name_en'=>'laptop',
            'price'=>'200$'
        ]);
        return 'inserted';
    }

    //insert with form
    //validation too
    public function form(){  //show the form in view
        return view('offer.index');
    }

    public function insert(OfferRequest $req){ //in create offer

        Offer::create([         //send the data u enter in form (by name of inputs in index blade)
            'name_ar'=> $req -> offer_ar,       //'column'=> request-> input   to send to DB
            'name_en'=> $req -> offer_en,
            'price'=> $req -> price,
        ]);
        return redirect()->back()->with(['success'=>'This is a success alert-check it now!']); //redirect to the view with message after inserted
        // return view('offer/index');


    }
    //for calling the messages (for best developing)
    // protected function getmessages(){
    //     return ['offer.required'=> __('messages.please insert your offer'),  //to translate the message into page language that appear in lang/ar/messages
    //     'price'=> trans('messages.insert the price first')
    // ];
    // }

//to improve your code, make request and put in it the rules and we don`t to validate it as the file have a vaildation

    /* $rules= [ 
        //     'offer' =>'required|max:100|unique:offers,name',   // 'inputs'=>'validate:table,column'
        //     'price'=>'required'
        // ];
        // $messages= $this->getmessages(); //call function

        // //validate before insert data to make sure for clean data
        // $validate = Validator::make($req->all(),$rules,$messages); //(for all attributes,validation,message)
        // if ($validate->fails()) {
        //     return redirect()->back()->withErrors($validate)->withInput($req->all());  //return the form with validate errors in inputs

    }*/

//CRUD
    //index
    public function index(){
        //to get name_ar or name_en , as name to call it in the all.blade by name 
        $offers = Offer::select('id', 'name_'. LaravelLocalization::getCurrentLocale(). ' as name' ,
        'price')->get();  //select from db to get attributes
        return view('offer.all',compact('offers')); //to define the DB in the view
    }
    //Update
    public function EditOffer($offer_id){  //go to function in route and get the id 
        // Offer::findOrFail($offer_id);  //if id not found return not foind
        
        //condition to check on the id
        $offer = Offer::find($offer_id); 
        if (!$offer) 
            return redirect()->back();
        
        //return the view of edit and select the columns to edit on it by the id and send the compact to the view
        $offer =  Offer::select('id','name_ar','name_en','price')->find($offer_id);
        
        return view('offer.edit',compact('offer'));
    }
        //now the inserted after click update
    public function UpdateOffer(OfferRequest $req , $offer_id){
        //check
        $offer =  Offer::find($offer_id);
        if (!$offer) 
        return redirect()->back();
        
        //update the data
        $offer->update($req->all());
        return redirect()->back()->with(['success'=>"updated successfully"]);
        
    }
}
    