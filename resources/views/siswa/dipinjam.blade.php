<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Dipinjam - Perpustakaan Digital</title>
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

        .card {
            background: white;
            padding: 0;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            border-top: 4px solid #e67e22;
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

        .btn-kembali {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-family: inherit;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">PERPUSTAKAAN | <span class="role-badge">{{ Auth::user()->role }}</span></div>
        <div class="nav-links">
            <a href="/dashboard">Dashboard</a>
            <a href="/peminjaman">Peminjaman Buku</a>
            <a href="/dipinjam" class="active">Buku Dipinjam</a>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <h3 class="card-header">📖 Riwayat & Pengembalian Buku Anda</h3>
            <div style="overflow-x: auto;">
                <table>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach($peminjamans as $row)
                        <tr>
                            <td style="font-weight: 800; color: #BB9AB1;">{{ $row->buku->judul ?? 'Buku Dihapus Admin' }}
                            </td>
                            <td>{{ date('d M Y', strtotime($row->tanggal_pinjam)) }}</td>
                            <td>
                                @if($row->tanggal_kembali)
                                    {{ date('d M Y', strtotime($row->tanggal_kembali)) }}
                                @else
                                    <span style="color: #e74c3c;">Belum Dikembalikan</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ strtolower($row->status) }}">
                                    {{ $row->status }}
                                </span>
                            </td>
                            <td>
                                @if(strtolower($row->status) == 'dipinjam')
                                    <form action="/kembalikan/{{ $row->id }}" method="POST" id="form-kembali-{{ $row->id }}"
                                        style="margin:0; display:flex; gap:10px; align-items:center;">
                                        @csrf
                                        <input type="date" name="tanggal_kembali_manual" value="{{ date('Y-m-d') }}"
                                            style="padding: 5px; border: 1px solid #ddd; border-radius: 5px; font-family: inherit; font-size: 12px; outline: none;"
                                            title="Simulasi Tanggal Kembali">

                                        <button type="button" class="btn-kembali"
                                            onclick="konfirmasiKembali({{ $row->id }}, '{{ $row->buku->judul ?? '' }}')">📥
                                            Kembalikan</button>
                                    </form>
                                @else
                                    <span style="color: #9b59b6; font-size: 13px;">✔ Selesai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    @if(count($peminjamans) == 0)
                        <tr>
                            <td colspan="5" style="text-align: center; color: #7f8c8d; padding: 30px;">Anda belum memiliki
                                riwayat peminjaman buku.</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Notifikasi Hijau (Tepat Waktu)
            @if(session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: `{{ session('success') }}`,
                    icon: 'success',
                    confirmButtonColor: '#27ae60'
                });
            @endif

            // Notifikasi Kuning (Kena Denda!)
            @if(session('warning'))
                Swal.fire({
                    title: 'Perhatian!',
                    text: `{{ session('warning') }}`,
                    icon: 'warning',
                    confirmButtonColor: '#f39c12'
                });
            @endif
        });

        // Fungsi Konfirmasi 
        function konfirmasiKembali(id, judul) {
            Swal.fire({
                title: 'Kembalikan Buku?',
                text: 'Anda akan mengembalikan buku "' + judul + '".',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#27ae60',
                confirmButtonText: 'Ya, Kembalikan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-kembali-' + id).submit();
                }
            });
        }
    </script>
</body>

</html>