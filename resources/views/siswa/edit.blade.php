<x-layout>
    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
        <!-- Header Konten -->
        <div class="flex items-center justify-between border-b pb-4 mb-4">
            <div class="flex items-center space-x-2 text-gray-700">
                <i data-lucide="users-2" class="w-6 h-6"></i>
                <h2 class="text-xl font-semibold">Edit Siswa</h2>
            </div>
        </div>


        <!-- Masukkan Data) -->
<div id="content-manual" class="tab-content">
            <form action="/siswa/{{ $siswa->id }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH') 

                {{-- NIS (Nomor Induk Siswa ) --}}
                <div>
                    <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">NIS (Nomor Induk Siswa)</label>
                    <input type="text" name="nis" id="nis" {{-- required maxlength="10" --}}
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: 0012345678" value="{{ $siswa->nis }}">
                    @error('nis') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- NISN (Nomor Induk Siswa Nasional) --}}
                <div>
                    <label for="nisn" class="block text-sm font-medium text-gray-700 mb-1">NISN (Nomor Induk Siswa Nasional)</label>
                    <input type="text" name="nisn" id="nisn" {{-- required maxlength="10" --}}
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: 0012345678" value="{{ $siswa->nisn }}">
                    @error('nisn') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap Siswa</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan nama lengkap siswa" value="{{ $siswa->nama_lengkap }}">
                    @error('nama_lengkap') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select name="gender" id="gender" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                            
                        <option value="">-- Pilih Jenis Kelamin -- </option>

                        <option value="L" 
                            @if(old('gender', $siswa->gender) == 'L') selected @endif>
                            Laki-laki
                        </option>
                        
                        <option value="P" 
                            @if(old('gender',  $siswa->gender) == 'P') selected @endif>
                            Perempuan
                        </option>

                    </select>
                    @error('gender') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Tempat dan Tanggal Lahir (Grid 2 Kolom) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Tempat Lahir --}}
                    {{-- <div>
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Contoh: Jakarta" value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div> --}}

                    {{-- Tanggal Lahir --}}
                    {{-- <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div> --}}
                </div>
                
                {{-- Tombol Aksi --}}
                <div class="flex justify-end space-x-4 pt-4 border-t mt-6">
                    <a href="{{ route('siswa.index') }} " class="inline-flex items-center py-2 px-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors shadow-md">
                        <i data-lucide="x" class="w-4 h-4 mr-2"></i>
                        Batal
                    </a>
                    <button type="submit" class="inline-flex items-center py-2 px-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition-colors shadow-md">
                        <i data-lucide="check" class="w-4 h-4 mr-2"></i>
                        Simpan Siswa
                    </button>
                </div>
            </form>
        </div>


        {{-- Data Selesai --}}

    </div>
                
</x-layout>