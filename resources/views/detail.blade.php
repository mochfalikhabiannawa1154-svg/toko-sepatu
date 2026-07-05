<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $shoe->name }} — KicksStore</title>
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
            <a href="{{ route('home') }}" class="text-sm font-bold text-gray-600 hover:text-blue-600 transition">← Kembali</a>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-6 py-12 md:py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center bg-white p-8 md:p-12 rounded-3xl border border-gray-100 shadow-xs">
            
            <div class="bg-gray-50 aspect-square rounded-2xl flex items-center justify-center p-12 relative overflow-hidden">
                <span class="text-9xl animate-bounce duration-1000">👟</span>
                <span class="absolute top-6 left-6 bg-gray-900 text-white text-xs font-black uppercase tracking-wider px-3 py-1 rounded-lg">
                    {{ $shoe->brand }}
                </span>
            </div>

            <div class="space-y-6">
                <div class="space-y-2">
                    <h1 class="text-3xl md:text-4xl font-black tracking-tight text-gray-950 uppercase">{{ $shoe->name }}</h1>
                    <p class="text-2xl font-black text-blue-600">Rp {{ number_format($shoe->price, 0, ',', '.') }}</p>
                </div>

                <div class="border-t border-b border-gray-100 py-4 space-y-2">
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Deskripsi Produk</p>
                    <p class="text-gray-600 text-sm font-light leading-relaxed">
                        {{ $shoe->description ?? 'Tidak ada deskripsi untuk produk sepatu premium ini. Dijamin autentik, nyaman dipakai harian, dan mendongkrak kegantengan maksimal.' }}
                    </p>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Ketersediaan Stok:</span>
                    <span class="font-extrabold text-gray-950 bg-gray-100 px-3 py-1 rounded-md text-xs">{{ $shoe->stock }} Pasang Ready</span>
                </div>

                <form action="{{ route('cart.add', $shoe->id) }}" method="POST" class="pt-4">
                    @csrf
                    <button type="submit" class="w-full bg-gray-900 hover:bg-blue-600 text-white font-bold py-4 rounded-xl tracking-wide uppercase transition-all shadow-md cursor-pointer flex items-center justify-center gap-2 text-xs">
                        🛒 Masukkan Ke Keranjang Belanja
                    </button>
                </form>
            </div>

        </div>
    </main>

</body>
</html>