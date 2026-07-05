<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel — GEOVANT_OFFICIAL</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased flex min-h-screen">

    <aside class="w-64 bg-gray-950 text-white p-6 flex flex-col justify-between shrink-0 border-r border-gray-900">
        <div class="space-y-8">
            <div class="text-xl font-black tracking-tighter uppercase px-2">
                GEOVANT_<span class="text-blue-500">PANEL.</span>
            </div>
            
            <nav class="space-y-1.5">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 bg-blue-600 text-white px-4 py-3 rounded-xl font-bold text-sm transition shadow-sm">
                    <span>📊</span> Dashboard Utama
                </a>
                <a href="{{ route('admin.sepatu') }}" class="flex items-center gap-3 text-gray-400 hover:text-white hover:bg-gray-900 px-4 py-3 rounded-xl font-semibold text-sm transition">
                    <span>👟</span> Kelola Sepatu
                </a>
                <a href="{{ route('admin.pesanan') }}" class="flex items-center gap-3 text-gray-400 hover:text-white hover:bg-gray-900 px-4 py-3 rounded-xl font-semibold text-sm transition">
                    <span>📦</span> Pesanan Masuk
                </a>
            </nav>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-950/40 text-red-400 border border-red-900/30 py-3 rounded-xl font-bold text-xs hover:bg-red-600 hover:text-white transition cursor-pointer">
                <span>🚪</span> Keluar Panel
            </button>
        </form>
    </aside>

    <main class="flex-1 p-8 md:p-10 space-y-8 overflow-y-auto">
        
        <div class="flex justify-between items-center bg-white border border-gray-100 p-6 rounded-2xl shadow-xs">
            <div>
                <h1 class="text-2xl font-black tracking-tight uppercase text-gray-900">Dashboard Utama</h1>
                <p class="text-gray-400 text-xs mt-0.5">Ringkasan performa dan pengelolaan data operasional toko GEOVANT_OFFICIAL.</p>
            </div>
            <div class="flex items-center gap-3 bg-gray-50 px-4 py-2 rounded-xl border border-gray-100">
                <span class="w-2.5 h-2.5 rounded-full bg-blue-500 inline-block animate-pulse"></span>
                <span class="text-xs font-bold text-gray-700">Halo, Admin (Root)</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-xs hover:shadow-md transition flex items-center justify-between">
                <div class="space-y-1">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Produk</p>
                    <p class="text-3xl font-black text-gray-900">{{ $totalProduk ?? 0 }} Model</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-xl">👟</div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-xs hover:shadow-md transition flex items-center justify-between">
                <div class="space-y-1">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Pesanan Masuk</p>
                    <p class="text-3xl font-black text-emerald-600">{{ $totalOrder ?? 0 }} Order</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center text-xl">📦</div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-xs hover:shadow-md transition flex items-center justify-between">
                <div class="space-y-1">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Status Sistem</p>
                    <p class="text-3xl font-black text-blue-600">Aktif</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center text-xl">⚡</div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-gray-900 to-blue-950 rounded-2xl p-6 md:p-8 text-white flex flex-col md:flex-row justify-between items-center gap-6 shadow-sm">
            <div class="space-y-1 text-center md:text-left">
                <h3 class="text-lg font-bold">Butuh menambah varian sepatu baru?</h3>
                <p class="text-gray-400 text-xs font-light">Masukkan data stok, harga, dan brand langsung ke dalam sistem database katalog.</p>
            </div>
            <a href="{{ route('admin.sepatu') }}" class="bg-white text-gray-950 px-6 py-3 rounded-xl font-extrabold text-xs tracking-wider hover:bg-blue-600 hover:text-white transition shadow-md whitespace-nowrap cursor-pointer">
                KELOLA SEPATU SEKARANG →
            </a>
        </div>

    </main>

</body>
</html>