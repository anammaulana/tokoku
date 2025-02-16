<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('products.index') }}" class="text-white text-lg font-bold">Toko Online</a>
            <a href="{{ route('products.create') }}" class="bg-white text-blue-600 px-4 py-2 rounded">Tambah Produk</a>
        </div>
    </nav>
    
    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    <footer class="bg-gray-800 text-white text-center p-4 mt-8">
        &copy; {{ date('Y') }} Toko Online. All Rights Reserved.
    </footer>
</body>
</html>
