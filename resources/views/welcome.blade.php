<!DOCTYPE html>
<!-- Landing Page Peluquería Moderna - Estilo Minimalista Black & White -->
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluquería Moderna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-pink-200 via-orange-100 to-yellow-100 dark:bg-neutral-900 min-h-screen flex flex-col text-gray-900 dark:text-white">
    <!-- Header -->
    <header class="flex justify-between items-center px-8 py-6 bg-transparent border-b border-white/10 shadow-none">
        <div class="flex items-center gap-2">
            <span class="text-3xl font-bold text-pink-600 dark:text-pink-300">ModernCuts</span>
            <span class="text-gray-500 text-xl font-semibold">Peluquería</span>
        </div>
        <a href="{{ route('login') }}"
            class="px-6 py-2 bg-white text-pink-600 rounded-full font-semibold shadow border border-pink-100 hover:bg-pink-500 hover:text-white hover:border-pink-500 transition">Iniciar sesión</a>
    </header>

    <!-- Hero Section -->
    <section class="flex-1 flex flex-col items-center justify-center text-center px-4">
        <h1 class="text-5xl md:text-6xl font-extrabold text-pink-600 dark:text-pink-300 mb-4 mt-12">¡Transforma tu estilo en <span
                class="text-orange-400 dark:text-yellow-300">ModernCuts</span>!</h1>
        <p class="text-lg md:text-2xl text-gray-700 dark:text-gray-200 mb-8 max-w-2xl">Cortes de cabello, barbería y coloración con los
            mejores profesionales y productos de calidad. Vive la experiencia de una peluquería moderna y a la moda.</p>
        <a href="{{ route('login') }}"
            class="px-8 py-3 bg-gradient-to-r from-pink-500 via-orange-400 to-yellow-400 text-white rounded-full font-bold shadow-lg hover:from-pink-600 hover:to-yellow-500 transition">Reserva
            tu cita</a>
    </section>

    <!-- Servicios -->
    <section class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 px-4">
        <div class="bg-white/80 dark:bg-neutral-900 border border-pink-100 dark:border-pink-900 rounded-xl shadow p-6 flex flex-col items-center">
            <i class="fas fa-cut text-pink-500 text-4xl mb-2"></i>
            <h3 class="font-bold text-lg text-pink-600 dark:text-pink-300 mb-1">Corte Moderno</h3>
            <p class="text-gray-700 dark:text-gray-200 text-sm">Cortes de tendencia para todas las edades y estilos.</p>
        </div>
        <div class="bg-white/80 dark:bg-neutral-900 border border-pink-100 dark:border-pink-900 rounded-xl shadow p-6 flex flex-col items-center">
            <i class="fas fa-beard text-orange-400 text-4xl mb-2"></i>
            <h3 class="font-bold text-lg text-orange-500 dark:text-yellow-300 mb-1">Barbería</h3>
            <p class="text-gray-700 dark:text-gray-200 text-sm">Afeitado, arreglo de barba y cuidado masculino premium.</p>
        </div>
        <div class="bg-white/80 dark:bg-neutral-900 border border-pink-100 dark:border-pink-900 rounded-xl shadow p-6 flex flex-col items-center">
            <i class="fas fa-brush text-yellow-400 text-4xl mb-2"></i>
            <h3 class="font-bold text-lg text-yellow-500 dark:text-yellow-300 mb-1">Coloración</h3>
            <p class="text-gray-700 dark:text-gray-200 text-sm">Tintes, mechas y técnicas modernas de color para tu cabello.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-6 text-gray-500 dark:text-gray-300 bg-transparent border-t border-white/10 mt-auto">
        &copy; {{ date('Y') }} ModernCuts Peluquería. Todos los derechos reservados.
    </footer>
</body>

</html>