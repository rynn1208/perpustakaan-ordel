<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perpustakaan Digital')</title>
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

        .container-utama {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        /* CSS Khusus Halaman (Jika dibutuhkan) */
        @yield('custom-css')
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">Perpustakaan | <span class="role-badge">{{ Auth::user()->role }}</span></div>
        <div class="nav-links">
            <a href="/dashboard" class="{{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>

            @if(Auth::user()->role == 'admin')
                <a href="/buku" class="{{ Request::is('buku') ? 'active' : '' }}">Data Buku</a>
                <a href="/anggota" class="{{ Request::is('anggota') ? 'active' : '' }}">Kelola Anggota</a>
                <a href="/transaksi" class="{{ Request::is('transaksi') ? 'active' : '' }}">Transaksi</a>
                <a href="/histori-denda" class="{{ Request::is('histori-denda') ? 'active' : '' }}">Histori Denda</a>
            @else
                <a href="/peminjaman" class="{{ Request::is('peminjaman') ? 'active' : '' }}">Peminjaman Buku</a>
                <a href="/dipinjam" class="{{ Request::is('dipinjam') ? 'active' : '' }}">Buku Dipinjam</a>
            @endif

            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container-utama">
        @yield('content')
    </div>

</body>

</html>