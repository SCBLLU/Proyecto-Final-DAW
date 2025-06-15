<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Corte Urbano</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards;
        }

        .fade-in-delay-1 {
            animation-delay: 0.2s;
        }

        .fade-in-delay-2 {
            animation-delay: 0.4s;
        }

        .fade-in-delay-3 {
            animation-delay: 0.6s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-[#121212] text-white font-sans antialiased">
    <!-- Header -->
    <header
        class="flex justify-between items-center px-6 py-5 border-b border-[#2a2a2a] bg-[#121212] sticky top-0 z-50">
        <h1 class="text-2xl font-extrabold text-[#1db954]">Corte Urbano</h1>
        <nav class="hidden md:flex gap-8 text-[#b3b3b3] font-medium">
            <a href="#servicios" class="hover:text-[#1db954]">Servicios</a>
            <a href="#testimonios" class="hover:text-[#1db954]">Testimonios</a>
            <a href="#faq" class="hover:text-[#1db954]">FAQ</a>
            <a href="#contacto" class="hover:text-[#1db954]">Contacto</a>
        </nav>
        <a href="login"
            class="ml-4 px-5 py-2 bg-white text-black rounded-full font-semibold hover:bg-[#1db954] hover:text-white transition-colors">
            Iniciar sesión
        </a>
    </header>

    <!-- Hero -->
    <section class="text-center px-6 mt-24 mb-20 fade-in fade-in-delay-1">
        <h2 class="text-5xl md:text-6xl font-extrabold leading-tight tracking-tight mb-6">
            Transforma tu estilo en <span class="text-[#1db954]">Corte Urbano</span>
        </h2>
        <p class="text-lg md:text-xl text-[#b3b3b3] max-w-2xl mx-auto mb-8">
            Vive la experiencia de una peluquería moderna con actitud urbana, cortes únicos y estilo auténtico.
        </p>
        <a href="login" class="px-8 py-3 bg-[#1db954] text-black rounded-full font-bold hover:bg-[#1ed760] transition-all">
            Reserva tu cita
        </a>
    </section>

    <!-- Servicios -->
    <section id="servicios"
        class="max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6 mb-24 fade-in fade-in-delay-2">
        <div
            class="bg-[#181818] p-8 rounded-xl border border-[#2a2a2a] text-center hover:scale-105 transition-transform">
            <i class="fas fa-cut text-[#1db954] text-4xl mb-4"></i>
            <h3 class="text-xl font-semibold mb-2">Corte Moderno</h3>
            <p class="text-[#b3b3b3] text-sm">Estilos frescos, urbanos y personalizados para cada personalidad.</p>
        </div>
        <div
            class="bg-[#181818] p-8 rounded-xl border border-[#2a2a2a] text-center hover:scale-105 transition-transform">
            <i class="fas fa-scissors text-[#1db954] text-4xl mb-4"></i>
            <h3 class="text-xl font-semibold mb-2">Barbería</h3>
            <p class="text-[#b3b3b3] text-sm">Arreglo de barba, cuidado facial y afeitado premium.</p>
        </div>
        <div
            class="bg-[#181818] p-8 rounded-xl border border-[#2a2a2a] text-center hover:scale-105 transition-transform">
            <i class="fas fa-brush text-[#1db954] text-4xl mb-4"></i>
            <h3 class="text-xl font-semibold mb-2">Coloración</h3>
            <p class="text-[#b3b3b3] text-sm">Tintes modernos, balayage y estilos vibrantes para todo tipo de cabello.
            </p>
        </div>
    </section>

    <!-- Testimonios -->
    <section id="testimonios"
        class="bg-gradient-to-br from-[#181818] via-[#111111] to-[#0e0e0e] py-20 fade-in fade-in-delay-3">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Lo que dicen nuestros clientes</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-[#121212] p-6 rounded-xl text-center">
                    <i class="fas fa-quote-left text-[#1db954] text-xl mb-2"></i>
                    <p class="text-[#b3b3b3] text-sm mb-2">“¡El mejor corte que he tenido! Ambiente moderno y atención
                        de primera.”</p>
                    <span class="text-sm font-semibold text-white">- Juan P.</span>
                </div>
                <div class="bg-[#121212] p-6 rounded-xl text-center">
                    <i class="fas fa-quote-left text-[#1db954] text-xl mb-2"></i>
                    <p class="text-[#b3b3b3] text-sm mb-2">“Me encantó el color y el trato del equipo. ¡Repetiré
                        seguro!”</p>
                    <span class="text-sm font-semibold text-white">- Ana L.</span>
                </div>
                <div class="bg-[#121212] p-6 rounded-xl text-center">
                    <i class="fas fa-quote-left text-[#1db954] text-xl mb-2"></i>
                    <p class="text-[#b3b3b3] text-sm mb-2">“Profesionales y puntuales. Mi barba nunca había lucido
                        mejor.”</p>
                    <span class="text-sm font-semibold text-white">- Pedro G.</span>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="max-w-3xl mx-auto px-6 py-20 fade-in fade-in-delay-3">
        <h2 class="text-3xl font-bold text-center mb-10">Preguntas Frecuentes</h2>
        <div class="space-y-4">
            <details class="bg-[#181818] p-4 rounded-md border border-[#2a2a2a]">
                <summary class="cursor-pointer font-semibold text-[#1db954]">¿Necesito cita previa?</summary>
                <p class="text-[#b3b3b3] mt-2">Sí, para garantizar atención personalizada recomendamos reservar.</p>
            </details>
            <details class="bg-[#181818] p-4 rounded-md border border-[#2a2a2a]">
                <summary class="cursor-pointer font-semibold text-[#1db954]">¿Qué métodos de pago aceptan?</summary>
                <p class="text-[#b3b3b3] mt-2">Aceptamos efectivo, tarjetas y pagos digitales.</p>
            </details>
            <details class="bg-[#181818] p-4 rounded-md border border-[#2a2a2a]">
                <summary class="cursor-pointer font-semibold text-[#1db954]">¿Tienen productos veganos?</summary>
                <p class="text-[#b3b3b3] mt-2">Sí, trabajamos con productos cruelty-free y veganos.</p>
            </details>
        </div>
    </section>

    <!-- CTA / Contacto -->
    <section id="contacto" class="text-center max-w-xl mx-auto px-6 mb-24 fade-in fade-in-delay-3">
        <h2 class="text-2xl font-bold mb-4">¿Listo para tu nuevo look?</h2>
        <p class="text-[#b3b3b3] mb-6">Reserva tu cita hoy mismo o contáctanos por redes. ¡Te esperamos en Corte Urbano!
        </p>
        <a href="login"
            class="px-8 py-3 bg-[#1db954] text-black rounded-full font-bold hover:bg-[#1ed760] transition">Reservar
            ahora</a>
        <div class="flex justify-center gap-6 mt-6 text-xl">
            <a href="#" class="text-[#b3b3b3] hover:text-[#1db954]"><i class="fab fa-facebook"></i></a>
            <a href="#" class="text-[#b3b3b3] hover:text-[#1db954]"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-[#b3b3b3] hover:text-[#1db954]"><i class="fab fa-whatsapp"></i></a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-6 text-[#6a6a6a] border-t border-[#2a2a2a] text-sm bg-[#121212]">
        &copy; 2025 Corte Urbano. Todos los derechos reservados.
    </footer>
</body>

</html>