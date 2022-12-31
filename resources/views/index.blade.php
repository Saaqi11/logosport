@extends("layouts.main")
@section("content")
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
                            <img src="{{ asset("images/checked.png") }}" style="width: 15px; height: 15px" alt="checkbox" class="checkbox">
                            All project is private</li>
                        <li class="scd__items">
                            <img src="{{ asset("images/checked.png") }}" style="width: 15px; height: 15px" alt="checkbox" class="checkbox">
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
@endsection
