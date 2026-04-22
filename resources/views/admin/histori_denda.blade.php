<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Denda - Perpustakaan Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #FEFBD8;
            color: #333;
            margin: 0;
            padding-bottom: 40px;
        }

        .navbar {
            background-color: #1F6F5F;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
            box-shadow: 0 2px 10px rgba(152, 125, 154, 0.3);
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
            color: #FEFBD8;
            text-decoration: none;
            transition: 0.3s;
            opacity: 0.8;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: white;
            opacity: 1;
        }

        .btn-logout {
            background-color: #E74C3C;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-family: inherit;
            transition: 0.3s;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card-table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(152, 125, 154, 0.1);
            overflow: hidden;
        }

        .card-header {
            background-color: #1F6F5F;
            color: white;
            padding: 20px;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #f1f1f1;
        }

        th {
            color: #987D9A;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 13px;
            background-color: #fafafa;
        }

        tbody tr:hover {
            background-color: #fdfdfd;
        }

        .badge-telat {
            background-color: #EECEB9;
            color: #8c5a42;
            padding: 4px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }

        .text-denda {
            color: #E74C3C;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">
            Perpustakaan | <span class="role-badge">{{ Auth::user()->role }}</span>
        </div>
        <div class="nav-links">
            <a href="/dashboard">Dashboard</a>
            <a href="/buku">Data Buku</a>
            <a href="/anggota">Kelola Anggota</a>
            <a href="/transaksi">Transaksi</a>
            <a href="/histori-denda" class="active"> Histori Denda </a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="card-table">
            <div class="card-header">
                <i class="fas fa-file-invoice-dollar"></i> Histori Denda Siswa
            </div>

            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Judul Buku</th>
                            <th>Terlambat</th>
                            <th>Total Denda</th>
                            <th>Tanggal Catat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dendas as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td style="font-weight: 600;">{{ $item->user->name }}</td>
                                <td>{{ $item->peminjaman->buku->judul }}</td>
                                <td>
                                    <span class="badge-telat">{{ $item->hari_telat }} Hari</span>
                                </td>
                                <td class="text-denda">
                                    Rp {{ number_format($item->total_denda, 0, ',', '.') }}
                                </td>
                                <td style="color: #888; font-size: 14px;">
                                    {{ $item->created_at->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 40px; color: #999;">
                                    <i class="fas fa-check-circle"
                                        style="font-size: 40px; color: #ddd; margin-bottom: 10px;"></i>
                                    <br>Belum ada histori denda tercatat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>