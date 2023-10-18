@php
    $sectionClass = str_contains(url()->current(), "cabinet") ? "profile" : "";
    $sectionClass = str_contains(url()->current(), "contest") ? "contest" : $sectionClass;
@endphp
<!DOCTYPE html>
<html>
    @include('layouts.header')
    <body>
        @include('layouts.top_nav')
        <section class="constructor {{ $sectionClass }}">
            <div class="container">
                @include("layouts.flashMessages")
                @yield('content')
            </div>
        </section>
        @include('layouts.footer')
        @include('layouts.scripts')
        @stack('script')

    </body>
</html>
