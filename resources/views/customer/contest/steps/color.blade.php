@extends("layouts.main")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="title">
                <h1>Сonstruct the project</h1>
            </div>
            <div class="wrp-step">
                <div class="step activ"><span class="step-text">1. Price</span></div>
                <div class="step activ"><span class="step-text">2. Type</span></div>
                <div class="step activ"><span class="step-text">3. Color</span></div>
                <div class="step"><span class="step-text">4. Style</span></div>
                <div class="step"><span class="step-text">5. Brief</span></div>
                <div class="step"><span class="step-text">6. Condition</span></div>
            </div>
            <div class="wrp-mob-step">
                <button class="nav left">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="mob-step"><span>1/6 Price</span></div>
                <div class="mob-step"><span>2/6 Type</span></div>
                <div class="mob-step activ"><span>3/6 Color</span></div>
                <div class="mob-step"><span>4/6 Style</span></div>
                <div class="mob-step"><span>5/6 Color</span></div>
                <div class="mob-step"><span>6/6 Color</span></div>
                <button class="nav right">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <div class="col-12">
					<span class="cnst-subtitle">
						Choose colours
					</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="wrp-block wrp-block--thr">
            </div>
            <div class="color-content">
                <input class="color-text" name="color" placeholder="#FFAD17">
                <div class="color-name color-name--f"></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="wrp-block wrp-block--thr">
            </div>
            <div class="color-content">
                <input class="color-text" name="color"  placeholder="#FFAD17">
                <div class="color-name color-name--se"></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="wrp-block wrp-block--thr">
            </div>
            <div class="color-content">
                <input class="color-text" name="color"  placeholder="#FFAD17">
                <div class="color-name color-name--th"></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="wrp-block wrp-block--thr">
                <div class="cnt-block">
                    <i class="fas fa-plus"></i>
                </div>
                <span class="cnt-text">
							Add<br>one
						</span>
            </div>
            <div class="color-content">
                <input class="color-text" name="color" placeholder="#FFFFFF">
                <div class="color-name color-name--fo"></div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button class="cnstr-next">Next</button>
        </div>
    </div>
@endsection
