<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/login');

// Halaman Dashboard Utama 
Route::get('/dashboard', function () {
    if (Auth::user()->role == 'admin') {
        // Hitung data untuk Admin
        $total_buku = Buku::count(); // Menghitung total judul buku
        $buku_dipinjam = Peminjaman::where('status', 'Dipinjam')->count(); // Menghitung buku yang masih di tangan siswa
        $total_siswa = User::where('role', 'siswa')->count(); // Menghitung total akun siswa

        return view('dashboard', compact('total_buku', 'buku_dipinjam', 'total_siswa'));
    } else {
        // Hitung data untuk Siswa
        $pinjaman_aktif = Peminjaman::where('user_id', Auth::id())
            ->where('status', 'Dipinjam')
            ->count();

        return view('dashboard', compact('pinjaman_aktif'));
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// jalur admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Rute Kelola Buku
    Route::get('/buku', [BukuController::class, 'index']);
    Route::post('/buku', [BukuController::class, 'store']);
    Route::delete('/buku/{id}', [BukuController::class, 'destroy']);
    // Rute Kelola Anggota 
    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy']);
    // Rute Transaksi Admin 
    Route::get('/transaksi', [PeminjamanController::class, 'transaksiAdmin']);
    Route::delete('/transaksi/{id}', [PeminjamanController::class, 'destroy']);
});

// jalur siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    // Rute Siswa meminjam buku
    Route::get('/peminjaman', [PeminjamanController::class, 'daftarBuku']);
    Route::post('/peminjaman/{buku_id}', [PeminjamanController::class, 'pinjam']);
    // Rute Pengembalian Buku 
    Route::get('/dipinjam', [PeminjamanController::class, 'bukuDipinjam']);
    Route::post('/kembalikan/{id}', [PeminjamanController::class, 'kembalikan']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/anggota', [App\Http\Controllers\AnggotaController::class, 'store']);


require __DIR__ . '/auth.php';