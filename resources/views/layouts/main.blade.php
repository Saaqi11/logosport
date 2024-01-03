@php
    $sectionClass = str_contains(url()->current(), 'contest') ? 'contest' : '';
    $sectionClass = str_contains(url()->current(), 'designer-works') ? 'profile' : $sectionClass;
    $sectionClass = str_contains(url()->current(), 'cabinet') ? 'profile' : $sectionClass;
@endphp
<!DOCTYPE html>
<html>
@include('layouts.header')

<body>
    @include('layouts.top_nav')
    <section class="constructor {{ $sectionClass }}">
        <div class="container">
            @include('layouts.flashMessages')
            @yield('content')
        </div>
    </section>
    @if (!str_contains(url()->current(), 'chat'))
        @include('layouts.footer')
    @endif
    @include('layouts.scripts')
    @stack('script')

</body>

</html>
