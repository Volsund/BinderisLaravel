@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="main-head display-4 " style="padding-left:75px; color: #EF2D56; font-size:35px" >Find your special someone...</h1>
        <div class="row justify-content-center">
            @foreach($profiles as $profile)
                <div class="card bg-light text-white" style="margin:20px">
                    <img style="border-radius: 6px" class="shadow home-picture" src="{{'/storage/profilePictures/'.$profile->profile_picture_name}}" width="300px">
                    <div class="card-img-overlay">
                        <h5 class="preview-text card-title">{{$profile->full_name}}</h5>
                        <p class="preview-text card-text">{{$profile->location}}</p>
                        <p class="preview-text card-text">{{$profile->age}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
