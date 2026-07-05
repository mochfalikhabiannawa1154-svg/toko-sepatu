<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Sepatu</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans p-6 md:p-12">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-xs border border-gray-100">
        <h1 class="text-2xl font-black text-gray-900 mb-6">Edit Produk Sepatu</h1>

        <form action="{{ route('admin.sepatu.update', $shoe->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT') <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Sepatu</label>
                <input type="text" name="name" value="{{ $shoe->name }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600">
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Brand</label>
                    <input type="text" name="brand" value="{{ $shoe->brand }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (IDR)</label>
                    <input type="number" name="price" value="{{ $shoe->price }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Stok</label>
                    <input type="number" name="stock" value="{{ $shoe->stock }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600">
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Produk</label>
                <textarea name="description" rows="4" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600">{{ $shoe->description }}</textarea>
            </div>

            <div class="flex gap-4 pt-4">
                <a href="{{ route('admin.sepatu') }}" class="w-1/2 bg-gray-200 text-center text-gray-700 py-3 rounded-xl font-bold text-sm hover:bg-gray-300 transition">Batal</a>
                <button type="submit" class="w-1/2 bg-blue-600 text-white py-3 rounded-xl font-bold text-sm hover:bg-blue-700 transition cursor-pointer">Simpan Perubahan</button>
            </div>
        </form>
    </div>

</body>
</html>