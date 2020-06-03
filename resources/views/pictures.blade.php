@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$profile->full_name}} pictures:</div>
                    <div class="card-body">

                        <img src="{{$profile->getPicture()}}" width="300px">
                        @foreach ($pictures as $picture)
                            <img src="{{$picture->location}}"/>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
