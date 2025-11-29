@php
    // Fungsi helper sederhana untuk membuat string menjadi aman sebagai kunci (slug)
    function clean_key($string) {
        $string = strtolower($string);
        // Hapus tanda apostrof/kutip tunggal, lalu ganti spasi dan karakter non-alphanumerik lainnya dengan underscore
        $string = str_replace("'", "", $string);
        $string = preg_replace('/[^a-z0-9]+/', '_', $string);
        $string = trim($string, '_');
        return $string;
    }
@endphp

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


        <!-- Masukkan Data) -->
{{-- FIX ERROR: str_slug() di Laravel versi baru --}}

<div class="bg-white p-6 rounded-xl shadow-lg max-w-6xl mx-auto">
    {{-- Header Form --}}
    <div class="border-b pb-4 mb-6">
        <h2 class="text-xl font-bold text-gray-800">
            Input Nilai Mata Pelajaran ATT (Agama, Tahsin, Tahfidz)
        </h2>
        <p class="text-3xl font-extrabold text-red-600 mt-1">{{ $siswa->nama_lengkap }}</p>
        <p class="text-sm text-gray-500 mt-1">Kelas: {{ $siswa->kelas }} | NISN: {{ $siswa->nisn }}</p>
    </div>

    {{-- Tabs Navigasi UTAMA --}}
    <div class="flex border-b mb-6 overflow-x-auto">
        <button type="button" onclick="showTab('tahfidz')" class="tab-button py-2 px-4 text-sm font-semibold border-b-2 border-red-500 text-red-600 transition-colors duration-300 whitespace-nowrap">
            <i data-lucide="book-open" class="w-4 h-4 inline mr-2"></i> Tahfidz (Hafalan)
        </button>
        <button type="button" onclick="showTab('lisan_hadis')" class="tab-button py-2 px-4 text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors duration-300 whitespace-nowrap">
            <i data-lucide="message-square" class="w-4 h-4 inline mr-2"></i> Lisan (Doa & Hadis)
        </button>
        <button type="button" onclick="showTab('praktik_ibadah')" class="tab-button py-2 px-4 text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors duration-300 whitespace-nowrap">
            <i data-lucide="hand" class="w-4 h-4 inline mr-2"></i> Praktik (Salat & Wudu)
        </button>
        <button type="button" onclick="showTab('tulis_adab')" class="tab-button py-2 px-4 text-sm font-semibold text-gray-500 hover:text-gray-700 transition-colors duration-300 whitespace-nowrap">
            <i data-lucide="pen-tool" class="w-4 h-4 inline mr-2"></i> Tulis & Adab
        </button>
    </div>

    {{-- Form Utama --}}
    <form action="{{ route('nilai.store_att', $siswa->id) }}" method="POST" class="space-y-6">
        @csrf 

        {{-- 1. Tab: Tahfidz (DIPISAHKAN DENGAN SUB-TAB) --}}
        <div id="content-tahfidz" class="tab-content">
            <h3 class="text-lg font-semibold mb-4 text-red-700">Tahfidz (Hafalan Surah) - Nilai Maks 100 per Surah</h3>
            
            @php
                // Surah yang lebih lengkap
                $surahTahfidz = [
                    'Juz 30' => ['An-Naba', 'An-Nazi\'at', 'Abasa', 'At-Takwir', 'Al-Infitar', 'Al-Muthaffifin', 'Al-Insyiqaq', 'Al-Buruj', 'Ath-Thariq', 'Al-A\'la', 'Al-Ghasyiyah', 'Al-Fajr', 'Al-Balad', 'Asy-Syams', 'Al-Lail', 'Adh-Dhuha', 'Al-Insyirah', 'At-Tin', 'Al-Alaq', 'Al-Qadr', 'Al-Bayyinah', 'Az-Zalzalah', 'Al-Adiyat', 'Al-Qari\'ah', 'At-Takasur', 'Al-Asr', 'Al-Humazah', 'Al-Fil', 'Quraisy', 'Al-Ma\'un', 'Al-Kautsar', 'Al-Kafirun', 'An-Nasr', 'Al-Lahab', 'Al-Ikhlas', 'Al-Falaq', 'An-Nas'],
                    'Juz 29' => ['Al-Mulk', 'Al-Qalam', 'Al-Haqqah', 'Al-Ma\'arij', 'Nuh', 'Al-Jinn', 'Al-Muzzammil', 'Al-Muddatsir', 'Al-Qiyamah', 'Al-Insan', 'Al-Mursalat'],
                    'Juz 28' => ['Al-Mujadilah', 'Al-Hasyr', 'Al-Mumtahanah', 'Ash-Shaf', 'Al-Jumu\'ah', 'Al-Munafiqun', 'At-Taghabun', 'Ath-Thalaq', 'At-Tahrim'],
                ];
            @endphp
            
            {{-- Sub-Tabs Navigasi Juz --}}
            <div class="flex border-b mb-6 overflow-x-auto">
                @foreach ($surahTahfidz as $juz => $listSurah)
                    {{-- Menggunakan clean_key untuk ID tab --}}
                    @php $tabId = clean_key($juz); @endphp
                    <button type="button" onclick="showSubTab('{{ $tabId }}')" id="sub-tab-{{ $tabId }}" 
                        class="sub-tab-button py-2 px-4 text-xs font-medium transition-colors duration-300 whitespace-nowrap 
                        @if ($loop->first) border-b-2 border-red-400 text-red-500 @else text-gray-500 hover:text-gray-700 @endif">
                        {{ $juz }} ({{ count($listSurah) }} Surah)
                    </button>
                @endforeach
            </div>

            {{-- Konten Sub-Tabs Juz --}}
            @foreach ($surahTahfidz as $juz => $listSurah)
                @php $tabId = clean_key($juz); @endphp
                <div id="sub-content-{{ $tabId }}" class="sub-tab-content p-4 border rounded-lg bg-gray-50 mb-6 
                    @if (!$loop->first) hidden @endif">
                    
                    <h4 class="font-bold mb-4 text-gray-800 border-b pb-2">{{ $juz }}</h4>
                    
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($listSurah as $surah)
                            <div>
                                {{-- Menggunakan clean_key() sebagai pengganti str_slug() --}}
                                @php $key = clean_key($surah); @endphp 
                                <label for="tahfidz_{{ $key }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $surah }}</label>
                                <input type="number" name="tahfidz[{{ $key }}]" id="tahfidz_{{ $key }}" 
                                       min="0" max="100" placeholder="Nilai (0-100)"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-sm">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        {{-- 2. Tab: Lisan (Doa & Hadis) --}}
        <div id="content-lisan_hadis" class="tab-content hidden">
            <h3 class="text-lg font-semibold mb-4 text-red-700">Ujian Lisan (Doa & Hadis) - Nilai Maks 100 per Item</h3>

            {{-- Ujian Lisan Doa --}}
            <div class="mb-6 p-4 border rounded-lg bg-gray-50">
                <h4 class="font-bold mb-3 text-gray-800 flex items-center"><i data-lucide="speech" class="w-4 h-4 mr-2"></i> 4 Doa Harian</h4>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @php $doas = ['Doa Sebelum Tidur', 'Doa Bangun Tidur', 'Doa Sebelum Makan', 'Doa Sesudah Makan']; @endphp
                    @foreach ($doas as $index => $doa)
                        <div>
                            {{-- Menggunakan clean_key() sebagai pengganti str_slug() --}}
                            @php $key = clean_key($doa); @endphp
                            <label for="doa_{{ $key }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $doa }}</label>
                            <input type="number" name="doa_lisan[{{ $key }}]" id="doa_{{ $key }}" 
                                   min="0" max="100" placeholder="Nilai"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Ujian Lisan Hadis --}}
            <div class="mb-6 p-4 border rounded-lg bg-gray-50">
                <h4 class="font-bold mb-3 text-gray-800 flex items-center"><i data-lucide="clipboard-list" class="w-4 h-4 mr-2"></i> 4 Hadis Pilihan</h4>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @php $hadis = ['Hadis Niat', 'Hadis Kebersihan', 'Hadis Senyum', 'Hadis Bertetangga']; @endphp
                    @foreach ($hadis as $index => $h)
                        <div>
                            {{-- Menggunakan clean_key() sebagai pengganti str_slug() --}}
                            @php $key = clean_key($h); @endphp
                            <label for="hadis_{{ $key }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $h }}</label>
                            <input type="number" name="hadis_lisan[{{ $key }}]" id="hadis_{{ $key }}" 
                                   min="0" max="100" placeholder="Nilai"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- 3. Tab: Praktik Ibadah (Salat & Wudu) --}}
        <div id="content-praktik_ibadah" class="tab-content hidden">
            <h3 class="text-lg font-semibold mb-4 text-red-700">Ujian Praktik Ibadah - Nilai Total Komponen</h3>

            {{-- Ujian Praktik Salat (13 Gerakan) --}}
            <div class="mb-6 p-4 border rounded-lg bg-gray-50">
                <h4 class="font-bold mb-3 text-gray-800 flex items-center"><i data-lucide="user-check" class="w-4 h-4 mr-2"></i> Praktik Salat (13 Komponen)</h4>
                <p class="text-xs text-gray-600 mb-3">Nilai harus diisi per komponen. Total nilai akan dihitung otomatis oleh sistem (*Simulasi: masukkan nilai akhir*).</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @php $gerakanSalat = ['Niat', 'Takbiratul Ihram', 'Rukuk', 'I\'tidal', 'Sujud 1', 'Duduk Antara Sujud', 'Sujud 2', 'Tasyahud Awal', 'Tasyahud Akhir', 'Salam', 'Ketepatan Waktu', 'Kekhusyukan', 'Bacaan']; @endphp
                    @foreach ($gerakanSalat as $index => $gerakan)
                        <div>
                            {{-- Menggunakan clean_key() sebagai pengganti str_slug() --}}
                            @php $key = clean_key($gerakan); @endphp
                            <label for="salat_{{ $key }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $gerakan }}</label>
                            <input type="number" name="praktik_salat[{{ $key }}]" id="salat_{{ $key }}" 
                                   min="0" max="100" placeholder="Nilai"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                        </div>
                    @endforeach
                </div>
            </div>
            
            {{-- Ujian Praktik Wudu (10 Gerakan) --}}
            <div class="mb-6 p-4 border rounded-lg bg-gray-50">
                <h4 class="font-bold mb-3 text-gray-800 flex items-center"><i data-lucide="droplet" class="w-4 h-4 mr-2"></i> Praktik Wudu (10 Komponen)</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @php $gerakanWudu = ['Niat', 'Mencuci Tangan', 'Kumur-kumur', 'Membasuh Muka', 'Membasuh Tangan Kanan', 'Membasuh Tangan Kiri', 'Mengusap Kepala', 'Membasuh Kaki Kanan', 'Membasuh Kaki Kiri', 'Tertib/Berurutan']; @endphp
                    @foreach ($gerakanWudu as $index => $gerakan)
                        <div>
                            {{-- Menggunakan clean_key() sebagai pengganti str_slug() --}}
                            @php $key = clean_key($gerakan); @endphp
                            <label for="wudu_{{ $key }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $gerakan }}</label>
                            <input type="number" name="praktik_wudu[{{ $key }}]" id="wudu_{{ $key }}" 
                                   min="0" max="100" placeholder="Nilai"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- 4. Tab: Ujian Tulis & Adab --}}
        <div id="content-tulis_adab" class="tab-content hidden">
            <h3 class="text-lg font-semibold mb-4 text-red-700">Ujian Tulis & Penilaian Adab</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Ujian Tulis --}}
                <div class="p-4 border rounded-lg bg-gray-50">
                    <label for="nilai_tulis" class="block text-sm font-medium text-gray-700 mb-1">Nilai Ujian Tulis (Angka Akhir)</label>
                    <input type="number" name="nilai_tulis" id="nilai_tulis" min="0" max="100" placeholder="Nilai 0-100" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-lg font-bold">
                </div>

                {{-- Nilai Adab --}}
                <div class="p-4 border rounded-lg bg-gray-50">
                    <label for="nilai_adab" class="block text-sm font-medium text-gray-700 mb-1">Nilai Adab / Sikap (Angka Akhir)</label>
                    <input type="number" name="nilai_adab" id="nilai_adab" min="0" max="100" placeholder="Nilai 0-100" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 text-lg font-bold">
                </div>
            </div>
        </div>
        
        {{-- Tombol Simpan Akhir --}}
        <div class="flex justify-end space-x-4 pt-4 border-t mt-6">
            <a href="{{ route('siswa.index') }}" class="inline-flex items-center py-2 px-4 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-colors shadow-md">
                <i data-lucide="x" class="w-4 h-4 mr-2"></i>
                Batal & Kembali
            </a>
            <button type="submit" class="inline-flex items-center py-2 px-6 bg-red-600 text-white font-extrabold rounded-lg hover:bg-red-700 transition-colors shadow-xl">
                <i data-lucide="save" class="w-5 h-5 mr-2"></i>
                SIMPAN SEMUA NILAI ATT
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        showTab('tahfidz'); // Tampilkan tab Tahfidz secara default
        lucide.createIcons();
    });

    function showTab(tabName) {
        const tabs = ['tahfidz', 'lisan_hadis', 'praktik_ibadah', 'tulis_adab'];

        tabs.forEach(tab => {
            const button = document.querySelector(`.tab-button[onclick="showTab('${tab}')"]`);
            const content = document.getElementById(`content-${tab}`);

            if (tab === tabName) {
                // Aktifkan tab yang dipilih
                button.classList.add('border-red-500', 'text-red-600');
                button.classList.remove('border-transparent', 'text-gray-500');
                content.classList.remove('hidden');
                
                // Khusus untuk tab Tahfidz, aktifkan sub-tab pertama
                if (tabName === 'tahfidz') {
                    // Temukan tombol sub-tab pertama dan klik
                    const firstSubTabButton = document.querySelector('.sub-tab-button');
                    if (firstSubTabButton) {
                        // Ambil ID tab dari onclick
                        const subTabIdMatch = firstSubTabButton.getAttribute('onclick').match(/showSubTab\('([^']+)'\)/);
                        if (subTabIdMatch && subTabIdMatch[1]) {
                             showSubTab(subTabIdMatch[1]);
                        }
                    }
                }
            } else {
                // Non-aktifkan tab lainnya
                button.classList.remove('border-red-500', 'text-red-600');
                button.classList.add('border-transparent', 'text-gray-500');
                content.classList.add('hidden');
            }
        });
    }

    function showSubTab(subTabName) {
        const subTabButtons = document.querySelectorAll('.sub-tab-button');
        const subTabContents = document.querySelectorAll('.sub-tab-content');

        subTabButtons.forEach(button => {
            // Hapus style aktif dari semua tombol
            button.classList.remove('border-red-400', 'text-red-500');
            button.classList.add('text-gray-500', 'hover:text-gray-700');
            
            // Cek apakah tombol saat ini sesuai dengan subTabName
            const subTabIdMatch = button.getAttribute('onclick').match(/showSubTab\('([^']+)'\)/);
            if (subTabIdMatch && subTabIdMatch[1] === subTabName) {
                // Aktifkan style tombol yang dipilih
                button.classList.add('border-b-2', 'border-red-400', 'text-red-500');
                button.classList.remove('text-gray-500', 'hover:text-gray-700');
            }
        });

        subTabContents.forEach(content => {
            // Sembunyikan semua konten sub-tab
            content.classList.add('hidden');
            
            // Tampilkan konten sub-tab yang dipilih
            if (content.id === `sub-content-${subTabName}`) {
                content.classList.remove('hidden');
            }
        });
    }

</script>


        {{-- Data Selesai --}}

    </div>
                
</x-layout>