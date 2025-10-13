<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Rapor SD - Dashboard Guru</title>
    <!-- Memuat Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Menggunakan font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- Memuat Heroicons untuk ikon -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        /* Mengatur font default */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        /* Transisi untuk sidebar */
        .sidebar {
            transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
        }

        .sidebar.closed {
            transform: translateX(-100%);
            width: 0;
            opacity: 0;
        }

        /* Custom scrollbar style untuk sidebar */
        .sidebar-content::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-content::-webkit-scrollbar-thumb {
            background-color: #a0aec0;
            border-radius: 2px;
        }
        .sidebar-content::-webkit-scrollbar-track {
            background: transparent;
        }

        /* Style untuk progress bar */
        .progress-bar {
            height: 8px;
            border-radius: 4px;
        }
    </style>
</head>
<body class="flex min-h-screen">

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

    <!-- 2. Konten Utama (Header & Dashboard) -->
    <div id="main-content" class="flex flex-col flex-1 transition-all duration-300">
        <!-- Header Atas Merah -->
        <header class="flex items-center justify-between h-16 bg-red-600 text-white px-4 shadow-md">
            <!-- Tombol Menu Buka/Tutup Sidebar -->
            <button id="toggle-sidebar" class="p-1 rounded hover:bg-red-700">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium flex items-center">
                    <i data-lucide="calendar" class="w-4 h-4 mr-1"></i>
                    2016/2017 Semester 2
                </span>
                <div class="relative">
                    <button class="p-1 rounded-full hover:bg-red-700">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center p-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-800 rounded-full">2</span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Konten Dashboard -->
        <main class="p-4 md:p-6 flex-1">
            <div class="bg-white rounded-xl shadow-lg p-4 md:p-6">
                <!-- Header Konten -->
                <div class="flex items-center justify-between border-b pb-4 mb-4">
                    <div class="flex items-center space-x-2 text-gray-700">
                        <i data-lucide="users-2" class="w-6 h-6"></i>
                        <h2 class="text-xl font-semibold">Seluruh Siswa Kelas X IPA A</h2>
                    </div>
                    <button class="flex items-center bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                        <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                        Print Rapot
                    </button>
                </div>

                <!-- Kontrol Tabel (Search dan Entries) -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-4 space-y-3 md:space-y-0">
                    <div class="flex items-center space-x-2">
                        <label for="show-entries" class="text-sm text-gray-600">Show</label>
                        <select id="show-entries" class="border rounded-lg p-1.5 text-sm focus:ring-blue-500 focus:border-blue-500">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                        </select>
                        <span class="text-sm text-gray-600">entries</span>
                    </div>
                    <div class="flex items-center space-x-2 w-full md:w-auto">
                        <label for="search-siswa" class="text-sm text-gray-600">Search:</label>
                        <input type="text" id="search-siswa" class="border rounded-lg p-1.5 text-sm w-full md:w-64 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Siswa...">
                    </div>
                </div>

                <!-- Tabel Data Siswa -->
                <div class="overflow-x-auto rounded-lg border">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO</th>
                                <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-blue-600 flex items-center justify-between">
                                    <span>NISN</span>
                                    <i data-lucide="chevrons-up-down" class="w-3 h-3 ml-1"></i>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-blue-600 flex items-center justify-between">
                                    <span>NAMA</span>
                                    <i data-lucide="chevrons-up-down" class="w-3 h-3 ml-1"></i>
                                </th>
                                <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-blue-600 flex items-center justify-between">
                                    <span>GENDER</span>
                                    <i data-lucide="chevrons-up-down" class="w-3 h-3 ml-1"></i>
                                </th>
                                <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TTL</th>
                                <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:text-blue-600 flex items-center justify-between">
                                    <span>OPSI</span>
                                    <i data-lucide="chevrons-up-down" class="w-3 h-3 ml-1"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Baris Data Siswa -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">1</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">62346434</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Alvaro Morata</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 6 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                             <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">2</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">252532535</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Lionel Messi Hahahaha</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 6 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                             <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">3</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">792070952</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">M. Ronaldo</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 2 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">4</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">7217343</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Mesut Ozil Arsenal</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 4 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">5</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">7097409214</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Michael Essien Woi</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 3 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">6</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">121313313</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Muhammad Nur Hidayat</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 1 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-900">7</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-blue-600 hover:text-blue-800 cursor-pointer">463263464</td>
                                <td class="px-6 py-3 whitespace-nowrap text-sm font-medium text-blue-600 hover:text-blue-800 cursor-pointer">Muhammad Rizky Ridho</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Laki - Laki</td>
                                <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-500">Nganjuk, 9 November 2017</td>
                                <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                    <button class="inline-flex items-center bg-green-500 text-white py-1.5 px-3 rounded-lg text-xs font-semibold hover:bg-green-600 transition-colors shadow-md">
                                        <i data-lucide="settings" class="w-3 h-3 mr-1"></i>
                                        Setting Rapot
                                    </button>
                                </td>
                            </tr>
                            <!-- Tambahkan baris data lainnya di sini -->
                        </tbody>
                    </table>
                </div>

                <!-- Paginasi -->
                <div class="flex flex-col md:flex-row justify-between items-center pt-4 border-t mt-4 space-y-3 md:space-y-0">
                    <p class="text-sm text-gray-600">Showing 1 to 7 of 7 entries</p>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm text-gray-500 border rounded-lg hover:bg-gray-100 transition-colors">Previous</button>
                        <button class="px-3 py-1 text-sm text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">1</button>
                        <button class="px-3 py-1 text-sm text-gray-500 border rounded-lg hover:bg-gray-100 transition-colors">Next</button>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white p-3 text-center text-xs text-gray-500 border-t mt-auto shadow-inner">
            <p>Copyright © 2018 NAMA SEKOLAH ANDA oleh Rino Oktavianto | Version 2.3.8</p>
        </footer>
    </div>

    <script>
        // Inisialisasi Lucide Icons
        lucide.createIcons();

        const sidebar = document.getElementById('sidebar');
        const toggleSidebarButton = document.getElementById('toggle-sidebar');
        const closeSidebarButton = document.getElementById('close-sidebar');

        // Fungsi untuk membuka/menutup sidebar
        function toggleSidebar() {
            const isClosed = sidebar.classList.toggle('closed');

            // Untuk perangkat seluler (layar kecil), kita geser body sedikit
            if (window.innerWidth < 768) { // 768px adalah breakpoint 'md' di Tailwind
                if (isClosed) {
                    sidebar.style.transform = 'translateX(-100%)';
                } else {
                    sidebar.style.transform = 'translateX(0)';
                }
            }
        }

        // Event listener untuk tombol di header utama
        toggleSidebarButton.addEventListener('click', toggleSidebar);

        // Event listener untuk tombol tutup di dalam sidebar (hanya terlihat di mobile)
        closeSidebarButton.addEventListener('click', toggleSidebar);

        // Menutup sidebar secara default di perangkat seluler saat halaman dimuat
        if (window.innerWidth < 768) {
            sidebar.classList.add('closed');
            sidebar.style.transform = 'translateX(-100%)';
        } else {
            sidebar.classList.remove('closed');
            sidebar.style.transform = 'translateX(0)';
        }

        // Memastikan sidebar responsif saat ukuran jendela diubah
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                // Di desktop, pastikan sidebar selalu terbuka
                sidebar.classList.remove('closed');
                sidebar.style.transform = 'translateX(0)';
            } else if (!sidebar.classList.contains('closed')) {
                 // Di mobile, jika sidebar terbuka, pastikan transformnya nol
                 sidebar.style.transform = 'translateX(0)';
            }
        });

    </script>
</body>
</html>
