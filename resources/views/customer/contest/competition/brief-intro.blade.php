@extends("layouts.competition-main")
@section("content")
    <div class="wrapper">
        <main class="page">
            <section class="brief">
                <div class="brief__container">
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
                                <select name="form[]" data-class-modif="lang" class="form">
                                    <option value="1" selected>ENG</option>
                                    <option value="2">RU</option>
                                    <option value="3">UA</option>
                                </select>
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
                                                    <div class="profile-head__online-time">
                                                        Was online 30 minuteas ago
                                                    </div>
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
                                    <p>451 design concepts</p>
                                </div>
                                <div class="head-brief__item">
                                    <p>{{ $contest->contest_format }}</p>
                                </div>
                            </div>
                        </div>
                        <div data-da=".head-brief__items,768,1" class="head-brief__price price-head">
                            <div class="price-head__title">
                                Price : <span>{{ $contest->contest_price }}$</span>
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
                    @include("customer.contest.competition.partials")
                    <div class="brief__blocks">
                        <div class="brief__block block-brief">
                            <div class="block-brief__head">
                                <h4 class="block-brief__title">
                                    About company
                                </h4>
                            </div>
                            <div class="block-brief__info-rows">
                                <div class="block-brief__info-row">

                                    <div class="block-brief__left">
                                        Name
                                    </div>
                                    <div class="block-brief__right">
                                        {{ $contest->company_name }}
                                    </div>

                                </div>
                                <div class="block-brief__info-row">

                                    <div class="block-brief__left">
                                        Slogan
                                    </div>
                                    <div class="block-brief__right">
                                        {{ $contest->slogan }}
                                    </div>
                                </div>
                                <div class="block-brief__info-row">

                                    <div class="block-brief__left">
                                        People
                                    </div>
                                    <div class="block-brief__right">
                                        {{ $contest->company_employees_range }}
                                    </div>

                                </div>
                                <div class="block-brief__info-row">

                                    <div class="block-brief__left">
                                        Industry
                                    </div>
                                    <div class="block-brief__right">
                                        {{ $contest->industry_type }}
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="brief__block block-brief">
                            <div class="block-brief__head flex">
                                <h4 class="block-brief__title">
                                    Information
                                </h4>
                                <select name="form[]" data-class-modif="lang" class="form">
                                    <option value="1" selected>English</option>
                                    <option value="2">Russian</option>
                                    <option value="3">Ukraine</option>
                                </select>
                            </div>
                            <div class="block-brief__info-row">

                                <div class="block-brief__left">
                                    What logotype you
                                    like to get?
                                </div>
                                <div class="block-brief__right">
                                    {{ $contest->logo_type_likes }}
                                </div>

                            </div>
                            <div class="block-brief__info-row">

                                <div class="block-brief__left">
                                    What you company
                                    do?
                                </div>
                                <div class="block-brief__right">
                                    {{ $contest->company_about }}
                                </div>
                            </div>

                            <div class="block-brief__info-row">

                                <div class="block-brief__left">
                                    Any features of your
                                    company?
                                </div>
                                <div class="block-brief__right">
                                    {{ $contest->company_features }}
                                </div>

                            </div>
                            <div class="block-brief__info-row">

                                <div class="block-brief__left">
                                    What the advantages
                                    of your company?
                                </div>
                                <div class="block-brief__right">
                                    {{ $contest->company_advantages }}
                                </div>
                            </div>
                            <div class="block-brief__info-row">

                                <div class="block-brief__left">
                                    What logotype you
                                    like to get?
                                </div>
                                <div class="block-brief__right">
                                    {{ $contest->logo_type_likes }}
                                </div>

                            </div>
                            <div class="block-brief__info-row">

                                <div class="block-brief__left">
                                    What logotype you
                                    don't like?
                                </div>
                                <div class="block-brief__right">
                                    {{ $contest->logo_type_unlikes }}
                                </div>

                            </div>
                        </div>
                        <div class="brief__block block-brief">
                            <div class="block-brief__head ">
                                <h4 class="block-brief__title">
                                    Style
                                </h4>
                            </div>
                            @php
                                $styleJson = @$contest->style->style_json;
                                $styleArr = [];
                                if (!empty($styleJson)) {
                                    $styleArr = json_decode($styleJson, true);
                                }
                            @endphp
                            <div class="block-brief__style style-brief">
                                <div class="style-brief__row">
                                    <div class="style-brief__column">
                                        Economy
                                    </div>
                                    <div class="style-brief__range">
                                        <div disabled data-from="0" data-to="100" data-start="{{ @$styleArr["style"][0] }}" data-range></div>
                                    </div>
                                    <div class="style-brief__column">
                                        Rick
                                    </div>
                                </div>
                                <div class="style-brief__row">
                                    <div class="style-brief__column">
                                        Female
                                    </div>
                                    <div class="style-brief__range">
                                        <div disabled data-from="0" data-to="100" data-start="{{ @$styleArr["style"][1] }}" data-range></div>
                                    </div>
                                    <div class="style-brief__column">
                                        Male
                                    </div>
                                </div>
                                <div class="style-brief__row">
                                    <div class="style-brief__column">
                                        Young
                                    </div>
                                    <div class="style-brief__range">
                                        <div disabled data-from="0" data-to="100" data-start="{{ @$styleArr["style"][2] }}" data-range></div>
                                    </div>
                                    <div class="style-brief__column">
                                        Maturity
                                    </div>
                                </div>
                                <div class="style-brief__row">
                                    <div class="style-brief__column">
                                        Modern
                                    </div>
                                    <div class="style-brief__range">
                                        <div disabled data-from="0" data-to="100" data-start="{{ @$styleArr["style"][3] }}" data-range></div>
                                    </div>
                                    <div class="style-brief__column">
                                        Classic
                                    </div>
                                </div>
                                <div class="style-brief__row">
                                    <div class="style-brief__column">
                                        Playfulness
                                    </div>
                                    <div class="style-brief__range">
                                        <div disabled data-from="0" data-to="100" data-start="{{ @$styleArr["style"][4] }}" data-range></div>
                                    </div>
                                    <div class="style-brief__column">
                                        Gravity
                                    </div>
                                </div>
                                <div class="style-brief__row">
                                    <div class="style-brief__column">
                                        Subtlety
                                    </div>
                                    <div class="style-brief__range">
                                        <div disabled data-from="0" data-to="100" data-start="{{ @$styleArr["style"][5] }}" data-range></div>
                                    </div>
                                    <div class="style-brief__column">
                                        Obviousness
                                    </div>
                                </div>
                                <div class="style-brief__row">
                                    <div class="style-brief__column">
                                        Brevity
                                    </div>
                                    <div class="style-brief__range">
                                        <div disabled data-from="0" data-to="100" data-start="{{ @$styleArr["style"][6] }}" data-range></div>
                                    </div>
                                    <div class="style-brief__column">
                                        Agressiveness
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="brief__block block-brief">
                            <div class="block-brief__head ">
                                <h4 class="block-brief__title">
                                    Type
                                </h4>
                            </div>
                            <div data-gallery class="block-brief__grid-layout big">
                                @if(!empty($contest->mediaFiles) && count($contest->mediaFiles) > 0)
                                    @foreach($contest->mediaFiles as $file)
                                        <a href="{{ $file->src }}" class="block-brief__image">
                                            <img src="{{ $file->src }}" alt="">
                                        </a>
                                    @endforeach
                                @else
                                    There are no image type available for it.
                                @endif
                            </div>
                        </div>
                        <div class="brief__block block-brief">
                            <div class="block-brief__head ">
                                <h4 class="block-brief__title">
                                    Color
                                </h4>
                            </div>
                            <div data-gallery class="block-brief__grid-layout">
                                @if(!empty($contest->colors) && count($contest->colors) > 0)
                                    @foreach($contest->colors as $color)
                                        <div style="background: {{ $color->color_name }}" class="block-brief__color">
                                            <svg class="block-brief__color-icon">
                                                <use href="{{ asset("img/icons/icons.svg#crosshairs") }}"></use>
                                            </svg>
                                            <span>
                                                {{ $color->color_name }}
                                            </span>
                                        </div>
                                    @endforeach
                                @else
                                    There are not any color available
                                @endif
                            </div>
                        </div>
                        <div class="brief__block block-brief">
                            <div class="block-brief__head ">
                                <h4 class="block-brief__title">
                                    Additional File
                                </h4>
                            </div>
                            <div data-gallery class="block-brief__grid-layout">
                                <a href="{{ asset($contest->doc_file) }}" class="block-brief__download-link">
                                    <svg class="block-brief__download-icon">
                                        <use href="img/icons/icons.svg#arrow-down"></use>
                                    </svg>
                                    @php
                                        $docFile = explode("/", @$contest->doc_file);
                                    @endphp
                                    <span>{{ @$docFile[count($docFile) - 1] }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="brief__block block-brief">
                            <div class="block-brief__head ">
                                <h4 class="block-brief__title">
                                    Corporate identity
                                </h4>
                            </div>
                            <div class="block-brief__row">
                                <div class="block-brief__column">
                                    <h6>
                                        Guideline
                                    </h6>
                                    <p>Examples of using your logo <br>
                                        Color palette for company <br>
                                        Map of branded fonts</p>
                                    <h6>
                                        Standard brand identity
                                    </h6>
                                    <p>Design of letterhead
                                        Corporate business card design <br>
                                        Pattern <br>
                                        Favicon for the site <br>
                                        Design of 3 social networks to choose from</p>
                                    <h6>Attributes for the company</h6>
                                    <p>Model of company labels <br>
                                        Icon layout with your logo <br>
                                        Model T-shirt</p>
                                </div>
                                <div class="block-brief__column">
                                    <h6>
                                        Non-standard branded media
                                    </h6>
                                    <p>5 individual carriers</p>
                                    <h6>
                                        Final files
                                    </h6>
                                    <p>Layered vectors (EPS, AI) <br>
                                        Screen quality (PNG, JPEG, PDF) <br>
                                        Preview of product <br>
                                        Fonts <span>(If you want to use paid fonts - provide
											the client's documents, about the purchased
											font and confirm its consent)</span> <br>
                                        Text in logos should be converted to outlines.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    @include("customer.contest.competition.image");
@endsection