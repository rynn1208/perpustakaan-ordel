<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-orange-500">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('buku.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Judul Buku</label>
                                <input type="text" name="judul" required
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pengarang</label>
                                <input type="text" name="pengarang" required
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Penerbit</label>
                                <input type="text" name="penerbit" required
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" required min="1900" max="{{ date('Y') }}"
                                    placeholder="Contoh: 2024"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
                                @error('tahun_terbit')
                                    <span class="text-red-500 text-xs italic mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Jumlah Stok</label>
                                <input type="number" name="stok" required
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring focus:ring-orange-200">
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-4 mt-8">
                            <a href="{{ route('buku.index') }}"
                                class="text-gray-500 hover:text-gray-700 font-bold transition">Batal</a>
                            <button type="submit"
                                class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-6 rounded transition shadow-sm">
                                Simpan Buku
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>