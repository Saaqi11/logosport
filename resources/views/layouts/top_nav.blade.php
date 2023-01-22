
<header class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-4">
                <div class="navBurger" role="navigation" id="navToggle"></div>
                <div id="test" class="overlay ">
                    <div class="overlayMenu my-d-flex">
                        <div class="logo">
                            <a href="" class="logo__link">
                                <img src="{{ asset("images/logo.png") }}" alt="LogoSporte" class="logo__img">
                            </a>
                        </div>
                        <nav class="menu">
                            <ul class="menu__list">
                                <li class="menu__items">
                                    <a href="" class="menu__link">works</a>
                                </li>
                                <li class="menu__items">
                                    <a href="" class="menu__link">designers</a>
                                </li>
                                <li class="menu__items">
                                    <a href="" class="menu__link">contests</a>
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
                        <a href="#" class="wrp-message">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="#" class="wrp-ring">
                            <div class="bg-color">
                                <span>4</span>
                            </div>
                            <i class="far fa-bell"></i>
                        </a>
                        <div class="wrp-img">
                            <img src="{{ asset("images/user-icon.png") }}" alt="user icon">
                        </div>
                        <div class="info">
                            <span class="user-name">
                                <details class="dropdown">
                                    <summary role="button">
                                      <a class="button">{{ auth()->user()->first_name }}</a>
                                    </summary>
                                    <ul>
                                      <li><a href="#">Profile</a></li>
                                      <li><a href="{{ route("user.logout") }}">Logout</a></li>
                                    </ul>
                                </details>
                            </span>
                            <i class="fas fa-chevron-down"></i>
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
