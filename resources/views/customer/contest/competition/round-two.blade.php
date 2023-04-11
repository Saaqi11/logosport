@extends("layouts.competition-main")
@section("content")
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
</style>
    <div class="wrapper">
        <main class="page">
            <section class="brief">
                <div class="brief__container">
                    @include("customer.contest.competition.partials")
                    <div class="brief__round">
                        <br>
                        <div class="brief__sliders sliders-brief">
                            @if(count($works) > 0)
                                @foreach($works as $work)
                                    <div class="sliders-brief__item">
                                        <div class=" avatar-info">
                                            <div class="avatar-info__image-ibg">
                                                <picture>
                                                    <source srcset="{{ asset("images/img/other-img/avatar.webp") }}" type="image/webp">
                                                    <img src="{{ asset("images/img/other-img/avatar.png") }}" alt="">
                                                </picture>
                                            </div>
                                            <div class="avatar-info__content">
                                                <div class="avatar-info__name">
                                                    {{ $work->designer->first_name." ".$work->designer->last_name }}
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    @if($contest->user_id === auth()->user()->id)
                                                        <button class="choose-position {{ $work->place === "1" ? "active-position" : "" }}" data-contest_id="{{ $work->contest_id }}" data-work_id="{{ $work->id }}" data-position="1">1</button>
                                                        <button class="choose-position {{ $work->place === "2" ? "active-position" : "" }}" data-contest_id="{{ $work->contest_id }}" data-work_id="{{ $work->id }}" data-position="2">2</button>
                                                        <button class="choose-position {{ $work->place === "3" ? "active-position" : "" }}" data-contest_id="{{ $work->contest_id }}" data-work_id="{{ $work->id }}" data-position="3">3</button>
                                                    @endif
                                                </div>
                                                <div class="avatar-info__items">
                                                    <div class="avatar-info__item">
                                                        <span>{{ $work->reactions ? $work->reactions : 0 }}</span>
                                                        <i class="fa fa-heart"></i>
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
                                                @foreach($work->files as $file)
                                                    <div class="sliders-brief__slide swiper-slide">
                                                        <a href="{{ asset($file->src) }}" data-gallery class="card-logo">
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
                                <h2>There is not any work in round two.</h2>
                            @endif
                        </div>
{{--                        <div class="brief__pagging pagging">--}}
{{--                            <a href="" class="pagging__arrow arrow prev disabled">--}}
{{--                                <span></span>--}}
{{--                            </a>--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <a href="" class="active">--}}
{{--                                        1--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        2--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        3--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        ...--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="">--}}
{{--                                        24--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <a href="" class="pagging__arrow arrow next">--}}
{{--                                <span></span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection