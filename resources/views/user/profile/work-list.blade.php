@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-lg-12">
                <div class="wrp-contest m-0">
                    <div class="title">
                        <h1>Profile</h1>
                    </div>
                    <div class="contest-list">
                        <button class="btn-work">Send message</button>
                        <button class="btn-add">Add to contest</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="user-info">
            <div class="row">
                <div class="col-lg-3">
                    <div class="p-info">
                        <div class="wrp-img">
                            <img src="{{ asset("default-images/avatar.png") }}" alt="" class="profile-img">
                        </div>
                        <div class="p-content">
                            <span class="p-username">
                                {{$user->username}}
                                <i class="fas fa-check-circle done-y"></i>
                            </span>
                            <span class="p-name">
                                {{$user->first_name}} {{$user->last_name}}
                            </span>
                        </div>
                    </div>
                    <div class="p-icon">
                        <a class="p-md" href="{{ route('user.profile.designer-works', ['id' => $id, 'position' => 'first'])}}">
                            <span class="numeric">{{$totalFirstPosition}}</span>
                            <img src="{{ asset('images/star-1.svg') }}" width="30" alt="gold star">
                        </a>
                        <a class="p-md" href="{{ route('user.profile.designer-works', ['id' => $id, 'position' => 'second'])}}">
                            <span class="numeric">{{$totalSecondPosition}}</span>
                            <img src="{{ asset('images/star-2.svg') }}" width="30" alt="medium star">
                        </a>
                        <a class="p-md" href="{{ route('user.profile.designer-works', ['id' => $id, 'position' => 'third'])}}">
                            <span class="numeric">{{$totalThirdPosition}}</span>
                            <img src="{{ asset('images/star-3.svg') }}" width="30" alt="seb star">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="p-wrp">
                        <span class="p-subtitle">
                            About me
                        </span>
                        <p class="p-itext">
                            We took all the best from the competition area and
                            from design studios. Now you can receive hundreds
                            offers from designers from all over the world and make.
                        </p>
                    </div>
                    <ul class="info__list">
                        <li class="info__items">
                            <a href="" class="info__link">
                                <span>{{$totalFavorite}}</span>Liked
                            </a>
                        </li>
                        {{-- <li class="info__items">
                            <a href="" class="info__link">
                                <span>6674</span>View
                            </a>
                        </li> --}}
                        <li class="info__items">
                            <a href="" class="info__link">
                                <span>{{$totalParticipants}}</span>Contest
                            </a>
                        </li>
                        <li class="info__items">
                            <a href="" class="info__link">
                                <span> {{$totalWork}}</span>Works
                            </a>
                        </li>
                        
                        <li class="info__items">
                            <a href="" class="info__link">
                                <span>{{$totalWinnner ?? ($totalWinnner/$totalParticipants)*100}}%</span>Winner
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="sort">
                    <li class="sort__items">
                        <a class="sort__link">Sort by:</a>
                    </li>
                    <li class="sort__items">
                        <a href="{{ route('user.profile.designer-works', ['id' => $id, 'position' => 'all'])}}" class="sort__link {{ $position == 'all' ? 'activ' : '' }}">All</a>
                    </li>
                    <li class="sort__items">
                        <a href="{{ route('user.profile.designer-works', ['id' => $id, 'position' => 'like'])}}" class="sort__link {{ $position == 'like' ? 'activ' : '' }}">Likes</a>
                    </li>
                    <li class="sort__items">
                        <a href="{{ route('user.profile.designer-works', ['id' => $id, 'position' => 'first'])}}" class="sort__link {{ $position == 'first' ? 'activ' : '' }}">1st</a>
                    </li>
                    <li class="sort__items">
                        <a href="{{ route('user.profile.designer-works', ['id' => $id, 'position' => 'second'])}}" class="sort__link {{ $position == 'second' ? 'activ' : '' }}">2nd</a>
                    </li>
                    <li class="sort__items">
                        <a href="{{ route('user.profile.designer-works', ['id' => $id, 'position' => 'third'])}}" class="sort__link {{ $position == 'third' ? 'activ' : '' }}">3rd</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row" id="cabinet-portal">
            {{-- <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="prf-block">
                    <div class="prf-image">
                        <a href="#">
                            <img src="{{ asset('images/ex-1.png') }}" alt="" class="image">
                        </a>
                    </div>
                    <div class="prf-icon">
                        <a href="#" class="icon">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
            </div> --}}

            @forelse ($works as $work)
                @if ($work->contest)
                    @php 
                        if ($position == 'all') {
                            if (empty($work->contest->works[0])) {
                               continue;
                            }
                            $workList = $work->contest->works[0];
                        } elseif ($position == 'first') {
                            if (empty($work->contest->firstPosition[0])) {
                               continue;
                            }
                            $workList = $work->contest->firstPosition[0];
                        } elseif ($position == 'second') {
                            if (empty($work->contest->secondPosition[0])) {
                               continue;
                            }
                            $workList = $work->contest->secondPosition[0];
                        } elseif ($position == 'third') {
                            if (empty($work->contest->thirdPosition[0])) {
                               continue;
                            }
                            $workList = $work->contest->thirdPosition[0];
                        } elseif ($position == 'like') {
                            if (empty($work->contest->favorite[0])) {
                               continue;
                            }
                            $workList = $work->contest->favorite[0];
                        }
                    @endphp
                    <div class="col-lg-3 col-md-6 col-sm-12 cabinet-slider-images-view"
                        data-id={{ $workList->id }}>
                        <div class="prf-block prf-block--win">
                            <div class="prf-image">
                                <div class="count-img count-img--3">
                                    @if (!empty($workList) && !empty($workList->files))
                                        <div class="wrp-few">
                                            <div class="first-image">
                                                <a href="#">
                                                    <img src="{{ asset(@$workList->files[0]->src ?? '/images/ex-1.png') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="second-image">
                                                <a href="#">
                                                    <img src="{{ asset(@$workList->files[1]->src ?? '/images/ex-2.png') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="third-image">
                                            <a href="#">
                                                <img src="{{ asset(@$workList->files[2]->src ?? '/images/ex-3.png') }}"
                                                    alt="">
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
                                        @if ($workList->place === '1')
                                            <img src="{{ asset('images/img/svg/medal1.svg') }}"
                                                style="width: 20px; height: 20px" alt="">
                                        @elseif($workList->place === '2')
                                            <img src="{{ asset('images/img/svg/medal2.svg') }}"
                                                style="width: 20px; height: 20px" alt="">
                                        @elseif($workList->place === '3')
                                            <img src="{{ asset('images/img/svg/medal3.svg') }}"
                                                style="width: 20px; height: 20px" alt="">
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
        <div class="row mt-5">
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
        </div>

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
    </div>
@endsection
