@extends("layouts.main")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="title">
                <h1>LAUNCH THE CONTEST</h1>
            </div>
            <div class="wrp-step">
                <div class="step activ"><span class="step-text">1. Price</span></div>
                <div class="step"><span class="step-text">2. Type</span></div>
                <div class="step"><span class="step-text">3. Color</span></div>
                <div class="step"><span class="step-text">4. Style</span></div>
                <div class="step"><span class="step-text">5. Brief</span></div>
                <div class="step"><span class="step-text">6. Condition</span></div>
            </div>
            <div class="wrp-mob-step">
                <button class="nav left">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="mob-step activ"><span>1/6 Price</span></div>
                <div class="mob-step"><span>2/6 Type</span></div>
                <div class="mob-step"><span>3/6 Color</span></div>
                <div class="mob-step"><span>4/6 Style</span></div>
                <div class="mob-step"><span>5/6 Brief</span></div>
                <div class="mob-step"><span>6/6 Condition</span></div>
                <button class="nav right">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <div class="col-12">
					<span class="cnst-subtitle">
						Business level
					</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-ms-12 col-sm-12">
            <div id="owl-two" class="owl-carousel">
                <div class="slide-1">
                    <div class="cnst-card activ">
                        <input type="hidden" name="business_name" value="Small">
                        <div class="wrp-img-c">
                            <img src="{{ asset("images/cnstr-1.svg") }}" alt="image constructor" class="cstr__img">
                        </div>
                        <span class="cstr__title">small</span>
                        <p class="cstr__text">Unlimited project</p>
                        <p class="cstr__text">Price over 200 $</p>
                        <p class="cstr__text">
                            Garanted, part garanted, not garanted
                        </p>
                        <p class="cstr__text non">Guideline</p>
                        <button class="btn-cnst">Select</button>
                    </div>
                    <div class="text-content">
                        <p class="content">
                            <span class="title-content">Flexible deadlines</span>
                            3-20 days for logo and corporaty identity
                        </p>
                        <p class="content">
                            <span class="title-content">You get</span>
                            The source file of logo on the service (EPS, AI)
                            Full transfer of rights under a contract-offer
                            Preview of product
                        </p>
                        <p class="content">
                            <span class="title-content">Guideline</span>
                            Examples of using your logo<br>
                            Color palette for company<br>
                            Map of branded fonts
                        </p>
                        <p class="content">
                            <span class="title-content">Final files</span>
                            Layered vectors (EPS, AI)<br>
                            Screen quality (PNG, JPEG, PDF)<br>
                            Preview of product<br>
                            Fonts <span class="subtext">(If you want to use paid fonts - provide
										the client's documents, about the purchased
										font and confirm its consent)</span><br>
                            Text in logos should be converted to outlines.
                        </p>
                    </div>
                </div>
                <div class="slide-2">
                    <div class="cnst-card">
                        <input type="hidden" name="business_name" value="Medium">
                        <div class="wrp-img-c">
                            <img src="{{ asset("images/cnstr-2.svg") }}" alt="image constructor" class="cstr__img cstr__img-2">
                        </div>
                        <span class="cstr__title">medium</span>
                        <p class="cstr__text">Selected project 100</p>
                        <p class="cstr__text">Price over 600 $</p>
                        <p class="cstr__text">Garanted, part garanted</p>
                        <p class="cstr__text">Guideline</p>
                        <p class="cstr__text non">Standard branded media</p>
                        <button class="btn-cnst">Select</button>
                    </div>
                    <div class="text-content">
                        <p class="content">
                            <span class="title-content">Flexible deadlines</span>
                            3-20 days for logo and corporaty identity
                        </p>
                        <p class="content">
                            <span class="title-content">You get</span>
                            The source file of logo on the service (EPS, AI)
                            Full transfer of rights under a contract-offer
                            Preview of product
                        </p>
                        <p class="content">
                            <span class="title-content">Guideline</span>
                            Examples of using your logo<br>
                            Color palette for company<br>
                            Map of branded fonts
                        </p>
                        <p class="content">
                            <span class="title-content">Standart brand identity</span>
                            Design of letterhead<br>
                            Corporate business card design<br>
                            Pattern<br>
                            Favicon for the site<br>
                            Design of a corporate Facebook account
                        </p>
                        <p class="content">
                            <span class="title-content">Final files</span>
                            Layered vectors (EPS, AI)<br>
                            Screen quality (PNG, JPEG, PDF)<br>
                            Preview of product<br>
                            Fonts <span class="subtext">(If you want to use paid fonts - provide
										the client's documents, about the purchased
										font and confirm its consent)</span><br>
                            Text in logos should be converted to outlines.
                        </p>
                    </div>
                </div>
                <div class="slide-3">
                    <div class="cnst-card">
                        <input type="hidden" name="business_name" value="Big">
                        <div class="wrp-img-c">
                            <img src="{{ asset("images/cnstr-3.svg") }}" alt="image constructor" class="cstr__img">
                        </div>
                        <span class="cstr__title">big</span>
                        <p class="cstr__text">Selected project 50</p>
                        <p class="cstr__text">Price over 1400 $</p>
                        <p class="cstr__text">Garanted, part garanted</p>
                        <p class="cstr__text">Guideline</p>
                        <p class="cstr__text">Standard branded media</p>
                        <p class="cstr__text non">Attributes for employees</p>
                        <button class="btn-cnst">Select</button>
                    </div>
                    <div class="text-content">
                        <p class="content">
                            <span class="title-content">Flexible deadlines</span>
                            3-20 days for logo and corporaty identity
                        </p>
                        <p class="content">
                            <span class="title-content">You get</span>
                            The source file of logo on the service (EPS, AI)
                            Full transfer of rights under a contract-offer
                            Preview of product
                        </p>
                        <p class="content">
                            <span class="title-content">Guideline</span>
                            Examples of using your logo<br>
                            Color palette for company<br>
                            Map of branded fonts
                        </p>
                        <p class="content">
                            <span class="title-content">Standart brand identity</span>
                            Design of letterhead<br>
                            Corporate business card design<br>
                            Pattern<br>
                            Favicon for the site<br>
                            Design of 3 social networks to choose from
                        </p>
                        <p class="content">
                            <span class="title-content">Non-standard branded media</span>
                            5 individual carriers
                        </p>
                        <p class="content">
                            <span class="title-content">Attributes for the company</span>
                            Model of company labels<br>
                            Icon layout with your logo<br>
                            Model T-shirt
                        </p>
                        <p class="content">
                            <span class="title-content">Final files</span>
                            Layered vectors (EPS, AI)<br>
                            Screen quality (PNG, JPEG, PDF)<br>
                            Preview of product<br>
                            Fonts <span class="subtext">(If you want to use paid fonts - provide
										the client's documents, about the purchased
										font and confirm its consent)</span><br>
                            Text in logos should be converted to outlines.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col offset-lg-8 col-lg-4">
            <div class="price-block">
                <p class="p-title">
                    Small
                </p>
                <span class="p-subtitle price-label">
                    Price (200$ to 599$)
                </span>
                <form action="{{ route("customer.contest.price.save") }}" class="price-form" id="contest-price-form" method="post">
                    @csrf
                    <input type="number" name="contest_price" value="200" id="contest-price" min="200" max="599" class="price-input" required>$
                    <input type="hidden" type="submit" name="business_level" value="Small" id="business_level" class="price-input" required>
                    <button class="btn-price" type="submit">Next</button>
                    <span class="p-subtitle">
                        Recommended price for «Medium» — 1000$.
                        If you put the price less than the recommended
                        one - you will get fewer offers from designers.
                    </span>
                </form>
            </div>
        </div>
    </div>
@endsection
