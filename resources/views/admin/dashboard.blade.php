@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-10">
        <h2 class="text-4xl font-extrabold mb-8 text-[#1db954] flex items-center gap-3">
            Panel de Administración
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div
                class="bg-[#181818] border border-[#1db954]/20 rounded-2xl p-8 shadow-xl flex flex-col items-start animate-fade-in">
                <div class="flex items-center gap-3 mb-4">
                    <i class="fas fa-calendar-check text-2xl text-[#1db954]"></i>
                    <span class="text-xl font-bold text-white">Gestión de Citas</span>
                </div>
                <p class="text-white/80 mb-6">Administra, edita y revisa todas las citas de los clientes desde aquí.
                </p>
                <a href="{{ route('admin.citas.index') }}"
                    class="px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 flex items-center gap-2 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                    <i
                        class="fas fa-arrow-right transition-transform duration-300 group-hover:rotate-180 group-hover:text-[#1db954]"></i>
                    <span class="transition-colors duration-300 group-hover:text-[#1db954]">Ver citas</span>
                </a>
            </div>
            <div
                class="bg-[#181818] border border-[#1db954]/20 rounded-2xl p-8 shadow-xl flex flex-col items-start animate-fade-in-delay">
                <div class="flex items-center gap-3 mb-4">
                    <i class="fas fa-users text-2xl text-[#1db954]"></i>
                    <span class="text-xl font-bold text-white">Gestión de Usuarios</span>
                </div>
                <p class="text-white/80 mb-6">Visualiza y administra los usuarios registrados en la plataforma.</p>
                <a href="{{ route('admin.users.index') }}"
                    class="px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 flex items-center gap-2 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                    <i
                        class="fas fa-arrow-right transition-transform duration-300 group-hover:rotate-180 group-hover:text-[#1db954]"></i>
                    <span class="transition-colors duration-300 group-hover:text-[#1db954]">Ver usuarios</span>
                </a>
            </div>
        </div>
    </div>
    <style>
        .animate-fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s ease forwards;
        }

        .animate-fade-in-delay {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s 0.2s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection