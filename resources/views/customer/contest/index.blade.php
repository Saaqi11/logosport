@extends("layouts.main")
@section("content")
    <div class="wrapper">
        <div class="contest__container">
            <div class="contest__head">
                <h1 class="title contest__title">
                    My contest
                </h1>
                <a href="{{ route("customer.contest.price") }}" class="contest__add-button button button_border">
                    Add new contest
                </a>
            </div>
            <div class="contest__navigation">
                <a class="contest__navigation-link active" href="{{ route("customer.contest.view") }}" >
                    All
                </a>
                <a class="contest__navigation-link " href="{{{ route("customer.contest.finished") }}}">
                    Finished
                </a>
            </div>
            <div data-spollers class=" contest__spollers contest-spollers">
                @if(count($contests) > 0)
                    @foreach($contests as $contest)
                        <div data-spollers-item class="contest-spollers__item">
                            <div class="contest-spollers__head spollers-head">
                                    <span class="spollers-head__button">
                                    </span>
                                <div class="spollers-head__left">
                                    <h4 class="spollers-head__title">
                                        {{ $contest->company_name }}
                                    </h4>
                                    <div class="spollers-head__items">
                                            <span>
                                                @php
                                                    if ($contest->status === 0) {
                                                        echo "Not started yet";
                                                    } else if ($contest->status === 1) {
                                                        echo "Round 1";
                                                    } else if ($contest->status === 2) {
                                                        echo "Winners Finalised";
                                                    }
                                                @endphp
                                            </span>
                                        <span>{{ $contest->total_works }} design concepts</span>
                                        <span>{{ $contest->selected_works }} selected</span>
                                    </div>
                                </div>
                                <div class="spollers-head__right">
                                    <div class="spollers-head__links">
                                        @php
                                            if ($contest->status === 3) {
                                                echo "Contest Canceled";
                                            } else {
                                        @endphp
                                            <a data-popup='#popup3' data-id="{{ $contest->id }}" class="spollers-head__link promote-popup">
                                                Promote to top
                                            </a>
                                        @php
                                            if ($contest->is_paid) {
                                                echo "<span>Payment Verified</span>";
                                            } else {
                                        @endphp
                                            <a data-popup='#popup-transaction' data-id="{{ $contest->id }}" data-price="{{ $contest->contest_price }}" class="spollers-head__link payment-popup">
                                                Transaction
                                            </a>
                                        @php } @endphp
                                            <a data-popup="#popup-cancel" data-id="{{ $contest->id }}" class="spollers-head__link cancel-popup">
                                                Cancel project
                                            </a>
                                        @php } @endphp
                                        @php
                                            if ($contest->status !== 3 && !$contest->is_paid && $contest->score) {
                                        @endphp
                                            <a href="{{route("customer.contest.type", ['id' => $contest->id."is-edit=1"])}}" data-id="{{ $contest->id }}" class="spollers-head__link cancel-popup">
                                                Edit
                                            </a>
                                        @php
                                            }
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    You have not created any contest yet.
                @endif
            </div>
        </div>
        <div id="popup3" aria-hidden="true" class="popup popup-contest">
            <div class="popup__wrapper">
                <div class="popup__content">
                    <form id="promote-form" action="" method="post" class="popup-contest__form">
                        <button data-close type="button" class="popup__close">
                            <svg class="popup__close-icon">
                                <use href="{{ asset("assets/svg/icons.svg#times") }}"></use>
                            </svg>
                        </button>
                        <div class="popup__title">
                            Promote to the top
                        </div>
                        <div class="popup__price">
                            69$
                            <span>/ 3 days</span>
                        </div>
                        @csrf
                        <div class="popup-contest__button-wrap center">
                            <a type="submit" id="promote-button" class="button popup-contest__button button_border">
                                Payment
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="popup-cancel" aria-hidden="true" class="popup popup-delete">
            <div class="popup__wrapper">
                <div class="popup__content">
                    <button data-close type="button" class="popup__close">
                        <svg class="popup__close-icon">
                            <use href="{{ asset("assets/svg/icons.svg#times") }}"></use>
                        </svg>
                    </button>
                    <div class="popup__title">
                        Cancel
                    </div>
                    <div class="popup__head-text">
                        <p>Are you sure you want to cancel project?</p>
                    </div>
                    <div class="popup__buttons ">
                        <a class="popup__button button button_border">
                            Cancel
                        </a>
                        <a href="" id="cancel-button" class="popup__button button ">
                            OK
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="popup-transaction" aria-hidden="true" class="popup popup-contest">
            <div class="popup__wrapper">
                <div class="popup__content">
                    <form id="payment-form"  action="#" method="post" class="popup-contest__form">
                        <button data-close type="button" class="popup__close">
                            <svg class="popup__close-icon">
                                <use href="{{ asset("assets/svg/icons.svg#times") }}"></use>
                            </svg>
                        </button>
                        <div class="popup__title">
                            Balance of contest
                        </div>

                        @csrf
                        <div class="popup__total-sum" id="total-sum">

                        </div>
                        <br>
                        <div class="popup__buttons ">
                            <button class="popup__button button button_border">
                                Cancel
                            </button>
                            <button type="submit" class="popup__button button ">
                                OK
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("script")
    <script>
        $(".cancel-popup").on("click", (e) => {
	        $("#cancel-button").attr("href", "/customer/contest/cancel/"+$(e.target).data("id"))
        })
        $(".payment-popup").on("click", (e) => {
	        $("#payment-form").attr("action", "/customer/contest/payment/paypal-checkout/"+$(e.target).data("id"))
	        $("#total-sum").html(`Total: <span> ${$(e.target).data("price")} $</span>`)
        })
        $(".promote-popup").on("click", (e) => {
	        $("#promote-form").attr("action", "/customer/contest/promote/"+$(e.target).data("id"))
        })
    </script>
@endpush