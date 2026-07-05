<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Sepatu Online</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> 
</head>
<body class="bg-gray-50 font-sans antialiased">

    <nav class="bg-white shadow-xs sticky top-0 z-50 mb-10">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-black tracking-wider text-gray-900 uppercase">
                Foot<span class="text-blue-600">wear.</span>
            </a>
            <a href="{{ route('cart.index') }}" class="relative bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-medium transition flex items-center gap-2 text-sm">
                <span>🛒 Keranjang</span>
                @if(session()->has('cart') && count(session('cart')) > 0)
                    <span class="bg-blue-600 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full font-bold">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4 pb-16">
        
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-r-lg mb-8 shadow-xs flex justify-between items-center animate-fade-in">
                <span class="font-medium text-sm">✨ {{ session('success') }}</span>
                <a href="{{ route('cart.index') }}" class="text-xs bg-emerald-600 text-white px-3 py-1.5 rounded-md font-semibold hover:bg-emerald-700 transition">Lihat Keranjang</a>
            </div>
        @endif

        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 mb-2">Katalog Sepatu Terbaru</h1>
            <p class="text-gray-500 max-w-md mx-auto text-sm">Temukan melangkah dengan gaya bersama koleksi sepatu terbaik kami.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($shoes as $shoe)
                <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden shadow-xs hover:shadow-md transition-all duration-300 flex flex-col group">
                    
                    <div class="bg-gray-100 h-48 w-full flex items-center justify-center text-gray-450 relative overflow-hidden">
                        <span class="font-semibold text-xs tracking-wider uppercase text-gray-400 group-hover:scale-105 transition-transform duration-300">
                            {{ $shoe->brand }} Studio
                        </span>
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <span class="text-xs font-bold uppercase tracking-widest text-blue-600 mb-1">{{ $shoe->brand }}</span>
                        
                        <a href="{{ route('shoe.show', $shoe->id) }}" class="block mb-2 group-hover:text-blue-600 transition-colors">
                            <h2 class="text-xl font-bold text-gray-800 line-clamp-1">{{ $shoe->name }}</h2>
                        </a>
                        
                        <p class="text-gray-500 text-xs leading-relaxed mb-6 line-clamp-2 flex-1">{{ $shoe->description }}</p>
                        
                        <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                            <div class="flex flex-col">
                                <span class="text-xs text-gray-400 font-medium">Harga</span>
                                <span class="text-lg font-black text-gray-900">Rp {{ number_format($shoe->price, 0, ',', '.') }}</span>
                            </div>
                            <span class="text-[11px] font-bold bg-gray-100 text-gray-600 px-2.5 py-1 rounded-md">
                                Stok: {{ $shoe->stock }}
                            </span>
                        </div>
                        
                        <form action="{{ route('cart.add', $shoe->id) }}" method="POST" class="mt-5">
                            @csrf
                            <form action="{{ route('cart.add', $shoe->id) }}" method="POST">
    @csrf
    <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 font-medium transition">
        Tambah ke Keranjang
    </button>
</form>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>

    </div>

</body>
</html>