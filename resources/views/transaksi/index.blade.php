<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Transaksi - Perpustakaan Digital</title>
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

        .card {
            background: white;
            padding: 0;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            border-top: 4px solid #f1c40f;
            overflow: hidden;
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid #ecf0f1;
            background-color: #fff;
            margin: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            color: #987D9A;
            font-size: 18px;
            font-weight: 800;
            margin: 0;
        }

        .search-box {
            display: flex;
            gap: 10px;
        }

        .search-input {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: inherit;
            width: 250px;
            outline: none;
        }

        .search-btn {
            background-color: #987D9A;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-family: inherit;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #EECEB9;
            color: #7f8c8d;
            text-align: left;
            padding: 15px 20px;
            font-size: 13px;
            text-transform: uppercase;
            border-bottom: 2px solid #ecf0f1;
        }

        td {
            padding: 15px 20px;
            border-bottom: 1px solid #ecf0f1;
            color: #987D9A;
            font-size: 14px;
            font-weight: 600;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            color: white;
        }

        .badge.dipinjam {
            background-color: #e67e22;
        }

        .badge.dikembalikan {
            background-color: #9b59b6;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">PERPUSTAKAAN | <span class="role-badge">{{ Auth::user()->role }}</span></div>
        <div class="nav-links">
            <a href="/dashboard">Dashboard</a>
            <a href="/buku">Data Buku</a>
            <a href="/anggota">Kelola Anggota</a>
            <a href="/transaksi" class="active">Transaksi</a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">📝 Rekap Seluruh Transaksi Peminjaman</h3>

                <form action="/transaksi" method="GET" class="search-box">
                    <input type="text" name="cari" class="search-input" placeholder="Cari nama siswa atau judul buku..."
                        value="{{ request('cari') }}">
                    <button type="submit" class="search-btn">🔍 Cari</button>
                </form>
            </div>

            <div style="overflow-x: auto;">
                <table>
                    <tr>
                        <th>Peminjam (Siswa)</th>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($transaksis as $row)
                        <tr>
                            <td style="font-weight: 800;">{{ $row->user->name ?? 'User Dihapus' }}</td>
                            <td style="color: #BB9AB1;">{{ $row->buku->judul ?? 'Buku Dihapus' }}</td>
                            <td>{{ date('d M Y', strtotime($row->tanggal_pinjam)) }}</td>
                            <td>
                                @if($row->tanggal_kembali)
                                    {{ date('d M Y', strtotime($row->tanggal_kembali)) }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ strtolower($row->status) }}">
                                    {{ ucfirst($row->status) }}
                                </span>
                            </td>
                            <td>
                                <form action="/transaksi/{{ $row->id }}" method="POST" id="form-hapus-{{ $row->id }}"
                                    style="margin:0;">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="konfirmasiHapus({{ $row->id }})"
                                        style="background: none; color: #e74c3c; border: none; font-weight: bold; cursor: pointer; padding: 0;">❌
                                        Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if(count($transaksis) == 0)
                        <tr>
                            <td colspan="6" style="text-align: center; color: #7f8c8d; padding: 30px;">Tidak ada data
                                transaksi yang ditemukan.</td>
                        </tr>
                    @endif
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
                title: 'Hapus Riwayat?', text: 'Catatan transaksi ini akan dihapus permanen.', icon: 'warning', showCancelButton: true, confirmButtonColor: '#e74c3c', confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) document.getElementById('form-hapus-' + id).submit();
            })
        }
    </script>
</body>

</html>