<script src="{{ asset("assets/js/dropzone.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="{{ asset("assets/js/jquery.min.js") }}"></script>
<script src="{{ asset("assets/js/jquery-validation.min.js") }}"></script>
@if(request()->route()->getPrefix() === "customer/contest")
    <script src="{{ asset("assets/modules/contest.js") }}"></script>
@endif
<script src="{{ asset("assets/js/app.min.js") }}"></script>
