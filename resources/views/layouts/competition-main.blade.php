<!DOCTYPE html>
<html>
    @include('layouts.header')
    <body>
        @include('layouts.top_nav')
        <div class="container">
            @include("layouts.flashMessages")
        </div>
        @yield('content')
        @include('layouts.footer')
        @include('layouts.scripts')
        @stack('script')
    </body>
</html>
