<div class="brief__head head-brief">
    <div class="head-brief__left">
        <div class="head-brief__top">
            <h2 class="title head-brief__title">
                {{ $contest->company_name }}
            </h2>
            <button data-like class="head-brief__like">
                <svg class="head-brief__icon">
                    <use href="img/icons/icons.svg#star"></use>
                </svg>
            </button>
{{--            <select name="form[]" data-class-modif="lang" class="form">--}}
{{--                <option value="1" selected>ENG</option>--}}
{{--                <option value="2">RU</option>--}}
{{--                <option value="3">UA</option>--}}
{{--            </select>--}}
        </div>
        <div class="head-brief__items">
            <div class="head-brief__item">
                <p>Customer:
                <div class="head-brief__profile profile-head">
                    <button class="profile-head__button">
                        {{ $contest->customer->first_name. " " .$contest->customer->last_name }}
                    </button>
                    <div class="profile-head__main">
                        <div class="profile-head__top">
                            <div class="profile-head__avatar-ibg">
{{--                                <div class="profile-head__online-time">
                                    Was online 30 minuteas ago
                                </div>--}}
                                <span class="profile-head__status online">

													</span>
                                <picture>
                                    <source srcset="{{ asset("images/user-icon.png") }}" type="image/webp"><img src="{{ asset("images/user-icon.png") }}" alt="">
                                </picture>
                            </div>
                            <div class="profile-head__info">
                                <a href="" class="profile-head__link">
														<span class="profile-head__check">
															<svg class="profile-head__icon">
																<use href="img/icons/icons.svg#check-circle"></use>
															</svg>
														</span>
                                    {{ $contest->customer->first_name }}
                                </a>
                                <div class="profile-head__name">
                                    {{ $contest->customer->first_name. " " .$contest->customer->last_name }}
                                </div>
                            </div>
                        </div>
                        <ul class="profile-head__list">
                            <li>
                                <p>14</p>
                                <p>All</p>
                            </li>
                            <li>
                                <p>7</p>
                                <p>Finish</p>
                            </li>
                            <li>
                                <p>5</p>
                                <p>Active</p>
                            </li>
                            <li>
                                <p>2</p>
                                <p>Cancel</p>
                            </li>
                        </ul>
                    </div>
                </div>
                </p>
            </div>
            <div class="head-brief__item">
                <p>End Date: {{ \Carbon\Carbon::parse($contest->start_date)->addDays($contest->duration) }}</p>
            </div>
            <div class="head-brief__item">
                <p>{{ !empty($works) ?  $works->count() : "0" }} design concepts</p>
            </div>
            <div class="head-brief__item">
                <p>{{ $contest->contest_format }}</p>
            </div>
        </div>
    </div>
    <div data-da=".head-brief__items,768,1" class="head-brief__price price-head">
        <div class="price-head__title">
            Price ({{ $contest->is_amount_verified ? "Paid" : "Not Paid" }}): <span>{{ $contest->contest_price }}$</span>
        </div>
        <div class="price-head__info">
            <div class="price-head__item">
                Winner: <span>{{ $contest->contest_price * .85 }}$ (85%)</span>
            </div>
            <div class="price-head__item">
                2nd place: <span>
										{{ $contest->contest_price * .10 }}$ (10%)
									</span>
            </div>
            <div class="price-head__item">
                3rd place: <span>{{ $contest->contest_price * .05 }}$ (5%)</span>
            </div>
        </div>
    </div>
</div>
<div class="brief__navigation navigation-brief">
    <div class="navigation-brief__slider-wrap">
        <div class="navigation-brief__slider swiper">
            <div class="navigation-brief__wrapper swiper-wrapper">
                <div class="navigation-brief__slide swiper-slide">
                    <a href="{{ route("competition.show", ["id" => $contest->id]) }}" class="{{ request()->route()->action['as'] == 'competition.show' ? "active" : '' }}">
                        Brief
                    </a>
                </div>
                <div class="navigation-brief__slide swiper-slide">
                    <a href="{{ route("competition.round.one", ["id" => $contest->id]) }}" class="{{ request()->route()->action['as'] == 'competition.round.one' ? "active" : '' }}">
                        Round 1
                    </a>
                </div>
                <div class="navigation-brief__slide swiper-slide">
                    <a href="{{ route("competition.round.two", ["id" => $contest->id]) }}" class="{{ request()->route()->action['as'] == 'competition.round.two' ? "active" : '' }}">
                        Round 2
                    </a>
                </div>
                <div class="navigation-brief__slide swiper-slide">
                    <a href="{{ route("competition.winners", ["id" => $contest->id]) }}" class="{{ request()->route()->action['as'] == 'competition.winners' ? "active" : '' }}">
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
    @if(auth()->user()->user_type === "Designer")
        <div class="navigation-brief__right">
            <div class="navigation-brief__count">
                <span id="designer-works"></span>/4 works
            </div>
            <a data-popup="#popup1" class="navigation-brief__button button button_border">
                Add new work
            </a>
        </div>
    @endif
</div>