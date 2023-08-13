<div class="contest__head">
    <h1 class="title contest__title">
        My contest
    </h1>
    <a href="{{ route("customer.contest.price") }}" class="contest__add-button button button_border">
        Add new contest
    </a>
</div>
<div class="contest__navigation">
    <a class="contest__navigation-link {{ request()->route()->action['as'] === "customer.contest.view" ? "active" : "" }}" href="{{ route("customer.contest.view") }}" >
        All
    </a>
    <a class="contest__navigation-link {{ request()->route()->action['as'] === "customer.contest.active" ? "active" : "" }}" href="{{{ route("customer.contest.active") }}}">
        Active
    </a>
    <a class="contest__navigation-link {{ request()->route()->action['as'] === "customer.contest.finished" ? "active" : "" }}" href="{{{ route("customer.contest.finished") }}}">
        Finished
    </a>
    <a class="contest__navigation-link {{ request()->route()->action['as'] === "customer.contest.cancelled" ? "active" : "" }}" href="{{{ route("customer.contest.cancelled") }}}">
        Cancelled
    </a>
</div>