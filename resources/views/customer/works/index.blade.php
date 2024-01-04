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
                                                    <img src="{{ $imagePath !== '' ? $imagePath : asset($work->files[0]->src) }}"
                                                        alt="">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="card-view__info">
                                            <div class="card-view__info-author">
                                                <div class="card-view__name">
                                                    <a
                                                        href="{{ route('designer-works', ['position' => 'all', 'user' => $work->designer->username]) }}">
                                                        {{ $work->contest->company_name }}
                                                    </a>
                                                </div>
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
                <div class="brief__container">
                    {{-- <div class="brief__round">
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
                    </div> --}}

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
