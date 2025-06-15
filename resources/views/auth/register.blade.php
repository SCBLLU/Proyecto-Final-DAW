<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-black py-12 px-4">
        <div class="w-full max-w-md bg-black border border-white/10 rounded-xl shadow-none p-8">
            <h2 class="text-3xl font-bold text-white mb-8 text-center">Crear cuenta</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="'Nombre'" class="text-white/80" />
                    <x-text-input id="name" class="block mt-1 w-full bg-black border border-white/20 text-white focus:border-white focus:ring-white" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="'Correo electrónico'" class="text-white/80" />
                    <x-text-input id="email" class="block mt-1 w-full bg-black border border-white/20 text-white focus:border-white focus:ring-white" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="'Contraseña'" class="text-white/80" />
                    <x-text-input id="password" class="block mt-1 w-full bg-black border border-white/20 text-white focus:border-white focus:ring-white" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="'Confirmar contraseña'" class="text-white/80" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-black border border-white/20 text-white focus:border-white focus:ring-white" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                </div>
                <div class="mt-4">
                    <label for="role" class="block text-white/80 mb-1">Tipo de usuario:</label>
                    <select name="role" required class="w-full bg-black border border-white/20 text-white rounded px-3 py-2">
                        <option value="cliente">Cliente</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <a class="underline text-sm text-white/60 hover:text-white transition" href="{{ route('login') }}">
                        ¿Ya tienes cuenta?
                    </a>
                    <button type="submit" class="ms-4 px-6 py-2 bg-white text-black rounded-full font-semibold shadow-none border border-white/10 hover:bg-black hover:text-white hover:border-white transition">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
