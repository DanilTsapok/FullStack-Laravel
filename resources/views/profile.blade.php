<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profilePage.style.css') }}">
</head>
<body>
    <div style="display:flex; justify-content:center; flex-direction:column; align-items:center">
        <main class="userData">
            <h1>Profile</h1>
            <img width="40" height="40" src="https://img.icons8.com/color/48/gender-neutral-user.png" alt="gender-neutral-user"/>
            <p>Name:{{auth()->user()->name}}</p>
            <p>Email:{{auth()->user()->email}}</p>
         <a href="/" class="submit">Back</a>
       </main>
    </div>
</body>
</html>    