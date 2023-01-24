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
    <link rel="stylesheet" href="{{ asset("assets/css/app.min.css") }}">
</head>

<body>
<header class="main-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="navBurger" role="navigation" id="navToggle"></div>
                <div id="test" class="overlay ">
                    <div class="overlayMenu my-d-flex">
                        <div class="logo">
                            <a href="" class="logo__link">
                                <img src="images/logo.png" alt="LogoSporte" class="logo__img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-lg-5 col-lg-5 offset-md-3 col-md-6 col-sm-8 d-flex justify-content-end align-items-center">
                <a href="#" class="reg_acc">Already have an account?</a>
                <a href="{{ route("home") }}" class="btn btn-lg">Log in</a>
            </div>
        </div>
    </div>
</header>
<section class="registration">
    <div class="container">
        @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col offset-lg-3 col-lg-6">
                <div class="wrp-rgsin">
                    <form id="signup-form" action="{{ route("user.doSignup") }}" method="post" class="rgsin-form">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-title">
                                        <h2>Registration</h2>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-6 col-md-6 col-sm-6 pd-rg">
                                    <a class="btn-cost activ">I am Customer</a>
                                </div>
                                <div class="col-6 col-lg-6 col-md-6 col-sm-6 pd-lf">
                                    <a class="btn-crea">I am Designer</a>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <a href="{{ route("auth.social.login", ["type" => "google"]) }}" class="btn-google">Sign up with Google</a>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <a href="{{ route("auth.social.login", ["type" => "facebook"]) }}" class="btn-facebook">Sign up with Facebook</a>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <span class="form-text">Or</span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="input-text">First name</span>
                                    <input type="text" name="first_name"  placeholder="First Name" value="{{ old("first_name") }}" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <span class="input-text">Last name</span>
                                    <input type="text" name="last_name" placeholder="Last Name" value="{{ old("last_name") }}" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <span class="input-text">Username*</span>
                                    <input type="text" name="username" placeholder="Username*" value="{{ old("username") }}" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <span class="input-text">Email address*</span>
                                    <input type="email" name="email" placeholder="Email adress*" value="{{ old("email") }}" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <span class="input-text">Password*</span>
                                    <input type="password" name="password" id="password" placeholder="Password*" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <span class="input-text">Confirm password*</span>
                                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password*" class="is-invalid" required>
                                    <span style="color: red" class="error-message" id="confirm_error"></span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 designer-fields" style="display: none">
                                    <span class="input-text">Behance*</span>
                                    <input type="text" name="behance" id="behance" placeholder="" required>
                                    <span style="color: red" class="error-message"></span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 designer-fields" style="display: none">
                                    <span class="input-text">Dribble*</span>
                                    <input type="text" name="dribble" id="dribble" placeholder="" class="is-invalid" required>
                                    <span style="color: red" class="error-message"></span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 mb designer-fields" style="display: none">
                                    <span class="input-text">Other*</span>
                                    <input type="text" name="other" id="other" placeholder="" class="is-invalid" required>
                                    <span style="color: red" class="error-message"></span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-center">
                                    <button class="btn-start" id="submit-btn" type="submit" >Get started</button>
                                </div>
                                <input type="hidden" name="user_type" id="user_type" value="Customer">
                            </div>
                        </div>
                    </form>
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(".btn-crea").on("click", function () {
        $(".btn-crea").addClass("activ")
        $(".btn-cost").removeClass("activ")
        $("#user_type").val("Designer")
        $(".designer-fields").show()
    })
    $(".btn-cost").on("click", function () {
        $(".btn-cost").addClass("activ")
        $(".btn-crea").removeClass("activ")
        $("#user_type").val("Customer");
        $(".designer-fields").hide()
    })
    $(".designer-fields").on("keyup paste blur change", function (e) {
        let check = validURL($(e.target).val());
        if(!check) {
            $(e.target).next().text("Please enter a valid URL");
        } else {
            $(e.target).next().text("");
        }
    })
    $("#confirm_password").on("keyup", function () {
        if($("#confirm_password").val() !== $("#password").val()) {
            $("#confirm_error").text("Both passwords doesn\'t match")
        } else {
            $("#confirm_password").removeAttr("style")
            $("#confirm_error").text("")
            $("#submit-btn").disabled(false)
        }
    })
    function validURL(str) {
        let pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
            '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
        return !!pattern.test(str);
    }
</script>
<script src="{{ asset("assets/js/app.min.js") }}"></script>
</body>

</html>
