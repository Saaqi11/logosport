<style>
    a {
        color: black;
        text-decoration: none;
    }
    a:hover {
        color: black;
        text-decoration: none;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="title">
            <h1>Settings</h1>
        </div>
        <div class="wrp-step">
            <div class="step {{ Route::is("user.general") ? "activ" : "" }}"><span class="step-text"><a href="{{ route("user.general") }}" >General</a></span></div>
            <div class="step {{ Route::is("user.password") ? "activ" : "" }}"><span class="step-text"><a href="{{ route("user.password") }}" >Password</a></span></div>
            <div class="step {{ Route::is("user.notification") ? "activ" : "" }}"><span class="step-text"><a href="{{ route("user.notification") }}" >Notification</a></span></div>
            @if(auth()->user()->hasRole("Designer"))
                <div class="step {{ Route::is("user.verification") ? "activ" : "" }}"><span class="step-text"><a href="{{ route("user.verification") }}" >Verification</a></span></div>
            @endif
        </div>
        <div class="wrp-mob-step">
            <button class="nav left">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="mob-step activ"><span>General</span></div>
            <div class="mob-step"><span>Password</span></div>
            <div class="mob-step"><span>Notification</span></div>
            <div class="mob-step"><span>Verification</span></div>
            <button class="nav right">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>
