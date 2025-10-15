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

    <x-sidebar />

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
                        <h2 class="text-xl font-semibold">{{ $heading }}</h2>
                    </div>
                    <button class="flex items-center bg-blue-600 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                        <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                        Print Rapot
                    </button>
                </div>

                {{ $slot }}

            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white p-3 text-center text-xs text-gray-500 border-t mt-auto shadow-inner">
            <p>Copyright © 2025 NAMA SEKOLAH ANDA oleh Firman Wahyudi</p>
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
