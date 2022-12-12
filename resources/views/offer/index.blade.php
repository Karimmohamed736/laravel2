
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

<body>
    <form action="{{route('offers.insert')}}" method="POST">  
        {{-- The token for security by laravel --}}
        {{-- <input name="_token" value="{{csrf_token()}}" > --}}
        @csrf   
        {{-- to translate the word offers ('file_translation.word') --}}
        <h1> {{__('messages.Offers')}}</h1>   
        {{-- simple alert if success to insert , success is a redirect when insert data ->with()--}}
        @if(Session::has('success')) 
        <div class="alert alert-success" role="alert" style="border: 10px; color: aqua">{{Session::get('success')}}</div>
        @endif
        <input type="text" name="offer" id="inp1" placeholder="{{__('messages.Your Offer')}}"> <br>
        @error('offer')
        <small style="color: darkred; font-size: 15px" id="e">{{$message}}</small>  {{--validate error in form instead of function in controller --}}
        @enderror <br>
        <input type="text" name="price" id="inp1" placeholder="{{__('messages.Price')}}" style="margin-top: 30px"><br>
        @error('price')
        <small style="color: darkred; font-size: 15px" class="form-text text-danger">{{$message}}</small>
        @enderror
        
        <p><b>{{__("messages.You are about to insert a new column")}} <br> {{__('messages.Please click submit')}} <br></b><button>{{__('messages.Submit')}}</button></p> <br>
    </form>
</body>
</html>
@endsection