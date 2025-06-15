<nav x-data="{ open: false }"
    class="bg-white dark:bg-neutral-900 border-b border-gray-200 dark:border-white/10 shadow-none">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-8">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-blue-600 dark:text-white" />
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:flex items-center">
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')"
                                class="text-gray-700 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition">Inicio
                                Admin</x-nav-link>
                            <x-nav-link :href="route('admin.citas.index')" :active="request()->routeIs('admin.citas.*')"
                                class="text-gray-700 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition">Citas</x-nav-link>
                            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')"
                                class="text-gray-700 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition">Usuarios</x-nav-link>
                            <x-nav-link :href="route('reportes.citas.pdf')"
                                class="text-gray-700 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition">Reporte
                                PDF</x-nav-link>
                        @elseif (auth()->user()->role === 'cliente')
                            <x-nav-link :href="route('cliente.dashboard')" :active="request()->routeIs('cliente.dashboard')"
                                class="text-gray-700 dark:text-white hover:text-blue-600 dark:hover:text-blue-400 transition">Mis
                                Citas</x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>
            <!-- Switch Dark/Light -->
            <div class="flex items-center gap-4">
                <span class="text-xs text-gray-500 dark:text-gray-300 select-none">Modo</span>
                <button id="theme-toggle" type="button"
                    class="relative w-12 h-6 bg-gray-200 dark:bg-gray-700 rounded-full focus:outline-none transition flex items-center justify-between px-1 border border-gray-300 dark:border-gray-600"
                    aria-label="Cambiar modo claro/oscuro">
                    <span class="text-yellow-400"><i class="fas fa-sun"></i></span>
                    <span class="text-gray-400"><i class="fas fa-moon"></i></span>
                    <span id="theme-toggle-thumb"
                        class="absolute left-1 top-1 w-4 h-4 bg-white dark:bg-black rounded-full shadow transition-transform"></span>
                </button>
                <!-- User Dropdown / Mobile -->
                @auth
                    <span class="hidden sm:inline text-gray-700 dark:text-white mr-4"><i
                            class="fa-solid fa-user-circle text-blue-500 mr-1"></i>{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-full font-semibold hover:bg-blue-600 dark:hover:bg-blue-400 hover:text-white border border-blue-500 dark:border-blue-400 transition flex items-center gap-2">Salir</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
    <script>
        // Lógica para alternar modo dark/light y guardar preferencia en localStorage
        document.addEventListener('DOMContentLoaded', function () {
            const html = document.documentElement;
            const themeToggle = document.getElementById('theme-toggle');
            const themeThumb = document.getElementById('theme-toggle-thumb');
            // Inicializar según localStorage o preferencia del sistema
            const userPref = localStorage.getItem('theme');
            if (userPref === 'dark' || (!userPref && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }
            // Actualizar posición del thumb
            function updateThumb() {
                if (html.classList.contains('dark')) {
                    themeThumb.style.transform = 'translateX(24px)';
                } else {
                    themeThumb.style.transform = 'translateX(0)';
                }
            }
            updateThumb();
            themeToggle.addEventListener('click', function () {
                html.classList.toggle('dark');
                if (html.classList.contains('dark')) {
                    localStorage.setItem('theme', 'dark');
                } else {
                    localStorage.setItem('theme', 'light');
                }
                updateThumb();
            });
        });
    </script>
</nav>