<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-black py-12 px-4">
        <div class="w-full max-w-md bg-black border border-white/10 rounded-xl shadow-none p-8">
            <h2 class="text-2xl font-bold text-white mb-8 text-center">Restablecer contraseña</h2>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="'Correo electrónico'" class="text-white/80" />
                    <x-text-input id="email" class="block mt-1 w-full bg-black border border-white/20 text-white focus:border-white focus:ring-white" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
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

                <div class="flex items-center justify-end mt-6">
                    <button type="submit" class="px-6 py-2 bg-white text-black rounded-full font-semibold shadow-none border border-white/10 hover:bg-black hover:text-white hover:border-white transition">Restablecer</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
