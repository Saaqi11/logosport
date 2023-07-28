<!DOCTYPE html>
<html>
    @include('layouts.header')
    <body>
        @include('layouts.top_nav')
        <section class="constructor profile">
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
