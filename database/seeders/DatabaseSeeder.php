<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // 1. Akun Admin
        User::create([
            'name' => 'Admin Sistem',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        // 2. Akun Demo Siswa/Kasir
        $siswa_utama = User::create([
            'name' => 'Akun Demo',
            'username' => 'siswa',
            'password' => Hash::make('password'),
            'role' => 'siswa'
        ]);

        // 3. Akun Pengguna Acak
        $users_id = [$siswa_utama->id];
        for ($i = 1; $i <= 5; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'username' => $faker->unique()->userName,
                'password' => Hash::make('password'),
                'role' => 'siswa'
            ]);
            $users_id[] = $user->id;
        }

        // 4. Koleksi Buku Edukasi, IT & Sains
        $buku_edukasi = [
            ['Pemrograman Web dengan HTML, CSS & JS', 'Budi Raharjo', 'Informatika', 2023, 20],
            ['Panduan Lengkap Reparasi & Flashing Smartphone', 'Joko Susilo', 'Elex Media', 2021, 15],
            ['Mastering Audio Mixer & Teori Frekuensi Suara', 'Agus Setiawan', 'Andi Publisher', 2020, 12],
            ['Kumpulan Rumus Cepat Matematika Terapan', 'Prof. Yohanes Surya', 'Kandel', 2018, 30],
            ['Filosofi Teras', 'Henry Manampiring', 'Kompas', 2019, 45],
            ['Atomic Habits (Edisi Terjemahan)', 'James Clear', 'Gramedia', 2020, 50],
            ['Algoritma dan Struktur Data Tingkat Lanjut', 'Rinaldi Munir', 'Informatika', 2016, 25],
            ['Dasar-Dasar Jaringan Komputer Modern', 'Iwan Sofana', 'Informatika', 2022, 18],
        ];

        $buku_ids = [];

        // Masukkan buku asli
        foreach ($buku_edukasi as $item) {
            $buku = Buku::create([
                'judul' => $item[0],
                'pengarang' => $item[1],
                'penerbit' => $item[2],
                'tahun_terbit' => $item[3],
                'stok' => $item[4]
            ]);
            $buku_ids[] = $buku->id;
        }

        // Tambahan buku edukasi/sains acak dari Faker
        $kategori_faker = ['Teknologi Informasi', 'Sains Terapan', 'Matematika Dasar', 'Pengembangan Diri', 'Bisnis & Ekonomi'];
        for ($i = 1; $i <= 20; $i++) {
            $buku = Buku::create([
                'judul' => 'Pengantar ' . $faker->randomElement($kategori_faker) . ' ' . $faker->word,
                'pengarang' => $faker->name,
                'penerbit' => $faker->company,
                'tahun_terbit' => $faker->numberBetween(2015, 2026),
                'stok' => $faker->numberBetween(10, 40)
            ]);
            $buku_ids[] = $buku->id;
        }

        // 5. Transaksi Peminjaman Acak
        for ($i = 1; $i <= 30; $i++) {
            $tgl_pinjam = Carbon::now()->subDays($faker->numberBetween(1, 20));
            $is_dikembalikan = $faker->boolean(70);

            Peminjaman::create([
                'user_id' => $faker->randomElement($users_id),
                'buku_id' => $faker->randomElement($buku_ids),
                'tanggal_pinjam' => $tgl_pinjam->format('Y-m-d'),
                'tanggal_kembali' => $is_dikembalikan ? $tgl_pinjam->copy()->addDays($faker->numberBetween(1, 10))->format('Y-m-d') : null,
                'status' => $is_dikembalikan ? 'dikembalikan' : 'dipinjam'
            ]);
        }
    }
}