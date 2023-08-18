<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>LogoSporte</title>
    <link data-csp="header-favicon" rel="icon" type="image/png" href="{{ asset("images/favicon.png") }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css?_v=20221218160823">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/css/toastr.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/app.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/datatables.min.css") }}">
    @if(request()->route()->action['as'] === "contest.listing")
        <link rel="stylesheet" href="{{ asset("assets/css/contest-listing-filter.css") }}">
    @endif
    <link rel="stylesheet" href="{{ asset("assets/css/top.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/competition.min.css") }}">
    @if(request()->route()->getPrefix() !== "/competition")
        <link rel="stylesheet" href="{{ asset("assets/css/dropzone.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/css/dropzone-custom.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/css/custom.css") }}">
    @endif
</head>
