<link rel='stylesheet' href="{{asset('css/main.style.css')}}">

<section class="firstSection">
    @auth
    <div class="titleProfilePage">
        <h4>Головна</h4>
    </div>
    <div></div>
    <div class="AddPostBtn">
        <a href="#" id="openModal"><img width="25" height="25" src="https://img.icons8.com/fluency-systems-filled/50/FFFFFF/plus-math.png" alt="plus-math"/></a>
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
            @dd( Auth::user()->id);
            @foreach ($posts as $post)
                <div class="postBody">
                    <h4>{{$post->name}} <span>{{$post->created_at->diffForHumans()}}</span></h4>
                    <h4>{{$post->description}}</h4>
                    <p><img width="26" height="26" src="https://img.icons8.com/metro/26/4a4a4a/like.png" alt="like"/>{{$post->likes}}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('modalAddPost')
