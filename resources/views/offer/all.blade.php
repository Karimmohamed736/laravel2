
<!DOCTYPE html>
<html lang="en">
<head>
  

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: darkblue">
  <a class="navbar-brand" href="#">{{__('messages.Navbar')}}</a>
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
</nav>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Offer table</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
<body>
    <table class="table" border="3">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">{{__('messages.Offers Name')}}</th>
            <th scope="col">{{__('messages.Offer price')}}</th>
            <th scope="col">{{__('messages.Actions')}}</th>
          </tr>
        </thead>
        <tbody>

          {{-- show every attributes that called from the controller --}}
          @foreach ($offers as $offer)
          <tr>
            <td>{{$offer -> id}}</td>  {{-- show the column id --}}
            <td>{{$offer -> name}}</td>
            <td>{{$offer -> price}}</td>
            <td><a href="{{route('offer.edit',$offer ->id)}}" class=" btn btn-success">{{__('Edit')}}</a></td>  {{-- go to route to get the url of edit and get by the id --}}
          </tr>
          @endforeach

        </tbody>
      </table>
</body>

</html>
