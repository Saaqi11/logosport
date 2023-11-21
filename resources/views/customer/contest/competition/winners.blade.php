@extends('layouts.competition-main')
@section('content')
    <div class="wrapper">
        <main class="page">
            <section class="brief">
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
                                                <picture>
                                                    <img src="{{ $imagePath !== '' ? $imagePath : asset('images/img/other-img/logo.webp') }}"
                                                        alt="">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="card-view__info">
                                            <div class="card-view__avatar-ibg">
                                                <picture>
                                                    <source srcset="{{ asset('images/img/other-img/avatar.webp') }}"
                                                        type="image/webp">
                                                    <img src="{{ asset('images/img/other-img/avatar.png') }}"
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
                                                <i class="{{$work->is_reaction ? 'fa' : 'far' }} fa-heart user-work-reaction" data-id="{{$work->designer->id}}" data-workid="{{$work->id}}"></i>
                                            </div>

                                            <div class="card-view__place">
                                                <a href="{{ route('competition.get-upload.work', $work->id)}}" class="btn btn-info m-0">
                                                    {{auth()->user()->user_type == 'Designer' ?  'Upload' : 'View'}}
                                                </a>
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Work Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <input type="hidden" id="appURL" value="{{ env('APP_URL') }}">
                                <!-- Carousel -->
                                <div id="workCarousel" class="carousel slide" data-ride="carousel">
                                </div>
                            </div>
                            <div class="col-4">
                                <!-- Card -->
                                <div class="card">
                                    <div class="card-header">Designer Detail</div>
                                    <div class="card-body">
                                        <h4 class="card-title" id="designer-name"></h4>
                                        <a class="btn btn-primary" href="" id="dribble">Dribble</a>
                                        <a class="btn btn-primary" href="" id="behance">Behance</a>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header">Contest Details:</div>
                                    <div class="card-body">
                                        <h4 class="card-title">Customer Name</h4>
                                        <p id="customer-name"></p>
                                        <br>
                                        <h6>Company About:</h6>
                                        <p id="company_name"></p>
                                        <br>
                                        <h4>Company About:</h4>
                                        <p id="company_about"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
