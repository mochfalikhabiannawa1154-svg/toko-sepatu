<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ==========================================
    // DASHBOARD & HALAMAN UTAMA
    // ==========================================

    /**
     * Dashboard Utama Admin
     */
    public function dashboard()
    {
        $totalProduk = Shoe::count();
        $totalOrder = Order::count();

        return view('admin.dashboard', compact('totalProduk', 'totalOrder'));
    }

    /**
     * Halaman Kelola Sepatu (Daftar Semua Sepatu)
     */
    public function kelolaSepatu()
    {
        $shoes = Shoe::all();

        return view('admin.kelola-sepatu', compact('shoes'));
    }

    /**
     * Halaman Pesanan Masuk
     */
    public function pesananMasuk()
    {
        $orders = Order::latest()->get();

        return view('admin.pesanan-masuk', compact('orders'));
    }

    // ==========================================
    // MANAJEMEN PRODUK SEPATU (CRUD)
    // ==========================================

    /**
     * Menampilkan form tambah sepatu
     */
    public function createSepatu()
    {
        return view('admin.create-sepatu');
    }

    /**
     * Menyimpan data sepatu baru ke database
     */
    public function storeSepatu(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'brand'       => 'required|string|max:255',
            'price'       => 'required|integer',
            'stock'       => 'required|integer',
            'description' => 'nullable|string',
        ]);

        Shoe::create($request->all());

        return redirect()->route('admin.sepatu')->with('success', 'Sepatu baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit beserta data lama sepatu yang dipilih
     */
    public function editSepatu($id)
    {
        $shoe = Shoe::findOrFail($id);

        return view('admin.edit-sepatu', compact('shoe'));
    }

    /**
     * Memproses perubahan data sepatu ke database
     */
    public function updateSepatu(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'brand'       => 'required|string|max:255',
            'price'       => 'required|integer',
            'stock'       => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $shoe = Shoe::findOrFail($id);
        $shoe->update($request->all());

        return redirect()->route('admin.sepatu')->with('success', 'Data sepatu berhasil diperbarui!');
    }

    /**
     * Menghapus data sepatu
     */
    public function destroySepatu($id)
    {
        $shoe = Shoe::findOrFail($id);
        $shoe->delete();

        return redirect()->route('admin.sepatu')->with('success', 'Sepatu berhasil dihapus!');
    }
}