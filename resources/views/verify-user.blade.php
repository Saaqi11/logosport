<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			text-align: center;
			padding: 20px;
		}

		.container {
			background-color: #fff;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			padding: 40px;
			max-width: 400px;
			margin: 0 auto;
		}

		h1 {
			color: #333;
			margin-top: 0;
		}

		input {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 4px;
			border: 1px solid #ccc;
		}

		button {
			background-color: #4CAF50;
			color: #fff;
			border: none;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #45a049;
		}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route("home") }}">Duel Contest</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("user.logout") }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    @include("layouts.flashMessages")
    <div class="container">
        <h1>OTP Verification</h1>
        <form id="otpForm" action="{{ route("verify-email") }}" method="POST">
            @csrf
            <input type="text" id="otp" name="code" placeholder="Enter OTP" required>
            <br>
            <button type="submit">Verify</button>
        </form>
        <br>
        <a href="{{ route("send-email-verification") }}" type="submit">Resend verification Email</a>
    </div>

</body>
</html>
