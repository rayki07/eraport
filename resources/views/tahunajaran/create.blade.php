
<x-layout>
    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
        <!-- Header Konten -->
        <div class="flex items-center justify-between border-b pb-4 mb-4">
            <div class="flex items-center space-x-2 text-gray-700">
                <i data-lucide="calendar" class="w-6 h-6"></i>
                <h2 class="text-xl font-semibold">Tambah Tahun Ajaran</h2>
            </div>                      
        </div>

        <!-- isi web -->
        <form action="{{ route('tahunajaran.store') }}" method="POST" class="space-y-6">
                @csrf 

                {{-- Tahun Mulai --}}
                <div>
                    <label for="tahun_mulai" class="block text-sm font-medium text-gray-700 mb-1">Tahun Mulai</label>
                    <input type="text" name="tahun_mulai" id="tahun_mulai" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: 2025" value="{{ old('tahun_mulai') }}">
                    @error('tahun_mulai') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Tahun Selesai --}}
                <div>
                    <label for="tahun_selesai" class="block text-sm font-medium text-gray-700 mb-1">Tahun Selesai</label>
                    <input type="text" name="tahun_selesai" id="tahun_selesai" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: 2026" value="{{ old('tahun_selesai') }}">
                    @error('tahun_selesai') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Status Tahun Ajaran --}}
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Rombel</label>
                    <select name="status" id="status" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                        <option value="">-- Pilih Status Tahun Ajaran --</option>
                        <option value="1" @if(old('status') == '1') selected @endif>AKTIF</option>
                        <option value="0" @if(old('status') == '0') selected @endif>NONAKTIF</option>
                    </select>
                    @error('status') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                
                {{-- Tombol Aksi --}}
                <div class="flex justify-end space-x-4 pt-4 border-t mt-6">
                    <a href="{{ route('tahunajaran.index') }} " class="inline-flex items-center py-2 px-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors shadow-md">
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