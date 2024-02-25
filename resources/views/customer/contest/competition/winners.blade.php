@extends('layouts.competition-main')
@section('content')
    <style>
        input[type="radio"] {
            display: block !important; -webkit-appearance: radio
        }
        .form-check-label {
            padding-top: 3px
        }
    </style>
    <div class="wrapper">
        <main class="page">
            <section class="container">
                <div class="brief__container">
                    @include('customer.contest.competition.partials')
                    <div class="brief__round">
                        <div class="brief__card-grid-layout mt-30  grid">
                            @if (!empty($works))
                                @foreach ($works as $work)
                                    @php
                                        $imagePath = '';
                                        foreach ($work->files as $file) {
                                            if (!empty($file->favWork) && $file->favWork->work_media_file_id === $file->id) {
                                                $imagePath = asset($file->src);
                                            }
                                        }
                                    @endphp
                                    <div class="card-view">
                                        <div class="card-view__top">
                                            <a class="card-view__image-ibg winners-slider-images-view"
                                                data-id="{{ $work->id }}">
                                                @if (auth()->user()->id === $work->designer_user_id || auth()->user()->id === $contest->user_id || $contest->status == 4)
                                                    @if ($imagePath === '')
                                                        @php
                                                            $imagePath = asset('images/img/other-img/logo.webp');
                                                        @endphp
                                                    @endif
                                                @else
                                                    @php
                                                        $imagePath = asset('images/img/other-img/hide_image.jpg');
                                                    @endphp
                                                @endif
                                                <picture>
                                                    <img src="{{ $imagePath }}" alt="">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="card-view__info">
                                            <div class="card-view__avatar-ibg">
                                                <picture>
                                                    <source
                                                        srcset="{{ $work->designer->profile_image ? asset('profile_image/' . $work->designer->profile_image) : asset('images/img/other-img/avatar.jpg') }}"
                                                        type="image/webp">
                                                    <img src="{{ $work->designer->profile_image ? asset('profile_image/' . $work->designer->profile_image) : asset('images/img/other-img/avatar.jpg') }}"
                                                        alt="">
                                                </picture>
                                            </div>
                                            <div class="card-view__info-author">
                                                <div class="card-view__name">
                                                    {{ $work->designer->first_name . ' ' . $work->designer->last_name }}
                                                </div>
                                                <div class="card-view__items">
                                                    <div class="card-view__item reaction-count">
                                                        <i class="fa fa-heart"></i>
                                                        <span>{{ $work->reaction_count ?? 0 }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-view__place">
                                                @if ($work->place === '1')
                                                    <img src="{{ asset('images/img/svg/medal1.svg') }}" alt="">
                                                @elseif($work->place === '2')
                                                    <img src="{{ asset('images/img/svg/medal2.svg') }}" alt="">
                                                @elseif($work->place === '3')
                                                    <img src="{{ asset('images/img/svg/medal3.svg') }}" alt="">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-view__info p-3 border-top">

                                            <div class="icon border rounded-circle p-2">
                                                <i class="{{ $work->is_reaction ? 'fa' : 'far' }} fa-heart user-work-reaction"
                                                    data-id="{{ auth()->user()->id }}"
                                                    data-workid="{{ $work->id }}"></i>
                                            </div>

                                            <div class="card-view__place">
                                                <i class="fa fa-exclamation-circle exclamation-circle"
                                                    style="color: red; font-size: 18px; cursor: pointer"
                                                    data-id="{{ auth()->user()->id }}"
                                                    data-workid="{{ $work->id }}"></i>
                                                @if ($work->place == 1 && ($work->designer_user_id == auth()->id() || $contest->user_id === auth()->id()))
                                                    <a href="{{ route('competition.get-upload.work', $work->id) }}"
                                                        class="btn btn-info m-0">
                                                        {{ auth()->user()->user_type == 'Designer' ? 'Upload' : 'View' }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h2>There is not winners available right now.</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <div class="slider-info"></div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('report.content')}}" method="POST" id="reportForm">
                        @csrf
                        <input type="hidden" name="report_user_id" id="report-userId">
                        <input type="hidden" name="report_work_id" id="report-workId">
                        <input type="hidden" name="">
                        <div class="form-group">
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="option1"
                                    value="It's spam">
                                <label class="form-check-label" for="option1">
                                    It's spam
                                </label>
                            </div>
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="option2"
                                    value="Nudity or sexual activity">
                                <label class="form-check-label" for="option2">
                                    Nudity or sexual activity
                                </label>
                            </div>
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="option3"
                                    value="Hate speech or symbols">
                                <label class="form-check-label" for="option1">
                                    Hate speech or symbols
                                </label>
                            </div>
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="option4"
                                    value="Violence or Dangerous content">
                                <label class="form-check-label" for="option2">
                                    Violence or Dangerous content
                                </label>
                            </div>
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="option5"
                                    value="Bullying or harassment">
                                <label class="form-check-label" for="option1">
                                    Bullying or harassment
                                </label>
                            </div>
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="option6"
                                    value="False Information">
                                <label class="form-check-label" for="option2">
                                    False Information
                                </label>
                            </div>
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="option7"
                                    value="Scam or fraud">
                                <label class="form-check-label" for="option1">
                                    Scam or fraud
                                </label>
                            </div>
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="option8"
                                    value="Illegal or regulated goods">
                                <label class="form-check-label" for="option2">
                                    Illegal or regulated goods
                                </label>
                            </div>
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="option9"
                                    value="Intellectual property violation">
                                <label class="form-check-label" for="option1">
                                    Intellectual property violation
                                </label>
                            </div>
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="option10"
                                    value="Eating Disorders">
                                <label class="form-check-label" for="option2">
                                    Eating Disorders
                                </label>
                            </div>
                            
                            <div class="form-check p-2 pl-4">
                                <input class="form-check-input" type="radio" name="options" id="other"
                                    value="other">
                                <label class="form-check-label" for="option3">
                                    Other
                                </label>
                            </div>
                        </div>
                        <div id="inputField" style="display: none;">
                            <input type="text" class="form-control" name="custom_option" id="customOption" placeholder="Enter custom option">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="reportSubmitBtn">Submit</button>
                </div>
            </div>
        </div>
    </div>

@endsection
