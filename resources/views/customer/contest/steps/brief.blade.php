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
							Name of your company
						</span>
                <input type="text" name="company_name" class="input-brief" >
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
            <div class="wrp-brief">
						<span class="title-brief">
							How much people in your company
						</span>
                <span class="my-tooltip">
							<i class="far fa-question-circle" data-title="How much people in your company works?"></i>
						</span>
                <div class="select-wrapper">
                    <i class="fas fa-angle-down"></i>
                    <select name="company_employees_range" class="select-brief" value="">
                        <option value="" selected disabled hidden> </option>
                        <option value="1">1</option>
                        <option value="1-10">1-10</option>
                        <option value="10-50">10-50</option>
                        <option value="50-100">50-100</option>
                        <option value="100-500">100-500</option>
                        <option value="500+">500+</option>
                    </select>
                </div>
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
                        <option value="Hard work">Hard work</option>
                        <option value="Easy work">Easy work</option>
                    </select>
                </div>
            </div>
            <div class="wrp-brief">
						<span class="title-brief">
							What your company do?
						</span>
                <span class="my-tooltip">
							<i class="far fa-question-circle"
                               data-title="What your company do?"></i>
						</span>
                <textarea name="company_about" class="input-brief"></textarea>
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
							What logotype you don???t like?
						</span>
                <span class="my-tooltip">
							<i class="far fa-question-circle"
                               data-title="What logotype you don???t like?"></i>
						</span>
                <textarea name="logo_type_unlikes" class="input-brief"></textarea>
            </div>
            <div class="wrp-brief">
						<span class="title-brief">
							What are the advantages of your company?
						</span>
                <span class="my-tooltip">
							<i class="far fa-question-circle"
                               data-title="What are the advantages of your company?"></i>
						</span>
                <textarea name="company_advantages" class="input-brief"></textarea>
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
