@extends('layouts.main')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">
@endpush
@section('content')
    <div class="">
        <div class="row">
            <div class="col-6">
                <div class="faq">
                    <h1>
                        FAQ
                    </h1>
                </div>
                <div class="introduction">
                    <span>
                        1. Introduction
                    </span>
                    <i class="fas fa-plus"></i>
                </div>
                <div class="startup">
                    <span>
                        As with so many successful <br>
                        startups
                    </span>
                    <i class="fas fa-plus"></i>
                </div>
            </div>
            <div class="col-6 search">
                <form>
                    <button type="submit"><i class="fas fa-search"></i></button>
                    <input type="text" placeholder="">
                </form>
                <div class="introduction-right">
                    <span>
                        1. Introduction
                    </span>
                    <i class="fas fa-minus"></i>
                    <p>
                        As with so many successful startups, DesignCrowd was started in a <br>
                        garage by a 20-something who saw a problem he thought he <br>
                        could fix. Alec Lynch sought to improve the design process by <br>
                        creating competition among a global network of freelance <br>
                        developers and designers.
                    </p>
                </div>
            </div>


        </div>
    </div>
@endsection
