<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profilePage.style.css') }}">
</head>
<body class="profileBackground">
    @include('header')
        <div class="titleProfilePage">
            <h4>Профіль</h4>
        </div>
        <div class="profileContainer">
            <div class="profileBody">
                   <img width="40" height="40" src="https://img.icons8.com/color/48/gender-neutral-user.png" alt="gender-neutral-user"/>
            <p>{{auth()->user()->name}}</p>
            <p>Email:{{auth()->user()->email}}</p>
            </div>
        </div>
 
</body>
</html>    