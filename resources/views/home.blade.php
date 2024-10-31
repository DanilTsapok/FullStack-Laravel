
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/homePage.style.css') }}">
    <title>Home</title>
</head>
<body>
    @if(session('Success') || session('error'))
    <div class="notification" id="notification">
        @if(session('Success')) 
        <div>
            <img width="64" height="64" src="https://img.icons8.com/cute-clipart/64/ok.png" alt="ok"/>
        </div>
        <div>
            {{session('Success')}}
        </div>
        @else
        <div>
            <img width="64" height="64" src="https://img.icons8.com/cute-clipart/64/error.png" alt="error"/>
        </div>
           <div>  
               {{session('error')}}
        </div> 
        @endif
    </div>
   
@endif
        @include('header')
    <main>
        @include('main')
    </main>
</body>
<script>
     document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('notification');
            if (notification) {
                notification.classList.add('show');
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 3000); 
            }
        });
</script>
</html>
