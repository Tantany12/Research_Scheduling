<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Research Defense Scheduling</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            text-align: center;
            background-image: url("sscourt.png");
            background-size: cover;
            font-family: Tahoma, Verdana, sans-serif;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            margin: 0; /* Remove default body margin */
            padding: 0; /* Remove default body padding */
            height: 100vh;
        }

        .btn {
            width: 100px;
            height: 40px;
        }
       
    </style>
</head>

<body>
    <div class="container-fluid h-100 d-flex flex-column justify-content-center align-items-center">
        <a href="">
            <img src="unnamed.jpg" alt="logo" class="rounded-circle" style="width:30%;">
        </a>
        <div class="mt-3">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/home') }}" class="btn btn-danger">Dashboard</a>
            @else
            <a href="{{ route('login') }}" name="loginBtn" class="btn btn-success">LOGIN</a>
            @endif
            @endauth
        </div>
    </div>
</body>

</html>
