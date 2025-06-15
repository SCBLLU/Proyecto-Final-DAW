@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-white">Editar Cita</h2>
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-900/80 text-white rounded-lg animate-pulse">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.citas.update', $cita->id) }}" method="POST" class="space-y-4 animate-fade-in">
        @csrf
        @method('PUT')
        <div>
            <label for="fecha" class="block text-white/80 mb-1">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required min="{{ now()->toDateString() }}" value="{{ $fechaSeleccionada }}" class="w-full bg-black border border-white/20 text-white rounded px-3 py-2 focus:border-white focus:ring-white" />
        </div>
        <div>
            <label class="block text-white/80 mb-1">Cliente:</label>
            <select name="usuario_id" required class="w-full bg-black border border-white/20 text-white rounded px-3 py-2">
                <option value="">-- Selecciona un cliente --</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cita->usuario_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-white/80 mb-1">Hora:</label>
            <select name="hora" required class="w-full bg-black border border-white/20 text-white rounded px-3 py-2">
                <option value="{{ $cita->hora }}">{{ $cita->hora }} (actual)</option>
                @foreach ($horariosDisponibles as $hora)
                    @if ($hora !== $cita->hora)
                        <option value="{{ $hora }}">{{ $hora }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-white/80 mb-1">Corte de cabello:</label>
            <select name="corte_cabello" required class="w-full bg-black border border-white/20 text-white rounded px-3 py-2">
                <option value="">-- Selecciona un corte --</option>
                @foreach ($opcionesCorteCabello as $corte)
                    <option value="{{ $corte }}" {{ $cita->corte_cabello == $corte ? 'selected' : '' }}>{{ $corte }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-white/80 mb-1">Estado:</label>
            <select name="estado" required class="w-full bg-black border border-white/20 text-white rounded px-3 py-2">
                <option value="pendiente" {{ $cita->estado === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="completada" {{ $cita->estado === 'completada' ? 'selected' : '' }}>Completada</option>
            </select>
        </div>
        <button type="submit" class="w-full px-5 py-2 bg-white text-black rounded-full font-semibold border border-white/10 hover:bg-black hover:text-white hover:border-white transition">Actualizar Cita</button>
    </form>
</div>
@endsection