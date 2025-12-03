
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
        <form action="{{ route('guru.update', $guru->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                {{-- NIP --}}
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700 mb-1">NIP (Opsional)</label>
                    <input type="text" name="nip" id="nip"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: 001" value="{{ old('nip', $guru->nip) }}">
                    @error('nip') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: Firman Wahyudi" value="{{ old('nama_lengkap', $guru->nama_lengkap) }}">
                    @error('nama_lengkap') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Nama Panggilan --}}
                <div>
                    <label for="nama_panggilan" class="block text-sm font-medium text-gray-700 mb-1">Nama Panggilan</label>
                    <input type="text" name="nama_panggilan" id="nama_panggilan"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: Firman" value="{{ old('nama_panggilan', $guru->nama_panggilan) }}">
                    @error('nama_panggilan') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Gender --}}
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select name="gender" id="gender" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                            
                        <option value="">-- Pilih Jenis Kelamin -- </option>

                        <option value="L" 
                            @if(old('gender', $guru->gender) == 'L') selected @endif>
                            Laki-laki
                        </option>
                        
                        <option value="P" 
                            @if(old('gender', $guru->gender) == 'P') selected @endif>
                            Perempuan
                        </option>

                    </select>
                    @error('gender') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                
                {{-- Tombol Aksi --}}
                <div class="flex justify-end space-x-4 pt-4 border-t mt-6">
                    <a href="{{ route('guru.index') }} " class="inline-flex items-center py-2 px-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors shadow-md">
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