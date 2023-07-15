@extends("layouts.competition-main")
@section("content")
<div class="wrapper">
    <main class="page">
        <section class="brief">
            <div class="brief__container">
                @include("customer.contest.competition.partials")
                <div class="brief__round">
                    <div class="brief__filter filter">
                        <div class="filter__items">
                            <div class="filter__item">
                                <a data-id="{{ $contest->id }}" id="all-works" class="filter__link active">
                                    All works
                                </a>
                            </div>
                            <div class="filter__item">
                                <a data-id="{{ $contest->id }}" id="declined-works" class="filter__link">
                                    Declined works
                                </a>
                            </div>
                        </div>
                        <div class="filter__select">
                            <label>Sort by:</label>
                            <label for="ascending">Ascending</label>
                            <input type="radio" id="ascending" class="sort-by" data-id="{{ $contest->id }}" name="sort-by" value="asc">
                            <label for="descending">Descending</label>
                            <input type="radio" id="descending" class="sort-by" data-id="{{ $contest->id }}" name="sort-by" value="desc">
                        </div>
                    </div>
                    <div class="brief__card-grid-layout grid" id="works-section">
                        @if(!empty($works))
                            @foreach($works as $work)
                                <div class="card-view {{ $work->status === 2 ? "hidden" : "" }}">
                                    <div class="card-view__top">
                                        <div class="card-view__image-ibg">
                                            <a href="" class="card-view__to-folder">
                                                <svg class="card-view__icon">
                                                    <use href="{{ asset("images/img/icons/icons.svg#folder") }}"></use>
                                                </svg>
                                                @if($work->status === 0)
                                                    <span>Pending</span>
                                                @elseif($work->status === 1)
                                                    <span>Selected for Round 2</span>
                                                @elseif($work->status === 2)
                                                    <span>Rejected</span>
                                                @endif
                                            </a>
                                            <picture>
                                                <source srcset="{{ asset("images/img/other-img/logo.webp") }}" type="image/webp">
                                                <img src="{{ asset("images/img/other-img/logo.jpg") }}" alt="">
                                            </picture>
                                        </div>
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
                                                    <span>{{ $work->reactions ? $work->reactions : 0 }}</span>
                                                </div>
                                                <div class="card-view__item">
                                                    <span> {{ $work->totalWorks->count() }} works </span>
                                                </div>
                                            </div>
                                        </div>
                                        @if($contest->user_id === auth()->id())
                                            <div class="card-view__item" data-id="{{ $work->id }}" style="cursor: pointer; display: flex; position: absolute; left: 250px; font-size: 28px; color: #e6e6e6;">
                                                <i class="far fa-check-circle {{ $work->status === 1 ? "activ" : "" }}"></i>
                                                <i class="far fa-times-circle {{ $work->status === 2 ? "active" : "" }}"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3>There is not any work available at the moment.</h3>
                        @endif
                    </div>
{{--                    <div class="brief__pagging pagging">--}}
{{--                        <a href="" class="pagging__arrow arrow prev disabled">--}}
{{--                            <span></span>--}}
{{--                        </a>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="" class="active">--}}
{{--                                    1--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="">--}}
{{--                                    2--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="">--}}
{{--                                    3--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="">--}}
{{--                                    ...--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="">--}}
{{--                                    24--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <a href="" class="pagging__arrow arrow next">--}}
{{--                            <span></span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </section>
    </main>
</div>
@include("customer.contest.competition.image");
@endsection

@push("script")
    <script>
        var user_id = '{{ auth()->user()->id }}'
        var public_path = '{{ asset("/") }}';
    </script>
@endpush