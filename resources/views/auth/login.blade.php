<x-guest-layout>
    <div
        class="flex min-h-screen items-center justify-center bg-gradient-to-br from-[#191414] via-[#121212] to-[#1db954]/10 py-12 px-4">
        <div
            class="w-full max-w-md bg-[#181818] border border-[#1db954]/20 rounded-2xl shadow-2xl p-10 relative overflow-hidden animate-fade-in">
            <div class="flex justify-center mb-6">
                <x-application-logo class="w-8 h-8 text-[#1db954]" />
            </div>
            <h2 class="text-3xl font-extrabold text-[#1db954] mb-8 text-center tracking-tight">Iniciar sesión</h2>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <x-input-label for="email" :value="'Correo electrónico'" />
                    <x-text-input id="email" class="mt-1" type="email" name="email" :value="old('email')" required
                        autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password" :value="'Contraseña'" />
                    <x-text-input id="password" class="mt-1" type="password" name="password" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-[#1db954]/30 text-[#1db954] bg-black shadow-none focus:ring-[#1db954]"
                            name="remember">
                        <span class="ms-2 text-sm text-white/60">Recordarme</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-white/60 hover:text-[#1db954] transition"
                            href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>
                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-white/60 hover:text-[#1db954] transition"
                        href="{{ route('register') }}">
                        ¿No tienes cuenta?
                    </a>
                    <x-primary-button class="ms-3">Entrar</x-primary-button>
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