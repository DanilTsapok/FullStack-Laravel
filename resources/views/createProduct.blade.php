<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/adminDashboard.style.css') }}">
</head>
<body>
    <h1>Create Product:</h1>
    <form method="POST" action="{{route('createProduct.post')}}">
        @csrf
        @method('POST')
        <div>
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" >
        </div>
        <div>
            <label for="description">Product Description</label>
            <textarea id="description" name="description" ></textarea>
        </div>
        <div>
            <label for="price">Product Price (in грн)</label>
            <input type="number" id="price" name="price">
        </div>
        <div>
            <label for="image">Product Image</label>
            <input type="file" id="image" name="image">
        </div>
        <div>
            <label for="image">Stock</label>
            <input type="text" id="stock" name="stock">
        </div>
        <div>
            <button type="submit">Create Product</button>
        </div>
    </form>


    <a href="/dashboard">Back to Dashboard</a>
</body>
</html>