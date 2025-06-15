<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-black py-12 px-4">
        <div class="w-full max-w-md bg-black border border-white/10 rounded-xl shadow-none p-8">
            <h2 class="text-2xl font-bold text-white mb-8 text-center">¿Olvidaste tu contraseña?</h2>
            <div class="mb-4 text-sm text-white/60">
                Ingresa tu correo y te enviaremos un enlace para restablecer tu contraseña.
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="'Correo electrónico'" class="text-white/80" />
                    <x-text-input id="email" class="block mt-1 w-full bg-black border border-white/20 text-white focus:border-white focus:ring-white" type="email" name="email" :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" class="px-6 py-2 bg-white text-black rounded-full font-semibold shadow-none border border-white/10 hover:bg-black hover:text-white hover:border-white transition">
                        Enviar enlace
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
