<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profilePage.style.css') }}">
</head>
<body class="profileBackground">
    @include('header')
        <div class="titleProfilePage">
            <h4>Профіль</h4>
        </div>
        <div class="profileContainer">
            <div class="profileBody">
                <img width="40" height="40" src="https://img.icons8.com/color/48/gender-neutral-user.png" alt="gender-neutral-user"/>
            <p>{{auth()->user()->name}}</p>
            <p>Email:{{auth()->user()->email}}</p>
                @foreach ($posts as $post )
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
 
</body>
</html>    