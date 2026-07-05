<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja — KicksStore</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-black tracking-tighter uppercase">
                KICKS<span class="text-blue-600">STORE.</span>
            </a>
            <a href="{{ route('home') }}" class="text-sm font-bold text-gray-600 hover:text-blue-600 transition">← Lanjut Belanja</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-xs">
                <h2 class="text-xl font-black uppercase text-gray-900 mb-6">📦 Keranjang Kamu</h2>
                
                @if(session('cart') && count(session('cart')) > 0)
                    <div class="divide-y divide-gray-100">
                        @foreach(session('cart') as $id => $details)
                            <div class="flex items-center gap-4 py-4 first:pt-0 last:pb-0">
                                <div class="w-16 h-16 bg-gray-50 rounded-xl flex items-center justify-center text-2xl shrink-0">👟</div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-sm text-gray-900 uppercase">{{ $details['name'] }}</h4>
                                    <p class="text-xs text-gray-400">Jumlah: {{ $details['quantity'] }} Pasang</p>
                                </div>
                                <p class="font-black text-sm text-gray-950">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-400 text-sm">
                        Keranjang belanjamu kosong melompong.
                    </div>
                @endif
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-3xl border border-gray-100 shadow-xs space-y-6">
                <h3 class="text-lg font-black uppercase text-gray-900 border-b border-gray-50 pb-3">Informasi Checkout</h3>
                
                <form action="{{ route('checkout.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Nama Lengkap</label>
                        <input type="text" name="customer_name" value="{{ auth()->check() ? auth()->user()->name : '' }}" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                        <input type="text" name="phone" placeholder="08xxxxxxxx" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Alamat Tujuan Lengkap</label>
                        <textarea name="address" rows="3" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600"></textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Metode Pembayaran</label>
                        <select name="payment_method" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600 bg-white">
                            <option value="COD">Cash On Delivery (COD)</option>
                            <option value="Transfer Bank">Transfer Bank Manual</option>
                        </select>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-between items-center">
                        <span class="text-xs text-gray-400 font-bold uppercase">Total Bayar:</span>
                        <span class="text-xl font-black text-emerald-600">
                            @php 
                                $total = 0;
                                if(session('cart')) {
                                    foreach(session('cart') as $id => $details) {
                                        $total += $details['price'] * $details['quantity'];
                                    }
                                }
                            @endphp
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl tracking-wide uppercase transition shadow-md cursor-pointer text-xs text-center block">
                        ⚡ Selesaikan Pesanan Sekarang
                    </button>
                </form>
            </div>
        </div>

    </main>

</body>
</html>