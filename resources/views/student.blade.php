<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Raport Sidebar Expand</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-100">

  <!-- Header -->
  <header id="header" class="fixed top-0 left-0 w-full flex items-center justify-between bg-red-800 text-white p-4 transition-all duration-300 z-10">
    <button id="menu-toggle" class="flex items-center space-x-2">
      <i data-lucide="menu" class="w-6 h-6"></i>
      <span>Menu</span>
    </button>
    <h1 class="font-semibold text-lg">E-Raport</h1>
    <div class="flex items-center space-x-3">
      <i data-lucide="user" class="w-5 h-5"></i>
      <span>Guru</span>
    </div>
  </header>

  <!-- Wrapper -->
  <div class="flex pt-16"> <!-- memberi jarak untuk header fixed -->
    
    <!-- Sidebar -->
    <aside id="sidebar" class="bg-gray-800 text-white w-64 h-screen p-4 fixed top-16 left-0 transition-transform duration-300">
      <h2 class="text-xl font-bold mb-4">Menu Utama</h2>
      <ul class="space-y-2">
        <li><a href="#" class="flex items-center space-x-2 hover:bg-gray-700 p-2 rounded">
          <i data-lucide="home" class="w-5 h-5"></i><span>Dashboard</span>
        </a></li>
        <li><a href="#" class="flex items-center space-x-2 hover:bg-gray-700 p-2 rounded">
          <i data-lucide="book" class="w-5 h-5"></i><span>Data Siswa</span>
        </a></li>
        <li><a href="#" class="flex items-center space-x-2 hover:bg-gray-700 p-2 rounded">
          <i data-lucide="file-text" class="w-5 h-5"></i><span>Raport</span>
        </a></li>
      </ul>
    </aside>

    <!-- Konten utama -->
    <main id="main-content" class="ml-64 flex-1 p-6 transition-all duration-300">
      <h2 class="text-2xl font-bold mb-4">Selamat Datang di E-Raport</h2>
      <p class="text-gray-700">Ini adalah halaman utama aplikasi E-Raport.</p>
    </main>
  </div>

  <!-- Script -->
  <script>
    lucide.createIcons();

    const toggleBtn = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('main-content');
    const header = document.getElementById('header');

    toggleBtn.addEventListener('click', () => {
      // Sembunyikan sidebar
      sidebar.classList.toggle('-translate-x-64');

      // Ubah lebar konten dan header
      main.classList.toggle('ml-64');
      header.classList.toggle('pl-64'); // agar header juga melebar mulus
    });
  </script>

</body>
</html>
