<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pembeli — KicksStore</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-black tracking-tighter uppercase">
                KICKS<span class="text-blue-600">STORE.</span>
            </a>
            
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="text-sm font-bold text-gray-600 hover:text-blue-600 transition">
                    ← Kembali Belanja
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-bold bg-red-50 text-red-600 border border-red-100 px-4 py-2 rounded-full hover:bg-red-600 hover:text-white transition cursor-pointer">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-10 space-y-8">
        
        <div class="bg-gradient-to-r from-gray-900 to-blue-950 rounded-2xl p-6 md:p-10 text-white shadow-xs relative overflow-hidden">
            <div class="absolute right-0 top-0 w-1/3 h-full opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-400 via-transparent to-transparent pointer-events-none"></div>
            <div class="relative z-10 space-y-2">
                <span class="bg-blue-500/20 text-blue-300 font-extrabold text-[10px] tracking-widest uppercase px-2.5 py-1 rounded-md border border-blue-500/30">
                    Akun Pembeli
                </span>
                <h1 class="text-2xl md:text-4xl font-black tracking-tight">Selamat Datang, {{ auth()->user()->name }}! 👋</h1>
                <p class="text-gray-400 text-xs md:text-sm font-light">Pantau semua status pesanan sepatu impianmu langsung di halaman panel pribadi ini.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-xs flex items-center gap-4">
                <div class="p-4 bg-blue-50 rounded-xl text-2xl">📦</div>
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Pesanan</p>
                    <p class="text-2xl font-black text-gray-900 mt-0.5">{{ $orders->count() }} Kali</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-xs flex items-center gap-4">
                <div class="p-4 bg-amber-50 rounded-xl text-2xl">⏳</div>
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Menunggu Proses</p>
                    <p class="text-2xl font-black text-amber-600 mt-0.5">
                        {{ $orders->where('status', 'pending')->count() }} Order
                    </p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-xs flex items-center gap-4">
                <div class="p-4 bg-emerald-50 rounded-xl text-2xl">✨</div>
                <div>
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Status Akun</p>
                    <p class="text-lg font-bold text-emerald-600 mt-1 flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 inline-block animate-pulse"></span>
                        Verified Customer
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <div>
                    <h3 class="font-black text-gray-900 text-lg uppercase tracking-tight">Riwayat Belanja</h3>
                    <p class="text-gray-400 text-xs mt-0.5">Daftar transaksi checkout yang pernah kamu lakukan.</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-gray-400 text-[11px] font-extrabold uppercase tracking-wider bg-gray-50/50">
                            <th class="p-4 pl-6">ID Order</th>
                            <th class="p-4">Alamat Pengiriman</th>
                            <th class="p-4">Metode Bayar</th>
                            <th class="p-4 text-center">Status</th>
                            <th class="p-4 text-right pr-6">Total Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse($orders as $order)
                            <tr class="hover:bg-gray-50/70 transition-colors">
                                <td class="p-4 pl-6 font-bold text-gray-900">
                                    #{{ $order->id }}
                                </td>
                                <td class="p-4 text-gray-600 max-w-xs truncate">
                                    {{ $order->address }}
                                </td>
                                <td class="p-4 font-semibold text-gray-700 uppercase text-xs">
                                    💳 {{ $order->payment_method }}
                                </td>
                                <td class="p-4 text-center">
                                    @if(($order->status ?? 'pending') == 'pending')
                                        <span class="inline-block bg-amber-50 text-amber-700 border border-amber-200 text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-md">
                                            Diproses
                                        </span>
                                    @else
                                        <span class="inline-block bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-black uppercase tracking-wider px-2.5 py-1 rounded-md">
                                            Selesai
                                        </span>
                                    @endif
                                </td>
                                <td class="p-4 text-right font-black text-gray-950 pr-6">
                                    Rp {{ number_format($order->total_price ?? 0, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-12 text-center text-gray-400 text-sm">
                                    <span class="text-4xl block mb-2">🛍️</span>
                                    Kamu belum pernah melakukan transaksi pembelian apa pun.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <footer class="bg-gray-950 text-gray-600 py-8 border-t border-gray-900 mt-20">
        <div class="max-w-7xl mx-auto px-6 text-center text-[11px] space-y-1">
            <p class="font-bold text-gray-400 uppercase tracking-widest">KICKSSTORE © 2026</p>
            <p>Panel Member Pembeli Premium.</p>
        </div>
    </footer>

</body>
</html>