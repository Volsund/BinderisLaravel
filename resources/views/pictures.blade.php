@extends('layouts.app')

@section('content')
    <div class="container">

        <div>
            <h1 class="main-head display-4 " style="padding-left:75px">{{$profile->full_name}}
                gallery:</h1>
        </div>
        <div class="picture-container d-flex ">
            <div>
                <img class="gallery-image" src="{{$profile->getPicture()}}" width="300px">
            </div>
            <div>
                @foreach ($pictures as $picture)
                    <img class="gallery-image shadow" src="{{$picture->location}}" width="300px"/>
                @endforeach

            </div>
        </div>

    </div>

@endsection
