@extends('layouts.main')
@section('content')
    <div class="wrapper">

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

@push("script")
    <script>
        $(".payment-popup").on("click", (e) => {
	        $("#payment-form").attr("action", "/customer/contest/payment/paypal-checkout/"+$(e.target).data("id"))
	        $("#total-sum").html(`Total: <span> ${$(e.target).data("price")} $</span>`)
        })
    </script>
@endpush