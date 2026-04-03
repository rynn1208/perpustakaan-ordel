<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Buku - Perpustakaan Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #FEFBD8;
            color: #333;
            margin: 0;
            padding-bottom: 40px;
        }

        /* NAVBAR ELEGAN */
        .navbar {
            background-color: #987D9A;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar .brand {
            font-size: 18px;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .role-badge {
            background-color: #EECEB9;
            color: #987D9A;
            font-size: 12px;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: bold;
            text-transform: capitalize;
        }

        .nav-links {
            display: flex;
            gap: 25px;
            align-items: center;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: white;
        }

        .btn-logout {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-family: inherit;
        }

        .container {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        /* KARTU FORM & TABEL */
        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            margin-bottom: 30px;
            border-top: 4px solid #BB9AB1;
        }

        .card-header {
            margin-top: 0;
            margin-bottom: 20px;
            color: #987D9A;
            font-size: 18px;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 10px;
            font-weight: 800;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-family: inherit;
        }

        .btn-submit {
            background-color: #BB9AB1;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            font-family: inherit;
            grid-column: span 2;
            font-size: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #EECEB9;
            color: #7f8c8d;
            text-align: left;
            padding: 15px;
            font-size: 13px;
            text-transform: uppercase;
            border-bottom: 2px solid #ecf0f1;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #ecf0f1;
            color: #987D9A;
            font-size: 14px;
            font-weight: 600;
        }

        .badge-stok {
            background-color: #BB9AB1;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
        }

        .badge-stok.habis {
            background-color: #e74c3c;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">PERPUSTAKAAN | <span class="role-badge">{{ Auth::user()->role }}</span></div>
        <div class="nav-links">
            <a href="/dashboard">Dashboard</a>
            <a href="/buku" class="active">Data Buku</a>
            <a href="/anggota">Kelola Anggota</a>
            <a href="/transaksi">Transaksi</a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <h3 class="card-header">📘 Tambah Koleksi Buku</h3>
            <form method="POST" action="/buku" class="form-grid">
                @csrf
                <input type="text" name="judul" placeholder="Judul Buku Lengkap" required>
                <input type="text" name="pengarang" placeholder="Nama Pengarang" required>
                <input type="text" name="penerbit" placeholder="Nama Penerbit" required>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <input type="number" name="tahun_terbit" placeholder="Tahun (Cth: 2024)" required>
                    <input type="number" name="stok" placeholder="Jumlah Stok" min="0" required>
                </div>
                <button type="submit" class="btn-submit">+ Simpan ke Katalog</button>
            </form>
        </div>

        <div class="card" style="border-top-color: #987D9A;">
            <h3 class="card-header">📚 Daftar Katalog Perpustakaan</h3>
            <div style="overflow-x: auto;">
                <table>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Penulis & Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($bukus as $row)
                        <tr>
                            <td style="font-weight: 800; color: #BB9AB1;">{{ $row->judul }}</td>
                            <td>
                                <div>{{ $row->pengarang }}</div>
                                <div style="font-size: 12px; color: #7f8c8d;">{{ $row->penerbit }}</div>
                            </td>
                            <td>{{ $row->tahun_terbit }}</td>
                            <td>
                                <span class="badge-stok {{ $row->stok == 0 ? 'habis' : '' }}">
                                    {{ $row->stok }} Tersedia
                                </span>
                            </td>
                            <td>
                                <form action="/buku/{{ $row->id }}" method="POST" id="form-hapus-{{ $row->id }}"
                                    style="margin:0;">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="konfirmasiHapus({{ $row->id }})"
                                        style="background: none; color: #e74c3c; border: none; font-weight: bold; cursor: pointer; padding: 0;">❌
                                        Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({ title: 'Berhasil!', text: '{{ session("success") }}', icon: 'success', confirmButtonColor: '#BB9AB1' });
            @endif
        });

        function konfirmasiHapus(id) {
            Swal.fire({
                title: 'Hapus Buku?', text: 'Buku ini akan dihapus permanen dari sistem.', icon: 'warning', showCancelButton: true, confirmButtonColor: '#e74c3c', confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) document.getElementById('form-hapus-' + id).submit();
            })
        }
    </script>
</body>

</html>