<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/LoginForm.style.css') }}">
</head>
<body>
    <div class="formContainer">
      <div>
        <img src="{{asset('img/Group 184.svg')}}" class="imageLoops" alt="">
      </div> 
      <form class="form" action="{{route('login.post')}}" method="POST">
        @csrf  
        <img width="64" height="64" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-login-web-store-flaticons-lineal-color-flat-icons-3.png" alt="external-login-web-store-flaticons-lineal-color-flat-icons-3"/>
            <h1>Log in</h1>
            <p class="form-title">Sign in to your account</p>
            <div class="input-container">
              <input placeholder="Enter email" type="email" name="email">
            </div>
            <div class="input-container">
              <input placeholder="Enter password" type="password" name="password">
            </div>
            <button class="submit" type="submit">Sign in</button>
            <p class="signup-link">Don`t have an account? <a href="/registration">Register</a></p>
       </form>
    </div>
</body>
</html>