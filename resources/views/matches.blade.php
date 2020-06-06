@extends('layouts.app')

@section('content')
    <div class="container">
        @if($matches)
            <h1 class="main-head display-4 " style="padding-left:75px; color:#EF2D56">It is a match!</h1>
            <div class="d-flex">
                @foreach($matches as $match)
                    <div class="card" style="width: 300px; margin:20px">
                        <img style="border-radius: 6px; border:4px solid #1E1E24;"
                             src="{{'/storage/profilePictures/'.$match->profile_picture_name}}"
                             class="card-img-top shadow" alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#EF2D56">
                                {{$match->full_name . ' ' . $match->surname. ', '. $match->age}}</h5>
                            <p class="card-text">{{$match->location}}</p>
                            <p class="card-text">{{$match->description}}</p>
                            <form method="get"
                                  action="{{url('/users/'.$match->user_id.'/pictures')}}"
                                  enctype="multipart/form-data">
                                @method('GET')
                                @csrf
                                <button type="submit" class="btn btn-light">Show gallery</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h1 class="main-head display-4 " style="padding-left:75px">Nobody likes you, sorry...</h1>
        @endif
    </div>
@endsection
