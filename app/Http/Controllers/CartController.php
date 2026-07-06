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

        // Validasi awal sebelum dimasukkan ke keranjang
        if ($shoe->stock <= 0) {
            return redirect()->back()->with('error', 'Maaf, stok sepatu ini sedang kosong!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Cek apakah penambahan melebihi stok yang ada
            if ($cart[$id]['quantity'] >= $shoe->stock) {
                return redirect()->back()->with('error', 'Jumlah keranjang tidak boleh melebihi stok yang tersedia.');
            }
            $cart[$id]['quantity']++;
        } else {
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
     * Mengurangi jumlah produk di keranjang atau menghapusnya jika tinggal 1.
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Keranjang berhasil diperbarui.');
    }

    /**
     * Menghapus total satu jenis produk dari keranjang.
     */
    public function destroy($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
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
        // DISESUAIKAN: Nama field ditiadakan 'customer_' agar pas dengan form HTML blade premium
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'address'        => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('home')
                ->with('error', 'Keranjang masih kosong.');
        }

        $totalPrice = 0;

        // Hitung total harga dan validasi stok akhir di database
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
                    ->with('error', "Stok {$shoe->name} mendadak tidak mencukupi. Sisa stok: {$shoe->stock}");
            }

            $totalPrice += $item['price'] * $item['quantity'];
        }

        // Simpan data ke tabel Orders
        $order = Order::create([
            'customer_name'  => $request->customer_name,
            'customer_phone' => $request->phone, // Menghubungkan ke kolom 'customer_phone' di DB
            'address'        => $request->address,        // Menghubungkan ke kolom 'address' di DB
            'total_price'    => $totalPrice,
            'payment_method' => $request->payment_method,
            'status'         => 'pending',
        ]);

        // Eksekusi pemotongan stok otomatis secara aman
        foreach ($cart as $id => $item) {
            $shoe = Shoe::find($id);
            if ($shoe) {
                $shoe->decrement('stock', $item['quantity']);
            }
        }

        // Bersihkan data belanja setelah berhasil order
        session()->forget('cart');

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