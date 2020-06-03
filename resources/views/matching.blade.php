@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-interval="false"
             data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active ">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 style="color:whitesmoke">{{$profiles[0]->full_name}}</h2>
                    </div>
                    {{--                    w-100 removed from images..--}}
                    <img src="{{'/storage/profilePictures/1.jpeg'}}" class="d-block" alt="...">
                </div>
                @foreach($profiles as $profile)
                    <div class="carousel-item" >
                        <div class="carousel-caption d-none d-md-block">
                            <h2 style="color:white">{{$profile->full_name}}</h2>
                        </div>
                        {{--                    w-100 removed from images..--}}
                        <img src="{{'/storage/profilePictures/'.$profile->profile_picture_name}}" class="d-block "
                             alt="...">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon " aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endsection
