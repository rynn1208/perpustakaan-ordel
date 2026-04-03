<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-blue-500">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="col-span-2">
                                <label class="block text-sm font-bold text-slate-700 mb-2">Judul Buku</label>
                                <input type="text" name="judul" value="{{ $buku->judul }}" required
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Pengarang</label>
                                <input type="text" name="pengarang" value="{{ $buku->pengarang }}" required
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Penerbit</label>
                                <input type="text" name="penerbit" value="{{ $buku->penerbit }}" required
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" value="{{ $buku->tahun_terbit }}" required
                                    min="1900" max="{{ date('Y') }}"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Jumlah Stok</label>
                                <input type="number" name="stok" value="{{ $buku->stok }}" required min="0"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-4 mt-8">
                            <a href="{{ route('buku.index') }}"
                                class="text-gray-500 hover:text-gray-700 font-bold transition">Batal</a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-gray-700 font-bold py-2 px-6 rounded transition shadow-sm">
                                Update Buku
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>