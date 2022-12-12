
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


                  {{-- <a rel="alternate" hreflang="{{ $localeCode }}"  --}}
      



      <form class="form-inline my-2 my-lg-0">
        <input type="search" placeholder="{{__('messages.Search')}}" aria-label="Search" style="border-radius: 5px">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('messages.Search')}}</button>
      </form>

    </div>
  </nav>
@yield('navbar')