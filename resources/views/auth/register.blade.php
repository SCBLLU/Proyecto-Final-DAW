<x-guest-layout>
    <div
        class="flex min-h-screen items-center justify-center bg-gradient-to-br from-[#191414] via-[#121212] to-[#1db954]/10 py-12 px-4">
        <div
            class="w-full max-w-md bg-[#181818] border border-[#1db954]/20 rounded-2xl shadow-2xl p-10 relative overflow-hidden animate-fade-in">
            <div class="flex justify-center mb-6">
                <x-application-logo class="w-8 h-8 text-[#1db954]" />
            </div>
            <h2 class="text-3xl font-extrabold text-[#1db954] mb-8 text-center tracking-tight">Crear cuenta</h2>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <div>
                    <x-input-label for="name" :value="'Nombre'" />
                    <x-text-input id="name" class="mt-1" type="text" name="name" :value="old('name')" required autofocus
                        autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="email" :value="'Correo electrónico'" />
                    <x-text-input id="email" class="mt-1" type="email" name="email" :value="old('email')" required
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password" :value="'Contraseña'" />
                    <x-text-input id="password" class="mt-1" type="password" name="password" required
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password_confirmation" :value="'Confirmar contraseña'" />
                    <x-text-input id="password_confirmation" class="mt-1" type="password" name="password_confirmation"
                        required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div>
                    <label for="role" class="block text-white/80 mb-1">Tipo de usuario:</label>
                    <select name="role" required
                        class="w-full bg-black border border-[#1db954]/30 text-white rounded px-3 py-2">
                        <option value="cliente">Cliente</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-white/60 hover:text-[#1db954] transition"
                        href="{{ route('login') }}">
                        ¿Ya tienes cuenta?
                    </a>
                    <x-primary-button class="ms-3">Registrarse</x-primary-button>
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