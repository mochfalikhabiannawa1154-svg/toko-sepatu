<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEOVANT_OFFICIAL — Toko Sepatu Premium</title>
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
                GEOVANT_<span class="text-blue-600">OFFICIAL.</span>
            </a>
            
            <div class="flex items-center gap-6">
                <a href="{{ route('cart.index') }}" class="relative group p-2 bg-gray-100 rounded-full hover:bg-gray-900 hover:text-white transition-all duration-300">
                    <span class="text-xl block group-hover:scale-110 transition-transform">🛒</span>
                </a>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold bg-blue-600 text-white px-5 py-2.5 rounded-full hover:bg-blue-700 transition-all shadow-sm">
                            Masuk Panel Admin
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="text-sm font-bold bg-gray-900 text-white px-5 py-2.5 rounded-full hover:bg-blue-600 transition-all shadow-sm">
                            Dashboard ({{ auth()->user()->name }})
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-gray-750 hover:text-blue-600 transition">Masuk</a>
                    <a href="{{ route('register') }}" class="text-sm font-bold bg-gray-900 text-white px-5 py-2.5 rounded-full hover:bg-blue-600 transition-all shadow-sm">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-6 pt-8 pb-16">
        <div class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-blue-950 rounded-3xl overflow-hidden p-8 md:p-16 flex flex-col justify-center min-h-[450px] shadow-xl">
            <div class="absolute right-0 top-0 w-1/2 h-full opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-400 via-transparent to-transparent pointer-events-none"></div>
            
            <div class="max-w-xl relative z-10 space-y-6">
                <span class="inline-block bg-blue-500/20 text-blue-400 font-extrabold text-xs tracking-widest uppercase px-3 py-1 rounded-full border border-blue-500/30">
                    Koleksi Terbaru 2026
                </span>
                <h1 class="text-4xl md:text-6xl font-black text-white tracking-tight leading-none uppercase">
                    Langkah Nyata, <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-indigo-300">Gaya Berbeda.</span>
                </h1>
                <p class="text-gray-300 text-base md:text-lg font-light leading-relaxed">
                    Temukan sneakers impianmu dengan kualitas premium, desain autentik, dan kenyamanan maksimal untuk melangkah lebih jauh.
                </p>
                <div class="pt-2">
                    <a href="#katalog" class="inline-block bg-white text-gray-950 px-8 py-4 rounded-full font-extrabold text-sm hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:-translate-y-1 shadow-lg">
                        Jelajahi Produk ↓
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 pb-12">
        <div class="flex flex-wrap gap-4 items-center justify-center bg-white border border-gray-100 p-6 rounded-2xl shadow-xs">
            <span class="text-xs font-bold uppercase tracking-wider text-gray-400 mr-4">Brand Populer:</span>
            <span class="bg-gray-50 text-gray-800 px-5 py-2 rounded-xl font-bold text-sm border border-gray-100 cursor-pointer hover:bg-gray-900 hover:text-white transition">Nike</span>
            <span class="bg-gray-50 text-gray-800 px-5 py-2 rounded-xl font-bold text-sm border border-gray-100 cursor-pointer hover:bg-gray-900 hover:text-white transition">Adidas</span>
            <span class="bg-gray-50 text-gray-800 px-5 py-2 rounded-xl font-bold text-sm border border-gray-100 cursor-pointer hover:bg-gray-900 hover:text-white transition">Puma</span>
            <span class="bg-gray-50 text-gray-800 px-5 py-2 rounded-xl font-bold text-sm border border-gray-100 cursor-pointer hover:bg-gray-900 hover:text-white transition">New Balance</span>
        </div>
    </section>

    <main id="katalog" class="max-w-7xl mx-auto px-6 pb-24 space-y-8">
        <div>
            <h2 class="text-3xl font-black tracking-tight uppercase text-gray-900">Katalog Produk</h2>
            <p class="text-gray-500 text-sm mt-1">Pilih pasang terbaikmu hari ini.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($shoes as $shoe)
                <div class="group bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between transform hover:-translate-y-1">
                    
                    <div class="relative bg-gray-50 aspect-square flex items-center justify-center p-8 overflow-hidden">
                        <span class="text-6xl group-hover:scale-110 transition-transform duration-500 ease-out">👟</span>
                        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-xs text-gray-900 px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-wider shadow-xs border border-gray-100">
                            {{ $shoe->brand }}
                        </span>
                    </div>

                    <div class="p-6 space-y-4 flex-1 flex flex-col justify-between">
                        <div class="space-y-1">
                            <h3 class="font-extrabold text-base text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-1">
                                <a href="{{ route('shoe.show', $shoe->id) }}">{{ $shoe->name }}</a>
                            </h3>
                            <div class="flex justify-between items-center pt-1">
                                <span class="text-lg font-black text-gray-950">
                                    Rp {{ number_format($shoe->price, 0, ',', '.') }}
                                </span>
                                <span class="text-xs font-semibold text-gray-400">
                                    Stok: <span class="text-gray-900 font-bold">{{ $shoe->stock }}</span>
                                </span>
                            </div>
                        </div>

                        <form action="{{ route('cart.add', $shoe->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-gray-900 hover:bg-blue-600 text-white text-xs font-bold py-3.5 rounded-xl tracking-wide uppercase transition-all duration-300 shadow-xs cursor-pointer flex items-center justify-center">
                                + Ke Keranjang
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </main>

    <footer class="bg-gray-950 text-gray-500 py-12 border-t border-gray-900">
        <div class="max-w-7xl mx-auto px-6 text-center text-xs space-y-2">
            <p class="font-bold text-gray-300 uppercase tracking-widest">GEOVANT_OFFICIAL © 2026</p>
            <p>Dibuat dengan penuh dedikasi untuk penikmat kultur sneakers berkualitas.</p>
        </div>
    </footer>

</body>
</html>