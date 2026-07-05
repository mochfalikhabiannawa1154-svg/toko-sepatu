<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Toko Sepatu</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex min-h-screen">
        <div class="w-64 bg-gray-900 text-white p-6 flex flex-col justify-between">
            <div>
                <div class="text-2xl font-black tracking-wider uppercase mb-8">
                    Admin<span class="text-blue-500">Panel.</span>
                </div>
                <ul class="space-y-4">
                    <li>
                        <a href="#" class="block bg-blue-600 px-4 py-2.5 rounded-xl font-semibold text-sm transition">
                            📊 Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block text-gray-400 hover:text-white px-4 py-2.5 rounded-xl font-semibold text-sm transition">
                            👟 Kelola Sepatu
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block text-gray-400 hover:text-white px-4 py-2.5 rounded-xl font-semibold text-sm transition">
                            📦 Pesanan Masuk
                        </a>
                    </li>
                </ul>
            </div>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2.5 rounded-xl font-semibold text-sm transition cursor-pointer">
                    🚪 Keluar (Logout)
                </button>
            </form>
        </div>

        <div class="flex-1 p-10">
            <header class="flex justify-between items-center mb-8 border-b border-gray-200 pb-4">
                <h1 class="text-3xl font-black text-gray-900">Dashboard Utama</h1>
                <div class="text-sm font-medium text-gray-600">
                    Halo, <span class="font-bold text-gray-900">{{ auth()->user()->name }}</span> (Admin)
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-xs border border-gray-100">
                    <div class="text-sm font-semibold text-gray-400 uppercase">Total Produk</div>
                    <div class="text-3xl font-black text-gray-900 mt-2">12 Model</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-xs border border-gray-100">
                    <div class="text-sm font-semibold text-gray-400 uppercase">Pesanan Baru</div>
                    <div class="text-3xl font-black text-emerald-600 mt-2">5 Order</div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-xs border border-gray-100">
                    <div class="text-sm font-semibold text-gray-400 uppercase">Status Sistem</div>
                    <div class="text-3xl font-black text-blue-600 mt-2">Aktif</div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>