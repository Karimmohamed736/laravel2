
<!DOCTYPE html>
<html lang="en">
<head>
  

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: darkblue">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href="#">{{__('messages.Navbar')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
  
        {{-- To access the languages you selected in  LaravelLocalization file  --}}
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="nav-item active">
            <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
              {{ $properties['native'] }}</a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  
</nav>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Offer table</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
<body>
  @if(Session::has('success')) 
        <div class="alert alert-success" role="alert" style="border: 10px; color: teal">{{Session::get('success')}}</div>
        @endif

  @if(Session::has('error')) 
  <div class="alert alert-danger">{{Session::get('success')}}</div>
  @endif
  <div class="container border rounded mt-5 ">
    <table class="table table-hover"  >
      <thead>
        <tr>
          <th class="  text-center ">id</th>
          <th class="  text-center">{{__('messages.Offers Name')}}</th>
          <th class="  text-center">{{__('messages.Offer price')}}</th>
          <th class="  text-end " style="padding: 10px 35px;">{{__('messages.Actions')}}</th> 
        </tr>
      </thead>
      <tbody>

        {{-- show every attributes that called from the controller --}}
        @foreach ($offers as $offer)
        <tr>
          <td class=" text-center">{{$offer -> id}}</td>  {{-- show the column id --}}
          <td class=" text-center">{{$offer -> name}}</td>
          <td class=" text-center">{{$offer -> price}}</td>
          <td  class="d-flex justify-content-end">
            {{-- call name routes of edit and delete --}}
            <a href="{{route('offer.edit',$offer ->id)}}" class=" btn btn-primary ">{{__('messages.Edit')}}</a>
              <a href="{{route('offer.delete',$offer ->id)}}" class=" btn btn-danger">{{__('messages.Delete')}} </a>
          </td>  {{-- go to route to get the url of edit and get by the id --}}
        </tr>
        @endforeach

      </tbody>
  </table>
  </div>

</body>

</html>
