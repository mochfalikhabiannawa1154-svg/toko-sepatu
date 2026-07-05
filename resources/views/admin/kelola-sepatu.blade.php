<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Sepatu - Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans flex min-h-screen">

    <div class="w-64 bg-gray-900 text-white p-6 flex flex-col justify-between">
        <div>
            <div class="text-2xl font-black tracking-wider uppercase mb-8">
                Admin<span class="text-blue-500">Panel.</span>
            </div>
            </div>
    </div>

    <div class="flex-1 p-10">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-black text-gray-900">Daftar Stok Sepatu</h1>
            
            <a href="{{ route('admin.sepatu.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl font-bold text-sm shadow-xs transition-all cursor-pointer">
                + Tambah Sepatu Baru
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xs border border-gray-100 overflow-hidden">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-500 font-semibold">
                        <th class="p-4">Nama Sepatu</th>
                        <th class="p-4">Brand</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4">Stok</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50 text-gray-700">
                    @forelse($shoes as $shoe)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="p-4 font-bold text-gray-900">{{ $shoe->name }}</td>
                            <td class="p-4">{{ $shoe->brand }}</td>
                            <td class="p-4 font-semibold text-emerald-600">Rp {{ number_format($shoe->price, 0, ',', '.') }}</td>
                            <td class="p-4">
                                <span class="bg-gray-100 text-gray-700 px-2.5 py-1 rounded-md text-xs font-bold">
                                    {{ $shoe->stock }} Psg
                                </span>
                            </td>
                            <td class="p-4 flex gap-2 justify-center items-center">
                                <a href="{{ route('admin.sepatu.edit', $shoe->id) }}" class="inline-block text-xs bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1.5 rounded-lg font-bold cursor-pointer hover:bg-amber-100 transition">
                                    Edit
                                </a>

                                <form action="{{ route('admin.sepatu.destroy', $shoe->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus sepatu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs bg-red-50 text-red-700 border border-red-200 px-3 py-1.5 rounded-lg font-bold cursor-pointer hover:bg-red-100 transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-400 italic">
                                Belum ada data sepatu.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>