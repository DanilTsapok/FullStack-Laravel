<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('css/RegisterForm.css') }}">
</head>
<body>
    <div class="formContainer">
      <div>
        <img src="{{asset('img/Group 184.svg')}}" class="imageLoops" alt="">
      </div>   
      <form class="form" method="POST" action="{{route('register.post')}}">
        @csrf
        {{-- <img width="50" height="50" src="https://img.icons8.com/stickers/50/add-user-male.png" alt="add-user-male"/> --}}
            <h1>Register</h1>
           <p class="form-title">Register your account</p>

             <div class="input-container">
                <input placeholder="Enter Name" type="text" name="name">
            </div>
            <div class="input-container">
              <input placeholder="Enter email" type="email" name="email">
          </div>
          <div class="input-container">
              <input placeholder="Enter password" type="password" name="password">
            </div>
             <button class="submit" type="submit">
            Register
          </button>
    
          <p class="signup-link">
          Already have an account?
            <a href="/login">Login</a>
          </p>
       </form>
    </div>
</body>
</html>