@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 text-center">
    <h1 class="text-4xl font-bold text-blue-600">Selamat Datang di Web Anam Maulana dengan Jenskin broook</h1>
    <p class="text-gray-700 mt-4">Temukan berbagai produk terbaik dengan harga terbaik.</p>
    
    <div class="mt-6">
        <a href="{{ route('products.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg text-lg font-semibold">
            Lihat Produk
        </a>
    </div>
</div>
@endsection
