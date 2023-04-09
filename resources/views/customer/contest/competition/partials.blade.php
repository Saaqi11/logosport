
<div class="brief__navigation navigation-brief">
    <div class="navigation-brief__slider-wrap">
        <div class="navigation-brief__slider swiper">
            <div class="navigation-brief__wrapper swiper-wrapper">
                <div class="navigation-brief__slide swiper-slide">
                    <a href="" class="active">
                        Brief
                    </a>
                </div>
                <div class="navigation-brief__slide swiper-slide">
                    <a href="{{ route("competition.round.one", ["id" => $contest->id]) }}">
                        Round 1
                    </a>
                </div>
                <div class="navigation-brief__slide swiper-slide">
                    <a href="{{ route("competition.round.two", ["id" => $contest->id]) }}">
                        Round 2
                    </a>
                </div>
                <div class="navigation-brief__slide swiper-slide">
                    <a href="{{ route("competition.winners", ["id" => $contest->id]) }}">
                        Winner
                    </a>
                </div>
            </div>
        </div>
        <div class="navigation-brief__arrows">
            <button class="navigation-brief__arrow prev">
                <span></span>
            </button>
            <button class="navigation-brief__arrow next">
                <span></span>
            </button>
        </div>
    </div>

    <div class="navigation-brief__right">
        <div class="navigation-brief__count">
            4/4 works
        </div>
        <a data-popup="#popup1" class="navigation-brief__button button button_border">
            Add new work
        </a>
    </div>
</div>