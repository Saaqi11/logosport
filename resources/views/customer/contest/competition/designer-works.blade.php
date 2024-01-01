@extends('layouts.competition-main')
@section('content')
    <style>
        .choose-position {
            padding: 10px;
            border-radius: 50%;
            border: 1px solid black;
            height: 30px;
            width: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .active-position {
            background: #3EAE18;
            color: #FFFFFF;
        }

        .customer-heart-icon {
            color: white;
            position: absolute;
            top: 8px;
            right: 8px;
            font-size: 20px;
        }
    </style>
    <div class="wrapper">
        <main class="page">
            <section class="container">
                <div class="brief__container">
                    @include('customer.contest.competition.partials')
                    <div class="brief__round">
                        <br>
                        <div class="brief__sliders sliders-brief">
                            @if (count($works) > 0)
                                @foreach ($works as $work)
                                    <div class="sliders-brief__item">
                                        <div class=" avatar-info">
                                            <div class="avatar-info__image-ibg">
                                                <picture>
                                                    <source srcset="{{ asset('images/img/other-img/avatar.webp') }}"
                                                        type="image/webp">
                                                    <img src="{{ asset('images/img/other-img/avatar.png') }}"
                                                        alt="">
                                                </picture>
                                            </div>
                                            <div class="avatar-info__content">
                                                <div class="avatar-info__name">
                                                    <a
                                                        href="{{ route('designer-works', ['position' => 'all', 'user' => $work->designer->username]) }}">
                                                        {{ $work->designer->first_name . ' ' . $work->designer->last_name }}
                                                    </a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    @if ($contest->user_id === auth()->user()->id)
                                                        <button
                                                            class="choose-position {{ $work->place === '1' ? 'active-position' : '' }}"
                                                            data-contest_id="{{ $work->contest_id }}"
                                                            data-work_id="{{ $work->id }}" data-position="1">1</button>
                                                        <button
                                                            class="choose-position {{ $work->place === '2' ? 'active-position' : '' }}"
                                                            data-contest_id="{{ $work->contest_id }}"
                                                            data-work_id="{{ $work->id }}" data-position="2">2</button>
                                                        <button
                                                            class="choose-position {{ $work->place === '3' ? 'active-position' : '' }}"
                                                            data-contest_id="{{ $work->contest_id }}"
                                                            data-work_id="{{ $work->id }}" data-position="3">3</button>
                                                    @endif
                                                </div>
                                                <div class="avatar-info__items">
                                                    <div class="avatar-info__item">
                                                        <span>{{ $work->reactions ? $work->reactions : 0 }}</span>
                                                        <i class="far fa-heart"></i>
                                                    </div>
                                                    <div class="avatar-info__item"><span>
                                                            {{ $work->totalWorks->count() }} works
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sliders-brief__slider swiper">
                                            <div class="sliders-brief__wrapper swiper-wrapper">
                                                @foreach ($work->files as $file)
                                                    <div class="sliders-brief__slide swiper-slide"
                                                        style="position: relative" data-item-id="{{ $file->id }}">
                                                        {!! auth()->user()->id && $contest->user_id === auth()->user()->id
                                                            ? '<i class="' .
                                                                (!empty($file->favWork) && $file->favWork->work_media_file_id === $file->id && $file->favWork->status === 1
                                                                    ? 'fa fa-heart'
                                                                    : 'far fa-heart') .
                                                                ' customer-heart-icon" data-id="' .
                                                                $file->id .
                                                                '"></i>'
                                                            : '' !!}
                                                        <a href="{{ asset($file->src) }}" data-gallery class="card-logo"
                                                            style="background-color: #6a6a6a;">
                                                            <img src="{{ auth()->user() && (auth()->user()->id === $work->designer_user_id || auth()->user()->id === $contest->user_id) ? asset($file->src) : asset('images/img/icons/icons.svg#folder') }}"
                                                                alt="">
                                                        </a>

                                                        @if (auth()->user()->user_type == 'Designer' && !$work->place && $work->designer_user_id == auth()->id())
                                                            <div class="prf-icon profile">
                                                                <a class="icon">
                                                                    <i class="fas fa-pencil-alt edit-file-work" data-item-id="{{ $file->id }}" data-toggle="modal" data-target="#update-image"></i>
                                                                </a>
                                                                <a class="icon">
                                                                    <i class="fas fa-times delete-work" data-item-id="{{$file->id}}"></i>
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="sliders-brief__scrollbar"></div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h2>There is not any work in round two.</h2>
                            @endif
                        </div>
                        {{--                        <div class="brief__pagging pagging"> --}}
                        {{--                            <a href="" class="pagging__arrow arrow prev disabled"> --}}
                        {{--                                <span></span> --}}
                        {{--                            </a> --}}
                        {{--                            <ul> --}}
                        {{--                                <li> --}}
                        {{--                                    <a href="" class="active"> --}}
                        {{--                                        1 --}}
                        {{--                                    </a> --}}
                        {{--                                </li> --}}
                        {{--                                <li> --}}
                        {{--                                    <a href=""> --}}
                        {{--                                        2 --}}
                        {{--                                    </a> --}}
                        {{--                                </li> --}}
                        {{--                                <li> --}}
                        {{--                                    <a href=""> --}}
                        {{--                                        3 --}}
                        {{--                                    </a> --}}
                        {{--                                </li> --}}
                        {{--                                <li> --}}
                        {{--                                    <a href=""> --}}
                        {{--                                        ... --}}
                        {{--                                    </a> --}}
                        {{--                                </li> --}}
                        {{--                                <li> --}}
                        {{--                                    <a href=""> --}}
                        {{--                                        24 --}}
                        {{--                                    </a> --}}
                        {{--                                </li> --}}
                        {{--                            </ul> --}}
                        {{--                            <a href="" class="pagging__arrow arrow next"> --}}
                        {{--                                <span></span> --}}
                        {{--                            </a> --}}
                        {{--                        </div> --}}
                    </div>
                    <div class="slider-info"></div>
                </div>

                
                <!-- Bootstrap Modal for Confirmation -->
                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
                    aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this item?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteWork">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal" id="update-image" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content custom-modal-content">
                            <div class="popup__title">
                                Upload logo
                            </div>
                            <div class="popup__head-text">
                                <p>
                                    In black and white, for
                                    <span class="popup__tippy tippy-popup">
                                        <span class="tippy-popup__text">
                                            example
                                        </span>
                                        <span class="tippy-popup__example">
                                            <img src="{{ asset("images/img/svg/logo2.svg") }}" alt="">
                                        </span>
                                    </span>
                                </p>
                            </div>
                            <form url="{{ url('/competition/update-work/1') }}" id="update-image-form" class="popup__form" method="post" enctype="multipart/form-data" data-action="{{ url('/competition/update-work/FILE_ID_PLACEHOLDER') }}">
                                @csrf
                                <div id="upload-image-div">
                                    <label for="upload" class="block-brief__download-link popup-upload">
                                        <input type="file" id="upload-work" name="work" required
                                            class="popup-upload__input" style="width: 90px">
                                        <svg class="block-brief__download-icon">
                                            <use href="{{ asset("images/img/icons/icons.svg#arrow-down") }}"></use>
                                        </svg>
                                        <span id="show-name">Upload file <br>
                                            (.png)</span>
                                    </label>
                                </div>
                                <div class="popup__buttons">
                                    <button class="popup__button button ">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    @include('customer.contest.competition.image');
    {{-- @include('customer.contest.competition.update-image'); --}}
@endsection
