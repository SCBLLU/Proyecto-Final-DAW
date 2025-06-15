@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto py-8">
        <h2 class="text-3xl font-extrabold mb-6 text-[#1db954] flex items-center gap-2">
            <i class="fas fa-edit text-[#1db954]"></i> Editar Cita
        </h2>
        <form action="{{ route('cliente.cita.update', $cita->id) }}" method="POST"
            class="space-y-6 bg-[#181818] rounded-xl shadow p-6 border border-[#1db954]/20 animate-fade-in">
            @csrf
            @method('PUT')
            <input type="hidden" name="fecha" value="{{ $fechaSeleccionada }}">
            <div>
                <label for="hora" class="text-white/80 mb-1 font-semibold flex items-center gap-1"><i
                        class="fas fa-clock"></i> Hora:</label>
                <select name="hora" id="hora" required
                    class="w-full bg-[#121212] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]">
                    <option value="" disabled>-- Selecciona una hora --</option>
                    @foreach ($horarios_filtrados as $hora)
                        <option value="{{ $hora }}" {{ old('hora', $cita->hora) == $hora ? 'selected' : '' }}>{{ $hora }}</option>
                    @endforeach
                </select>
                @error('hora')
                    <p class="text-red-600 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>
                        {{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="nombre_cliente" class="text-white/80 mb-1 font-semibold flex items-center gap-1"><i
                        class="fas fa-user"></i> Nombre del cliente:</label>
                <input type="text" id="nombre_cliente" name="nombre_cliente"
                    value="{{ old('nombre_cliente', $cita->nombre_cliente) }}" required
                    class="w-full bg-[#121212] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]" />
                @error('nombre_cliente')
                    <p class="text-red-600 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>
                        {{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="corte_cabello" class="text-white/80 mb-1 font-semibold flex items-center gap-1"><i
                        class="fas fa-cut"></i> Corte de cabello:</label>
                <select name="corte_cabello" id="corte_cabello" required
                    class="w-full bg-[#121212] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]">
                    <option value="" disabled>-- Selecciona un corte --</option>
                    @foreach ($opcionesCorteCabello as $corte)
                        <option value="{{ $corte }}" {{ old('corte_cabello', $cita->corte_cabello) == $corte ? 'selected' : '' }}>
                            {{ $corte }}</option>
                    @endforeach
                </select>
                @error('corte_cabello')
                    <p class="text-red-600 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i>
                        {{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2"><i
                    class="fas fa-save"></i> Actualizar cita</button>
        </form>
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