@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow edit-profile-card">
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

                            <div class="form-row">
                                <div class="col">
                                    <label for="full_name">Real Name</label>
                                    <input type="text"
                                           name="full_name"
                                           class="form-control"
                                           id="full_name"
                                           aria-describedby="emailHelp"
                                           value="{{old('full_name',$profile->full_name)}}"
                                    >
                                </div>
                                <div class="col">
                                    <label for="surname">Surname</label>
                                    <input type="text"
                                           name="surname"
                                           class="form-control"
                                           id="surname"
                                           aria-describedby="emailHelp"
                                           value="{{old('surname',$profile->surname)}}"
                                    >
                                </div>
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
                                <label for="age">Your age:</label>
                                <input type="text"
                                       name="age"
                                       class="form-control"
                                       id="age"
                                       aria-describedby="emailHelp"
                                       value="{{old('age',$profile->age)}}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="description">Tell Us Something About Yourself: </label>
                                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                            </div>

                            <div style="margin-top:40px; margin-bottom:20px">
                                <span style="color:#EF2D56"><b>Matching Settings:</b></span>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="genderInterest1" name="gender_interest" value="m"
                                       class="custom-control-input">
                                <label class="custom-control-label" for="genderInterest1">Show Men</label>
                            </div>

                            <div style="margin-bottom:20px"class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="genderInterest2" name="gender_interest" value="f"
                                       class="custom-control-input" checked="checked">
                                <label class="custom-control-label" for="genderInterest2">Show Women</label>
                            </div>

                            <div class="form-group">
                                <label for="minAgeRange">Min age you are interested in:</label>
                                <output name="ageInterestOutputName" id="minAgeOutputId">{{old('min_age',$profile->min_age)}}</output>
                                <input name="min_age"
                                       type="range"
                                       class="form-control-range"
                                       min="18" max="100" step="1"
                                       id="minAgeRange"
                                       value="{{old('min_age',$profile->min_age)}}"
                                       oninput="minAgeOutputId.value = minAgeRange.value">
                            </div>

                            <div class="form-group">
                                <label for="maxAgeRange">Max age you are interested in:</label>
                                <output name="ageInterestOutputName" id="maxAgeOutputId">{{old('max_age',$profile->max_age)}}</output>
                                <input name="max_age"
                                       type="range"
                                       class="form-control-range"
                                       min="18" max="100" step="1"
                                       id="maxAgeRange"
                                       value="{{old('max_age',$profile->max_age)}}"
                                       oninput="maxAgeOutputId.value = maxAgeRange.value">
                            </div>


                            <button type="submit" class="btn btn-primary edit-profile-button">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
