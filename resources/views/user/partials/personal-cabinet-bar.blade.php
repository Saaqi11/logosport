@php
    $currentUrl = request()->url();
    $urlSegments = explode('/', $currentUrl);
    $lastSegment = end($urlSegments);
@endphp
<div class="col-lg-4 offset-lg-6 col-md-6 offset-md-2 col-sm-12">
    <nav class="prf">
        <ul class="prf__list">
            <li class="prf__items">
                <a href="{{ route("user.cabinet.my-all-works") }}" class="prf__link  {{ $lastSegment === "my-all-works" ? "activ" : "" }}" >all</a>
            </li>
            <li class="prf__items">
                <a href="{{ route("user.cabinet.my-active-works") }}" class="prf__link  {{ $lastSegment === "my-active-works" ? "activ" : "" }}">active</a>
            </li>
            <li class="prf__items">
                <a href="{{ route("user.cabinet.my-winner-works") }}" class="prf__link  {{ $lastSegment === "my-winner-works" ? "activ" : "" }}">winners
                </a>
                {{-- <div class="number">
                    <span>1</span>
                </div> --}}
            </li>
            <li class="prf__items">
                <a href="{{ route("user.cabinet.my-finish-works") }}" class="prf__link">finished</a>
                {{-- <div class="number">
                    <span>4</span>
                </div> --}}
            </li>
        </ul>
    </nav>
</div>