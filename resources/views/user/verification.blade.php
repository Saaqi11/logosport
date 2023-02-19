@extends("layouts.main")
@section("content")
    @include("user.header")
    <div class="row">
        <div class="col-12">
        <span class="cnst-subtitle">
            Verification
        </span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-12">
            @if(!empty($verification->is_verified) && $verification->is_verified === 1)
                Your documents has been verified!
            @elseif( $verification->is_verified == 0)
                Documents on check. Please wait!
            @else
                <div class="stg-row">
                <span class="subtitle">
                    1. Conditions to the photo
                </span>
                    <ul class="stg__list">
                        <li class="stg__items">
                            <p class="stg__text">
                                &mdash; clear photo
                            </p>
                        </li>
                        <li class="stg__items">
                            <p class="stg__text">
                                &mdash; color photography
                            </p>
                        </li>
                        <li class="stg__items">
                            <p class="stg__text">
                                &mdash; prominent all 4 corners of the photo
                            </p>
                        </li>
                        <li class="stg__items">
                            <p class="stg__text">
                                &mdash; direct view
                            </p>
                        </li>
                        <li class="stg__items">
                            <p class="stg__text">
                                &mdash; no glare and don't use flash
                            </p>
                        </li>
                        <li class="stg__items">
                            <p class="stg__text">
                                &mdash; photo does not have an inscription and a watermark
                            </p>
                        </li>
                    </ul>
                </div>
                <form action="{{ route("user.verification.save") }}" class="setting-ver" id="verification-form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="stg-row">
                    <span class="subtitle">
                        2. Choose your country
                    </span>
                        <div class="wrp-brief">
                            <div class="select-wrapper">
                                <i class="fas fa-angle-down"></i>
                                <select name="country" class="select-brief" value="" required>
                                    <option value="" selected="" disabled="" hidden="">Please Select Any</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="stg-row">
                    <span class="subtitle">
                        3. Type of document
                    </span>
                        <div class="wrp-brief">
                            <div class="select-wrapper">
                                <i class="fas fa-angle-down"></i>
                                <select name="document_type" class="select-brief" value="" required>
                                    <option value="" selected="" disabled="" hidden="">Please Select Any</option>
                                    <option value="Passport">Passport</option>
                                    <option value="National Identity Card">National Identity Card</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="stg-row">
                    <span class="subtitle">
                        4. Upload photo (choose file for 1 page)
                        and for second page
                    </span>
                        <div class="row">
                            <div class="col-lg-6 p-0">
                                <a class="block-upload" id="image-1">
                                    <i class="fas fa-arrow-down"></i>
                                    <span>
                                    Upload file
                                </span>
                                </a>
                            </div>
                            <div class="col-lg-6  p-0">
                                <a class="block-upload" id="image-2">
                                    <i class="fas fa-arrow-down"></i>
                                    <span>
                                    Upload file
                                </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="stg-row">
                        <button class="btn btn-success" type="submit">
                            Send for review
                        </button>
                    </div>
                    <input type="file" name="first_image" id="first_image" style="display: none;">
                    <input type="file" name="second_image" id="second_image" style="display: none;">
                </form>
            @endif
        </div>
    </div>
@endsection
