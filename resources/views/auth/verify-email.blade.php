<x-guest-layout>
    <div
        class="flex min-h-screen items-center justify-center bg-gradient-to-br from-[#191414] via-[#121212] to-[#1db954]/10 py-12 px-4">
        <div
            class="w-full max-w-md bg-[#181818] border border-[#1db954]/20 rounded-2xl shadow-2xl p-10 relative overflow-hidden animate-fade-in">
            <div class="flex justify-center mb-6">
                <x-application-logo class="w-8 h-8 text-[#1db954]" />
            </div>
            <h2 class="text-2xl font-extrabold text-[#1db954] mb-8 text-center tracking-tight">Verifica tu correo
                electrónico</h2>
            <div class="mb-4 text-sm text-white/60 text-center">
                ¡Gracias por registrarte! Antes de comenzar, por favor verifica tu correo electrónico haciendo clic en
                el enlace que te enviamos. Si no lo recibiste, te enviaremos otro.
            </div>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-[#1db954] text-center">
                    Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
                </div>
            @endif
            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-primary-button>Reenviar correo</x-primary-button>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="underline text-sm text-white/60 hover:text-[#1db954] transition">Salir</button>
                </form>
            </div>
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