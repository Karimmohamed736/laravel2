@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$datails['title']}}</div>
                
                <div class="card-body">
                    
                    <p>
                {{$datails['body']}}

                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
