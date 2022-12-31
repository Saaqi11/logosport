@extends("layouts.main")
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="title">
                <h1>Launch the Contest</h1>
            </div>
            <div class="wrp-step">
                <div class="step activ"><span class="step-text">1. Price</span></div>
                <div class="step activ"><span class="step-text">2. Type</span></div>
                <div class="step"><span class="step-text">3. Color</span></div>
                <div class="step"><span class="step-text">4. Style</span></div>
                <div class="step"><span class="step-text">5. Brief</span></div>
                <div class="step"><span class="step-text">6. Condition</span></div>
            </div>
            <div class="wrp-mob-step">
                <button class="nav left">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <div class="mob-step"><span>1/6 Price</span></div>
                <div class="mob-step activ"><span>2/6 Type</span></div>
                <div class="mob-step"><span>3/6 Color</span></div>
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
						Upload the logos what you like <span>(4/4)</span>
					</span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <!--begin::Form-->
            <form class="form" action="{{ route("customer.contest.type.save", $contest->id) }}" method="post" id="type-form">
                @csrf
                <input type="hidden" name="base64_images" id="base64_images">

                <!--begin::Input group-->
                <div class="dotted-dropzone">
                    <div id="dropzone-area">
                        <div id="preview-template" style="display: none;">
                            <div class="dz-preview dz-file-preview">
                                <div class="dz-image">
                                    <IMG data-dz-thumbnail="">
                                </div>
                                <div class="dz-remove">
                                    <a href="javascript:undefined;" class="btn-action btn-del" data-dz-remove="">
                                        <i class="fa fa-trash" aria-hidden="true"  data-dz-remove=""></i>
                                    </a>
                                </div>
                                <div class="dz-progress">
                                    <SPAN class="dz-upload" data-dz-uploadprogress=""></SPAN>
                                </div>
                                <div class="dz-error-message">
                                    <SPAN data-dz-errormessage=""></SPAN>
                                </div>
                            </div>
                        </div>
                        <div class="dz-message needsclick append-area">
                            <label class="tg-fileuploadlabel" for="tg-photogallery">
                                <h3>Drop files here to upload</h3>
                                <span>Or</span>
                                <span class="btn btn-common">Click to upload</span>
                                <span>Maximum upload file size: 1 MB</span>
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="dropzone-text-area" style="text-align: center; display: none;">Drop files here or Click to Upload</div>
                </div>
                <input type="hidden" name="default_logos" id="default_logos">
                <!--end::Input group-->
            </form>
            <!--end::Form-->
        </div>
    </div>
    <div id="select-logos-section" style="display: none">
        <div class="row">
            <div class="col-12">
                <span class="cnst-subtitle">
                    Select the logos what you like <span>(4/4)</span>
                </span>
            </div>
        </div>
        <div class="row" >
            @if(!empty($defaultLogos))
                @foreach($defaultLogos as $logo)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="wrp-block wrp-block--like" style="background-image: url('{{ asset($logo->src) }}'); background-size: 100% 100%;">
                            <input type="hidden" name="default_image_id" class="default-image-id" value="{{ $logo->id }}">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            <button class="cnstr-select">Or select from the list</button>
            <button class="cnstr-next">Next</button>
        </div>
    </div>
@endsection
