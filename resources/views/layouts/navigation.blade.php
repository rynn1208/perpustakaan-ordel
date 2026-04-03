<nav class="bg-slate-800 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <div class="flex items-center">
                <div class="shrink-0 flex items-center mr-8 gap-2">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold tracking-widest text-white">
                        PERPUSTAKAAN<span class="text-orange-500"></span>
                    </a>
                    <span
                        class="ml-6 bg-orange-500 text-white text-[10px] px-3 py-1 rounded-full font-bold uppercase tracking-wider ">
                        {{ Auth::user()->role }}
                    </span>
                </div>

                <div class="hidden space-x-6 pl-5  sm:flex">
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('dashboard') ? 'border-orange-500 text-white font-bold' : 'border-transparent text-gray-300 hover:text-white hover:border-gray-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Dashboard
                    </a>

                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('buku.index') }}"
                            class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('buku.*') ? 'border-orange-500 text-white font-bold' : 'border-transparent text-gray-300 hover:text-white hover:border-gray-300' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Data Buku
                        </a>
                        <a href="#"
                            class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-300 hover:text-white hover:border-gray-300 text-sm font-medium leading-5 transition duration-150 ease-in-out">
                            Kelola Anggota
                        </a>
                    @endif

                    <a href="#"
                        class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-gray-300 hover:text-white hover:border-gray-300 text-sm font-medium leading-5 transition duration-150 ease-in-out">
                        Transaksi
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                <div class="text-sm font-medium text-gray-300">
                    Halo, {{ Auth::user()->name }}
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md font-bold text-sm transition duration-150 ease-in-out shadow-sm">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>