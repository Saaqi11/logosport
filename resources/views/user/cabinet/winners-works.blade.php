@extends("layouts.main")
@section("content")
    <div class="row">
        <div class="col col-lg-12">
            <div class="title">
                <h1>Personal cabinet</h1>
            </div>
        </div>
    </div>
    <div class="row mb prf-hack ">
        <div class="col-lg-2 col-md-4 col-sm-12">
            <div class="wrp-works">
                <span class="works">My works</span>
                <span id="cabinet-works-count">{{ $works->count() }} works</span>
            </div>
        </div>
        @include("user.partials.personal-cabinet-bar")
    </div>
    <div class="row" id="cabinet-portal">
        @forelse ($works as $work)
            @if ($work->contest)
                @if (empty($work->contest->winnerWork))
                    @php
                        continue;
                    @endphp
                @endif
                <div class="col-lg-3 col-md-6 col-sm-12 cabinet-slider-images-view" data-id={{ $work->contest->winnerWork->id }}>
                    <div class="prf-block prf-block--win">
                        <div class="prf-image">
                            <div class="count-img count-img--3">
                                @if (!empty($work->contest->winnerWork) && !empty($work->contest->winnerWork->files))
                                    <div class="wrp-few">
                                        <div class="first-image">
                                            <a href="#">
                                                <img src="{{ asset(@$work->contest->winnerWork->files[0]->src ?? "/images/ex-1.png") }}"  alt="">
                                            </a>
                                        </div>
                                        <div class="second-image">
                                            <a href="#">
                                                <img src="{{ asset(@$work->contest->winnerWork->files[1]->src ?? "/images/ex-2.png" ) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="third-image">
                                        <a href="#">
                                            <img src="{{ asset(@$work->contest->winnerWork->files[2]->src ?? "/images/ex-3.png")  }}" alt="">
                                        </a>
                                    </div>
                                @else
                                    You didn't submit any work.
                                @endif
                            </div>
                        </div>
                        <div class="prf-title">
                            <div class="row">
                                <div class="col-10">
                                    {{ $work->contest->company_name }}
                                </div>
                                <div class="col-2">
                                    @if($work->contest->winnerWork->place === "1")
                                        <img src="{{ asset("images/img/svg/medal1.svg") }}" style="width: 20px; height: 20px" alt="">
                                    @elseif($work->contest->winnerWork->place === "2")
                                        <img src="{{ asset("images/img/svg/medal2.svg") }}" style="width: 20px; height: 20px" alt="">
                                    @elseif($work->contest->winnerWork->place === "3")
                                        <img src="{{ asset("images/img/svg/medal3.svg") }}" style="width: 20px; height: 20px" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-12">
                <p class="justify-content-center">There is not any work available</p>
            </div>
        @endforelse
    </div>
    {{-- <div class="row mb-p">
        <div class="col-lg-12 d-flex justify-content-center align-items-center">
            <div class="page">
                <ul class="page__list">
                    <li class="page__items"><a href="#" class="page__link">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <li class="page__items"><a href="#" class="page__link activ">1</a></li>
                    <li class="page__items"><a href="#" class="page__link">2</a></li>
                    <li class="page__items"><a href="#" class="page__link">3</a></li>
                    <li class="page__items"><a href="#" class="page__link">...</a></li>
                    <li class="page__items"><a href="#" class="page__link">24</a></li>
                    <li class="page__items"><a href="#" class="page__link">
                            <i class="fas fa-chevron-right"></i>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="hidden" id="appURL" value="{{ env("APP_URL") }}">
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
                                        <h4 class="card-title" >Customer Name</h4>
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