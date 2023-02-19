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
            Password
        </span>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <form action="{{ route("user.password.update") }}" class="setting-form" method="post">
                @csrf
                <div class="wrp-brief">
                            <span class="title-brief">
                                Old password
                            </span>
                    <input type="password" name="old_password" class="input-brief">
                </div>
                <div class="wrp-brief">
                            <span class="title-brief">
                                New password
                            </span>
                    <input type="password" name="password" class="input-brief">
                </div>
                <div class="wrp-brief">
                            <span class="title-brief">
                                Confirm new password
                            </span>
                    <input type="password" name="confirm_password" class="input-brief">
                </div>
                <div class="col-lg-12 col-md-12 d-flex align-items-start justify-content-between">
                    <div class="wrp-btn">
                        <button class="btn btn-primary btn-success wide" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
