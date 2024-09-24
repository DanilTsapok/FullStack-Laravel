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
    <header>
    @auth 
        <h1><img style="width: 30px" src="https://img.icons8.com/?size=80&id=65012&format=png" alt="PizzaPage Logo"><a class="homeroute" href="{{route('home')}}">PizzaPage</a></h1>
        <div class="nav-link">
            <div style="display: flex; gap: 10px;">
                <img width="20" height="20" src="https://img.icons8.com/color/48/gender-neutral-user.png" alt="User Icon"/>
                <a href="/profile" style="color: orange">{{ auth()->user()->name }}</a>
            </div>
            <a href="/cart"><img src="https://img.icons8.com/parakeet-line/48/FAB005/shopping-cart.png" alt="Shopping Cart"/></a>
            <a href="{{ route('logout') }}"><img width="25" height="25" src="https://img.icons8.com/ios/50/FAB005/exit--v1.png" alt="Exit"/></a>
        </div>
    @else
        <h1><img style="width: 30px" src="https://img.icons8.com/?size=80&id=65012&format=png" alt="PizzaPage Logo">PizzaPage</h1>
        <a href="{{ route('login') }}" class="btnLogin">Увійти</a>
    @endauth
    </header>

    <div class="products">
        @foreach ($products as $item)
           
                <div class="productCard">
                
                    @auth 
                    <a href="/product/{{$item->id}}">
                link
            </a>
                        @if (Auth::user()->role === 'admin')
                            <form action="{{ route('deleteProduct.delete', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                {{-- <p>{{$item}}</p> --}}
                                <button type="submit">Edit</button>
                            </form>
                            <form action="{{ route('deleteProduct.delete', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        @endif
                
                    
                @endauth
                    <div class="image">
                        <img class="image" src="{{ $item->image }}" alt="{{ $item->name }}">
                    </div>
                    <div><h3>{{ $item->name }}</h3></div>
                    <div>{{ $item->description }}</div>
                    <div class="price">{{ $item->price }} грн</div>

                    @auth
                        <button class="button">
                            BUY NOW
                            <svg fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_30_96)">
                                    <path fill="white" d="M0.479167 11.5C0.203024 11.5 -0.0208333 11.7239 -0.0208333 12C-0.0208333 12.2761 0.203024 12.5 0.479167 12.5V11.5ZM22.9231 12.3536C23.1184 12.1583 23.1184 11.8417 22.9231 11.6464L19.7411 8.46447C19.5459 8.2692 19.2293 8.2692 19.034 8.46447C18.8388 8.65973 18.8388 8.97631 19.034 9.17157L21.8625 12L19.034 14.8284C18.8388 15.0237 18.8388 15.3403 19.034 15.5355C19.2293 15.7308 19.5459 15.7308 19.7411 15.5355L22.9231 12.3536ZM0.479167 12.5H22.5696V11.5H0.479167V12.5Z"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_30_96">
                                        <rect fill="white" height="24" width="24"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                    @else
                        <div><h2>Авторизуйтесь</h2></div>
                    @endauth
                </div>
            
        @endforeach
    </div>

    <footer>
        @if(session('Success'))
    <div>{{ session('Success') }}</div>
@endif
@if(session('error'))
    <div>{{ session('error') }}</div>
@endif
        @2024TsapokDanil
    </footer>
</body>
</html>
