<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-black py-12 px-4">
        <div class="w-full max-w-md bg-black border border-white/10 rounded-xl shadow-none p-8">
            <h2 class="text-2xl font-bold text-white mb-8 text-center">Verifica tu correo electrónico</h2>
            <div class="mb-4 text-sm text-white/60">
                ¡Gracias por registrarte! Antes de comenzar, por favor verifica tu correo electrónico haciendo clic en el enlace que te enviamos. Si no lo recibiste, te enviaremos otro.
            </div>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-400">
                    Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                </div>
            @endif
            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="px-6 py-2 bg-white text-black rounded-full font-semibold shadow-none border border-white/10 hover:bg-black hover:text-white hover:border-white transition">Reenviar correo</button>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="underline text-sm text-white/60 hover:text-white transition">Salir</button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
