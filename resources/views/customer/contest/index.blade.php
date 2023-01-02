@extends("layouts.main")
@section("contest")
    <div class="wrapper">
        <main class="page">
            <section class="contest">
                <div class="contest__container">
                    <div class="contest__head">
                        <h1 class="title contest__title">
                            My contest
                        </h1>
                        <a href="" data-popup="#popup2" class="contest__add-button button button_border">
                            Add new contest
                        </a>
                    </div>
                    <div class="contest__navigation">
                        <a href="" class="contest__navigation-link ">
                            All
                        </a>
                        <a href="" class="contest__navigation-link active">
                            Finished
                        </a>
                    </div>
                    <div data-spollers class=" contest__spollers contest-spollers">
                        <div data-spollers-item class="contest-spollers__item">
                            <div class="contest-spollers__head spollers-head">
								<span class="spollers-head__button">

								</span>
                                <div class="spollers-head__left">
                                    <h4 class="spollers-head__title">
                                        Design for tehnology company
                                    </h4>
                                    <div class="spollers-head__items">
										<span>
											Round 1
										</span>
                                        <span>2 days to next step</span>
                                        <span> 451 design concept</span>
                                        <span>45 logos selected</span>
                                    </div>
                                </div>
                                <div class="spollers-head__right">
                                    <div class="spollers-head__links">
                                        <a href="" data-popup='#popup3' class="spollers-head__link">
                                            Promote to top
                                        </a>
                                        <a data-popup='#popup-transaction' href="" class="spollers-head__link">
                                            Transaction
                                        </a>
                                        <a data-popup="#popup-cancel" href="" class="spollers-head__link">
                                            Cancel project
                                        </a>
                                    </div>
                                    <button type="button" data-spoller class="contest-spollers__title"><svg class="contest-spollers__icon">
                                            <use href="img/icons/icons.svg#angle-down"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div data-spollers-body class="contest-spollers__body">
                                <div class="contest-spollers__wrap">
                                    <div class="contest-spollers__filter filter">
                                        <div class="filter__items">
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    All works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Favorites
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Delected works
                                                </a>
                                            </div>
                                            <div class="filter__select">
                                                <select data-pseudo-label="Sort by:" name="form[]" data-class-modif="filter" class="form">
                                                    <option value="1" selected>default </option>
                                                    <option value="2">Last</option>
                                                    <option value="3">Rating</option>
                                                    <option value="4">Likes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class=" avatar-info">
                                            <div class="avatar-info__image-ibg">
                                                <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                            </div>
                                            <div class="avatar-info__content">
                                                <div class="avatar-info__name">
                                                    dmitryburnos
                                                </div>
                                                <div class="avatar-info__items">
                                                    <div class="avatar-info__item">
                                                        <svg class="avatar-info__icon">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>1241</span>
                                                    </div>
                                                    <div class="avatar-info__item"><span>
															21 works
														</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sliders-brief__slider swiper">
                                            <div class="sliders-brief__wrapper swiper-wrapper">
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <div class="card__place">
                                                                    <img src="img/svg/medal1.svg" alt="">
                                                                </div>
                                                            </div>
                                                            <a href="" class="card__files-button button button_border">
                                                                Files
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sliders-brief__scrollbar"></div>
                                        </div>
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class=" avatar-info">
                                            <div class="avatar-info__image-ibg">
                                                <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                            </div>
                                            <div class="avatar-info__content">
                                                <div class="avatar-info__name">
                                                    dmitryburnos
                                                </div>
                                                <div class="avatar-info__items">
                                                    <div class="avatar-info__item">
                                                        <svg class="avatar-info__icon">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>1241</span>
                                                    </div>
                                                    <div class="avatar-info__item"><span>
															21 works
														</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sliders-brief__slider swiper">
                                            <div class="sliders-brief__wrapper swiper-wrapper">
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <div class="card__place">
                                                                    <img src="img/svg/medal2.svg" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="sliders-brief__scrollbar"></div>
                                        </div>
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class=" avatar-info">
                                            <div class="avatar-info__image-ibg">
                                                <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                            </div>
                                            <div class="avatar-info__content">
                                                <div class="avatar-info__name">
                                                    dmitryburnos
                                                </div>
                                                <div class="avatar-info__items">
                                                    <div class="avatar-info__item">
                                                        <svg class="avatar-info__icon">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>1241</span>
                                                    </div>
                                                    <div class="avatar-info__item"><span>
															21 works
														</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brief__card-grid-layout grid">
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a data-popup="#popup-delete" href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a data-popup="#popup-delete" href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a data-popup="#popup-delete" href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a data-popup="#popup-delete" href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__pagging pagging">
                                            <a href="" class="pagging__arrow arrow prev disabled">
                                                <span></span>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="" class="active">
                                                        1
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        ...
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        24
                                                    </a>
                                                </li>
                                            </ul>
                                            <a href="" class="pagging__arrow arrow next">
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-spollers-item class="contest-spollers__item">
                            <div class="contest-spollers__head spollers-head ">
								<span class="spollers-head__button">
								</span>
                                <div class="spollers-head__left spollers-head__left1">
                                    <h4 class="spollers-head__title">
                                        Design for travel company
                                    </h4>
                                    <div class="spollers-head__items">
										<span>
											Round 1
										</span>
                                        <span>1 days to next step</span>
                                        <span> 0 design concept</span>
                                        <span>45 logos selected</span>
                                    </div>
                                </div>
                                <div class="spollers-head__right">
                                    <div class="spollers-head__links">
                                        <a href="" class="spollers-head__link">
                                            Cancel project
                                        </a>
                                        <a data-da=".spollers-head__left1,768,2" href="" class="spollers-head__link spollers-head__link_payment button">
                                            Payment
                                        </a>
                                    </div>
                                    <button type="button" data-spoller class="contest-spollers__title"><svg class="contest-spollers__icon">
                                            <use href="img/icons/icons.svg#angle-down"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div data-spollers-body class="contest-spollers__body">
                                <div class="contest-spollers__wrap">
                                    <div class="contest-spollers__filter filter">
                                        <div class="filter__items">
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    All works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Favorites
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Delected works
                                                </a>
                                            </div>
                                            <div class="filter__select">
                                                <select data-pseudo-label="Sort by:" name="form[]" data-class-modif="filter" class="form">
                                                    <option value="1" selected>default </option>
                                                    <option value="2">Last</option>
                                                    <option value="3">Rating</option>
                                                    <option value="4">Likes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class=" avatar-info">
                                            <div class="avatar-info__image-ibg">
                                                <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                            </div>
                                            <div class="avatar-info__content">
                                                <div class="avatar-info__name">
                                                    dmitryburnos
                                                </div>
                                                <div class="avatar-info__items">
                                                    <div class="avatar-info__item">
                                                        <svg class="avatar-info__icon">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>1241</span>
                                                    </div>
                                                    <div class="avatar-info__item"><span>
															21 works
														</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sliders-brief__slider swiper">
                                            <div class="sliders-brief__wrapper swiper-wrapper">
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <div class="card__place">
                                                                    <img src="img/svg/medal1.svg" alt="">
                                                                </div>
                                                            </div>
                                                            <a href="" class="card__files-button button button_border">
                                                                Files
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sliders-brief__scrollbar"></div>
                                        </div>
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class=" avatar-info">
                                            <div class="avatar-info__image-ibg">
                                                <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                            </div>
                                            <div class="avatar-info__content">
                                                <div class="avatar-info__name">
                                                    dmitryburnos
                                                </div>
                                                <div class="avatar-info__items">
                                                    <div class="avatar-info__item">
                                                        <svg class="avatar-info__icon">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>1241</span>
                                                    </div>
                                                    <div class="avatar-info__item"><span>
															21 works
														</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sliders-brief__slider swiper">
                                            <div class="sliders-brief__wrapper swiper-wrapper">
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <div class="card__place">
                                                                    <img src="img/svg/medal2.svg" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sliders-brief__slide swiper-slide">
                                                    <div class="card">
                                                        <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                            <img src="img/svg/logo.svg" alt="">
                                                        </a>
                                                        <div class="card__bottom">
                                                            <div class="card__buttons flex-start">
                                                                <a data-like href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#heart"></use>
                                                                    </svg>
                                                                </a>
                                                                <a href="" class="card__button">
                                                                    <svg class="card__button-icon">
                                                                        <use href="img/icons/icons.svg#star"></use>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="sliders-brief__scrollbar"></div>
                                        </div>
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class=" avatar-info">
                                            <div class="avatar-info__image-ibg">
                                                <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                            </div>
                                            <div class="avatar-info__content">
                                                <div class="avatar-info__name">
                                                    dmitryburnos
                                                </div>
                                                <div class="avatar-info__items">
                                                    <div class="avatar-info__item">
                                                        <svg class="avatar-info__icon">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>1241</span>
                                                    </div>
                                                    <div class="avatar-info__item"><span>
															21 works
														</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="brief__card-grid-layout grid">
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__pagging pagging">
                                            <a href="" class="pagging__arrow arrow prev disabled">
                                                <span></span>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="" class="active">
                                                        1
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        ...
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        24
                                                    </a>
                                                </li>
                                            </ul>
                                            <a href="" class="pagging__arrow arrow next">
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-spollers-item class="contest-spollers__item">
                            <div class="contest-spollers__head spollers-head">
								<span class="spollers-head__button">
								</span>
                                <div class="spollers-head__left">
                                    <h4 class="spollers-head__title">
                                        Design for building company
                                    </h4>
                                    <div class="spollers-head__items">
										<span>
											Round 1
										</span>
                                        <span>2 days to next step</span>
                                        <span> 451 design concept</span>
                                        <span>45 logos selected</span>
                                    </div>
                                </div>
                                <div class="spollers-head__right">
                                    <div class="spollers-head__links">
                                        <a href="" class="spollers-head__link">
                                            Promote to top
                                        </a>
                                        <a href="" class="spollers-head__link">
                                            Transaction
                                        </a>
                                        <a href="" class="spollers-head__link">
                                            Cancel project
                                        </a>
                                    </div>
                                    <button type="button" data-spoller class="contest-spollers__title"><svg class="contest-spollers__icon">
                                            <use href="img/icons/icons.svg#angle-down"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div data-spollers-body class="contest-spollers__body">
                                <div class="contest-spollers__wrap">
                                    <div class="contest-spollers__filter filter">
                                        <div class="filter__items">
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    All works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Favorites
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link active">
                                                    Only works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Delected works
                                                </a>
                                            </div>
                                            <div class="filter__select">
                                                <select data-pseudo-label="Sort by:" name="form[]" data-class-modif="filter" class="form">
                                                    <option value="1" selected>default </option>
                                                    <option value="2">Last</option>
                                                    <option value="3">Rating</option>
                                                    <option value="4">Likes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__selected-work">
											<span>
												45
											</span> logos selected
                                        </div>
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class="brief__card-grid-layout grid">
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__pagging pagging">
                                            <a href="" class="pagging__arrow arrow prev disabled">
                                                <span></span>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="" class="active">
                                                        1
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        ...
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        24
                                                    </a>
                                                </li>
                                            </ul>
                                            <a href="" class="pagging__arrow arrow next">
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-spollers-item class="contest-spollers__item">
                            <div class="contest-spollers__head spollers-head">
								<span class="spollers-head__button">
								</span>
                                <div class="spollers-head__left">
                                    <h4 class="spollers-head__title active">
                                        Design for building company
                                    </h4>
                                    <div class="spollers-head__items">
										<span>
											Round 1
										</span>
                                        <span>2 days to next step</span>
                                        <span> 451 design concept</span>
                                        <span>45 logos selected</span>
                                    </div>
                                </div>
                                <div class="spollers-head__right">
                                    <div class="spollers-head__links">
                                        <a href="" class="spollers-head__link">
                                            Promote to top
                                        </a>
                                        <a href="" class="spollers-head__link">
                                            Transaction
                                        </a>
                                        <a href="" class="spollers-head__link">
                                            Cancel project
                                        </a>
                                    </div>
                                    <button type="button" data-spoller class="contest-spollers__title"><svg class="contest-spollers__icon">
                                            <use href="img/icons/icons.svg#angle-down"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div data-spollers-body class="contest-spollers__body">
                                <div class="contest-spollers__wrap">
                                    <div class="contest-spollers__filter filter">
                                        <div class="filter__items">
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    All works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Favorites
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link active">
                                                    Only works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Delected works
                                                </a>
                                            </div>
                                            <div class="filter__select">
                                                <select data-pseudo-label="Sort by:" name="form[]" data-class-modif="filter" class="form">
                                                    <option value="1" selected>default </option>
                                                    <option value="2">Last</option>
                                                    <option value="3">Rating</option>
                                                    <option value="4">Likes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__selected-work">
											<span>
												45
											</span> logos selected
                                        </div>
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class="brief__card-grid-layout grid">
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__pagging pagging">
                                            <a href="" class="pagging__arrow arrow prev disabled">
                                                <span></span>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="" class="active">
                                                        1
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        ...
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        24
                                                    </a>
                                                </li>
                                            </ul>
                                            <a href="" class="pagging__arrow arrow next">
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-spollers-item class="contest-spollers__item">
                            <div class="contest-spollers__head spollers-head">
								<span class="spollers-head__button">
								</span>
                                <div class="spollers-head__left">
                                    <h4 class="spollers-head__title">
                                        Design for building company
                                    </h4>
                                    <div class="spollers-head__items">
										<span>
											Round 1
										</span>
                                        <span>2 days to next step</span>
                                        <span> 451 design concept</span>
                                        <span>45 logos selected</span>
                                    </div>
                                </div>
                                <div class="spollers-head__right">
                                    <div class="spollers-head__links">
                                        <a href="" class="spollers-head__link">
                                            Promote to top
                                        </a>
                                        <a href="" class="spollers-head__link">
                                            Transaction
                                        </a>
                                        <a href="" class="spollers-head__link">
                                            Cancel project
                                        </a>
                                    </div>
                                    <button type="button" data-spoller class="contest-spollers__title"><svg class="contest-spollers__icon">
                                            <use href="img/icons/icons.svg#angle-down"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div data-spollers-body class="contest-spollers__body">
                                <div class="contest-spollers__wrap">
                                    <div class="contest-spollers__filter filter">
                                        <div class="filter__items">
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    All works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Favorites
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link active">
                                                    Only works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Delected works
                                                </a>
                                            </div>
                                            <div class="filter__select">
                                                <select data-pseudo-label="Sort by:" name="form[]" data-class-modif="filter" class="form">
                                                    <option value="1" selected>default </option>
                                                    <option value="2">Last</option>
                                                    <option value="3">Rating</option>
                                                    <option value="4">Likes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__selected-work">
											<span class='red'>
												2
											</span> logos selected
                                        </div>
                                    </div>
                                    <div class="contest-spollers__info-label">
                                        You need to select a minimum of 5 works to the Round 2
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class="brief__card-grid-layout grid">
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#heart"></use>
                                                            </svg>
                                                        </a>
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#star"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__pagging pagging">
                                            <a href="" class="pagging__arrow arrow prev disabled">
                                                <span></span>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="" class="active">
                                                        1
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        ...
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        24
                                                    </a>
                                                </li>
                                            </ul>
                                            <a href="" class="pagging__arrow arrow next">
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-spollers-item class="contest-spollers__item">
                            <div class="contest-spollers__head spollers-head">
								<span class="spollers-head__button">
								</span>
                                <div class="spollers-head__left">
                                    <h4 class="spollers-head__title">
                                        Design for building company
                                    </h4>
                                    <div class="spollers-head__items">
										<span>
											Round 1
										</span>
                                        <span>2 days to next step</span>
                                        <span> 451 design concept</span>
                                        <span>45 logos selected</span>
                                    </div>
                                </div>
                                <div class="spollers-head__right">
                                    <div class="spollers-head__links">
                                        <a href="" class="spollers-head__link">
                                            Promote to top
                                        </a>
                                        <a href="" class="spollers-head__link">
                                            Transaction
                                        </a>
                                        <a href="" class="spollers-head__link">
                                            Cancel project
                                        </a>
                                    </div>
                                    <button type="button" data-spoller class="contest-spollers__title"><svg class="contest-spollers__icon">
                                            <use href="img/icons/icons.svg#angle-down"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div data-spollers-body class="contest-spollers__body">
                                <div class="contest-spollers__wrap">
                                    <div class="contest-spollers__filter filter">
                                        <div class="filter__items">
                                            <div class="filter__item">
                                                <a href="" class="filter__link active">
                                                    All works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Favorites
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link ">
                                                    Only works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Delected works
                                                </a>
                                            </div>
                                            <div class="filter__select">
                                                <select data-pseudo-label="Sort by:" name="form[]" data-class-modif="filter" class="form">
                                                    <option value="1" selected>default </option>
                                                    <option value="2">Last</option>
                                                    <option value="3">Rating</option>
                                                    <option value="4">Likes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__selected-work">
											<span>
												45
											</span> logos selected
                                        </div>
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class="brief__card-grid-layout grid">
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card-view__info">
                                                    <div class="card-view__avatar-ibg">
                                                        <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                                    </div>
                                                    <div class="card-view__info-author">
                                                        <div class="card-view__name">
                                                            dmitryburnos
                                                        </div>
                                                        <div class="card-view__items">
                                                            <div class="card-view__item">
                                                                <svg class="card-view__icon-heart">
                                                                    <use href="img/icons/icons.svg#heart"></use>
                                                                </svg>
                                                                <span>12 554</span>
                                                            </div>
                                                            <div class="card-view__item">
                                                                <span>51 works</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button ">
															<span class="card__folder-count">

																1
															</span>
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#folder"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card-view__info">
                                                    <div class="card-view__avatar-ibg">
                                                        <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                                    </div>
                                                    <div class="card-view__info-author">
                                                        <div class="card-view__name">
                                                            dmitryburnos
                                                        </div>
                                                        <div class="card-view__items">
                                                            <div class="card-view__item">
                                                                <svg class="card-view__icon-heart">
                                                                    <use href="img/icons/icons.svg#heart"></use>
                                                                </svg>
                                                                <span>12 554</span>
                                                            </div>
                                                            <div class="card-view__item">
                                                                <span>51 works</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button ">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#folder"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card-view__info">
                                                    <div class="card-view__avatar-ibg">
                                                        <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                                    </div>
                                                    <div class="card-view__info-author">
                                                        <div class="card-view__name">
                                                            dmitryburnos
                                                        </div>
                                                        <div class="card-view__items">
                                                            <div class="card-view__item">
                                                                <svg class="card-view__icon-heart">
                                                                    <use href="img/icons/icons.svg#heart"></use>
                                                                </svg>
                                                                <span>12 554</span>
                                                            </div>
                                                            <div class="card-view__item">
                                                                <span>51 works</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button ">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#folder"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card-view__info">
                                                    <div class="card-view__avatar-ibg">
                                                        <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                                    </div>
                                                    <div class="card-view__info-author">
                                                        <div class="card-view__name">
                                                            dmitryburnos
                                                        </div>
                                                        <div class="card-view__items">
                                                            <div class="card-view__item">
                                                                <svg class="card-view__icon-heart">
                                                                    <use href="img/icons/icons.svg#heart"></use>
                                                                </svg>
                                                                <span>12 554</span>
                                                            </div>
                                                            <div class="card-view__item">
                                                                <span>51 works</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button ">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#folder"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card-view__info">
                                                    <div class="card-view__avatar-ibg">
                                                        <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                                    </div>
                                                    <div class="card-view__info-author">
                                                        <div class="card-view__name">
                                                            dmitryburnos
                                                        </div>
                                                        <div class="card-view__items">
                                                            <div class="card-view__item">
                                                                <svg class="card-view__icon-heart">
                                                                    <use href="img/icons/icons.svg#heart"></use>
                                                                </svg>
                                                                <span>12 554</span>
                                                            </div>
                                                            <div class="card-view__item">
                                                                <span>51 works</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button ">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#folder"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card-view__info">
                                                    <div class="card-view__avatar-ibg">
                                                        <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                                    </div>
                                                    <div class="card-view__info-author">
                                                        <div class="card-view__name">
                                                            dmitryburnos
                                                        </div>
                                                        <div class="card-view__items">
                                                            <div class="card-view__item">
                                                                <svg class="card-view__icon-heart">
                                                                    <use href="img/icons/icons.svg#heart"></use>
                                                                </svg>
                                                                <span>12 554</span>
                                                            </div>
                                                            <div class="card-view__item">
                                                                <span>51 works</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button ">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#folder"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card-view__info">
                                                    <div class="card-view__avatar-ibg">
                                                        <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                                    </div>
                                                    <div class="card-view__info-author">
                                                        <div class="card-view__name">
                                                            dmitryburnos
                                                        </div>
                                                        <div class="card-view__items">
                                                            <div class="card-view__item">
                                                                <svg class="card-view__icon-heart">
                                                                    <use href="img/icons/icons.svg#heart"></use>
                                                                </svg>
                                                                <span>12 554</span>
                                                            </div>
                                                            <div class="card-view__item">
                                                                <span>51 works</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button ">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#folder"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <a data-gallery href="img/svg/logo.svg" class="card__image">
                                                    <img src="img/svg/logo.svg" alt="">
                                                </a>
                                                <div class="card-view__info">
                                                    <div class="card-view__avatar-ibg">
                                                        <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                                    </div>
                                                    <div class="card-view__info-author">
                                                        <div class="card-view__name">
                                                            dmitryburnos
                                                        </div>
                                                        <div class="card-view__items">
                                                            <div class="card-view__item">
                                                                <svg class="card-view__icon-heart">
                                                                    <use href="img/icons/icons.svg#heart"></use>
                                                                </svg>
                                                                <span>12 554</span>
                                                            </div>
                                                            <div class="card-view__item">
                                                                <span>51 works</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card__bottom">
                                                    <div class="card__buttons flex-start">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#angle-right"></use>
                                                            </svg>
                                                        </a>
                                                        <a data-like href="" class="card__button ">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#folder"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="card__send">
                                                            <a data-send href="" class="card__button">
                                                                <svg class="card__button-icon">
                                                                    <use href="img/icons/icons.svg#pencil-alt"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="card-send">
                                                                <form action="#" class="card-send__form">
                                                                    <textarea class="input card-send__textarea" placeholder="You message"></textarea>
                                                                    <button class="card-send__button ">
                                                                        Send
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card__buttons">
                                                        <a href="" class="card__button">
                                                            <svg class="card__button-icon">
                                                                <use href="img/icons/icons.svg#times"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="contest-spollers__pagging pagging">
                                            <a href="" class="pagging__arrow arrow prev disabled">
                                                <span></span>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="" class="active">
                                                        1
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        ...
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        24
                                                    </a>
                                                </li>
                                            </ul>
                                            <a href="" class="pagging__arrow arrow next">
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-spollers-item class="contest-spollers__item">
                            <div class="contest-spollers__head spollers-head">
								<span class="spollers-head__button">
								</span>
                                <div class="spollers-head__left">
                                    <h4 class="spollers-head__title">
                                        Design for building company
                                    </h4>
                                    <div class="spollers-head__items">
										<span>
											Round 1
										</span>
                                        <span>2 days to next step</span>
                                        <span> 451 design concept</span>
                                        <span>45 logos selected</span>
                                    </div>
                                </div>
                                <div class="spollers-head__right">
                                    <div class="spollers-head__links">
                                        <a href="" class="spollers-head__link">
                                            Promote to top
                                        </a>
                                        <a href="" class="spollers-head__link">
                                            Transaction
                                        </a>
                                        <a href="" class="spollers-head__link">
                                            Cancel project
                                        </a>
                                    </div>
                                    <button type="button" data-spoller class="contest-spollers__title"><svg class="contest-spollers__icon">
                                            <use href="img/icons/icons.svg#angle-down"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div data-spollers-body class="contest-spollers__body">
                                <div class="contest-spollers__wrap">
                                    <div class="contest-spollers__filter filter">
                                        <div class="filter__items">
                                            <div class="filter__item">
                                                <a href="" class="filter__link ">
                                                    All works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link">
                                                    Favorites
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link ">
                                                    Only works
                                                </a>
                                            </div>
                                            <div class="filter__item">
                                                <a href="" class="filter__link active">
                                                    Delected works
                                                </a>
                                            </div>
                                            <div class="filter__select">
                                                <select data-pseudo-label="Sort by:" name="form[]" data-class-modif="filter" class="form">
                                                    <option value="1" selected>default </option>
                                                    <option value="2">Last</option>
                                                    <option value="3">Rating</option>
                                                    <option value="4">Likes</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__selected-work">
											<span>
												45
											</span> logos selected
                                        </div>
                                    </div>
                                    <div class="contest-spollers__item-block">
                                        <div class="brief__card-grid-layout grid">
                                            <div class="card-view declined">
                                                <div class="card-view__top">
                                                    <div class="card-view__image-ibg">
                                                        <div class="card-view__declined">
                                                            Declined
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-view__info-project">
                                                    <h4>
                                                        Design for tehnology company
                                                    </h4>
                                                    <div class="card-view__item">
                                                        <svg class="card-view__icon-heart">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>17</span>
                                                    </div>
                                                </div>
                                                <div class="card-view__buttons">
                                                    <a href="" class="card-view__button">
                                                        <svg class="card-view__button-icon">
                                                            <use href="img/icons/icons.svg#plus"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-view declined">
                                                <div class="card-view__top">
                                                    <div class="card-view__image-ibg">
                                                        <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                                        <div class="card-view__declined">
                                                            Declined
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-view__info-project">
                                                    <h4>
                                                        Design for tehnology company
                                                    </h4>
                                                    <div class="card-view__item">
                                                        <svg class="card-view__icon-heart">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>17</span>
                                                    </div>
                                                </div>
                                                <div class="card-view__buttons">
                                                    <a href="" class="card-view__button">
                                                        <svg class="card-view__button-icon">
                                                            <use href="img/icons/icons.svg#plus"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-view declined">
                                                <div class="card-view__top">
                                                    <div class="card-view__image-ibg">
                                                        <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                                        <div class="card-view__declined">
                                                            Declined
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-view__info-project">
                                                    <h4>
                                                        Design for tehnology company
                                                    </h4>
                                                    <div class="card-view__item">
                                                        <svg class="card-view__icon-heart">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>17</span>
                                                    </div>
                                                </div>
                                                <div class="card-view__buttons">
                                                    <a href="" class="card-view__button">
                                                        <svg class="card-view__button-icon">
                                                            <use href="img/icons/icons.svg#plus"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-view declined">
                                                <div class="card-view__top">
                                                    <div class="card-view__image-ibg">
                                                        <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                                        <div class="card-view__declined">
                                                            Declined
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-view__info-project">
                                                    <h4>
                                                        Design for tehnology company
                                                    </h4>
                                                    <div class="card-view__item">
                                                        <svg class="card-view__icon-heart">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>17</span>
                                                    </div>
                                                </div>
                                                <div class="card-view__buttons">
                                                    <a href="" class="card-view__button">
                                                        <svg class="card-view__button-icon">
                                                            <use href="img/icons/icons.svg#plus"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-view declined">
                                                <div class="card-view__top">
                                                    <div class="card-view__image-ibg">
                                                        <div class="card-view__declined">
                                                            Declined
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-view__info-project">
                                                    <h4>
                                                        Design for tehnology company
                                                    </h4>
                                                    <div class="card-view__item">
                                                        <svg class="card-view__icon-heart">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>17</span>
                                                    </div>
                                                </div>
                                                <div class="card-view__buttons">
                                                    <a href="" class="card-view__button">
                                                        <svg class="card-view__button-icon">
                                                            <use href="img/icons/icons.svg#plus"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-view declined">
                                                <div class="card-view__top">
                                                    <div class="card-view__image-ibg">
                                                        <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                                        <div class="card-view__declined">
                                                            Declined
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-view__info-project">
                                                    <h4>
                                                        Design for tehnology company
                                                    </h4>
                                                    <div class="card-view__item">
                                                        <svg class="card-view__icon-heart">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>17</span>
                                                    </div>
                                                </div>
                                                <div class="card-view__buttons">
                                                    <a href="" class="card-view__button">
                                                        <svg class="card-view__button-icon">
                                                            <use href="img/icons/icons.svg#plus"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-view declined">
                                                <div class="card-view__top">
                                                    <div class="card-view__image-ibg">
                                                        <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                                        <div class="card-view__declined">
                                                            Declined
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-view__info-project">
                                                    <h4>
                                                        Design for tehnology company
                                                    </h4>
                                                    <div class="card-view__item">
                                                        <svg class="card-view__icon-heart">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>17</span>
                                                    </div>
                                                </div>
                                                <div class="card-view__buttons">
                                                    <a href="" class="card-view__button">
                                                        <svg class="card-view__button-icon">
                                                            <use href="img/icons/icons.svg#plus"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card-view declined">
                                                <div class="card-view__top">
                                                    <div class="card-view__image-ibg">
                                                        <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                                        <div class="card-view__declined">
                                                            Declined
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-view__info-project">
                                                    <h4>
                                                        Design for tehnology company
                                                    </h4>
                                                    <div class="card-view__item">
                                                        <svg class="card-view__icon-heart">
                                                            <use href="img/icons/icons.svg#heart"></use>
                                                        </svg>
                                                        <span>17</span>
                                                    </div>
                                                </div>
                                                <div class="card-view__buttons">
                                                    <a href="" class="card-view__button">
                                                        <svg class="card-view__button-icon">
                                                            <use href="img/icons/icons.svg#plus"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contest-spollers__pagging pagging">
                                            <a href="" class="pagging__arrow arrow prev disabled">
                                                <span></span>
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="" class="active">
                                                        1
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        2
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        3
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        ...
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        24
                                                    </a>
                                                </li>
                                            </ul>
                                            <a href="" class="pagging__arrow arrow next">
                                                <span></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            ]
        </main>
    </div>
@endsection
