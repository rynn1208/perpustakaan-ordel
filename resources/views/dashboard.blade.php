<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Perpustakaan Digital</title>
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar .brand {
            font-size: 18px;
            font-weight: 800;
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
            margin-left: 10px;
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
            opacity: 0.8;
            transition: 0.3s;
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
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border-left: 5px solid #987D9A;
        }

        .welcome-card h2 {
            margin: 0;
            color: #987D9A;
        }

        .grid-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-top: 4px solid #BB9AB1;
        }

        .stat-title {
            color: #987D9A;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 800;
            color: #333;
        }

        .table-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .table-header {
            background-color: #1F6F5F;
            color: white;
            padding: 15px 20px;
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
            font-size: 14px;
        }

        th {
            background-color: #fafafa;
            color: #987D9A;
            font-size: 12px;
            text-transform: uppercase;
        }

        .badge-telat {
            background-color: #EECEB9;
            color: #8c5a42;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">Perpustakaan | <span class="role-badge">{{ Auth::user()->role }}</span></div>
        <div class="nav-links">
            <a href="/dashboard" class="active">Dashboard</a>
            @if(Auth::user()->role == 'admin')
                <a href="/buku">Data Buku</a>
                <a href="/anggota">Kelola Anggota</a>
                <a href="/transaksi">Transaksi</a>
                <a href="/histori-denda">Histori Denda</a>
            @else
                <a href="/peminjaman">Peminjaman Buku</a>
                <a href="/dipinjam">Buku Dipinjam</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-card">
            <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p style="color: #666; margin-top: 5px;">Ini adalah ringkasan aktivitas sistem perpustakaan hari ini.</p>
        </div>

        @if(Auth::user()->role == 'admin')
            <div class="grid-cards">
                <div class="stat-card" style="border-top-color: #BB9AB1;">
                    <div class="stat-title">Total Koleksi Buku</div>
                    <div class="stat-number">{{ $total_buku }}</div>
                </div>
                <div class="stat-card" style="border-top-color: #e67e22;">
                    <div class="stat-title">Sedang Dipinjam</div>
                    <div class="stat-number">{{ $buku_dipinjam }}</div>
                </div>
                <div class="stat-card" style="border-top-color: #1F6F5F;">
                    <div class="stat-title">Total Anggota</div>
                    <div class="stat-number">{{ $total_siswa }}</div>
                </div>
            </div>

            <div class="table-card">
                <div class="table-header">
                    <i class="fas fa-clock-rotate-left"></i> 5 Histori Denda Terbaru
                </div>
                <div style="overflow-x: auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Siswa</th>
                                <th>Buku</th>
                                <th>Terlambat</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($denda as $item)
                                <tr>
                                    <td style="font-weight: 600;">{{ $item->user->name }}</td>
                                    <td>{{ $item->peminjaman->buku->judul }}</td>
                                    <td><span class="badge-telat">{{ $item->hari_telat }} Hari</span></td>
                                    <td style="color: #E74C3C; font-weight: bold;">Rp
                                        {{ number_format($item->total_denda, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center; color: #999; padding: 30px;">Belum ada catatan
                                        denda terbaru.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if(Auth::user()->role == 'siswa')
            <div class="stat-card">
                <h3 style="margin-top: 0; color: #987D9A;">📚 Status Pinjaman</h3>
                <p>Anda sedang meminjam <strong>{{ $pinjaman_aktif }}</strong> buku saat ini.</p>
            </div>
        @endif
    </div>

</body>

</html>