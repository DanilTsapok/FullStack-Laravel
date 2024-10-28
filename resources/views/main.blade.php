
<link rel='stylesheet' href="{{asset('css/main.style.css')}}">

<section class="firstSection">
    @auth
    <div class="titleProfilePage">
        <h4>Головна</h4>
    </div>
        <div></div>
        <div class="AddPostBtn">
            <img width="25" height="25" src="https://img.icons8.com/fluency-systems-filled/50/FFFFFF/plus-math.png" alt="plus-math"/>
        </div>
    @else
    <div class="titleProfilePage">
        <h4>Головна</h4>
    </div>
    <div class="loginUserBtn">
        <a href="{{route('login')}}">Login</a>
    </div>
    @endauth
        <div class="postsContainer">
            <div class="postsBody">
                @foreach ($posts as $post)
                    <div class="postBody">
                        <h4>{{$post->name}} <span>{{$post->created_at->diffForHumans()}}</</h4>
                        <h4>{{$post->description}}</h4>
                        <p><img width="26" height="26" src="https://img.icons8.com/metro/26/4a4a4a/like.png" alt="like"/>{{$post->likes}}</p>
                    </div>
                    
                    {{-- <h1>{{ $post->creator ? $post->creator->name : 'No creator' }} --}}
                @endforeach
            </div>
        </div>

</section>
{{-- <div class="products">
    @foreach ($products as $item)
            <div class="productCard">
                <div class="image">
                    <img class="imgItem" src="{{ $item->image }}" alt="{{ $item->name }}">
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
</div> --}}
