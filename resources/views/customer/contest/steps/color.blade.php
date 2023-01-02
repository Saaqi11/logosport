@extends("layouts.main")
@section("content")
    <style>
        input[type="color"] {
            -webkit-appearance: none;
            border: none !important;
            padding: 0 !important;
        }
        input[type="color"]::-webkit-color-swatch-wrapper {
            padding: 0 !important;
        }
        input[type="color"]::-webkit-color-swatch {
            border: none !important;
        }
        input[type="color"]:hover {
            cursor: pointer;
        }
        .delete-color {
            line-height: 12px;
            width: 25px;
            font-size: 8pt;
            font-family: tahoma;
            margin-top: 1px;
            margin-right: 2px;
            position: absolute;
            top: 0px;
            border: 1px solid;
            right: -5px;
            color: red;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            padding: 5px;
            height: 25px;
            background-color: white;
        }
    </style>
    <div class="row">
        <div class="col-12">
            <div class="title">
                <h1>LAUNCH THE CONTEST</h1>
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
                CHOOSE OR SELECT TO PICK COLORS <span style="font-size: 14px !important;">(If you will add wrong hex code of colour, it will mark it black as default)</span>
            </span>
        </div>
    </div>
    <form action="{{ route("customer.contest.color.save", $id) }}" method="post" id="color-form">
        @csrf
        <div class="row" id="color-section">
            <div class="col-lg-3 col-md-6 col-sm-12 col">
                <div class="color-content">
                    <input type="text" class="color-text" value="#4ac420" style="height: 100%">
                    <input type="color" class="color-name color-name--f" name="color[]" value="#4ac420" style="height: 100%">
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 col">
                <div class="color-content add-color">
                    <div class="cnt-block">
                        <i class="fas fa-plus"></i>
                        Add One
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button class="cnstr-next save-color-content">Next</button>
        </div>
    </div>
@endsection
