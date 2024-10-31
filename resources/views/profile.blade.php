<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profilePage.style.css') }}">
    <link rel='stylesheet' href="{{asset('css/main.style.css')}}">
</head>
<body class="profileBackground">
    @include('header')
   
        <div class="titleProfilePage">
            <h4>Профіль</h4>
        </div>
        <div class="profileContainer">
            <div class="profileBody">
                <div class="profileTitle">
                    <div class="userCredentials">
                        <p class="userName">{{auth()->user()->name}}</p>
                        <span>{{auth()->user()->email}}</span>
                    </div><div class=" profileIcon">
                        <p>{{substr(auth()->user()->name,0,1)}}</p>
                    </div>    
                </div>
                <div class="profileContent">
                    @if(count($posts)!= 0)
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

                            <form  class="deleteBtn"action="{{route('deletePost.delete', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><img width="25" height="25" src="https://img.icons8.com/fluency-systems-regular/48/FFFFFF/delete-trash--v3.png" alt="delete-trash--v3"/></button>
                            </form>

                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="postBodyEmpty">

                        <h4>Create one post</h4>
                    </div>
                    @endif
                </div>
            </div>
        </div>
  @include('AddPostBtn')
  @include('modalAddPost')
</body>
</html>    