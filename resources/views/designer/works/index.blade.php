@extends('layouts.main')
@section('content')
    <div class="wrapper">

        <!-- User detail -->
        @if (!empty($users))
            <div class="brief__container">
                <div class="brief__round">
                    <div class="brief__card-grid-layout mt-30  grid">
                        @foreach ($users as $user)
                            <div class="card-view">
                                <div class="card-view__top">
                                    <a class="card-view__image-ibg winners-slider-images-view">
                                        <picture>
                                            <img src="{{ $user->profile_image ? asset('profile_image/' . $user->profile_image) : asset('images/img/other-img/avatar.jpg') }}" alt="">
                                        </picture>
                                    </a>
                                </div>
                                <div class="card-view__info">

                                    <div class="card-view__info-author">
                                        <div class="card-view__name">
                                            {{ $user->first_name . ' ' . $user->last_name }}
                                        </div>

                                    </div>
                                    <div class="card-view__place">
                                        <span class="position-relative mr-4">
                                            <img src="{{ asset('images/img/svg/medal1.svg') }}" alt="">
                                            <i class="medal-count">{{ $user->firstPosition()->count() }}</i>
                                        </span>

                                        <span class="position-relative mr-4">
                                            <img src="{{ asset('images/img/svg/medal2.svg') }}" alt="">
                                            <i class="medal-count">{{ $user->secondPosition()->count() }}</i>
                                        </span>

                                        <span class="position-relative">
                                            <img src="{{ asset('images/img/svg/medal3.svg') }}" alt="">
                                            <i class="medal-count">{{ $user->thirdPosition()->count() }}</i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @endif

        <br>
        <br>
        <div class="row mb-p">
            <div class="col-lg-12 d-flex justify-content-center align-items-center">
                <div class="pagination">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(".payment-popup").on("click", (e) => {
            $("#payment-form").attr("action", "/customer/contest/payment/paypal-checkout/" + $(e.target).data("id"))
            $("#total-sum").html(`Total: <span> ${$(e.target).data("price")} $</span>`)
        })
    </script>
@endpush
