<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Toko Sepatu</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 p-6 md:p-12">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow-xs border border-gray-100">
        <h1 class="text-3xl font-black text-gray-900 mb-8">Informasi Pengiriman</h1>

        <form action="{{ route('checkout.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @csrf
            <!-- Form Input Alamat -->
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="customer_name" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor WhatsApp/HP</label>
                    <input type="text" name="customer_phone" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600" placeholder="08xxxxxxxxxx">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lengkap Rumah</label>
                    <textarea name="customer_address" rows="4" required class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-blue-600"></textarea>
                </div>
            </div>

            <!-- Ringkasan Pesanan -->
            <div class="bg-gray-50 p-6 rounded-2xl flex flex-col justify-between">
                <div>
                    <h3 class="font-bold text-gray-800 text-lg mb-4 border-b pb-2 border-gray-200">Ringkasan Pesanan</h3>
                    <div class="divide-y divide-gray-200 max-h-48 overflow-y-auto pr-2">
                        @php $total = 0; @endphp
                        @foreach($cart as $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <div class="py-2.5 flex justify-between text-sm">
                                <span class="text-gray-600">{{ $details['name'] }} <b class="text-gray-900">x{{ $details['quantity'] }}</b></span>
                                <span class="font-semibold text-gray-800">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-6 border-t border-gray-200 pt-4">
                    <div class="flex justify-between items-center mb-6">
                        <span class="font-bold text-gray-900">Total Akhir:</span>
                        <span class="text-xl font-black text-emerald-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-bold text-sm shadow-xs transition active:scale-98 cursor-pointer">
                        Konfirmasi & Selesaikan Pesanan
                    </button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>