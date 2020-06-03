@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($profiles as $profile)
                    <div class="card">
                        <div class="card-header"><b>{{$profile->full_name . ' ' . $profile->surname}}</b></div>
                        <div class="card-body">
                            <img src="{{'/storage/profilePictures/'.$profile->profile_picture_name}}" width="300px">
                            <span><b>Location:</b> {{$profile->location}}  <b>Age:</b> {{$profile->age}}</span>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
