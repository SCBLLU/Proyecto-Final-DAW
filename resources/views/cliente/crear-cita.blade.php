@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8">
    <h2 class="text-3xl font-extrabold mb-6 text-[#1db954] flex items-center gap-2">
        <i class="fas fa-calendar-plus text-[#1db954]"></i> Agendar una nueva cita
    </h2>
    <div class="bg-[#181818] rounded-xl shadow p-6 border border-[#1db954]/20 animate-fade-in">
        <form method="GET" action="{{ route('cliente.cita.create') }}" class="flex flex-col sm:flex-row gap-4 items-end mb-6">
            <div class="flex-1">
                <label for="fecha" class="block text-white/80 mb-1 font-semibold flex items-center gap-1"><i class="fas fa-calendar-alt"></i> Selecciona una fecha:</label>
                <input 
                    type="date" 
                    id="fecha" 
                    name="fecha" 
                    required 
                    min="{{ now()->toDateString() }}" 
                    value="{{ $fechaSeleccionada ?? '' }}"
                    class="w-full bg-[#121212] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]"
                >
            </div>
            <button type="submit" class="px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                <i class="fas fa-search"></i> Buscar horarios
            </button>
        </form>
        <!-- Mostrar formulario para agendar si hay horarios filtrados -->
        @if(!empty($fechaSeleccionada) && count($horarios_filtrados) > 0)
            <form action="{{ route('cliente.cita.store') }}" method="POST" class="space-y-4">
                @include('cliente.form')
                <button type="submit" class="w-full px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                    <i class="fas fa-save transition-transform duration-300  group-hover:text-[#1db954]"></i> Guardar cita
                </button>
            </form>
        @elseif(!empty($fechaSeleccionada))
            <p class="text-white/60 text-center py-4"><i class="fas fa-info-circle"></i> No hay horarios disponibles para esta fecha.</p>
        @endif
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
@endsection
