<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Anggota - Perpustakaan Digital</title>
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
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        /* KARTU & TABEL */
        .card {
            background: white;
            padding: 0;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            border-top: 4px solid #9b59b6;
            overflow: hidden;
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid #ecf0f1;
            background-color: #fff;
            margin: 0;
            color: #987D9A;
            font-size: 18px;
            font-weight: 800;
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

        .badge-siswa {
            background-color: #BB9AB1;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">PERPUSTAKAAN | <span class="role-badge">{{ Auth::user()->role }}</span></div>
        <div class="nav-links">
            <a href="/dashboard">Dashboard</a>
            <a href="/buku">Data Buku</a>
            <a href="/anggota" class="active">Kelola Anggota</a>
            <a href="/transaksi">Transaksi</a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <h3 class="card-header">👥 Daftar Anggota Terdaftar (Siswa)</h3>
            <div style="overflow-x: auto;">
                <table>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($anggotas as $row)
                        <tr>
                            <td style="font-weight: 800;">{{ $row->name }}</td>
                            <td style="color: #7f8c8d;">{{ $row->username }}</td>
                            <td>{{ date('d M Y', strtotime($row->created_at)) }}</td>
                            <td><span class="badge-siswa">Aktif</span></td>
                            <td>
                                <form action="/anggota/{{ $row->id }}" method="POST" id="form-hapus-{{ $row->id }}"
                                    style="margin:0;">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="konfirmasiHapus({{ $row->id }}, '{{ $row->name }}')"
                                        style="background: none; color: #e74c3c; border: none; font-weight: bold; cursor: pointer; padding: 0;">❌
                                        Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    @if(count($anggotas) == 0)
                        <tr>
                            <td colspan="5" style="text-align: center; color: #7f8c8d; padding: 30px;">Belum ada siswa yang
                                mendaftar.</td>
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

        function konfirmasiHapus(id, nama) {
            Swal.fire({
                title: 'Hapus Anggota?', text: 'Yakin ingin menghapus akun ' + nama + '?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#e74c3c', confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) document.getElementById('form-hapus-' + id).submit();
            })
        }
    </script>
</body>

</html>