<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | Sistem Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        quicksand: ['Quicksand', 'sans-serif'],
                    },
                    colors: {
                        'pastel-bg': '#fcf9ea', // Kuning redup/cream
                        'pastel-purple': '#1F6F5F', // Ungu Mauve (Navbar)
                        'pastel-peach': '#1b433b', // Peach lembut (Aksen/Tombol)
                        'pastel-peach-dark': '#1f6053',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>

<body class="bg-pastel-bg min-h-screen flex flex-col selection:bg-pastel-peach selection:text-white">

    <nav class="bg-pastel-purple text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <i class="fas fa-book-reader text-2xl text-pastel-peach"></i>
                    <span class="font-bold text-xl tracking-wider">PERPUSTAKAAN<span class="font-light">
                            DIGITAL</span></span>
                </div>

                <div class="hidden md:flex space-x-8 items-center text-sm font-medium">
                    <a href="#" class="hover:text-pastel-peach transition duration-300">Beranda</a>
                    <a href="#" class="hover:text-pastel-peach transition duration-300">Koleksi Buku</a>
                    <a href="#" class="hover:text-pastel-peach transition duration-300">Tentang Kami</a>
                    <a href="{{ route('login') }}"
                        class="bg-pastel-peach hover:bg-pastel-peach-dark text-white px-5 py-2 rounded-full font-bold transition shadow-sm">
                        Masuk / Login
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center relative overflow-hidden px-4 py-12 md:py-0">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white opacity-40 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-pastel-peach opacity-20 rounded-full blur-3xl"></div>

        <div class="max-w-7xl mx-auto w-full z-10 flex flex-col md:flex-row items-center justify-between gap-12">

            <div class="md:w-1/2 text-center md:text-left">
                <span class="text-pastel-purple font-bold tracking-widest text-sm uppercase mb-2 block">Selamat Datang
                    di</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 leading-tight mb-6">
                    Jelajahi Dunia<br>
                    Lewat <span class="text-pastel-purple">Lembaran Kata</span>
                </h1>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed max-w-lg mx-auto md:mx-0">
                    Akses ribuan koleksi novel, fiksi, dan sastra klasik dari mana saja. Nikmati pengalaman membaca yang
                    nyaman dan estetik.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4">
                    <a href="{{ route('login') }}"
                        class="w-full sm:w-auto bg-pastel-purple hover:bg-opacity-90 text-white px-8 py-3 rounded-full font-bold transition shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-rocket"></i> Mulai Membaca
                    </a>
                    <a href="#fitur"
                        class="w-full sm:w-auto bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-8 py-3 rounded-full font-bold transition flex items-center justify-center">
                        Pelajari Fitur
                    </a>
                </div>
            </div>

            <div class="md:w-1/2 flex justify-center">
                <div class="relative">
                    <div class="absolute -inset-4 bg-white opacity-50 rounded-full blur-2xl"></div>
                    <i
                        class="fas fa-book-open text-[150px] md:text-[200px] text-pastel-purple drop-shadow-xl transform -rotate-6 hover:rotate-0 transition duration-500"></i>
                    <i class="fas fa-star text-3xl text-pastel-peach absolute top-0 -right-5 animate-pulse"></i>
                    <i
                        class="fas fa-bookmark text-4xl text-pastel-peach-dark absolute bottom-5 -left-10 transform -rotate-12"></i>
                </div>
            </div>

        </div>
    </main>

    <footer class="text-center py-6 text-gray-500 text-sm">
        <p>&copy; 2026 Sistem Perpustakaan Digital. Dibuat untuk Ujian Kompetensi.</p>
    </footer>

</body>

</html>