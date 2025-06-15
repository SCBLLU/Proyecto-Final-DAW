<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-black py-12 px-4">
        <div class="w-full max-w-md bg-black border border-white/10 rounded-xl shadow-none p-8">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">Iniciar sesión</h2>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="'Correo electrónico'" class="text-white/80" />
                    <x-text-input id="email" class="block mt-1 w-full bg-black border border-white/20 text-white focus:border-white focus:ring-white" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="'Contraseña'" class="text-white/80" />
                    <x-text-input id="password" class="block mt-1 w-full bg-black border border-white/20 text-white focus:border-white focus:ring-white" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-white/20 text-white bg-black shadow-none focus:ring-white" name="remember">
                        <span class="ms-2 text-sm text-white/60">Recordarme</span>
                    </label>
                </div>
                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-white/60 hover:text-white transition" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                    <button type="submit" class="ms-3 px-6 py-2 bg-white text-black rounded-full font-semibold shadow-none border border-white/10 hover:bg-black hover:text-white hover:border-white transition">Entrar</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
