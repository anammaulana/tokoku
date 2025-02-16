@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>
    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Nama Produk" class="border p-2 w-full" required>
        <input type="text" name="price" placeholder="Harga" class="border p-2 w-full" required>
        <input type="number" name="stock" placeholder="Stok" class="border p-2 w-full" required>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection