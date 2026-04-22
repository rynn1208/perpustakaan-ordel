<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku - Perpustakaan Digital</title>
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
            background-color: #1F6F5F;
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
            background-color: #BB9AB1;
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

        /* GRID BUKU */
        .grid-buku {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card-buku {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-top: 4px solid #BB9AB1;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-buku:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .buku-judul {
            font-size: 18px;
            font-weight: 800;
            color: #987D9A;
            margin: 0 0 5px 0;
        }

        .buku-info {
            font-size: 13px;
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .buku-stok {
            font-size: 12px;
            background: #ecf0f1;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
            color: #BB9AB1;
            margin-bottom: 15px;
        }

        .btn-pinjam {
            background-color: #1F6F5F;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            font-family: inherit;
            transition: 0.3s;
        }

        .btn-pinjam:hover {
            background-color: #2980b9;
        }

        .cover-buku {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid #f1f1f1;
        }

        .cover-placeholder {
            width: 100%;
            height: 280px;
            background-color: #fdfdfd;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #bdc3c7;
            margin-bottom: 15px;
            border: 2px dashed #eee;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">PERPUSTAKAAN | <span class="role-badge">{{ Auth::user()->role }}</span></div>
        <div class="nav-links">
            <a href="/dashboard">Dashboard</a>
            <a href="/peminjaman" class="active">Peminjaman Buku</a>
            <a href="/dipinjam">Buku Dipinjam</a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <h2 style="color: #987D9A; margin-bottom: 5px;">Katalog Buku Tersedia</h2>
        <p style="color: #7f8c8d; margin-top: 0;">Pilih buku yang ingin Anda pinjam hari ini.</p>

        <div class="grid-buku">
            @foreach($bukus as $row)
                <div class="card-buku">
                    <div>
                        @if($row->cover)
                            <img src="{{ asset('storage/' . $row->cover) }}" alt="Cover {{ $row->judul }}" class="cover-buku">
                        @else
                            <div class="cover-placeholder">
                                Tidak ada cover
                            </div>
                        @endif
                        <h3 class="buku-judul">{{ $row->judul }}</h3>
                        <div class="buku-info">
                            ✏️ {{ $row->pengarang }}<br>
                            🏢 {{ $row->penerbit }} ({{ $row->tahun_terbit }})
                        </div>
                        <div class="buku-stok">Stok Tersedia: {{ $row->stok }}</div>
                    </div>

                    <form action="/peminjaman/{{ $row->id }}" method="POST" id="form-pinjam-{{ $row->id }}">
                        @csrf

                        <div
                            style="margin-bottom: 15px; background: #fdfdfd; padding: 10px; border-radius: 6px; border: 1px dashed #BB9AB1;">
                            <label
                                style="font-size: 11px; color: #7f8c8d; font-weight: bold; display: block; margin-bottom: 3px;">
                                📅 Tanggal Pinjam:
                            </label>
                            <div style="font-size: 13px; color: #1F6F5F; font-weight: 800;">
                                {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }} <span style="color: #987D9A;">(Hari
                                    Ini)</span>
                            </div>
                        </div>

                        <button type="button" class="btn-pinjam"
                            onclick="konfirmasiPinjam({{ $row->id }}, '{{ $row->judul }}')">📖 Pinjam Buku Ini</button>
                    </form>
                </div>
            @endforeach

            @if(count($bukus) == 0)
                <div
                    style="grid-column: 1 / -1; background: white; padding: 40px; text-align: center; border-radius: 10px; color: #7f8c8d;">
                    Wah, saat ini semua buku sedang dipinjam atau belum ada katalog baru.
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                Swal.fire({ title: 'Berhasil!', text: '{{ session("success") }}', icon: 'success', confirmButtonColor: '#BB9AB1' });
            @endif
            @if(session('error'))
                Swal.fire({ title: 'Ups!', text: '{{ session("error") }}', icon: 'error', confirmButtonColor: '#e74c3c' });
            @endif
        });

        function konfirmasiPinjam(id, judul) {
            Swal.fire({
                title: 'Pinjam Buku?', text: 'Anda akan meminjam buku "' + judul + '".', icon: 'question', showCancelButton: true, confirmButtonColor: '#BB9AB1', confirmButtonText: 'Ya, Pinjam!'
            }).then((result) => {
                if (result.isConfirmed) document.getElementById('form-pinjam-' + id).submit();
            })
        }
    </script>
</body>

</html>