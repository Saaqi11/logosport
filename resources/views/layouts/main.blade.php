<!DOCTYPE html>
<html>
    @include('layouts.header')
    <body>
        @include('layouts.top_nav')
        <section class="constructor">
            <div class="container">
                @include("layouts.flashMessages")
                @yield('content')
            </div>
        </section>
        @include('layouts.footer')

        <script>

            let selectContainer = document.querySelector(".select-container");
            let select = document.querySelector(".select");
            let input = document.getElementById("input");
            let options = document.querySelectorAll(".select-container .option");

            select.onclick = () => {
                selectContainer.classList.toggle("active");
            };

            options.forEach((e) => {
                e.addEventListener("click", () => {
                    input.value = e.innerText;
                    selectContainer.classList.remove("active");
                    options.forEach((e) => {
                        e.classList.remove("selected");
                    });
                    e.classList.add("selected");
                });
            });
        </script>
        @include('layouts.scripts')
        @stack('script')
    </body>
</html>
