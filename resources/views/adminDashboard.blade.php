<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/adminDashboard.style.css') }}">
   
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
    <div class="main">
       @if(Auth::user()->role === 'admin') 
        <a  class="btn"href="/dashboard/product/create">
        Add New Product 
        </a>
        @endif
        @if($products->isEmpty())
            <div style="background: white; d"><h1 style="color: orange">EMPTY</h1></div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>
                                <img class="image" src="{{ $item->image }}" alt="{{ $item->name }}" style="width: 150px; height: auto;">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td style="word-wrap: break-word;max-width: 200px" >{{ $item->description }}</td>
                            <td>{{ $item->price }} грн</td>
                            <td class="action">
                                @if (Auth::user()->role === 'admin' ||Auth::user()->role === 'editor'  )
                                <div>
                                    <a href="/dashboard/product/{{$item->id}}/edit" class="actionBtn edit" type="submit">
                                        Edit
                                    </a>
                                </div>
                                    <form action="{{ route('deleteProduct.delete', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="actionBtn delete" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

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
</body>
</html>