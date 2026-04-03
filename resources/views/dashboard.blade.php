<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Perpustakaan Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
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
            background-color: #BB9AB1;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-family: inherit;
            transition: 0.3s;
        }

        .btn-logout:hover {
            background-color: #987D9A;
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
            box-shadow: 0 4px 15px rgba(152, 125, 154, 0.1);
            margin-bottom: 30px;
            border-left: 5px solid #987D9A;
        }

        .welcome-card h2 {
            margin-top: 0;
            color: #987D9A;
        }

        .grid-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(152, 125, 154, 0.1);
            border-top: 4px solid #BB9AB1;
        }

        .stat-title {
            color: #987D9A;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 800;
            color: #333;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">
            PERPUSTAKAAN | <span
                class="role-badge {{ Auth::user()->role == 'siswa' ? 'siswa' : '' }}">{{ Auth::user()->role }}</span>
        </div>
        <div class="nav-links">
            <a href="/dashboard" class="active">Dashboard</a>

            @if(Auth::user()->role == 'admin')
                <a href="/buku">Data Buku</a>
                <a href="/anggota">Kelola Anggota</a>
                <a href="/transaksi">Transaksi</a>
            @endif

            @if(Auth::user()->role == 'siswa')
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
        <div class="welcome-card {{ Auth::user()->role == 'siswa' ? 'siswa' : '' }}">
            <h2 class="welcome-title">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="welcome-subtitle">
                @if(Auth::user()->role == 'admin')
                    Ini adalah panel kendali utama untuk mengelola buku dan anggota perpustakaan digital.
                @else
                    Mari mulai membaca! Temukan berbagai koleksi buku menarik di perpustakaan digital kami.
                @endif
            </p>
        </div>

        @if(Auth::user()->role == 'admin')
            <div class="grid-cards">
                <div class="stat-card" style="border-top-color: #BB9AB1;">
                    <div class="stat-title">Total Buku (Katalog)</div>
                    <div class="stat-number">{{ $total_buku }}</div>
                </div>
                <div class="stat-card" style="border-top-color: #e67e22;">
                    <div class="stat-title">Buku Sedang Dipinjam</div>
                    <div class="stat-number">{{ $buku_dipinjam }}</div>
                </div>
                <div class="stat-card" style="border-top-color: #9b59b6;">
                    <div class="stat-title">Total Anggota Siswa</div>
                    <div class="stat-number">{{ $total_siswa }}</div>
                </div>
            </div>
        @endif

        @if(Auth::user()->role == 'siswa')
            <div class="grid-cards" style="grid-template-columns: 1fr;">
                <div class="stat-card" style="border-top-color: #BB9AB1;">
                    <h3 style="margin-top: 0; color: #987D9A;">📚 Status Peminjaman Anda</h3>

                    @if($pinjaman_aktif > 0)
                        <p style="color: #7f8c8d; font-size: 16px;">
                            Anda saat ini sedang meminjam <strong
                                style="color: #e67e22; font-size: 20px;">{{ $pinjaman_aktif }}</strong> buku. <br>
                            Jangan lupa untuk mengembalikannya tepat waktu, ya!
                        </p>
                    @else
                        <p style="color: #7f8c8d; font-size: 16px;">
                            Anda saat ini belum meminjam buku apa pun. Silakan buka menu <strong>Peminjaman Buku</strong> untuk
                            melihat koleksi kami.
                        </p>
                    @endif

                </div>
            </div>
        @endif
    </div>

</body>

</html>