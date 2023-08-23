<script src="{{ asset("assets/js/jquery.min.js") }}"></script>
<script src="{{ asset("assets/js/datatables.min.js") }}"></script>
<script src="{{ asset("assets/js/dropzone.js") }}"></script>
<script src="{{ asset("assets/js/popper.min.js") }}"></script>
<script src="{{ asset("assets/js/jquery-validation.min.js") }}"></script>
@if(request()->route()->getPrefix() === "customer/contest")
    <script src="{{ asset("assets/js-modules/contest.js") }}"></script>
@endif
@if(request()->route()->getPrefix() === "/user")
    <script src="{{ asset("assets/js-modules/profile.js") }}"></script>
@endif
<script src="{{ asset("assets/js/toastr.min.js") }}"></script>
<script src="{{ asset("assets/js/app.min.js") }}"></script>
<script src="{{ asset("assets/js/theme.js") }}"></script>

@if(request()->route()->action['as'] === "contest.listing")
    <script src="{{ asset("assets/js-modules/contest-listing.js") }}"></script>
@endif
@if(request()->route()->getPrefix() !== "/competition")
    <script src="{{ asset("assets/js/competition-app.min.js") }}"></script>
    <script src="{{ asset("assets/js/competition.js") }}"></script>
@endif