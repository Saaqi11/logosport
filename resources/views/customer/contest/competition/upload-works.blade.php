@extends('layouts.competition-main')
@section('content')
    <div class="wrapper">
        <main class="page">
            <section class="profile profile--dsg">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="wrp-contest">
                                <div class="title">
                                    <h1>Design for tehnology company</h1>
                                </div>
                                <div class="contest-list">
                                    <span class="n-round">
                                        @php
                                            $expiresAt = \Carbon\Carbon::parse($work->expires_at);
                                            $now = \Carbon\Carbon::now();
                                            $diff = $expiresAt->diff($now);
                                        @endphp

                                        {{ $diff->days }} day{{ $diff->days != 1 ? 's' : '' }},
                                        {{ $diff->h }} hour{{ $diff->h != 1 ? 's' : '' }} to deadline
                                    </span>
                                    <button class="btn-design">Write to customer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $media = $winnerFiles['media'] ?? null;
                    @endphp
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Logotype
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="logo_type1">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="logo_type1" name="logo_type1"
                                                    class="winner-file logotype 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['logotype']) && isset($media['logotype'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['logotype'][0]['file']);
                                    @endphp
                                    @if ($media['logotype'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['logotype'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="logo_type1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="logo_type1" name="logo_type1"
                                                class="winner-file logotype 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            eps
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="logo_type2">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="logo_type2" name="logo_type2"
                                                    class="winner-file logotype 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['logotype']) && isset($media['logotype'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['logotype'][1]['file']);
                                    @endphp
                                    @if ($media['logotype'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['logotype'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="logo_type2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="logo_type2" name="logo_type2"
                                                class="winner-file logotype 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="logo_type3">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="logo_type3" name="logo_type3"
                                                    class="winner-file logotype 3" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['logotype']) && isset($media['logotype'][2]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['logotype'][2]['file']);
                                    @endphp
                                    @if ($media['logotype'][2]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['logotype'][2]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="logo_type3">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="logo_type3" name="logo_type3"
                                                class="winner-file logotype 3" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Company color palette
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="palette1">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="palette1" name="palette1"
                                                    class="winner-file palette 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['palette']) && isset($media['palette'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['palette'][0]['file']);
                                    @endphp
                                    @if ($media['palette'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['palette'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="palette1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="palette1" name="palette1"
                                                class="winner-file palette 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="palette2">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="palette2" name="palette2"
                                                    class="winner-file palette 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['palette']) && isset($media['palette'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['palette'][1]['file']);
                                    @endphp
                                    @if ($media['palette'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['palette'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                @endif
                                <label style="display: contents" for="palette2">
                                    @if (auth()->user()->user_type == 'Designer')
                                        <input type="file" id="palette2" name="palette2"
                                            class="winner-file palette 2" hidden>
                                    @endif
                                    <i class="fas fa-arrow-down"></i>
                                    <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                </label>
                                <div class="file-type">
                                    <span class="text">
                                        png
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Map of branded fonts
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="font1">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="font1" name="font1"
                                                    class="winner-file font 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['font']) && isset($media['font'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['font'][0]['file']);
                                    @endphp
                                    @if ($media['font'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['font'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="font1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="font1" name="font1"
                                                class="winner-file font 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="font1">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="font1" name="font1"
                                                    class="winner-file font 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['font']) && isset($media['font'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['font'][1]['file']);
                                    @endphp
                                    @if ($media['font'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['font'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="font2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="font2" name="font2"
                                                class="winner-file font 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Design of letterhead
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="letter_head1">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="letter_head1" name="letter_head1"
                                                    class="winner-file letterhead 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['letterhead']) && isset($media['letterhead'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['letterhead'][0]['file']);
                                    @endphp
                                    @if ($media['letterhead'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['letterhead'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="letter_head1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="letter_head1" name="letter_head1"
                                                class="winner-file letterhead 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="letter_head1">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="letter_head1" name="letter_head1"
                                                    class="winner-file letterhead 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['letterhead']) && isset($media['letterhead'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['letterhead'][1]['file']);
                                    @endphp
                                    @if ($media['letterhead'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['letterhead'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="letter_head2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="letter_head2" name="letter_head2"
                                                class="winner-file letterhead 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Corporate business card
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="business_card1">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="business_card1" name="business_card1"
                                                    class="winner-file businessCard 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['businessCard']) && isset($media['businessCard'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['businessCard'][0]['file']);
                                    @endphp
                                    @if ($media['businessCard'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['businessCard'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="business_card1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="business_card1" name="business_card1"
                                                class="winner-file businessCard 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="business_card1">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="business_card1" name="business_card1"
                                                    class="winner-file businessCard 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['businessCard']) && isset($media['businessCard'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['businessCard'][1]['file']);
                                    @endphp
                                    @if ($media['businessCard'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['businessCard'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="business_card2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="business_card2" name="business_card2"
                                                class="winner-file businessCard 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Pattern
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="Pattern">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="Pattern" name="Pattern"
                                                    class="winner-file Pattern 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['Pattern']) && isset($media['Pattern'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['Pattern'][0]['file']);
                                    @endphp
                                    @if ($media['Pattern'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['Pattern'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="Pattern1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="Pattern1" name="Pattern1"
                                                class="winner-file Pattern 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="Pattern">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="Pattern" name="Pattern"
                                                    class="winner-file Pattern 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['Pattern']) && isset($media['Pattern'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['Pattern'][1]['file']);
                                    @endphp
                                    @if ($media['Pattern'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['Pattern'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="Pattern2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="Pattern2" name="Pattern2"
                                                class="winner-file Pattern 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Favicon for the site
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="site">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="site" name="site"
                                                    class="winner-file site 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['site']) && isset($media['site'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['site'][0]['file']);
                                    @endphp
                                    @if ($media['site'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['site'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="site1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="site1" name="site1"
                                                class="winner-file site 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="site">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="site" name="site"
                                                    class="winner-file site 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['site']) && isset($media['site'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['site'][1]['file']);
                                    @endphp
                                    @if ($media['site'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['site'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="site2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="site2" name="site2"
                                                class="winner-file site 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Design of Facebook account
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="account">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="account" name="account"
                                                    class="winner-file account 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['account']) && isset($media['account'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['account'][0]['file']);
                                    @endphp
                                    @if ($media['account'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['account'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="account1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="account1" name="account1"
                                                class="winner-file account 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="account">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="account" name="account"
                                                    class="winner-file account 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['account']) && isset($media['account'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['account'][1]['file']);
                                    @endphp
                                    @if ($media['account'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['account'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="account2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="account2" name="account2"
                                                class="winner-file account 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Model of company labels
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="companyLabel">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="companyLabel" name="companyLabel"
                                                    class="winner-file companyLabel 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['companyLabel']) && isset($media['companyLabel'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['companyLabel'][0]['file']);
                                    @endphp
                                    @if ($media['companyLabel'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['companyLabel'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="company_label1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="company_label1" name="company_label1"
                                                class="winner-file companyLabel 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="companyLabel">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="companyLabel" name="companyLabel"
                                                    class="winner-file companyLabel 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['companyLabel']) && isset($media['companyLabel'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['companyLabel'][1]['file']);
                                    @endphp
                                    @if ($media['companyLabel'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['companyLabel'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="company_label2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="company_label2" name="company_label2"
                                                class="winner-file companyLabel 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Icon layout with your logo
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="layoutLogo">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="layoutLogo" name="layoutLogo"
                                                    class="winner-file layoutLogo 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['layoutLogo']) && isset($media['layoutLogo'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['layoutLogo'][0]['file']);
                                    @endphp
                                    @if ($media['layoutLogo'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['layoutLogo'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="layout_logo1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="layout_logo1" name="layout_logo1"
                                                class="winner-file layoutLogo 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="layoutLogo">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="layoutLogo" name="layoutLogo"
                                                    class="winner-file layoutLogo 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['layoutLogo']) && isset($media['layoutLogo'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['layoutLogo'][1]['file']);
                                    @endphp
                                    @if ($media['layoutLogo'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['layoutLogo'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="layout_logo2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="layout_logo2" name="layout_logo2"
                                                class="winner-file layoutLogo 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Model T-shirt
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="tShirt">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="tShirt" name="tShirt"
                                                    class="winner-file tShirt 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['tShirt']) && isset($media['tShirt'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['tShirt'][1]['file']);
                                    @endphp
                                    @if ($media['tShirt'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['tShirt'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="t_shirt1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="t_shirt1" name="t_shirt1"
                                                class="winner-file tShirt 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="tShirt">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="tShirt" name="tShirt"
                                                    class="winner-file tShirt 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['tShirt']) && isset($media['tShirt'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['tShirt'][1]['file']);
                                    @endphp
                                    @if ($media['tShirt'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['tShirt'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="t_shirt2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="t_shirt2" name="t_shirt2"
                                                class="winner-file tShirt 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    5 individual carriers
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="carrier">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="carrier" name="carrier"
                                                    class="winner-file carrier 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['carrier']) && isset($media['carrier'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['carrier'][0]['file']);
                                    @endphp
                                    @if ($media['carrier'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['carrier'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="carrier1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="carrier1" name="carrier1"
                                                class="winner-file carrier 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="carrier">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="carrier" name="carrier"
                                                    class="winner-file carrier 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['carrier']) && isset($media['carrier'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['carrier'][1]['file']);
                                    @endphp
                                    @if ($media['carrier'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['carrier'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="carrier2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="carrier2" name="carrier2"
                                                class="winner-file carrier 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Preview of product
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="product">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="product" name="product"
                                                    class="winner-file product 1" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['product']) && isset($media['product'][0]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['product'][0]['file']);
                                    @endphp
                                    @if ($media['product'][0]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['product'][0]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="product1">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="product1" name="product1"
                                                class="winner-file product 1" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            ai
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="block-upload block-upload--dsg">
                                @if (auth()->user()->user_type == 'Designer')
                                    <label style="display: contents" for="product">
                                        <div class="icon icon-edit">
                                            <i class="fas fa-pencil-alt"></i>
                                            @if (auth()->user()->user_type == 'Designer')
                                                <input type="file" id="product" name="product"
                                                    class="winner-file product 2" hidden>
                                            @endif
                                        </div>
                                    </label>
                                @endif
                                @if (isset($media['product']) && isset($media['product'][1]))
                                    @php
                                        $file = explode('/', $winnerFiles['media']['product'][1]['file']);
                                    @endphp
                                    @if ($media['product'][1]['type'] == 'image')
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <img src="{{ asset($winnerFiles['media']['product'][1]['file']) }}"
                                                style="width: 100%; height: 100%" alt="">

                                        </a>
                                    @else
                                        <a
                                            href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                            <i class="fas fa-arrow-down d-block text-center"></i>
                                            <span>Download</span>
                                        </a>
                                    @endif
                                @else
                                    <label style="display: contents" for="product2">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="product2" name="product2"
                                                class="winner-file product 2" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet'}}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            png
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
