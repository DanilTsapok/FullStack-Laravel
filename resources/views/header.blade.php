<link rel="stylesheet" href="{{ asset('css/homePage.style.css') }}">
<header>
 @auth 
    <h1>
        <img style="width: 30px" src="https://img.icons8.com/?size=80&id=65012&format=png" alt="PizzaPage Logo">
        <a class="homeroute" href="{{route('home')}}">PizzaPage</a>
    </h1>
    @if (Route::currentRouteName()=='adminDashboard.get')
    <h2>Admin Dashboard</h2>
@endif
    <div class="nav-link">
        <div style="display: flex; gap: 10px;">
            <img width="20" height="20" src="https://img.icons8.com/color/48/gender-neutral-user.png" alt="User Icon"/>
            <a href="/profile" style="color: orange">{{ auth()->user()->name }}</a>
        </div>
        <a href="/cart">
            <img style="width: 25px" src="https://img.icons8.com/parakeet-line/48/FAB005/shopping-cart.png" alt="Shopping Cart"/>
        </a>
        <a href="{{ route('logout') }}">
            <img width="25" height="25" src="https://img.icons8.com/ios/50/FAB005/exit--v1.png" alt="Exit"/>
        </a>
        {{-- <h2>Admin Dashboard</h2> --}}
 

        @if (Auth::user()->role === 'admin' && Route::currentRouteName()=='home')
            <a href="/dashboard">Admin</a>
        @endif
    </div>
    @else
    <h1>
        <img style="width: 30px" src="https://img.icons8.com/?size=80&id=65012&format=png" alt="PizzaPage Logo">PizzaPage</h1>
    <a href="{{ route('login') }}" class="btnLogin">Увійти</a>
    @endauth 
    </header>