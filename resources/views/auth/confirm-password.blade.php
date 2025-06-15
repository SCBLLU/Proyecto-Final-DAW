<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-black py-12 px-4">
        <div class="w-full max-w-md bg-black border border-white/10 rounded-xl shadow-none p-8">
            <h2 class="text-2xl font-bold text-white mb-8 text-center">Confirmar contraseña</h2>
            <div class="mb-4 text-sm text-white/60">
                Esta es un área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.
            </div>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="'Contraseña'" class="text-white/80" />
                    <x-text-input id="password" class="block mt-1 w-full bg-black border border-white/20 text-white focus:border-white focus:ring-white" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="px-6 py-2 bg-white text-black rounded-full font-semibold shadow-none border border-white/10 hover:bg-black hover:text-white hover:border-white transition">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
