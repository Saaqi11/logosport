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

                    @if (auth()->user()->id == $work->contest->user_id)
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="wrp-contest justify-content-between">
                                    <span>
                                        <a href="{{ route('competition.distribute-reward.work', [$work->contest_id]) }}"
                                            class="btn-lg btn-success px-5">Confirm</a>
                                    </span>
                                    <span class="d-flex align-items-center" style="gap:20px;">
                                        <span style="font-weight: 900"> No of Request:
                                            {{ $winnerFiles->no_of_request ?? 0 }}
                                        </span>
                                        @if (isset($winnerFiles) && ($winnerFiles->no_of_request ?? 0) < 3)
                                            <a href="#" class="btn-lg btn-info" data-toggle="modal"
                                                data-target="#sendRequestWorkModal">Change Request</a>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col col-lg-12">
                                <div class="wrp-contest justify-content-end">
                                    <span class="d-flex align-items-center" style="gap:20px;">
                                        <span style="font-weight: 900"> No of Request:
                                            {{ $winnerFiles->no_of_request ?? 0 }}
                                        </span>
                                        @if (isset($winnerFiles) && ($winnerFiles->no_of_request ?? 0) > 0)
                                            <a href="#" class="btn-lg btn-info" data-toggle="modal"
                                                data-target="#viewRequestWorkModal">View Request</a>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php
                        $media = $winnerFiles['media'] ?? null;
                    @endphp
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Logotype {{ count($media['logotype'] ?? []) }}/3
                                </h2>
                            </div>
                        </div>
                        @if ($media && isset($media['logotype']))
                            @foreach ($media['logotype'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="logotype{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="logotype{{ $index + 1 }}" name="logotype"
                                                        class="winner-file logotype {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="logotype">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['logotype']) || count($media['logotype']) < 3))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents"
                                        for="logotype{{ count($media['logotype'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="logotype{{ count($media['logotype'] ?? []) + 1 }}"
                                                name="logotype"
                                                class="winner-file logotype {{ count($media['logotype'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['logotype'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['logotype'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Company color palette {{ count($media['palette'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['palette']))
                            @foreach ($media['palette'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="palette{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="palette{{ $index + 1 }}" name="palette"
                                                        class="winner-file palette {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="palette">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['palette']) || count($media['palette']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents" for="palette{{ count($media['palette'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="palette{{ count($media['palette'] ?? []) + 1 }}"
                                                name="palette"
                                                class="winner-file palette {{ count($media['palette'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['palette'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['palette'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Map of branded fonts {{ count($media['font'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['font']))
                            @foreach ($media['font'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="font{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="font{{ $index + 1 }}" name="font"
                                                        class="winner-file font {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="font">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['font']) || count($media['font']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">

                                    <label style="display: contents" for="font{{ count($media['font'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="font{{ count($media['font'] ?? []) + 1 }}"
                                                name="font"
                                                class="winner-file font {{ count($media['font'] ?? []) + 1 }}" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['font'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['font'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Design of letterhead {{ count($media['letterhead'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['letterhead']))
                            @foreach ($media['letterhead'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="letterhead{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="letterhead{{ $index + 1 }}"
                                                        name="letterhead"
                                                        class="winner-file letterhead {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="letterhead">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['letterhead']) || count($media['letterhead']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents"
                                        for="letterhead{{ count($media['letterhead'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file"
                                                id="letterhead{{ count($media['letterhead'] ?? []) + 1 }}"
                                                name="letterhead"
                                                class="winner-file letterhead {{ count($media['letterhead'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['letterhead'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['letterhead'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Corporate business card {{ count($media['businessCard'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['businessCard']))
                            @foreach ($media['businessCard'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="businessCard{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="businessCard{{ $index + 1 }}"
                                                        name="businessCard"
                                                        class="winner-file businessCard {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="businessCard">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['businessCard']) || count($media['businessCard']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents"
                                        for="businessCard{{ count($media['businessCard'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file"
                                                id="businessCard{{ count($media['businessCard'] ?? []) + 1 }}"
                                                name="businessCard"
                                                class="winner-file businessCard {{ count($media['businessCard'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['businessCard'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['businessCard'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Pattern {{ count($media['pattern'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['pattern']))
                            @foreach ($media['pattern'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="pattern{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="pattern{{ $index + 1 }}" name="pattern"
                                                        class="winner-file pattern {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="pattern">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['pattern']) || count($media['pattern']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents"
                                        for="pattern{{ count($media['pattern'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="pattern{{ count($media['pattern'] ?? []) + 1 }}"
                                                name="pattern"
                                                class="winner-file pattern {{ count($media['pattern'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['pattern'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['pattern'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Favicon for the site {{ count($media['site'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['site']))
                            @foreach ($media['site'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="site{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="site{{ $index + 1 }}" name="site"
                                                        class="winner-file site {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="site">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['site']) || count($media['site']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents" for="site{{ count($media['site'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="site{{ count($media['site'] ?? []) + 1 }}"
                                                name="site"
                                                class="winner-file site {{ count($media['site'] ?? []) + 1 }}" hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['site'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['site'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif




                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Design of Facebook account {{ count($media['account'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['account']))
                            @foreach ($media['account'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="account{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="account{{ $index + 1 }}" name="account"
                                                        class="winner-file account {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="account">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['account']) || count($media['account']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents"
                                        for="account{{ count($media['account'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="account{{ count($media['account'] ?? []) + 1 }}"
                                                name="account"
                                                class="winner-file account {{ count($media['account'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['account'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['account'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Model of company labels {{ count($media['companyLabel'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['companyLabel']))
                            @foreach ($media['companyLabel'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="companyLabel{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="companyLabel{{ $index + 1 }}"
                                                        name="companyLabel"
                                                        class="winner-file companyLabel {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="companyLabel">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['companyLabel']) || count($media['companyLabel']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents"
                                        for="companyLabel{{ count($media['companyLabel'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file"
                                                id="companyLabel{{ count($media['companyLabel'] ?? []) + 1 }}"
                                                name="companyLabel"
                                                class="winner-file companyLabel {{ count($media['companyLabel'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['companyLabel'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['companyLabel'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Icon layout with your logo {{ count($media['layoutLogo'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['layoutLogo']))
                            @foreach ($media['layoutLogo'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="layoutLogo{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="layoutLogo{{ $index + 1 }}"
                                                        name="layoutLogo"
                                                        class="winner-file layoutLogo {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="layoutLogo">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['layoutLogo']) || count($media['layoutLogo']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents"
                                        for="layoutLogo{{ count($media['layoutLogo'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file"
                                                id="layoutLogo{{ count($media['layoutLogo'] ?? []) + 1 }}"
                                                name="layoutLogo"
                                                class="winner-file layoutLogo {{ count($media['layoutLogo'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['layoutLogo'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['layoutLogo'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Model T-shirt {{ count($media['tShirt'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['tShirt']))
                            @foreach ($media['tShirt'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="tShirt{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="tShirt{{ $index + 1 }}" name="tShirt"
                                                        class="winner-file tShirt {{ $index + 1 }}" hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="tShirt">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['tShirt']) || count($media['tShirt']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents"
                                        for="tShirt{{ count($media['tShirt'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="tShirt{{ count($media['tShirt'] ?? []) + 1 }}"
                                                name="tShirt"
                                                class="winner-file tShirt {{ count($media['tShirt'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['tShirt'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['tShirt'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    5 individual carriers {{ count($media['carrier'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['carrier']))
                            @foreach ($media['carrier'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="carrier{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="carrier{{ $index + 1 }}"
                                                        name="carrier" class="winner-file carrier {{ $index + 1 }}"
                                                        hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="carrier">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['carrier']) || count($media['carrier']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents"
                                        for="carrier{{ count($media['carrier'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="carrier{{ count($media['carrier'] ?? []) + 1 }}"
                                                name="carrier"
                                                class="winner-file carrier {{ count($media['carrier'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['carrier'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['carrier'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="title-ntf">
                                <h2>
                                    Preview of product {{ count($media['product'] ?? []) }}/2
                                </h2>
                            </div>
                        </div>

                        @if ($media && isset($media['product']))
                            @foreach ($media['product'] as $index => $item)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="block-upload block-upload--dsg">
                                        <label style="display: contents" for="product{{ $index + 1 }}">
                                            @if (auth()->user()->user_type == 'Designer')
                                                <div class="icon icon-edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input type="file" id="product{{ $index + 1 }}"
                                                        name="product" class="winner-file product {{ $index + 1 }}"
                                                        hidden>
                                                </div>
                                            @endif
                                        </label>
                                        @php
                                            $file = explode('/', $item['file']);
                                        @endphp
                                        @if ($item['type'] == 'image')
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <img src="{{ asset($item['file']) }}"
                                                    style="width: 100%; max-height: 151px !important;" alt="">
                                            </a>
                                        @else
                                            <a
                                                href="{{ route('competition.download.file', ['folder' => $file[0], 'id' => $file[1], 'name' => $file[2]]) }}">
                                                <i class="fas fa-arrow-down d-block text-center"></i>
                                                <span>Download</span>
                                            </a>
                                        @endif
                                    </div>
                                    {{-- <div class="prf-icon profile">
                                        <a class="icon">
                                            {{$item['no_of_request']}}
                                        </a>
                                        <a class="icon">
                                            <button class="btn btn-info request-work mr-5" data-id="{{ $index + 1 }}" data-type="product">Request</button>
                                        </a>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif


                        @if (!$media || (empty($media['product']) || count($media['product']) < 2))
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="block-upload block-upload--dsg">
                                    <label style="display: contents"
                                        for="product{{ count($media['product'] ?? []) + 1 }}">
                                        @if (auth()->user()->user_type == 'Designer')
                                            <input type="file" id="product{{ count($media['product'] ?? []) + 1 }}"
                                                name="product"
                                                class="winner-file product {{ count($media['product'] ?? []) + 1 }}"
                                                hidden>
                                        @endif
                                        <i class="fas fa-arrow-down"></i>
                                        <span>{{ auth()->user()->user_type == 'Designer' ? 'Upload file' : 'Not Uploaded yet' }}</span>
                                    </label>
                                    <div class="file-type">
                                        <span class="text">
                                            @if (count($media['product'] ?? []) == 0)
                                                ai
                                            @elseif (count($media['product'] ?? []) == 1)
                                                png
                                            @else
                                                eps
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>
                </div>

                <div class="modal fade" id="sendRequestWorkModal" tabindex="-1" role="dialog"
                    aria-labelledby="sendRequestWorkModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="sendRequestWorkModalLabel">Change Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('competition.send-request.work') }}">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" class="form-control" name="workId"
                                        value="{{ $id }}" hidden>
                                    <input type="text" class="form-control" name="id"
                                        value="{{ $winnerFiles->id ?? 0 }}" hidden>

                                    <textarea type="text" class="form-control" name="requestChange" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="viewRequestWorkModal" tabindex="-1" role="dialog"
                    aria-labelledby="viewRequestWorkModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewRequestWorkModalLabel">View Change Request</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="container">
                                    <ul class="list-group">
                                        @if ($winnerFiles)
                                            @foreach ($winnerFiles->change_request as $value)
                                                <li class="list-group-item d-flex">
                                                    <i class="fas fa-star mr-2"></i> {{ $value }}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
