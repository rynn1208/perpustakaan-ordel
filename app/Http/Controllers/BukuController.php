<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{

    public function index()
    {
        $bukus = Buku::orderBy('id', 'desc')->get();
        return view('buku.index', compact('bukus'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'stok' => 'required|numeric|min:0',
        ]);
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('covers', 'public');
            $data['cover'] = $path;
        }

        $request->validate([
            'judul' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);


        $data = $request->all();


        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('covers', 'public');
            $data['cover'] = $path;
        }

        Buku::create($data);


        return back()->with('success', 'Buku baru berhasil ditambahkan ke katalog!');
    }

    public function destroy($id)
    {
        Buku::findOrFail($id)->delete();
        return back()->with('success', 'Buku berhasil dihapus dari sistem.');
    }
}