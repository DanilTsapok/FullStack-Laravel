<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/createPage.style.css') }}">
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
    <form method="POST" action="{{route('createProduct.post')}}">
        <h1>Create Product:</h1>
        @csrf
        @method('POST')
        <div>
            <input type="text" id="name" name="name" placeholder="Product Name">
        </div>
        <div>
            <textarea id="description" name="description"placeholder="Product Description" ></textarea>
        </div>
        <div>
            <input type="number" id="price" name="price"placeholder="Product Price (in грн)">
        </div>
        <div>
            <label for="image">Product Image</label>
            <input type="file" id="image" name="image" >
        </div>
        <div>
            <label for="image">Stock</label>
            <input type="text" id="stock" name="stock">
        </div>
        
        <div>
            <button type="submit" class="submit">Create Product</button>
        </div>
        <a href="/dashboard">Back to Dashboard</a>
    </form>


</body>
</html>