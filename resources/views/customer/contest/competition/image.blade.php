
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
                    <input type="file" id="upload-work" name="work" required class="popup-upload__input" hidden>
                    <svg class="block-brief__download-icon">
                        <use href="img/icons/icons.svg#arrow-down"></use>
                    </svg>
                    <span id="show-name">Upload file <br>
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