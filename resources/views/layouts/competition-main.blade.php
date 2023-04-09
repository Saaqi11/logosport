<!DOCTYPE html>
<html>
    @include('layouts.header')
    <body>
        @include('layouts.top_nav')
        @include("layouts.flashMessages")
        @yield('content')
        @include('layouts.footer')
        @include('layouts.scripts')
        @stack('script')
    </body>
</html>
