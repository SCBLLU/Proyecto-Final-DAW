@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto py-8">
        <h2 class="text-3xl font-extrabold mb-6 text-[#1db954] flex items-center gap-2">
            <i class="fas fa-calendar-plus"></i> Crear nueva cita
        </h2>
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-900/80 text-white rounded-lg animate-pulse">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="GET" action="{{ route('admin.citas.create') }}" class="mb-6 flex gap-4 items-end">
            <div class="flex-1">
                <label for="fecha" class="block text-white/80 mb-1">Selecciona una fecha:</label>
                <input type="date" id="fecha" name="fecha" required min="{{ now()->toDateString() }}"
                    value="{{ $fechaSeleccionada }}"
                    class="w-full bg-[#181818] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]" />
            </div>
            <button type="submit"
                class="px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                <i class="fas fa-search transition-transform duration-300  group-hover:text-[#1db954]"></i> Buscar horarios
            </button>
        </form>
        @if(!empty($fechaSeleccionada) && count($horariosDisponibles) > 0)
            <form action="{{ route('admin.citas.store') }}" method="POST" class="space-y-4 animate-fade-in">
                @csrf
                <input type="hidden" name="fecha" value="{{ $fechaSeleccionada }}">
                <div>
                    <label class="block text-white/80 mb-1">Cliente:</label>
                    <select name="usuario_id" required
                        class="w-full bg-[#181818] border border-[#1db954]/30 text-white rounded px-3 py-2">
                        <option value="">-- Selecciona un cliente --</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-white/80 mb-1">Hora:</label>
                    <select name="hora" required
                        class="w-full bg-[#181818] border border-[#1db954]/30 text-white rounded px-3 py-2">
                        <option value="">-- Selecciona una hora --</option>
                        @foreach ($horariosDisponibles as $hora)
                            <option value="{{ $hora }}">{{ $hora }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-white/80 mb-1">Corte de cabello:</label>
                    <select name="corte_cabello" required
                        class="w-full bg-[#181818] border border-[#1db954]/30 text-white rounded px-3 py-2">
                        <option value="">-- Selecciona un corte --</option>
                        @foreach ($opcionesCorteCabello as $corte)
                            <option value="{{ $corte }}">{{ $corte }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="w-full px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                    <i class="fas fa-save transition-transform duration-300  group-hover:text-[#1db954]"></i> Guardar Cita
                </button>
            </form>
        @elseif(!empty($fechaSeleccionada))
            <p class="text-white/60">No hay horarios disponibles para esta fecha.</p>
        @endif
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