<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'name'=>'laptop',
            'price'=>'200$'
        ]);
        return 'inserted';
    }

    //insert with form
    //validation too
    public function index(){  //show the form in view
        return view('offer.index');
    }

    public function insert(OfferRequest $req){ //in create offer

        Offer::create([         //send the data u enter in form (by name of inputs in blade)
            'name'=> $req-> offer,       //'column'=> request-> input   to send to DB
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
}

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