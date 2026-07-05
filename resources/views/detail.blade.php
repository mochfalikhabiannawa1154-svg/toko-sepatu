<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $shoe->name }} - Toko Sepatu</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md flex flex-col md:flex-row gap-8">
        <div class="w-full md:w-1/2 bg-gray-200 h-64 rounded-lg flex items-center justify-center text-gray-400">
            [ Foto Sepatu ]
        </div>
        <div class="w-full md:w-1/2">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $shoe->name }}</h1>
            <p class="text-sm text-gray-500 font-semibold mb-4">Brand: {{ $shoe->brand }}</p>
            <p class="text-2xl font-bold text-emerald-600 mb-4">Rp {{ number_format($shoe->price, 0, ',', '.') }}</p>
            <p class="text-gray-600 mb-6">{{ $shoe->description }}</p>
            <p class="text-sm text-gray-500 mb-4">Sisa Stok: {{ $shoe->stock }} pasang</p>
            
            <a href="/" class="inline-block bg-gray-500 text-white px-4 py-2 rounded mr-2">Kembali</a>
            <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 font-medium">Beli Sekarang</button>
        </div>
    </div>
</body>
</html>