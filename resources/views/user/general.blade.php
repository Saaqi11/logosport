@extends("layouts.main")
@section("content")
    <style>
        .form-check {
            left: 15px;
        }
    </style>
    @include("user.header")
    <div class="row">
        <div class="col-12">
        <span class="cnst-subtitle">
            General
        </span>
        </div>
    </div>
    <form action="{{ route("user.general.update") }}" class="setting-gnr row" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12 col-md-12 col-sm-12 d-flex ">
            <div class="col-lg-8 col-md-6 col-sm-12 d-flex text-center">
                <label for="profile-image" style="cursor: pointer">
                    <img src="{{ $user->profile_image ? asset('profile_image/' . $user->profile_image) : asset('images/img/other-img/avatar.jpg') }}" alt="profile" style="width: 40%;">
                    <input type="file" name="profile_image" id="profile-image" hidden>
                </label>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="wrp-brief">
                <span class="title-brief">
                    First Name
                </span>
                <input type="text" name="first_name" class="input-brief" value="{{ $user->first_name }}">
            </div>
            <div class="wrp-brief">
                <span class="title-brief">
                    Last Name
                </span>
                <input type="text" name="last_name" class="input-brief" value="{{ $user->last_name }}">
            </div>
            <div class="wrp-brief">
                <span class="title-brief">
                    Username
                </span>
                <input type="text" name="username" class="input-brief" value="{{ $user->username }}">
            </div>
            <div class="wrp-brief">
                <span class="title-brief">
                    Country
                </span>
                <div class="select-wrapper">
                    <i class="fas fa-angle-down"></i>
                    <select name="country" class="select-brief" id="country">
                        <option value="" selected="" disabled="" hidden="">Please select any</option>
                        @if(!empty($countries))
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}" {{ $country->id == $user->country ? "selected" : "" }}>{{ $country->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="wrp-brief">
                <span class="title-brief">
                    City
                </span>
                <div class="select-wrapper">
                    <i class="fas fa-angle-down"></i>
                    <select name="city" class="select-brief" id="city">
                        @if(!empty($user->city) && !empty($cities) && count($cities) > 0)
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" {{ $city->id == $user->city ? "selected" : ""}}>{{ $city->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            @if(auth()->user()->hasRole("Designer"))
                <div class="wrp-brief">
                    <span class="title-brief">
                        Behance
                    </span>
                    <input type="text" name="behance" class="designer-fields input-brief" value="{{ $user->behance }}">
                    <span style="color: red" class="error-message"></span>
                </div>
            @endif
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="wrp-brief">
                <label for="about_me" class="title-brief nm">
                    About me <span>(143/150)</span>
                    <textarea name="about_me" id="about_me" class="textarea-brief">{{ $user->about_me }}</textarea>
                </label>
            </div>
            <div class="wrp-brief">
                <span class="title-brief">
                    Gender
                </span>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Male" {{ $user->gender === "Male" ? "checked" : "" }}>
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Female" {{ $user->gender === "Female" ? "checked" : "" }}>
                    <label class="form-check-label" for="gender">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="I can not specified" {{ $user->gender === "I can not specified" ? "checked" : "" }}>
                    <label class="form-check-label" for="gender">
                        I can not specified
                    </label>
                </div>
            </div>
            <div class="wrp-brief">
                <span class="title-brief">
                    Telephone
                </span>
                <input type="number" name="telephone" class="input-brief" value="{{ $user->telephone }}">
            </div>
            <div class="wrp-brief">
                <span class="title-brief">
                    E-mail (Confirm)
                </span>
                <input type="email" name="email" class="input-brief" value="{{ $user->email }}">
            </div>
            @if(auth()->user()->hasRole("Designer"))
                <div class="wrp-brief">
                    <span class="title-brief">
                        Dribble
                    </span>
                    <input type="text" name="dribble" class="designer-fields input-brief" value="{{ $user->dribble }}">
                    <span style="color: red" class="error-message"></span>
                </div>
                <div class="wrp-brief">
                    <span class="title-brief">
                        Other
                    </span>
                    <input type="text" name="other" class="designer-fields input-brief" value="{{ $user->other }}">
                    <span style="color: red" class="error-message"></span>
                </div>
            @endif
        </div>
        <div class="col-lg-8 col-md-12 d-flex align-items-start justify-content-between">
            <div class="wrp-btn">
                <button class="btn btn-primary btn-success wide" type="submit">Save</button>
            </div>
            <button class="btn btn-danger">Delete account</button>
        </div>
    </form>
    <div class="modal" id="delete-account" tabindex="-1">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="popap-setting">
                    <div class="title-ntf">
                        <h2>
                            Delete
                        </h2>
                    </div>
                    <p class="popap-text">
                        Are you sure you want to delete
                        account?
                    </p>
                    <div class="wrp-btn">
                        <button class="btn-cansel close-modal">Cancel</button>
                        <form action="{{ route("user.delete") }}">
                            <button class="btn-ok" type="submit">OK</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
