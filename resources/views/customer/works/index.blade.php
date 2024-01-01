@extends('layouts.main')
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
                    <div class="brief__round">
                        <br>
                        <div class="brief__sliders sliders-brief">
                            @if (count($works) > 0)
                                @foreach ($works as $work)
                                    <div class="sliders-brief__item">

                                        <div class="sliders-brief__slider swiper">
                                            <div class="sliders-brief__wrapper swiper-wrapper">
                                                @foreach ($work->files as $file)
                                                    <div class="sliders-brief__slide swiper-slide"
                                                        style="position: relative; display: inline-block; width: 247.5px; margin-right: 10px;"
                                                        data-item-id="{{ $file->id }}">
                                                        <a href="{{ asset($file->src) }}" data-gallery class="card-logo"
                                                            style="background-color: #6a6a6a;">
                                                            <img src="{{ asset($file->src) }}" alt="">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="sliders-brief__scrollbar"></div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h2>There is not any work. </h2>
                            @endif
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="row mb-p">
                        <div class="col-lg-12 d-flex justify-content-center align-items-center">
                            <div class="pagination">
                                {{ $works->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    <div class="slider-info"></div>
                </div>
            </section>
        </main>
    </div>
@endsection
