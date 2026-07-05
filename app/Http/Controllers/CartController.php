<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Shoe;

class CartController extends Controller
{
    /**
     * Menampilkan isi keranjang.
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }

    /**
     * Menambahkan produk ke keranjang.
     */
    public function add($id)
    {
        $shoe = Shoe::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Jika produk sudah ada, tambah jumlahnya
            $cart[$id]['quantity']++;
        } else {
            // Jika belum ada, masukkan ke keranjang
            $cart[$id] = [
                'name'     => $shoe->name,
                'brand'    => $shoe->brand,
                'price'    => $shoe->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with(
            'success',
            'Sepatu berhasil ditambahkan ke keranjang!'
        );
    }

    /**
     * Menampilkan halaman checkout.
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang masih kosong!');
        }

        return view('checkout', compact('cart'));
    }

    /**
     * Menyimpan data checkout.
     */
    public function storeCheckout(Request $request)
    {
        // Validasi data pembeli
        $request->validate([
            'customer_name'    => 'required|string|max:255',
            'customer_phone'   => 'required|string|max:20',
            'customer_address' => 'required|string',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('home')
                ->with('error', 'Keranjang masih kosong.');
        }

        $totalPrice = 0;

        // Hitung total harga dan cek stok
        foreach ($cart as $id => $item) {

            $shoe = Shoe::find($id);

            if (!$shoe) {
                return redirect()
                    ->route('cart.index')
                    ->with('error', 'Produk tidak ditemukan.');
            }

            if ($shoe->stock < $item['quantity']) {
                return redirect()
                    ->route('cart.index')
                    ->with(
                        'error',
                        "Stok {$shoe->name} tidak mencukupi."
                    );
            }

            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Simpan order
        $order = Order::create([
            'customer_name'    => $request->customer_name,
            'customer_phone'   => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'total_price'      => $totalPrice,
            'status'           => 'pending',
        ]);

        // Kurangi stok
        foreach ($cart as $id => $item) {
            $shoe = Shoe::find($id);

            if ($shoe) {
                $shoe->decrement('stock', $item['quantity']);
            }
        }

        // Hapus session keranjang
        session()->forget('cart');

        // Redirect ke halaman sukses
        return redirect()->route('checkout.success', $order->id);
    }

    /**
     * Halaman sukses checkout.
     */
    public function success($id)
    {
        $order = Order::findOrFail($id);

        return view('success', compact('order'));
    }
}