@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 text-center">
    <h1 class="text-5xl font-extrabold text-blue-700 leading-tight mb-4 animate__animated animate__fadeIn">
        Selamat Datang di Web Anam Maulana dengan Jenskin Broook
    </h1>
    <p class="text-lg text-gray-800 mb-6 animate__animated animate__fadeIn animate__delay-1s">
        Temukan berbagai produk terbaik dengan harga terbaik. Kami menyediakan pengalaman berbelanja yang luar biasa untuk Anda.
    </p>
    
    <div class="mt-6">
        <a href="{{ route('products.index') }}" class="bg-gradient-to-r from-blue-500 to-teal-500 text-white px-8 py-4 rounded-full text-xl font-semibold shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
            Lihat Produk
        </a>
    </div>
</div>
@endsection
