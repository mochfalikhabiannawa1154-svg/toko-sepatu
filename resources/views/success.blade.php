<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Sukses — KicksStore</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gray-950 min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] rounded-full bg-emerald-900/10 blur-[120px] pointer-events-none"></div>

    <div class="w-full max-w-md bg-gray-900/50 backdrop-blur-xl border border-gray-800 p-8 md:p-10 rounded-3xl shadow-2xl text-center space-y-6">
        
        <div class="w-16 h-16 bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 rounded-full flex items-center justify-center text-3xl mx-auto animate-pulse">
            ✓
        </div>

        <div class="space-y-2">
            <h1 class="text-2xl font-black text-white uppercase tracking-tight">Checkout Berhasil!</h1>
            <p class="text-xs text-gray-400 font-light leading-relaxed">
                Terima kasih atas pesananmu. Admin kami akan segera memverifikasi data alamat dan menyiapkan pengiriman sepatu premium kamu.
            </p>
        </div>

        <div class="bg-gray-950/60 border border-gray-800 p-4 rounded-xl text-left text-xs space-y-1.5 text-gray-300">
            <p><span class="text-gray-500 font-bold uppercase tracking-wider">ID Transaksi:</span> #{{ $id ?? '1' }}</p>
            <p><span class="text-gray-500 font-bold uppercase tracking-wider">Status Order:</span> <span class="text-amber-400 font-bold">DIPROSES</span></p>
        </div>

        <div class="pt-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="block w-full bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold py-3.5 rounded-xl tracking-wide uppercase transition">
                Pantau Order di Dashboard
            </a>
            <a href="{{ route('home') }}" class="block w-full bg-gray-900 border border-gray-800 text-gray-300 hover:text-white text-xs font-bold py-3.5 rounded-xl tracking-wide uppercase transition">
                Kembali Ke Katalog Toko
            </a>
        </div>

    </div>

</body>
</html>