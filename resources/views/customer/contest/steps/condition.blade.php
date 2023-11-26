@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="title">
                <h1>LAUNCH THE CONTEST</h1>
            </div>
            <div class="wrp-step">
                <div class="step activ"><span class="step-text">1. Price</span></div>
                <div class="step activ"><span class="step-text">2. Type</span></div>
                <div class="step activ"><span class="step-text">3. Color</span></div>
                <div class="step activ"><span class="step-text">4. Style</span></div>
                <div class="step activ"><span class="step-text">5. Brief</span></div>
                <div class="step activ"><span class="step-text">6. Condition</span></div>
            </div>
            <div class="wrp-mob-step">
                <button class="nav left">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="mob-step"><span>1/6 Price</span></div>
                <div class="mob-step"><span>2/6 Type</span></div>
                <div class="mob-step"><span>3/6 Color</span></div>
                <div class="mob-step"><span>4/6 Style</span></div>
                <div class="mob-step"><span>5/6 Brief</span></div>
                <div class="mob-step activ"><span>6/6 Condition</span></div>
                <button class="nav right">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <div class="col-12">
            <span class="cnst-subtitle">
                Condition
            </span>
        </div>
    </div>
    <form action="{{ route('customer.contest.condition.save', $id) }}" id="condition-form" class="row mb" method="post">
        @csrf
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="wrp-brief">
                <span class="title-brief">
                    How long will the contest take place (Days)
                </span>
                <div class="select-wrapper">
                    <input type="number" name="duration" class="form-control" min="7" max="21">
                    <span style="font-size: 10px"> The designer will have 3 days to provide logos and corporate identity.
                    </span>
                </div>
            </div>
        </div>
        <input type="hidden" id="selected-designers-json" name="selected_designers_json">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="wrp-brief">
                <span class="title-brief">
                    When to start the project
                </span>
                <div class="select-wrapper">
                    <i class="fas fa-calendar-alt"></i>
                    <input type="date" name="start_date" class="input-brief" required value="2017-06-01">
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <span class="cnst-subtitle">
                Who takes part in the contest
            </span>
        </div>
    </div>
    <form class="row mb">
        @csrf
        <div class="col-6 col-lg-2 col-md-6 col-sm-6">
            <div class="wrp-brief">
                <span class="title-brief">
                    Works
                </span>
                <div class="select-wrapper">
                    <i class="fas fa-angle-down"></i>
                    <select name="works" class="select-brief" id="works">
                        <option selected disabled>Select any option</option>
                        <option value="1">1+</option>
                        <option value="10">10+</option>
                        <option value="50">50+</option>
                        <option value="100">100+</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6 col-sm-6">
            <div class="wrp-brief">
                <span class="title-brief">
                    Winner
                </span>
                <div class="select-wrapper">
                    <i class="fas fa-angle-down"></i>
                    <select name="winners" class="select-brief" id="winners">
                        <option selected disabled>Select any option</option>
                        <option value="1">1+</option>
                        <option value="10">10+</option>
                        <option value="50">50+</option>
                        <option value="100">100+</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6 col-sm-6">
            <div class="wrp-brief">
                <span class="title-brief">
                    Liked
                </span>
                <div class="select-wrapper">
                    <i class="fas fa-angle-down"></i>
                    <select name="likes" class="select-brief" id="likes">
                        <option selected disabled>Select any option</option>
                        <option value="1">1+</option>
                        <option value="10">10+</option>
                        <option value="50">50+</option>
                        <option value="100">100+</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="wrp-brief">
                <span class="title-brief">
                    Search
                </span>
                <div class="select-wrapper">
                    <i class="fas fa-search"></i>
                    <input type="text" name="name_search" class="input-brief input-brief--search"
                        placeholder="Search designer by name" id="designer_name">
                </div>
            </div>
        </div>
    </form>

    <!-- User detail -->
    @if (!empty($users))
        @foreach ($users as $user)
            <div class="row mb-p designer-block">
                <div class="col-8 d-flex align-items-center justify-content-start">
                    <img src="{{ asset('default-images/avatar.png') }}" alt="" class="profile-img">
                    <div class="profile-content">
                        <span class="profile-name" data-name="{{ $user->first_name . ' ' . $user->last_name }}">
                            <a href="{{ route('designer-works', ['position' => 'all', 'user' => $user->username]) }}">
                                {{ $user->first_name . ' ' . $user->last_name }}
                            </a>
                        </span>
                        <div class="wrp-info">
                            <span class="profile-folowers"
                                data-reactions="{{ count($user->reactions) > 0 ? $user->reactions->sum('count') : 0 }}">
                                {{ count($user->reactions) > 0 ? $user->reactions->sum('count') : 0 }}
                            </span>
                            <span class="profile-works" data-works="{{ count($user->works) }}">
                                {{ count($user->works) }} works
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end">
                    <i class="far fa-check-circle" data-id="{{ $user->id }}"></i>
                </div>
            </div>


            <!-- Designer Works -->
            @if (count($user->works) > 0)
                <div class="row">
                    @foreach ($user->works as $works)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            @foreach ($works->files as $file)
                                {{-- <div class="mb-4"> --}}
                                    <a href="{{ asset($file->src) }}" data-gallery class="card-logo"
                                        style="background-color: #6a6a6a;">
                                    <img src="{{ asset($file->src) }}" style="width: 100%; height: 100%; object-fit: cover;" alt="">
                                    </a>
                                {{-- </div> --}}
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row designer-contest-listing">
                    <h5>This designer didn't work on any contest before.</h5>
                </div>
            @endif
        @endforeach
    @endif

    <!-- Pagination -->
    {{--    <div class="row mb-p"> --}}
    {{--        <div class="col-lg-12 d-flex justify-content-center align-items-center"> --}}
    {{--            <div class="page"> --}}
    {{--                <ul class="page__list"> --}}
    {{--                    <li class="page__items"><a href="#" class="page__link"> --}}
    {{--                            <i class="fas fa-chevron-left"></i> --}}
    {{--                        </a> --}}
    {{--                    </li> --}}
    {{--                    <li class="page__items"><a href="#" class="page__link activ">1</a></li> --}}
    {{--                    <li class="page__items"><a href="#" class="page__link">2</a></li> --}}
    {{--                    <li class="page__items"><a href="#" class="page__link">3</a></li> --}}
    {{--                    <li class="page__items"><a href="#" class="page__link">...</a></li> --}}
    {{--                    <li class="page__items"><a href="#" class="page__link">24</a></li> --}}
    {{--                    <li class="page__items"><a href="#" class="page__link"> --}}
    {{--                            <i class="fas fa-chevron-right"></i> --}}
    {{--                        </a> --}}

    {{--                    </li> --}}
    {{--                </ul> --}}
    {{--            </div> --}}
    {{--            <span class="selected">Selected 12 <span>designers</span></span> --}}
    {{--        </div> --}}
    {{--    </div> --}}

    <!-- Selected Designers -->
    <div class="row">
        <div class="col-12">
            <span class="cnst-subtitle">
                Selected designers
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-center" id="selected-designer">
            <h4>There is no designer selected yet. </h4>
        </div>
    </div>
    <div class="row ">
        <div class="col-12 d-flex justify-content-end align-items-center">
            <button class="brf-file" id="condition-save-skip">Skip payment</button>
            <button class="cnstr-next" disabled title="This feature is coming soon">Payment</button>
        </div>
    </div>
@endsection
