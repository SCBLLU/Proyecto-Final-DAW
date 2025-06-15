@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-black flex items-center gap-2">
        <i class="fas fa-edit text-blue-600"></i> Editar Cita
    </h2>
    <form action="{{ route('cliente.cita.update', $cita->id) }}" method="POST" class="space-y-6 bg-white rounded-xl shadow p-6">
        @csrf
        @method('PUT')
        <input type="hidden" name="fecha" value="{{ $fechaSeleccionada }}">
        <div>
            <label for="hora" class="text-gray-700 mb-1 font-semibold flex items-center gap-1"><i class="fas fa-clock"></i> Hora:</label>
            <select name="hora" id="hora" required class="w-full bg-gray-50 border border-gray-200 text-black rounded px-3 py-2 focus:border-blue-400 focus:ring-blue-200">
                <option value="" disabled>-- Selecciona una hora --</option>
                @foreach ($horarios_filtrados as $hora)
                    <option value="{{ $hora }}" {{ old('hora', $cita->hora) == $hora ? 'selected' : '' }}>{{ $hora }}</option>
                @endforeach
            </select>
            @error('hora')
                <p class="text-red-600 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nombre_cliente" class="text-gray-700 mb-1 font-semibold flex items-center gap-1"><i class="fas fa-user"></i> Nombre del cliente:</label>
            <input type="text" id="nombre_cliente" name="nombre_cliente" value="{{ old('nombre_cliente', $cita->nombre_cliente) }}" required class="w-full bg-gray-50 border border-gray-200 text-black rounded px-3 py-2 focus:border-blue-400 focus:ring-blue-200" />
            @error('nombre_cliente')
                <p class="text-red-600 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="corte_cabello" class="text-gray-700 mb-1 font-semibold flex items-center gap-1"><i class="fas fa-cut"></i> Corte de cabello:</label>
            <select name="corte_cabello" id="corte_cabello" required class="w-full bg-gray-50 border border-gray-200 text-black rounded px-3 py-2 focus:border-blue-400 focus:ring-blue-200">
                <option value="" disabled>-- Selecciona un corte --</option>
                @foreach ($opcionesCorteCabello as $corte)
                    <option value="{{ $corte }}" {{ old('corte_cabello', $cita->corte_cabello) == $corte ? 'selected' : '' }}>{{ $corte }}</option>
                @endforeach
            </select>
            @error('corte_cabello')
                <p class="text-red-600 text-xs mt-1 flex items-center gap-1"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full flex items-center justify-center gap-2 px-5 py-2 bg-blue-600 text-white rounded-full font-semibold shadow hover:bg-blue-700 transition"><i class="fas fa-save"></i> Actualizar cita</button>
    </form>
</div>
@endsection
