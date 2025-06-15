<nav
    class="bg-gradient-to-b from-[#191414] via-[#121212] to-[#121212] border-b border-[#1db954]/20 shadow-lg animate-fade-in-nav">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-8">
                <!-- Logo Spotify Style -->
                <div class="shrink-0 flex items-center">
                    <span class="flex items-center gap-2">
                        <i class="fab fa-spotify text-2xl text-[#1db954]"></i>
                        <span class="text-xl font-extrabold text-[#1db954] tracking-tight">Corte Urbano</span>
                    </span>
                </div>
                <!-- Navigation Links -->
                <div class="hidden md:flex items-center gap-6">
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')"
                                class="hover:text-[#1db954] transition">Panel</x-nav-link>
                            <x-nav-link :href="route('admin.citas.index')" :active="request()->routeIs('admin.citas.*')"
                                class="hover:text-[#1db954] transition">Citas</x-nav-link>
                            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')"
                                class="hover:text-[#1db954] transition">Clientes</x-nav-link>
                            <x-nav-link :href="route('reportes.citas.pdf')" class="hover:text-[#1db954] transition">Reporte
                                PDF</x-nav-link>
                        @elseif (auth()->user()->role === 'cliente')
                            <x-nav-link :href="route('cliente.dashboard')" :active="request()->routeIs('cliente.dashboard')"
                                class="hover:text-[#1db954] transition">Mis Citas</x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>
            <!-- User Dropdown / Mobile -->
            <div class="flex items-center gap-4">
                @auth
                    <span class="hidden md:flex items-center gap-2 text-white mr-4">
                        <i class="fa-regular fa-circle-user text-2xl text-[#1db954]"></i>
                        <span class="font-semibold">{{ auth()->user()->name }}</span>
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 flex items-center gap-2 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                            <i
                                class="fa-solid fa-arrow-right-from-bracket transition-transform duration-300 group-hover:rotate-180 group-hover:text-[#1db954]"></i>
                            <span class="transition-colors duration-300 group-hover:text-[#1db954]">Salir</span>
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
    <style>
        .animate-fade-in-nav {
            opacity: 0;
            transform: translateY(-10px);
            animation: fadeInNav 0.7s ease forwards;
        }

        @keyframes fadeInNav {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</nav>