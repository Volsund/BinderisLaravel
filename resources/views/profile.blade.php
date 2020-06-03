@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit profile</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form
                            method="post"
                            action="{{route ('profile.update')}}"
                            enctype="multipart/form-data"
                        >

                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="picture">Upload Picture</label>
                                <input type="file" name="picture" class="form-control-file" id="picture">
                            </div>

                            <div class="form-group">
                                <img src="{{$profile->getPicture()}}" width=300px>
                            </div>

                            <div class="form-group">
                                <label for="name">Display Name</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       id="name"
                                       aria-describedby="emailHelp"
                                       value="{{old('name',$user->name)}}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="full_name">Real Name</label>
                                <input type="text"
                                       name="full_name"
                                       class="form-control"
                                       id="full_name"
                                       aria-describedby="emailHelp"
                                       value="{{old('full_name',$profile->full_name)}}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input type="text"
                                       name="surname"
                                       class="form-control"
                                       id="surname"
                                       aria-describedby="emailHelp"
                                       value="{{old('surname',$profile->surname)}}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="location">City</label>
                                <input type="text"
                                       name="location"
                                       class="form-control"
                                       id="location"
                                       aria-describedby="emailHelp"
                                       value="{{old('location',$profile->location)}}"
                                >
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="sex" value="m"
                                       class="custom-control-input" checked="checked">
                                <label class="custom-control-label" for="customRadioInline1">Male</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="sex" value="f"
                                       class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2">Female</label>
                            </div>

                            <div class="form-group">
                                <label for="ageRange">Your Age: </label>
                                <output name="ageOutputName" id="ageOutputId">24</output>
                                <input name="age"
                                       type="range"
                                       class="form-control-range"
                                       min="18" max="100" step="1"
                                       id="ageRange"
                                       value="{{old('age',$profile->age)}}"
                                       oninput="ageOutputId.value = ageRange.value">
                            </div>

                            <div class="form-group">
                                <label for="ageInterestRange">Max age you are interested in:</label>
                                <output name="ageInterestOutputName" id="ageInterestOutputId">24</output>
                                <input name="age_interest"
                                       type="range"
                                       class="form-control-range"
                                       min="18" max="100" step="1"
                                       id="ageInterestRange"
                                       value="{{old('age_interest',$profile->age_interest)}}"
                                       oninput="ageInterestOutputId.value = age_interest.value">
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
