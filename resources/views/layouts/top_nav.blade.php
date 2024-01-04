
<header class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-4">
                <div class="navBurger" role="navigation" id="navToggle"></div>
                <div id="test" class="overlay ">
                    <div class="overlayMenu my-d-flex">
                        <div class="logo">
                            <a href="/" class="logo__link">
                                <img src="{{ asset("images/logo.png") }}" alt="LogoSporte" class="logo__img">
                            </a>
                        </div>
                        <nav class="menu">
                            <ul class="menu__list">
                                <li class="menu__items {{Route::currentRouteName() == 'get.works' ? 'nav_active' : ''}}">
                                    <a href="{{ route("get.works") }}" class="menu__link">works</a>
                                </li>
                                <li class="menu__items {{Route::currentRouteName() == 'get.designers' ? 'nav_active' : ''}}">
                                    <a href="{{ route("get.designers")}}" class="menu__link">designers</a>
                                </li>
                                <li class="menu__items {{Route::currentRouteName() == 'customer.contest.view' ? 'nav_active' : ''}}">
                                    <a href="{{ auth()->user() && auth()->user()->hasRole("Customer") ? route("customer.contest.view") : route("contest.listing") }}" class="menu__link">contests</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            @if(!empty(auth()->user()))
                <div class="col-lg-4 col-md-4 col-sm-8 d-flex justify-content-end">
                    <div class="wrp-const">
                    <span class="const__prise">
                        0$
                    </span>
                        <a href="{{ route('chat.list')}}" class="wrp-message position-relative">
                            <div class="bg-color-message">
                                <span>0</span>
                            </div>
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="#" class="wrp-ring" id="notification-icon">
                            <div class="bg-color">
                                <span>4</span>
                            </div>
                            <i class="far fa-bell"></i>
                        </a>
                        <div id="notification-box" class="notification-box">
                            <ul id="notification-list"></ul>
                        </div>
                        <div class="wrp-img">
                            <img src="{{ asset("images/user-icon.png") }}" alt="user icon">
                        </div>
                        <div class="info">
                            <span class="user-name">
                                <details class="dropdown">
                                    <summary role="button">
                                          <a class="button top_nav">
                                              {{ auth()->user()->first_name }} &#160;
                                              <i class="fas fa-chevron-down"></i>
                                          </a>
                                    </summary>
                                    <ul>
                                      <li><a href="{{ route("user.general") }}">Profile</a></li>
                                      @php if(auth()->user()->hasRole('Designer')){ @endphp <li><a href="{{ route("user.cabinet.my-all-works") }}">Personal Cabinet</a></li> @php } @endphp
                                      <li><a href="{{ route("support") }}">Support</a></li>
                                      <li><a href="{{ route("user.logout") }}">Logout</a></li>
                                    </ul>
                                </details>
                            </span>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-4 col-md-4 col-sm-8 d-flex justify-content-end">
                    <div class="wrp-btn">
                        <button type="submit" class="btn btn-lg">Log in</button>
                        <div class="wrp-popup">
                            <div class="login">
                                <div class="popap-login">
                                    <form action="{{ route("user.login") }}" method="post" class="rgsin-form">
                                        @csrf
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <a href="{{ route("auth.social.login", ["type" => "google"]) }}" class="btn-google">Sign up with Google</a>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <a href="{{ route("auth.social.login", ["type" => "facebook"]) }}" class="btn-facebook">Sign up with Facebook</a>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <span class="form-text">Or</span>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">

                                                    <span class="input-text">E-mail</span>
                                                    <input type="email" name="email" placeholder="E-mail">
                                                    <span class="input-erorr">Email is required</span>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">

                                                    <span class="input-text">Password</span>
                                                    <input type="password" name="password" placeholder="Password">
                                                    <span class="input-erorr">Password is required</span>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                                                    <button class="btn-start">Enter</button>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <a href="#" class="input-text">Forget your password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route("user.signup") }}" class="btn btn-sg">Sign up</a>
                </div>
            @endif
        </div>
    </div>

</header>
