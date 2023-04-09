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
                                Design for tehnology company
                            </h2>
                        </div>
                        <div class="head-brief__items">
                            <div class="head-brief__item">
                                <p>Customer:
                                <div class="head-brief__profile profile-head">
                                    <button class="profile-head__button">
                                        akalikbergenov
                                    </button>
                                    <div class="profile-head__main">
                                        <div class="profile-head__top">
                                            <div class="profile-head__avatar-ibg">
                                                <div class="profile-head__online-time">
                                                    Was online 30 minuteas ago
                                                </div>
                                                <span class="profile-head__status online">

													</span>
                                                <picture><source srcset="img/other-img/avatar.webp" type="image/webp"><img src="img/other-img/avatar.png" alt=""></picture>
                                            </div>
                                            <div class="profile-head__info">
                                                <a href="" class="profile-head__link">
														<span class="profile-head__check">
															<svg class="profile-head__icon">
																<use href="img/icons/icons.svg#check-circle"></use>
															</svg>
														</span>
                                                    dmitryburnos
                                                </a>
                                                <div class="profile-head__name">
                                                    Дмитрий Бурнос
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
                                <p>1 day to the end</p>
                            </div>
                            <div class="head-brief__item">
                                <p>451 design concept</p>
                            </div>
                            <div class="head-brief__item">
                                <p>Part garanted</p>
                            </div>
                        </div>
                    </div>
                    <div data-da=".head-brief__items,768,1" class="head-brief__price price-head">
                        <div class="price-head__title">
                            Price : <span>700$</span>
                        </div>
                        <div class="price-head__info">
                            <div class="price-head__item">
                                Winner: <span>600$ (85%)</span>
                            </div>
                            <div class="price-head__item">
                                2nd place: <span>
										60$ (10%)
									</span>
                            </div>
                            <div class="price-head__item">
                                3rd place: <span>30$ (5%)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="brief__navigation navigation-brief">
                    <div class="navigation-brief__slider-wrap">
                        <div class="navigation-brief__slider swiper">
                            <div class="navigation-brief__wrapper swiper-wrapper">
                                <div class="navigation-brief__slide swiper-slide">
                                    <a href="">
                                        Brief
                                    </a>
                                </div>
                                <div class="navigation-brief__slide swiper-slide">
                                    <a class="active" href="">
                                        Round 1
                                    </a>
                                </div>
                                <div class="navigation-brief__slide swiper-slide">
                                    <a href="">
                                        Round 2
                                    </a>
                                </div>
                                <div class="navigation-brief__slide swiper-slide">
                                    <a href="">
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
                        <a href="" data-popup="#popup1" class="navigation-brief__button button button_border">
                            Add new work
                        </a>
                    </div>
                </div>
                <div class="brief__round">
                    <div class="brief__filter filter">
                        <div class="filter__items">
                            <div class="filter__item">
                                <a href="" class="filter__link active">
                                    All works
                                </a>
                            </div>
                            <div class="filter__item">
                                <a href="" class="filter__link">
                                    Delected works
                                </a>
                            </div>
                            <div class="filter__item">
                                <a href="" class="filter__link">
                                    Only logos
                                </a>
                            </div>
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
                    <div class="brief__card-grid-layout grid">
                        <div class="card-view hidden">
                            <div class="card-view__top">
                                <div class="card-view__image-ibg">
                                    <div class="card-view__hidden">
                                        <picture><source srcset="img/other-img/lock.webp" type="image/webp"><img src="img/other-img/lock.png" alt=""></picture>
                                        <span>
												Hidden
											</span>
                                    </div>
                                    <a href="" class="card-view__to-folder">
                                        <svg class="card-view__icon">
                                            <use href="img/icons/icons.svg#folder"></use>
                                        </svg>
                                        <span>View</span>
                                    </a>
                                    <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                </div>
                            </div>
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
                        </div>
                        <div class="card-view">
                            <div class="card-view__top">
                                <div class="card-view__image-ibg">
                                    <a href="" class="card-view__to-folder">
                                        <svg class="card-view__icon">
                                            <use href="img/icons/icons.svg#folder"></use>
                                        </svg>
                                        <span>View</span>
                                    </a>
                                    <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                </div>
                            </div>
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
                        </div>
                        <div class="card-view">
                            <div class="card-view__top">
                                <div class="card-view__image-ibg">
                                    <a href="" class="card-view__to-folder">
                                        <svg class="card-view__icon">
                                            <use href="img/icons/icons.svg#folder"></use>
                                        </svg>
                                        <span>View</span>
                                    </a>
                                    <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                </div>
                            </div>
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
                        </div>
                        <div class="card-view">
                            <div class="card-view__top">
                                <div class="card-view__image-ibg">
                                    <a href="" class="card-view__to-folder">
                                        <svg class="card-view__icon">
                                            <use href="img/icons/icons.svg#folder"></use>
                                        </svg>
                                        <span>View</span>
                                    </a>
                                    <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                </div>
                            </div>
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
                        </div>
                        <div class="card-view">
                            <div class="card-view__top">
                                <div class="card-view__image-ibg">
                                    <a href="" class="card-view__to-folder">
                                        <svg class="card-view__icon">
                                            <use href="img/icons/icons.svg#folder"></use>
                                        </svg>
                                        <span>View</span>
                                    </a>
                                    <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                </div>
                            </div>
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
                        </div>
                        <div class="card-view">
                            <div class="card-view__top">
                                <div class="card-view__image-ibg">
                                    <a href="" class="card-view__to-folder">
                                        <svg class="card-view__icon">
                                            <use href="img/icons/icons.svg#folder"></use>
                                        </svg>
                                        <span>View</span>
                                    </a>
                                    <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                </div>
                            </div>
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
                        </div>
                        <div class="card-view">
                            <div class="card-view__top">
                                <div class="card-view__image-ibg">
                                    <a href="" class="card-view__to-folder">
                                        <svg class="card-view__icon">
                                            <use href="img/icons/icons.svg#folder"></use>
                                        </svg>
                                        <span>View</span>
                                    </a>
                                    <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                </div>
                            </div>
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
                        </div>
                        <div class="card-view">
                            <div class="card-view__top">
                                <div class="card-view__image-ibg">
                                    <a href="" class="card-view__to-folder">
                                        <svg class="card-view__icon">
                                            <use href="img/icons/icons.svg#folder"></use>
                                        </svg>
                                        <span>View</span>
                                    </a>
                                    <picture><source srcset="img/other-img/logo.webp" type="image/webp"><img src="img/other-img/logo.jpg" alt=""></picture>
                                </div>
                            </div>
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
                        </div>
                    </div>
                    <div class="brief__pagging pagging">
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
        </section>
    </main>
</div>section
<div id="popup1" aria-hidden="true" class="popup">
    <div class="popup__wrapper">
        <div class="popup__content">
            <button data-close type="button" class="popup__close">
                <i class="fas fa-times"></i>
            </button>
            <div class="popup__title">
                Upload logo
            </div>
            <div class="popup__head-text">
                <p>
                    In black and white, for
                    <span class="popup__tippy tippy-popup">
							<span class="tippy-popup__text">
								example
							</span>
							<span class="tippy-popup__example">
								<img src="img/svg/logo2.svg" alt="">
							</span>
						</span>
                </p>
            </div>
            <form action="{{ route("competition.save.work", ["id" => $contest->id]) }}" class="popup__form" method="post">
                @csrf
                <label for="upload" class="block-brief__download-link popup-upload">
                    <input type="file" id="upload" class="popup-upload__input" hidden>
                    <svg class="block-brief__download-icon">
                        <use href="img/icons/icons.svg#arrow-down"></use>
                    </svg>
                    <span>Upload file <br>
							(.png)</span>
                </label>
                <div class="popup__text-bottom">
                    <p>Read and agree to the agreement on the transfer
                        of rights to the logo and everything that is attached to it.</p>
                </div>
                <div class="popup__buttons">
                    <button class="popup__button button ">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection