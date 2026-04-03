<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    //  Menampilkan daftar buku 
    public function daftarBuku()
    {
        // Hanya tampilkan buku yang stoknya lebih dari 0
        $bukus = Buku::where('stok', '>', 0)->orderBy('judul', 'asc')->get();
        return view('siswa.buku', compact('bukus'));
    }

    // proses saat Siswa menekan tombol "Pinjam"
    public function pinjam(Request $request, $buku_id)
    {
        $buku = Buku::findOrFail($buku_id);

        // Validasi 
        if ($buku->stok <= 0) {
            return back()->with('error', 'Maaf, buku ini baru saja habis dipinjam orang lain.');
        }

        $tgl_pinjam = $request->tanggal_pinjam_manual ?: date('Y-m-d');

        $cek_pinjam = Peminjaman::where('user_id', Auth::id())
            ->where('buku_id', $buku_id)
            ->where('status', 'Dipinjam')
            ->first();

        if ($cek_pinjam) {
            return back()->with('error', 'Anda masih meminjam buku ini. Kembalikan dulu sebelum meminjam lagi!');
        }

        // Catat ke tabel peminjaman
        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $buku_id,
            'tanggal_pinjam' => $tgl_pinjam,
            'status' => 'dipinjam'
        ]);

        // Kurangi stok buku 
        $buku->decrement('stok');


        return back()->with('success', 'Buku berhasil dipinjam! Selamat membaca.');
    }

    // Menampilkan daftar buku 
    public function bukuDipinjam()
    {
        // Ambil data peminjaman 
        $peminjamans = Peminjaman::with('buku')
            ->where('user_id', Auth::id())
            ->orderBy('id', 'desc')
            ->get();

        return view('siswa.dipinjam', compact('peminjamans'));
    }

    // Tambahkan Request $request di sini
    public function kembalikan(Request $request, $id)
    {
        $pinjam = Peminjaman::findOrFail($id);

        if (strtolower($pinjam->status) == 'dipinjam') {

            $tgl_pinjam = Carbon::parse($pinjam->tanggal_pinjam);
            $tenggat_waktu = $tgl_pinjam->copy()->addDays(7); // Jatah 7 hari

            // AMBIL TANGGAL DARI FORM SIMULASI (Jika kosong, pakai hari ini)
            $tgl_kembali_simulasi = $request->tanggal_kembali_manual ?: date('Y-m-d');
            $hari_ini = Carbon::parse($tgl_kembali_simulasi); // Mesin waktu aktif!

            $pesan = 'Terima kasih telah mengembalikan buku tepat waktu!';
            $tipe_notif = 'success';

            // Cek apakah tanggal simulasi kembali melebihi batas waktu
            if ($hari_ini->greaterThan($tenggat_waktu)) {
                $telat_hari = $tenggat_waktu->diffInDays($hari_ini);
                $total_denda = $telat_hari * 1000; // Denda Rp 1.000 / hari

                $pesan = "Buku dikembalikan. Anda terlambat $telat_hari hari! Silakan bayar denda sebesar Rp " . number_format($total_denda, 0, ',', '.') . " ke Admin.";
                $tipe_notif = 'warning';
            }

            // Kembalikan stok buku
            $pinjam->buku->increment('stok');

            // Simpan perubahan dan catat tanggal kembalinya sesuai mesin waktu
            $pinjam->update([
                'status' => 'dikembalikan',
                'tanggal_kembali' => $hari_ini->format('Y-m-d')
            ]);

            return back()->with($tipe_notif, $pesan);
        }

        return back()->with('error', 'Buku ini sudah dikembalikan sebelumnya.');
    }

    // khusus admin
    public function transaksiAdmin(Request $request)
    {
        // Fitur Pencarian
        $query = Peminjaman::with(['user', 'buku'])->orderBy('id', 'desc');

        if ($request->has('cari') && $request->cari != '') {
            $cari = $request->cari;
            $query->whereHas('user', function ($q) use ($cari) {
                $q->where('name', 'like', "%$cari%");
            })->orWhereHas('buku', function ($q) use ($cari) {
                $q->where('judul', 'like', "%$cari%");
            });
        }

        $transaksis = $query->get();
        return view('transaksi.index', compact('transaksis'));
    }

    // Menghapus riwayat transaksi
    public function destroy($id)
    {
        Peminjaman::findOrFail($id)->delete();
        return back()->with('success', 'Riwayat transaksi berhasil dihapus dari sistem.');
    }
}

