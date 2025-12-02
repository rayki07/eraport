
<x-layout>
    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
        <!-- Header Konten -->
        <div class="flex items-center justify-between border-b pb-4 mb-4">
            <div class="flex items-center space-x-2 text-gray-700">
                <i data-lucide="users-2" class="w-6 h-6"></i>
                <h2 class="text-xl font-semibold">Edit Kelas</h2>
            </div>
            <a class="flex items-center bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                Tambah Kelas
            </a>
                

        </div>
        <form action="{{ route('ujian.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- nama ujian --}}
                <div>
                    <label for="nama_ujian" class="block text-sm font-medium text-gray-700 mb-1">Nama Ujian</label>
                    <input type="text" name="nama_ujian" id="nama_ujian" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: Doa" value="{{ old('nama_ujian') }}">
                    @error('nama_ujian') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Mapel --}}
                <div>
                    <label for="mapel_id" class="block text-sm font-medium text-gray-700 mb-1">Mata pelajaran</label>
                    <select name="mapel_id" id="mapel_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                        @foreach ($mapel as $item)
                            <option value="{{ $item->id }}"
                                @if (old('mapel_id') == $item->id) selected   
                                @endif>
                            {{ $item->nama_pelajaran }}</option>
                        @endforeach
                    </select>
                    @error('mapel_id') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                
                {{-- Tombol Aksi --}}
                <div class="flex justify-end space-x-4 pt-4 border-t mt-6">
                    <a href="{{ route('ujian.index')}}" class="inline-flex items-center py-2 px-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors shadow-md">
                        <i data-lucide="x" class="w-4 h-4 mr-2"></i>
                        Batal
                    </a>
                    <button type="submit" class="inline-flex items-center py-2 px-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors shadow-md">
                        <i data-lucide="check" class="w-4 h-4 mr-2"></i>
                        Simpan Kelas
                    </button>
                </div>
            </form>
        
    </div>                
</x-layout>