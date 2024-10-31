<link rel='stylesheet' href="{{asset('css/main.style.css')}}">
<section class="firstSection">
    @auth
    <div class="titleProfilePage">
        <h4>Головна</h4>
    </div>
   @include('AddPostBtn')
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
                    <div class="UserIcon">
                        {{substr($post->creator->name,0,1)}}
                    </div>
                    <div class="postContent">
                        <h4>{{$post->creator->name}} <span>{{$post->created_at->diffForHumans()}}</span></h4>
                        <h4>{{$post->name}} </h4>
                        <h4>{{$post->description}}</h4>
                 
                      <form action="{{route('posts.addLike', $post->id)}}" method="POST">
                        @csrf
                        <button type="submit" id='likeBtn'><img width="26" height="26" src="https://img.icons8.com/metro/26/FFFFFf/like.png" alt="like"/>{{$post->likes}}</button>
                    </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('modalAddPost')
