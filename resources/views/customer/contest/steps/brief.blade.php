@extends("layouts.main")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="title">
                <h1>LAUNCH THE CONTEST</h1>
            </div>
            <div class="wrp-step">
                <div class="step activ"><span class="step-text">1. Price</span></div>
                <div class="step activ"><span class="step-text">2. Type</span></div>
                <div class="step activ"><span class="step-text">3. Color</span></div>
                <div class="step activ"><span class="step-text">4. Style</span></div>
                <div class="step activ"><span class="step-text">5. Brief</span></div>
                <div class="step"><span class="step-text">6. Condition</span></div>
            </div>
            <div class="wrp-mob-step">
                <button class="nav left">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="mob-step"><span>1/6 Price</span></div>
                <div class="mob-step"><span>2/6 Type</span></div>
                <div class="mob-step"><span>3/6 Color</span></div>
                <div class="mob-step"><span>4/6 Style</span></div>
                <div class="mob-step activ"><span>5/6 Brief</span></div>
                <div class="mob-step"><span>6/6 Color</span></div>
                <button class="nav right">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <div class="col-12">
            <span class="cnst-subtitle">
                Add Contest Details:
            </span>
        </div>
    </div>
    <form action="{{ route("customer.contest.brief.save", $id) }}" id="brief-form" class="row mb" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="wrp-brief">
						<span class="title-brief">
							Name of your company*
						</span>
                <input type="text" name="company_name" class="input-brief" required>
            </div>
            <div class="wrp-brief">
						<span class="title-brief">
							Do you have slogan?
						</span>
                <textarea name="slogan" class="input-brief"></textarea>
            </div>
            <div class="wrp-brief">
						<span class="title-brief">
							Do you have website?
						</span>
                <textarea name="website" class="input-brief"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="wrp-brief">
						<span class="title-brief">
							Choose your industry
						</span>
                <span class="my-tooltip">
							<i class="far fa-question-circle"
                               data-title="What type of industry do you have?"></i>
						</span>
                <div class="select-wrapper">
                    <i class="fas fa-angle-down"></i>
                    <select name="industry_type" class="select-brief" value="">
                        <option value="" selected disabled hidden> </option>
                        <option value="Accounting & Financial">Accounting & Financial</option>
                        <option value="Agriculture">Agriculture</option>
                        <option value="Animal & Pet">Animal & Pet</option>
                        <option value="Architectural">Architectural</option>
                        <option value="Art & Design">Art & Design</option>
                        <option value="Attorney & Law">Attorney & Law</option>
                        <option value="Automotive">Automotive</option>
                        <option value="Bar & Nightclub">Bar & Nightclub</option>
                        <option value="Business & Consulting">Business & Consulting</option>
                        <option value="Cleaning & Maintenance">Cleaning & Maintenance</option>
                        <option value="Communications">Communications</option>
                        <option value="Community & Non-Profit">Community & Non-Profit</option>
                        <option value="Computer">Computer</option>
                        <option value="Construction">Construction</option>
                        <option value="Cosmetics & Beauty">Cosmetics & Beauty</option>
                        <option value="Dating">Dating</option>
                        <option value="Education">Education</option>
                        <option value="Entertainment & The Arts">Entertainment & The Arts</option>
                        <option value="Environmental">Environmental</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Floral">Floral</option>
                        <option value="Food & Drink">Food & Drink</option>
                        <option value="Games & Recreational">Games & Recreational</option>
                        <option value="Home Furnishing">Home Furnishing</option>
                        <option value="Industrial">Industrial</option>
                        <option value="Internet">Internet</option>
                        <option value="Medical & Pharmaceutical">Medical & Pharmaceutical</option>
                        <option value="Photography">Photography</option>
                        <option value="Physical Fitness">Physical Fitness</option>
                        <option value="Political">Political</option>
                        <option value="Real Estate & Mortgage">Real Estate & Mortgage</option>
                        <option value="Religious">Religious</option>
                        <option value="Restaurant">Restaurant</option>
                        <option value="Retail">Retail</option>
                        <option value="Security">Security</option>
                        <option value="Spa & Esthetics">Spa & Esthetics</option>
                        <option value="Sport">Sport</option>
                        <option value="Technology">Technology</option>
                        <option value="Travel & Hotel">Travel & Hotel</option>
                        <option value="Wedding Service">Wedding Service</option>
                    </select>
                </div>
            </div>
            <div class="wrp-brief">
						<span class="title-brief">
							Describe any features of you company
						</span>
                <span class="my-tooltip">
							<i class="far fa-question-circle"
                               data-title="Describe any features of you company"></i>
						</span>
                <textarea name="company_features" class="input-brief"></textarea>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="wrp-brief">
						<span class="title-brief">
							What logotype you like to get?
						</span>
                <span class="my-tooltip">
							<i class="far fa-question-circle"
                               data-title="What logotype you like to get?"></i>
						</span>
                <textarea name="logo_type_likes" class="input-brief"></textarea>
            </div>
            <div class="wrp-brief">
						<span class="title-brief">
							What logotype you don’t like?
						</span>
                <span class="my-tooltip">
							<i class="far fa-question-circle"
                               data-title="What logotype you don’t like?"></i>
						</span>
                <textarea name="logo_type_unlikes" class="input-brief"></textarea>
            </div>
            <input type="file" name="doc_file" style="display: none" id="doc_file">
        </div>
    </form>
    <div class="row">
        <div class="col-12 d-flex justify-content-end align-items-center">
            <button class="brf-doc" id="file-name" style="display: none"></button>
            <button class="brf-file" id="attach-file">Attach file</button>
            <button class="cnstr-next brief-save-button">Next</button>
        </div>
    </div>
@endsection
