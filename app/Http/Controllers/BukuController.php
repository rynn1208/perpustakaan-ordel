<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    // Menampilkan halaman kelola buku
    public function index()
    {
        $bukus = Buku::orderBy('id', 'desc')->get();
        return view('buku.index', compact('bukus'));
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric|min:0', // min:0 mencegah stok minus
        ]);

        Buku::create($request->all());

        return back()->with('success', 'Buku baru berhasil ditambahkan ke katalog!');
    }

    // Menghapus data buku
    public function destroy($id)
    {
        Buku::findOrFail($id)->delete();
        return back()->with('success', 'Buku berhasil dihapus dari sistem.');
    }
}