<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil!</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-6">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-md text-center border border-gray-100">
        <div class="w-16 h-16 bg-emerald-100 text-emerald-600 flex items-center justify-center rounded-full mx-auto mb-4 text-3xl">
            ✓
        </div>
        <h1 class="text-2xl font-black text-gray-900 mb-2">Pesanan Anda Berhasil!</h1>
        <p class="text-gray-500 text-sm mb-6">Terima kasih <span class="font-semibold text-gray-800">{{ $order->customer_name }}</span>, pesananmu sedang kami proses.</p>

        <div class="bg-gray-50 p-4 rounded-xl text-left text-xs space-y-2 mb-6 border border-gray-100">
            <div><span class="text-gray-400">ID Pesanan:</span> #{{ $order->id }}</div>
            <div><span class="text-gray-400">Total Bayar:</span> <span class="font-bold text-gray-800">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span></div>
            <div><span class="text-gray-400">Status:</span> <span class="bg-amber-100 text-amber-800 font-bold px-2 py-0.5 rounded text-[10px] uppercase">{{ $order->status }}</span></div>
        </div>

        <a href="/" class="block w-full bg-gray-900 hover:bg-gray-800 text-white py-2.5 rounded-xl text-sm font-semibold transition">
            Kembali Belanja
        </a>
    </div>
</body>
</html>