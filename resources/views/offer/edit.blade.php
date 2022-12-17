
@extends('layouts.navbar')
@section('navbar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<style>form{background-image: url("OIP\ \(1\).jpg");text-align: center;margin: 2% auto 0;background-repeat: no-repeat;background-size: cover;}h1{ color: white;}body{background-image: url("R.jpg");background-color: teal}#inp1{padding: 5px;border-radius: 10px;border: 2px solid white ;}#a1{text-decoration: none;color: aliceblue;}#a2{color: lightskyblue;}button{margin-top: 20px;margin-bottom: 10px;background-color: darkgoldenrod;padding: 5px 50px;border-radius: 10px;}p{color: white;}</style>
{{-- @dd($offer) --}}
<body>
    {{-- search for route by name of offers.update + selected id --}}
    <form method="POST" action="{{ route('offers.update' , $offer->id)}}"> 
        @csrf   
        {{-- <input type="hidden" name="test" value="{{$offer->id}}"> --}}
        <h1> {{__('messages.Update')}}</h1>   
        {{-- simple alert if success to insert , success is a redirect when insert data ->with()--}}
        @if(Session::has('success')) 
        <div class="alert alert-success" role="alert" style="border: 10px; color: teal">{{Session::get('success')}}</div>
        @endif
                                                    {{--by compact in crudcontroller  --}}
        <input type="text" name="name_ar" value="{{$offer->name_ar}}" id="inp1" placeholder="{{__('messages.Your Offer ar')}}"> <br>
        @error('offer_ar')
        <small style="color: darkred; font-size: 15px" id="e">{{$message}}</small>  {{--validate error in form instead of function in controller --}}
        @enderror <br>

        <input type="text" name="name_en" value="{{$offer->name_en}}"  id="inp1" placeholder="{{__('messages.Your Offer en')}}"> <br>
        @error('offer_en')
        <small style="color: darkred; font-size: 15px" id="e">{{$message}}</small>  
        @enderror <br>



        <input type="text" name="price" value="{{$offer->price}}" id="inp1" placeholder="{{__('messages.Price')}}" style="margin-top: 30px"><br>
        @error('price')
        <small style="color: darkred; font-size: 15px" class="form-text text-danger">{{$message}}</small>
        @enderror
        
        <p><b>{{__("messages.You are about to insert a new column")}} <br> {{__('messages.Please click submit')}} <br></b><button>{{__('messages.Submit')}}</button></p> <br>
    </form>
</body>
</html>
@endsection