@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
    <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Produk</a>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
        @foreach($products as $product)
        <div class="border p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
            <p class="text-gray-700">Rp{{ number_format($product->price, 2) }}</p>
            <div class="mt-2">
                <a href="{{ route('products.show', $product) }}" class="text-blue-500">Lihat</a>
                <a href="{{ route('products.edit', $product) }}" class="text-yellow-500 ml-2">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection