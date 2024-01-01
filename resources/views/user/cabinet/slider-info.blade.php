<div class="bg-popup">
    <div class="wrp-slider wrp-slider--popup">
        <div class="slider">
            <div id="additionalCarousel" class="carousel slide" data-ride="carousel" >
                <div class="carousel-inner">
                    @foreach ($work->files as $file)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="d-block w-100" style="height: 450px" src="{{ env('APP_URL') }}/{{ $file->src }}" alt="">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#additionalCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#additionalCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="info-slider">
            <a href="#" class="cancel-btn cancel-info-btn">
                <i class="far fa-times-circle"></i>
            </a>
            <div class="block-creator">
                <div class="title-slider">
                    <h4>Designer</h4>
                </div>
                <div class="creator-info">
                    <img src="images/profile-img.png" alt="" class="user-img">
                    <div class="user-text">
                        <p class="user-name">{{$work->designer->first_name}} {{$work->designer->last_name}}</p>
                        <p class="user-date">{{$work->created_at}}</p>
                    </div>
                </div>
                <p class="creator-text mb-10">
                    Place: <span>
                        @if ($work->place == 1)
                            1st
                        @elseif ($work->place == 2)
                            2nd
                        @else
                            3rd
                        @endif
                    </span>
                </p>
                <p class="creator-text mb-30">
                    Reward: <span>{{$work->reward}}$</span>
                </p>
                <div class="title-slider">
                    <h4>Сustomer</h4>
                </div>
                <div class="creator-info">
                    <img src="images/profile-img-2.png" alt="" class="user-img">
                    <div class="user-text">
                        <span class="user-name">{{$work->contest->customer->first_name}} {{$work->contest->customer->last_name}}</span>
                        <span class="user-date">{{$work->created_at}}</span>
                    </div>
                    
                </div>
                <p class="creator-text mb-30">
                    Company Name: <span>{{$work->context->company_name ?? ''}}</span>
                </p>
                <p class="customer-text mb-10">
                    About:
                    <span>{{$work->context->company_about ?? ''}}
                    </span>
                </p>
                {{-- <p class="customer-text">
                    Tehnology company
                </p> --}}
            </div>
            <div class="block-customer"></div>
        </div>
    </div>
</div>
