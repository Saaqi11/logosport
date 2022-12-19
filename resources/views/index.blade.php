{{--@dd(Session::get('success'))--}}
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>LogoSporte</title>
    <link data-csp="header-favicon" rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("assets/css/app.min.css")}}">
</head>

<body>
<header class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-{{ !empty(auth()->user()) ? "7" : "9" }} col-md-8">
                <div class="navBurger" role="navigation" id="navToggle"></div>
                <div id="test" class="overlay ">
                    <div class="overlayMenu my-d-flex">
                        <div class="logo">
                            <a href="" class="logo__link">
                                <img src="{{asset("images/logo.png")}}" alt="LogoSporte" class="logo__img">
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
                <div class="col-lg-5 col-md-4 col-sm-8 d-flex justify-content-end">
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
                            <img src="images/user-icon.png" alt="user icon">
                        </div>
                        <div class="info">
                        <span class="user-name">
                            {{ auth()->user()->name }}
                        </span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    &#160;&#160;&#160;
                    <a href="{{ route("user.logout") }}" class="btn btn-sg">Logout</a>
                </div>
            @else
                <div class="col-lg-3 col-md-4 d-flex justify-content-end">
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
                                                    <a href="" class="btn-google">Sign up with Google</a>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <a href="" class="btn-facebook">Sign up with Facebook</a>
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
                                                    <a href="#" class="input-text">Forget your password?</a href="#">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sg">Sign up</button>
                </div>
            @endif
        </div>
    </div>
</header>
<section class="section-first">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col col-lg-8">
                    <div class="title">
                        <span class="title__stlt">logotype is face company</span>
                        <div class="title__tlt">
                            <h1>We will find the best solution for you from hundreds of offers designers</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-12">
                    <div class="wrp-cnt-btn">
                        <button class="btn btn-cos">I am Costumer</button>
                        <button class="btn btn-cre">I am Creator</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="company">
    <div class="container">
        <div class="row">
            <div class="col col-lg-12">
                <div class="title-cmp">
                    <h2>Recent orders completed</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 no-pd">
                <div id="owl-one" class="owl-carousel">
                    <div class="company-b">
                        <img src="images/cm-1.png" class="company-b__img">
                    </div>
                    <div class="company-b">
                        <img src="images/cm-2.png" class="company-b__img">
                    </div>

                    <div class="company-b">
                        <img src="images/cm-3.png" class="company-b__img">
                    </div>

                    <div class="company-b">
                        <img src="images/cm-4.png" class="company-b__img">
                    </div>

                    <div class="company-b">
                        <img src="images/cm-5.png" class="company-b__img">
                    </div>

                    <div class="company-b">
                        <img src="images/cm-6.png" class="company-b__img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-second">
    <div class="scd">
        <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-5 col-md-12 col-sm-12 my-d-flex">
                    <div class="title">
                        <h1>Is unique service</h1>
                    </div>
                    <p class="scd__text">
                        We took all the best from the competition area and from design studios. Now you can receive
                        hundreds offers from designers from all over the world and make dits to any work at any
                        stage.
                    </p>
                    <ul class="scd__list">
                        <li class="scd__items">
                            <img src="images/checked.png" alt="checkbox" class="checkbox">
                            All project is private</li>
                        <li class="scd__items">
                            <img src="images/checked.png" alt="checkbox" class="checkbox">
                            All works are tested by moderators</li>
                    </ul>
                </div>
                <div class="offset-lg-1 col-lg-5 col-md-12 col-sm-12 my-col">
                    <div class="scd__image">
                        <img src="images/scd-img.png" alt="block with women">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-third">
    <div class="tid">
        <div class="container">
            <div class="row">
                <div class="col col-lg-12">
                    <div class="title">
                        <h1>Why we help you</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-3 col-md-4 col-sm-4 ">
                    <div class="tid__block">
                        <img src="images/tid-1.svg" alt="sqare" class="block__img">
                        <div class="block__title">
                            <h1>Your team</h1>
                        </div>
                        <p class="block__text">
                            You can met one group of designers,
                            what you brief.
                        </p>
                    </div>
                </div>
                <div class="col-12 offset-lg-1 col-lg-3 col-md-4 col-sm-4">
                    <div class="tid__block">
                        <img src="images/tid-2.svg" alt="sqare" class="block__img">
                        <div class="block__title">
                            <h1>Comfort work</h1>
                        </div>
                        <p class="block__text">
                            Flexible constructor of you project.
                        </p>
                    </div>
                </div>
                <div class="col-12 offset-lg-1 col-lg-3 col-md-4 col-sm-4">
                    <div class="tid__block">
                        <img src="images/tid-3.svg" alt="sqare" class="block__img">
                        <div class="block__title">
                            <h1>Secure contests</h1>
                        </div>
                        <p class="block__text">
                            Garanted, part garanted, no garant
                            contest’s.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4 col-sm-4">
                    <div class="tid__block">
                        <img src="images/tid-4.svg" alt="sqare" class="block__img block__img--4">
                        <div class="block__title">
                            <h1>Huge choice</h1>
                        </div>
                        <p class="block__text">
                            Unlimited designers for all price
                            of projects.
                        </p>
                    </div>
                </div>
                <div class="col-12 offset-lg-1 col-lg-3 col-md-4 col-sm-4">
                    <div class="tid__block">
                        <img src="images/tid-5.svg" alt="sqare" class="block__img">
                        <div class="block__title">
                            <h1>Total control</h1>
                        </div>
                        <p class="block__text">
                            You can control all process time, price,
                            amend work of designers in all of stage.
                        </p>
                    </div>
                </div>
                <div class="col-12 offset-lg-1 col-lg-3 col-md-4 col-sm-4">
                    <div class="tid__block">
                        <img src="images/tid-6.svg" alt="sqare" class="block__img">
                        <div class="block__title">
                            <h1>Transparency</h1>
                        </div>
                        <p class="block__text">
                            All of additional functions is fee
                            Don’t pay for anything,except you order.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-fouth">
    <div class="fuh">
        <div class="container">
            <div class="row">
                <div class=" offset-lg-1 col-lg-5 col-md-12 col-sm-12 hack-d-fleck">
                    <div class="title">
                        <h1>1. Briefing</h1>
                    </div>
                    <p class="fuh__text">
                        Firstly, think about your product and company, then write all the information which help
                        designers understand what you want and answer for a few questions in the our platform. Pay
                        deposit for the contest. You can receive money back if you you want.
                        And start your contest at a time convenient for you.
                    </p>
                </div>
                <div class=" col-lg-6 col-md-12 col-sm-12">
                    <div class="fuh-img">
                        <img src="images/fuh-1.svg" alt="image">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-6 col-md-12 col-sm-12 order-last order-lg-1">
                    <div class="fuh-img">
                        <img src="images/fuh-2.svg" alt="image">
                    </div>
                </div>
                <div class=" col-lg-6 col-md-12 col-sm-12 order-first order-lg-2 hack-d-fleck">
                    <div class="title">
                        <h1>2. Acceptance of work</h1>
                    </div>
                    <p class="fuh__text">
                        After starting contest you get hundreds ideas of logotypes in white and black from designers in round 1, you chose better ideas, which are going to round 2 and then this works you can see in color. You can do any edits for this logotypes at any round.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class=" offset-lg-1 col-lg-5 col-md-12 col-sm-12 hack-d-fleck">
                    <div class="title">
                        <h1>3. New «Face» of your company</h1>
                    </div>
                    <p class="fuh__text">
                        Сhoose logotype, what you like. But, don’t forget, you need select logotypes for 2nd and 3rd place, this designers get some money for participation in this contest. That’s all. But we have for you bonus…
                    </p>
                </div>
                <div class=" col-lg-6 ">
                    <div class="fuh-img">
                        <img src="images/fuh-3.svg" alt="image">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-lg-6 col-md-12 col-sm-12 order-last order-lg-1">
                    <div class="fuh-img">
                        <img src="images/fuh-4.svg" alt="image">
                    </div>
                </div>
                <div class=" col-lg-6 col-md-12 col-sm-12 order-first order-lg-2 hack-d-fleck">
                    <div class="title">
                        <h1>4. Corporate identity</h1>
                    </div>
                    <p class="fuh__text">
                        All of business level on our platform have some elements of corporate identity. And the higher the business level - you get more additional elements of the corporate style are absolutely free. Designer who win in the contest do that in short period of time.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-12 d-flex justify-content-center">
                    <button class="btn-start">Get started</button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-fifth">
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col offset-lg-1 col-lg-10 col-md-12 col-sm-12 my-d-flex">
                    <div class="blk1">
                        <a href="" class="logo__link">
                            <img src="images/logo.png" alt="LogoSporte" class="logo__img">
                        </a>
                        <span class="blk1-text">
								We took all the best from
							</span>
                    </div>
                    <div class="wrp-sub-block">
                        <div class="blk2">
                            <div class="list-title">
                                <h3>Read</h3>
                            </div>
                            <ul class="ft-list">
                                <li class="ft-list__items">
                                    <a href="" class="ft-list__link">Use of terms</a>
                                </li>
                                <li class="ft-list__items">
                                    <a href="" class="ft-list__link">About our company</a>
                                </li>
                                <li class="ft-list__items">
                                    <a href="" class="ft-list__link">Press</a>
                                </li>
                            </ul>
                        </div>
                        <div class="blk3">
                            <div class="list-title">
                                <h3>Info</h3>
                            </div>
                            <ul class="ft-list">
                                <li class="ft-list__items">
                                    <a href="" class="ft-list__link">News</a>
                                </li>
                                <li class="ft-list__items">
                                    <a href="" class="ft-list__link">FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wrp-sub-block">
                        <div class="blk4">
                            <div class="list-title">
                                <h3>Social</h3>
                            </div>
                            <ul class="mob-list">
                                <li class="mob-list__items">
                                    <a href="" class="mob-list__link">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="mob-list__items">
                                    <a href="" class="mob-list__link">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                </li>
                                <li class="mob-list__items">
                                    <a href="" class="mob-list__link">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="mob-list__items">
                                    <a href="" class="mob-list__link">
                                        <i class="fab fa-viber"></i>
                                    </a>
                                </li>
                                <li class="mob-list__items">
                                    <a href="" class="mob-list__link">
                                        <i class="fab fa-telegram-plane"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="ft-list">
                                <li class="ft-list__items">
                                    <a href="" class="ft-list__link">Facebook</a>
                                </li>
                                <li class="ft-list__items">
                                    <a href="" class="ft-list__link">Twitter</a>
                                </li>
                                <li class="ft-list__items">
                                    <a href="" class="ft-list__link">Instagram</a>
                                </li>
                                <li class="ft-list__items">
                                    <a href="" class="ft-list__link">Viber</a>
                                </li>
                                <li class="ft-list__items">
                                    <a href="" class="ft-list__link">Telegram</a>
                                </li>
                            </ul>
                        </div>
                        <div class="blk5">
                            <div class="list-title">
                                <h3>Contact</h3>
                            </div>
                            <div class="wrp-mail">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:mail@logosporte.com" class="link-email">mail@logosporte.com</a>
                            </div>
                            <div class="wrp-selected">
                                <div class="select-box">
                                    <div class="select-box__current" tabindex="1">
                                        <div class="select-box__value">
                                            <input class="select-box__input" type="radio" id="0" value="1" name="Ben"
                                                   checked="checked" />
                                            <p class="select-box__input-text">English</p>
                                        </div>
                                        <div class="select-box__value">
                                            <input class="select-box__input" type="radio" id="1" value="2" name="Ben"
                                                   checked="checked" />
                                            <p class="select-box__input-text">Russian</p>
                                        </div><img class="select-box__icon"
                                                   src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon"
                                                   aria-hidden="true" />
                                    </div>
                                    <ul class="select-box__list">
                                        <li>
                                            <label class="select-box__option" for="0"
                                                   aria-hidden="aria-hidden">English</label>
                                        </li>
                                        <li>
                                            <label class="select-box__option" for="1"
                                                   aria-hidden="aria-hidden">Russian</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col col-12">
                    <div class="cop-text">
                        <span>Made in Ukraine</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>

<script src="{{ asset("assets/js/app.min.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
</body>

</html>
