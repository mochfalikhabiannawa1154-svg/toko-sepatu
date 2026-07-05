<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    // Menampilkan semua data sepatu
    public function index()
    {
        // Mengambil semua data sepatu dari database
        $shoes = Shoe::all();

        // Mengirim data ke view home
        return view('home', compact('shoes'));
    }

    // Menampilkan detail sepatu berdasarkan ID
    public function show($id)
    {
        // Cari sepatu berdasarkan ID, jika tidak ditemukan akan menampilkan 404
        $shoe = Shoe::findOrFail($id);

        // Mengirim data ke view detail
        return view('detail', compact('shoe'));
    }
}