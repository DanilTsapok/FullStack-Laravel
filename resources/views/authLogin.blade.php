<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url("https://i.pinimg.com/564x/6b/4e/94/6b4e94adb75b05e9ae7b7876e4c7790d.jpg");

    }
    .form {
  background-color: #fff;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 2rem;
  width: 350px;
  border-radius: 20px;
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  animation: anim .3s ease-in-out;
  user-select: none;
  
  }
  @keyframes anim {
    0%{
      opacity: 0;
      transform: scale(0)
    }
    100%{
      opacity:1;
      transform: scale(1)
    }
    
  }
  h1 {
    color: orange;
    /* background: linear-gradient(19deg, #3EECAC 0%, #EE74E1 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent; */
    font-family: "Nunito", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
    user-select: none;
  }
  .form-title {
    font-size: 1.25rem;
    line-height: 1.75rem;
    font-weight: 600;
    text-align: center;
    color: #000;
    font-family: "Nunito", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
  }

  .input-container {
    width: 100%;
  }

  .input-container input, .form button {
    outline: none;
    border: 1px solid #e5e7eb;
    margin: 8px 0;
  }

  .input-container input {
    width: 100%;
    background-color: #fff;
    padding: 1rem;
    padding-right: 3rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    border-radius: 0.5rem;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  }

  .input-container span {
    display: grid;
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    padding-left: 1rem;
    padding-right: 1rem;
    place-content: center;
  }

  .input-container span svg {
    color: #9CA3AF;
    width: 1rem;
    height: 1rem;
  }

  .submit {
    display: block;
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
    color: #ffffff;
    font-size: 0.875rem;
    line-height: 1.25rem;
    font-weight: 500;
    width: 100%;
    border-radius: 0.5rem;
    text-transform: uppercase;
    background-color: orange;

  }
  .submit:hover{
    cursor: pointer;
    transform: scale(1.01);
    transition: .3s 
   
  }

  .signup-link {
    color: #6B7280;
    font-size: 0.875rem;
    line-height: 1.25rem;
    text-align: center;
    font-family: "Nunito", sans-serif;
    font-optical-sizing: auto;
    font-style: normal;
  }

  .signup-link a {
    text-decoration: underline;
    color: orange
  }
</style>
<body>
    <div style="display:flex; justify-content:center; flex-direction:column; align-items:center">
        <form class="form" action="{{route('login.post')}}" method="POST">
        @csrf  
        <img width="64" height="64" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-login-web-store-flaticons-lineal-color-flat-icons-3.png" alt="external-login-web-store-flaticons-lineal-color-flat-icons-3"/>
            <h1>Login</h1>
            <p class="form-title">Sign in to your account</p>
            <div class="input-container">
              <input placeholder="Enter email" type="email" name="email">
          </div>
          <div class="input-container">
              <input placeholder="Enter password" type="password" name="password">
            </div>
             <button class="submit" type="submit">
            Sign in
          </button>
    
          <p class="signup-link">
          Don`t have an account?
            <a href="/registration">Register</a>
          </p>
       </form>
    </div>
</body>
</html>