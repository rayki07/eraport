<!-- 1. Sidebar (Menu Samping) -->
    <aside id="sidebar" class="sidebar fixed inset-y-0 left-0 z-40 flex flex-col w-64 bg-gray-800 text-white shadow-xl md:relative md:translate-x-0">
        <!-- Header Sidebar Merah -->
        <header class="h-16 flex items-center justify-between px-4 bg-red-600 shadow-lg">
            <h1 class="text-xl font-bold tracking-tight truncate">Wali Kelas X IPA A</h1>
            <button id="close-sidebar" class="md:hidden p-1 rounded hover:bg-red-700">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </header>

        <!-- Profil Guru -->
        <div class="p-4 border-b border-gray-700">
            <div class="flex items-center space-x-3">
                <img src="https://placehold.co/40x40/4a5568/ffffff?text=G" alt="Foto Profil" class="w-10 h-10 rounded-full object-cover ring-2 ring-gray-600">
                <div>
                    <p class="text-sm font-semibold">Guru Bahasa Indonesia</p>
                    <p class="text-xs text-gray-400">19 Januari 2018</p>
                </div>
            </div>
        </div>

        <!-- Konten Menu -->
        <nav class="sidebar-content flex-grow overflow-y-auto pt-2 pb-4 space-y-1">
            <a href="#" class="flex items-center py-2 px-4 text-sm font-medium hover:bg-gray-700 rounded-lg mx-2 transition-colors bg-gray-700">
                <i data-lucide="file-text" class="w-5 h-5 mr-3"></i>
                <span>Rapor Siswa</span>
            </a>
            <a href="#" class="flex items-center py-2 px-4 text-sm font-medium hover:bg-gray-700 rounded-lg mx-2 transition-colors">
                <i data-lucide="clipboard-list" class="w-5 h-5 mr-3"></i>
                <span>Hasil Total Nilai</span>
            </a>
            <a href="#" class="flex items-center py-2 px-4 text-sm font-medium hover:bg-gray-700 rounded-lg mx-2 transition-colors">
                <i data-lucide="users" class="w-5 h-5 mr-3"></i>
                <span>Wali Murid</span>
            </a>

            <!-- Submenu Mata Pelajaran -->
            <div class="pt-3 px-4">
                <p class="text-xs font-semibold uppercase text-gray-400 mb-2">Mata Pelajaran</p>
                <div class="space-y-1">
                    <!-- Item Mapel Aktif -->
                    <a href="#" class="flex justify-between items-center py-2 px-2 text-sm text-white bg-gray-900 rounded-lg">
                        <span class="truncate">Bahasa Indonesia</span>
                        <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                    </a>
                    <!-- Item Mapel Lainnya -->
                    <div class="space-y-1 pl-2">
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Bahasa Inggris</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Bimbingan Konseling</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Fisika</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Ilmu Pengetahuan Alam</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Ilmu Pengetahuan Sosial</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Kimia</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Matematika</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Pendidikan Agama</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Pendidikan JOK</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Pendidikan Kewarganegaraan</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                        <div class="flex justify-between items-center py-1.5 px-2 text-sm text-gray-300 hover:bg-gray-700 rounded-lg">
                            <span class="truncate">Produktif Pemrograman</span>
                            <span class="text-xs bg-green-500 rounded-full px-2 py-0.5 font-bold">100%</span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </aside>