@extends('layouts.main')
@section('content')
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
        @include('user.partials.personal-cabinet-bar')
    </div>
    <div class="row" id="cabinet-portal">
        @forelse ($works as $work)
            @if ($work->contest)
                @if (empty($work->contest->winnerWork))
                    @php
                        continue;
                    @endphp
                @endif
                <div class="col-lg-3 col-md-6 col-sm-12 cabinet-slider-images-view"
                    data-id={{ $work->contest->winnerWork->id ?? '' }}>
                    <div class="prf-block prf-block--win">
                        <div class="prf-image">
                            <div class="count-img count-img--3">
                                @if (!empty($work->contest->winnerWork) && !empty($work->contest->winnerWork->files))
                                    {{-- <div class="wrp-few"> --}}
                                    {{-- <div class="first-image"> --}}
                                    <a href="#">
                                        <img class="image-cover"
                                            src="{{ asset(@$work->contest->winnerWork->files[0]->src ?? '/images/ex-1.png') }}"
                                            alt="">
                                    </a>
                                    {{-- </div> --}}
                                    {{-- <div class="second-image">
                                            <a href="#">
                                                <img class="image-cover" src="{{ asset(@$work->contest->winnerWork->files[1]->src ?? '/images/ex-2.png') }}"
                                                    alt="">
                                            </a>
                                        </div> --}}
                                    {{-- </div> --}}
                                    {{-- <div class="third-image">
                                        <a href="#">
                                            <img class="image-cover" src="{{ asset(@$work->contest->winnerWork->files[2]->src ?? '/images/ex-3.png') }}"
                                                alt="">
                                        </a>
                                    </div> --}}
                                @else
                                    You didn't submit any work.
                                @endif
                            </div>
                        </div>
                        <div class="prf-title">
                            <div class="row">
                                <div class="col-10">
                                    <a href="{{ route('competition.show', [$work->contest->id]) }}">
                                        {{ $work->contest->company_name }}
                                    </a>
                                </div>
                                <div class="col-2">
                                    @if ($work->contest->winnerWork->place === '1')
                                        <img src="{{ asset('images/img/svg/medal1.svg') }}"
                                            style="width: 20px; height: 20px" alt="">
                                    @elseif($work->contest->winnerWork->place === '2')
                                        <img src="{{ asset('images/img/svg/medal2.svg') }}"
                                            style="width: 20px; height: 20px" alt="">
                                    @elseif($work->contest->winnerWork->place === '3')
                                        <img src="{{ asset('images/img/svg/medal3.svg') }}"
                                            style="width: 20px; height: 20px" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="prf-title">
                            <div class="row">
                                <div class="col-6">
                                    <div class="icon border rounded-circle p-2" style="border: 1px solid #fff !important">
                                        {{-- <i class="{{$work->contest->designerWork->is_reaction ? 'fa' : 'far' }} fa-heart user-work-reaction" data-id="{{$work->contest->designerWork->designer->id}}" data-workid="{{$work->contest->designerWork->id}}"></i> --}}
                                    </div>

                                </div>
                                <div class="col-6 text-right">
                                    @if (
                                        $work->contest->winnerWork->place == 1 &&
                                            ($work->contest->winnerWork->designer_user_id == auth()->id() || $contest->user_id === auth()->id()))
                                        <a href="{{ route('competition.get-upload.work', $work->id) }}"
                                            class="btn btn-info m-0 uploadfiles">
                                            Upload
                                        </a>
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

    <div class="slider-info"></div>



@endsection
@push('script')
    <script>
        
    </script>
@endpush
