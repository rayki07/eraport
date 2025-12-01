
<x-layout>
    <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
        <!-- Header Konten -->
        <div class="flex items-center justify-between border-b pb-4 mb-4">
            <div class="flex items-center space-x-2 text-gray-700">
                <i data-lucide="users-2" class="w-6 h-6"></i>
                <h2 class="text-xl font-semibold">Tambah Siswa</h2>
            </div>
            <a class="flex items-center bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                Tambah Siswa
            </a>
                

        </div>
        <!-- memasukkan nama -->
        <div class="bg-white p-6 rounded-xl shadow-lg max-w-4xl mx-auto">
        {{-- Header Form --}}
        <div class="border-b pb-4 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                <i data-lucide="users" class="w-7 h-7 mr-3 text-red-500"></i>
                Tambah Data Siswa Baru
            </h2>
        </div>

        {{-- Tabs / Pilihan Mode --}}
        <div class="flex border-b mb-6">
            <button id="tab-manual" onclick="showTab('manual')" class="tab-button py-2 px-4 text-sm font-semibold border-b-2 border-red-500 text-red-600 transition-colors duration-300 flex items-center">
                <i data-lucide="user-plus" class="w-4 h-4 mr-2"></i> Input Manual
            </button>
            <button id="tab-import" onclick="showTab('import')" class="tab-button py-2 px-4 text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors duration-300 flex items-center">
                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Import File (Excel/CSV)
            </button>
        </div>

        {{-- 1. Tab: Input Manual --}}
        <div id="content-manual" class="tab-content">
            <form action="{{ route('siswa.store') }}" method="POST" class="space-y-6">
                @csrf 

                {{-- NIS (Nomor Induk Siswa) --}}
                <div>
                    <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">NIS (Nomor Induk Siswa)</label>
                    <input type="text" name="nis" id="nis"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: 0012345678" value="{{ old('nis') }}">
                    @error('nis') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- NISN (Nomor Induk Siswa Nasional) --}}
                <div>
                    <label for="nisn" class="block text-sm font-medium text-gray-700 mb-1">NISN (Nomor Induk Siswa Nasional)</label>
                    <input type="text" name="nisn" id="nisn"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Contoh: 0012345678" value="{{ old('nisn') }}">
                    @error('nisn') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Nama Lengkap --}}
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap Siswa</label>
                    <input type="text" name="nama" id="nama" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan nama lengkap siswa" value="{{ old('nama') }}">
                    @error('nama') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select name="gender" id="gender" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L" @if(old('gender') == 'L') selected @endif>Laki-laki</option>
                        <option value="P" @if(old('gender') == 'P') selected @endif>Perempuan</option>
                    </select>
                    @error('gender') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>

                <!-- {{-- Tempat dan Tanggal Lahir (Grid 2 Kolom) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Tempat Lahir --}}
                    <div>
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Contoh: Jakarta" value="{{ old('tempat_lahir') }}">
                        @error('tempat_lahir') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('tanggal_lahir') }}">
                        @error('tanggal_lahir') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>
                </div> -->
                
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

        {{-- 2. Tab: Import File --}}
        <div id="content-import" class="tab-content hidden">
            <div class="border border-yellow-300 bg-yellow-50 p-4 rounded-lg mb-6 text-sm text-yellow-800">
                <h4 class="font-bold flex items-center mb-2"><i data-lucide="alert-triangle" class="w-5 h-5 mr-2"></i> Perhatian Format File!</h4>
                <p>Pastikan file Anda (Excel/CSV) memiliki kolom-kolom persis dengan urutan berikut: <strong>NISN, NAMA_LENGKAP, JENIS_KELAMIN (L/P), TEMPAT_LAHIR, TANGGAL_LAHIR (YYYY-MM-DD)</strong>. Baris pertama (Header) akan diabaikan.</p>
                <p class="mt-3">Unduh template contoh: <a href="/templates/siswa_template.xlsx" class="text-blue-600 hover:underline font-semibold">siswa_template.xlsx</a></p>
            </div>
            
            <form action="{{ route('siswa.preview') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf 

                {{-- File Input --}}
                <div>
                    <label for="import_file" class="block text-sm font-medium text-gray-700 mb-1">Pilih File Impor (.xlsx, .csv)</label>
                    <input type="file" name="import_file" id="import_file" required accept=".xlsx, .xls, .csv"
                        class="w-full block text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-red-100 file:text-red-700
                        hover:file:bg-red-200">
                    @error('import_file') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                
                {{-- Tombol Aksi --}}
                <div class="flex justify-end space-x-4 pt-4 border-t mt-6">
                    <a href="{{ route('siswa.index') }}" class="inline-flex items-center py-2 px-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors shadow-md">
                        <i data-lucide="x" class="w-4 h-4 mr-2"></i>
                        Batal
                    </a>
                    <button type="submit" class="inline-flex items-center py-2 px-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-colors shadow-md">
                        <i data-lucide="upload" class="w-4 h-4 mr-2"></i>
                        Proses Impor Data
                    </button>
                    
                    {{-- Tambahan --}}
                    {{-- Tambahan --}}

                </div>
            </form>
        </div>
    </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Tampilkan tab manual secara default saat halaman dimuat
                showTab('manual');
            });

            function showTab(tabName) {
                const tabs = ['manual', 'import'];

                tabs.forEach(tab => {
                    const button = document.getElementById(`tab-${tab}`);
                    const content = document.getElementById(`content-${tab}`);

                    if (tab === tabName) {
                        // Aktifkan tab yang dipilih
                        button.classList.add('border-red-500', 'text-red-600');
                        button.classList.remove('border-transparent', 'text-gray-500');
                        content.classList.remove('hidden');
                    } else {
                        // Non-aktifkan tab lainnya
                        button.classList.remove('border-red-500', 'text-red-600');
                        button.classList.add('border-transparent', 'text-gray-500');
                        content.classList.add('hidden');
                    }
                });
            }
        </script>
        
    </div>                
</x-layout>