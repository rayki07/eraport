<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" 
            content="width=device-width, initial-scale=1.0, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>e-Raport</title>
        @vite('resources/css/app.css')
        <script src="https://unpkg.com/lucide@latest"></script>
    </head>
    <body class="flex min-h-screen">
        <aside id="sidebar" class="sidebar fixed inset-y-0 left-0 z-40 flex flex-col w-64 bg-gray-800 text-white shadow-xl md:relative md:translate-x-0">
                
            <button id="close-sidebar" class="p-1 rounded hover:bg-red-700">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
                <ul>
                    <li class="mb-2"><a href="#" class="flex items-center hover:text-yellow-300"><i data-lucide="home" class="w-5 h-5 mr-2"></i>Dashboard</a></li>
                    <li class="mb-2"><a href="#" class="flex items-center hover:text-yellow-300"><i data-lucide="user" class="w-5 h-5 mr-2"></i>Profile</a></li>
                    <li class="mb-2"><a href="#" class="flex items-center hover:text-yellow-300"><i data-lucide="settings" class="w-5 h-5 mr-2"></i>Settings</a></li>
                    <li class="mb-2"><a href="#" class="flex items-center hover:text-yellow-300"><i data-lucide="log-out" class="w-5 h-5 mr-2"></i>Logout</a></li>
        </aside>
        <div id="main-content" class="flex flex-col flex-1 transition-all duration-300">
            <header class="flex justify-between p-4 bg-red-800 text-white">
                <button id="toggle-sidebar" class=" p-1 rounded hover:bg-red-700">
                <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <div>Menu</div>
                <div>Login</div>
                <div class="flex space-x-4">
                    <div class="flex items-center">
                    <i data-lucide="calendar" class="w-5 h-5 mr-1"></i>
                    <a href="#">Semester</a>
                    </div>
                    <div class="flex items-center">
                    <i data-lucide="user" class="w-5 h-5 mr-1"></i>
                    <a href="#">Guru</a>
                    </div>
                </div>
            </header>
        </div>
            

            <main>
            </main>
        </div>

    <script>
    //icon lucide
    lucide.createIcons();

    //sidebar toggle
    const sidebar = document.getElementById('sidebar');
    const toggleSidebarButton = document.getElementById('toggle-sidebar');
    const closeSidebarButton = document.getElementById('close-sidebar');

    function toggleSidebar() {
        const isClosed = sidebar.classList.toggle('closed');
        if (isClosed) {
            sidebar.style.transform = 'translateX(-100%)';
        } else {
            sidebar.style.transform = 'translateX(0)';
        }
    }

    toggleSidebarButton.addEventListener('click', toggleSidebar);
    closeSidebarButton.addEventListener('click', toggleSidebar);

    //biar responsive

    </script>
    </body>
</html>