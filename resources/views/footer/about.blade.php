@extends('layouts.main')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}">
@endpush
@section('content')
    <div>

        <h1>
            About company
        </h1>

        <div class="introduction-1">
            <h2>
                1. Introduction
            </h2>
            <p>
                DesignCrowd Pty Ltd ACN 127 272 315, and its related entities ("DesignCrowd", "we", "us", "our") take your
                privacy seriously. We are subject to the Privacy Act 1988 (Cth) and will protect your personal information
                in
                accordance with the Australian Privacy Principles ("APPs"). The APPs govern how we collect and otherwise
                handle your personal information. This Privacy Policy explains in general terms how we protect the privacy
                of your personal information and applies to any personal information that we collect from, or about, you.
            </p>
        </div>

        <div class="information">
            <h2>
                2. The Information We Collect and Hold
            </h2>
            <p>
                The types of personal information that we collect and hold about you will depend on the circumstances of
                collection and on the type of product or service you request from us. When collecting personal
                information from you, we specifically describe what information is required in order to provide you with
                the product or service you have requested. Such personal information may include details such as your
                name, phone number, email address, credit/debit card number, expiry date and billing address. We may
                also collect your IP address for the purpose of protecting the security and integrity of our marketplace and
                preventing fraudulent use of our services. <br><br>

                <span>Unless you notify us otherwise, we will assume that you have consented to the collection of all
                    information
                    which is provided to us for use in accordance with this Privacy Policy.</span>
            </p>
        </div>

        <div class="founders">
            <h2>
                Founders
            </h2>

            <div class="people">
                <div class="seo">
                    <img src="images/design-photo.png" alt="">
                    <p>
                        Nikolay Kozeletsky
                    </p>
                    <span>SEO</span>
                </div>
                <div class="designer">
                    <img src="images/design-photo.png" alt="">
                    <p>
                        Sergey Zeykan
                    </p>
                    <span>Designer</span>
                </div>
            </div>
        </div>

    </div>
@endsection
