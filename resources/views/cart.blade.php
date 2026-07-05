<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6">Keranjang Belanja Anda</h1>

        @if(empty($cart))
            <p class="text-gray-500">Keranjang masih kosong. <a href="/" class="text-blue-600 underline">Ayo belanja!</a></p>
        @else
            <div class="divide-y divide-gray-200">
                @php $total = 0; @endphp
                @foreach($cart as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <div class="py-4 flex justify-between items-center">
                        <div>
                            <h3 class="font-semibold text-lg text-gray-800">{{ $details['name'] }}</h3>
                            <p class="text-sm text-gray-500">{{ $details['brand'] }}</p>
                            <p class="text-sm text-gray-600">Rp {{ number_format($details['price'], 0, ',', '.') }} x {{ $details['quantity'] }}</p>
                        </div>
                        <span class="font-bold text-gray-700">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</span>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-between items-center border-t pt-4">
                <span class="text-xl font-bold">Total Pembayaran:</span>
                <span class="text-2xl font-bold text-emerald-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>

            <a href="{{ route('checkout.index') }}" class="block text-center mt-6 w-full bg-emerald-600 text-white py-3 rounded-lg font-bold text-lg hover:bg-emerald-700 transition">
    Lanjut ke Checkout
</a>
        @endif
    </div>
</body>
</html>