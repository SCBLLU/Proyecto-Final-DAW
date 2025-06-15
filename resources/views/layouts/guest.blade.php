<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
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
</head>

<body class="bg-[#121212] text-white font-sans antialiased min-h-screen">
    <header
        class="flex justify-between items-center px-6 py-5 border-b border-[#2a2a2a] bg-[#121212] sticky top-0 z-50">
        <h1 class="text-2xl font-extrabold text-[#1db954]">Barbershop</h1>
        <a href="/"
            class="ml-4 px-5 py-2 bg-white text-black rounded-full font-semibold hover:bg-[#1db954] hover:text-white transition-colors">Inicio</a>
    </header>
    <div>
        {{ $slot }}
    </div>

</body>

</html>