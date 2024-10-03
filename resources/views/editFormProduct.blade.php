<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/editPage.style.css') }}">
</head>
<body>
    <form action="{{ route('updateProduct.put', $product->id) }}" method="POST" >
        <h1>Edit Product: {{$product->name}}</h1>
        @csrf
        @method('PUT')
        <div>
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="description">Product Description</label>
            <textarea id="description" name="description" required>{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="price">Product Price (in грн)</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div>
            <label for="image">Product Image</label>
            <input type="file" id="image" name="image" value="{{ $product->image }}">
            <label for="image">Stock</label>
            <input type="text" id="stock" name="stock" value="{{ $product->stock }}">
            <p>Current Image:</p>
            <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 150px; height: auto;">
        </div>
        <div>
            <button type="submit" class="submit">Update Product</button>
        </div>
        <a href="/dashboard">Back to Dashboard</a>
    </form>
</body>
</html>