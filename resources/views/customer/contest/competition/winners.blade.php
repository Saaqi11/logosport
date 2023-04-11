@extends("layouts.competition-main")
@section("content")
    <div class="wrapper">
        <main class="page">
            <section class="brief">
                <div class="brief__container">
                    @include("customer.contest.competition.partials")
                    <div class="brief__round">
                        <div class="brief__card-grid-layout mt-30  grid">
                            @if(!empty($works))
                                @foreach($works as $work)
                                    <div class="card-view">
                                        <div class="card-view__top">
                                            <a data-gallery href="{{ asset("images/img/other-img/logo.jpg") }}" class="card-view__image-ibg">
                                                <picture>
                                                    <source srcset="{{ asset("images/img/other-img/logo.webp") }}" type="image/webp">
                                                    <img src="{{ asset("images/img/other-img/logo.jpg") }}" alt="">
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="card-view__info">
                                            <div class="card-view__avatar-ibg">
                                                <picture>
                                                    <source srcset="{{ asset("images/img/other-img/avatar.webp") }}" type="image/webp">
                                                    <img src="{{ asset("images/img/other-img/avatar.png") }}" alt="">
                                                </picture>
                                            </div>
                                            <div class="card-view__info-author">
                                                <div class="card-view__name">
                                                    {{ $work->designer->first_name." ".$work->designer->last_name }}
                                                </div>
                                                <div class="card-view__items">
                                                    <div class="card-view__item">
                                                        <i class="fa fa-heart"></i>
                                                        <span>{{ $work->reactions->sum("count") }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-view__place">
                                                @if($work->place === "1")
                                                    <img src="{{ asset("images/img/svg/medal1.svg") }}" alt="">
                                                @elseif($work->place === "2")
                                                    <img src="{{ asset("images/img/svg/medal2.svg") }}" alt="">
                                                @elseif($work->place === "3")
                                                    <img src="{{ asset("images/img/svg/medal3.svg") }}" alt="">
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
@endsection