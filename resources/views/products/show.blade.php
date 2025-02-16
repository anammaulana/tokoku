@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
    <p class="text-lg text-gray-700">Harga: Rp{{ number_format($product->price, 2) }}</p>
    <p class="text-lg text-gray-700">Stok: {{ $product->stock }}</p>
    <a href="{{ route('products.index') }}" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
</div>
@endsection