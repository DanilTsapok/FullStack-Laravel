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
        <div class="Notification" id="notification">
            @if(session('Success'))
                {{session('Success')}}
            @else
                {{session('error')}}
            @endif
        </div>
    @endif
    @include('header')
    <div class="main">
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
                            @if (Auth::user()->role === 'admin')
                                <form action="{{ route('deleteProduct.delete', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button class="actionBtn edit" type="submit">
                                        Edit
                                    </button>
                                </form>
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
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('notification');
            if (notification) {
                notification.classList.add('show');
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 5000); 
            }
        });
    </script>
</body>
</html>