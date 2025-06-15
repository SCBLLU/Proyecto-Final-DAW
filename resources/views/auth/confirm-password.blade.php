<x-guest-layout>
    <div
        class="flex min-h-screen items-center justify-center bg-gradient-to-br from-[#191414] via-[#121212] to-[#1db954]/10 py-12 px-4">
        <div
            class="w-full max-w-md bg-[#181818] border border-[#1db954]/20 rounded-2xl shadow-2xl p-10 relative overflow-hidden animate-fade-in">
            <div class="flex justify-center mb-6">
                <i class="fab fa-spotify text-4xl text-[#1db954]"></i>
            </div>
            <h2 class="text-2xl font-extrabold text-[#1db954] mb-8 text-center tracking-tight">Confirmar contraseña</h2>
            <div class="mb-4 text-sm text-white/60 text-center">
                Esta es un área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.
            </div>
            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                @csrf
                <div>
                    <x-input-label for="password" :value="'Contraseña'" />
                    <x-text-input id="password" class="mt-1" type="password" name="password" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-white/60 hover:text-[#1db954] transition"
                        href="{{ route('login') }}">
                        Volver a iniciar sesión
                    </a>
                    <x-primary-button>Confirmar</x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <style>
        .animate-fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</x-guest-layout>