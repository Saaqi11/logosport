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
                <div class="step activ"><span class="step-text">4. Style</span></div>
                <div class="step"><span class="step-text">5. Brief</span></div>
                <div class="step"><span class="step-text">6. Condition</span></div>
            </div>
            <div class="wrp-mob-step">
                <button class="nav left">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="mob-step"><span>1/6 Price</span></div>
                <div class="mob-step"><span>2/6 Type</span></div>
                <div class="mob-step"><span>3/6 Color</span></div>
                <div class="mob-step activ"><span>4/6 Style</span></div>
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
    <form action="{{ route("customer.contest.style.save", $id) }}" method="post" id="style-form">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="my-row">
                    <span class="r-title">Economy</span>
                    <div class="wrp-plz">
                        <input type="range" class="r1 contest-slider" oninput="test()" value="0">
                        <div class="color"></div>
                        <input type="hidden" name="style[]" value="0">
                        <input type="text" id="t-color" class="i1" value="0%" readonly>
                        <input type="text" class="i2" value="0%" readonly>
                    </div>
                    <span class="r-name">Rick</span>
                </div>
                <div class="my-row">
                    <span class="r-title">Female</span>
                    <div class="wrp-plz">
                        <input type="range" class="r1 contest-slider" oninput="test()" value="0">
                        <div class="color"></div>
                        <input type="hidden" name="style[]" value="0">
                        <input type="text" class="i1" value="0%" readonly>
                        <input type="text" class="i2" value="0%" readonly>
                    </div>
                    <span class="r-name">Male</span>
                </div>
                <div class="my-row">
                    <span class="r-title">Young</span>
                    <div class="wrp-plz">
                        <input type="range" class="r1 contest-slider" oninput="test()" value="0">
                        <div class="color"></div>
                        <input type="hidden" name="style[]" value="0">
                        <input type="text" class="i1" value="0%" readonly>
                        <input type="text" class="i2" value="0%" readonly>
                    </div>
                    <span class="r-name">Maturity</span>
                </div>
                <div class="my-row">
                    <span class="r-title">Moder</span>
                    <div class="wrp-plz">
                        <input type="range" class="r1 contest-slider" oninput="test()" value="0">
                        <div class="color"></div>
                        <input type="hidden" name="style[]" value="0">
                        <input type="text" class="i1" value="0%" readonly>
                        <input type="text" class="i2" value="0%" readonly>
                    </div>
                    <span class="r-name">Classic</span>
                </div>
                <div class="my-row">
                    <span class="r-title">Playfulness</span>
                    <div class="wrp-plz">
                        <input type="range" class="r1 contest-slider" oninput="test()" value="0">
                        <div class="color"></div>
                        <input type="hidden" name="style[]" value="0">
                        <input type="text" class="i1" value="0%" readonly>
                        <input type="text" class="i2" value="0%" readonly>
                    </div>
                    <span class="r-name">Gravity</span>
                </div>
                <div class="my-row">
                    <span class="r-title">Subtlety</span>
                    <div class="wrp-plz">
                        <input type="range" class="r1 contest-slider" oninput="test()" value="0">
                        <div class="color"></div>
                        <input type="hidden" name="style[]" value="0">
                        <input type="text" class="i1" value="0%" readonly>
                        <input type="text" class="i2" value="0%" readonly>
                    </div>
                    <span class="r-name">Obviousness</span>
                </div>
                <div class="my-row">
                    <span class="r-title">Brevity</span>
                    <div class="wrp-plz">
                        <input type="range" class="r1 contest-slider" oninput="test()" value="0">
                        <div class="color"></div>
                        <input type="hidden" name="style[]" value="0">
                        <input type="text" class="i1" value="0%" readonly>
                        <input type="text" class="i2" value="0%" readonly>
                    </div>
                    <span class="r-name">Agressiveness</span>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button class="cnstr-next style-form-save">Next</button>
        </div>
    </div>
@endsection
