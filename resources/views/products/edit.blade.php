@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>
    <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" class="border p-2 w-full" required>
        <input type="text" name="price" value="{{ $product->price }}" class="border p-2 w-full" required>
        <input type="number" name="stock" value="{{ $product->stock }}" class="border p-2 w-full" required>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection