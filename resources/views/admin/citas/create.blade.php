@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-white">Crear nueva cita</h2>
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
            <input type="date" id="fecha" name="fecha" required min="{{ now()->toDateString() }}" value="{{ $fechaSeleccionada }}" class="w-full bg-black border border-white/20 text-white rounded px-3 py-2 focus:border-white focus:ring-white" />
        </div>
        <button type="submit" class="px-5 py-2 bg-white text-black rounded-full font-semibold border border-white/10 hover:bg-black hover:text-white hover:border-white transition">Buscar horarios</button>
    </form>
    @if(!empty($fechaSeleccionada) && count($horariosDisponibles) > 0)
        <form action="{{ route('admin.citas.store') }}" method="POST" class="space-y-4 animate-fade-in">
            @csrf
            <input type="hidden" name="fecha" value="{{ $fechaSeleccionada }}">
            <div>
                <label class="block text-white/80 mb-1">Cliente:</label>
                <select name="usuario_id" required class="w-full bg-black border border-white/20 text-white rounded px-3 py-2">
                    <option value="">-- Selecciona un cliente --</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-white/80 mb-1">Hora:</label>
                <select name="hora" required class="w-full bg-black border border-white/20 text-white rounded px-3 py-2">
                    <option value="">-- Selecciona una hora --</option>
                    @foreach ($horariosDisponibles as $hora)
                        <option value="{{ $hora }}">{{ $hora }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-white/80 mb-1">Corte de cabello:</label>
                <select name="corte_cabello" required class="w-full bg-black border border-white/20 text-white rounded px-3 py-2">
                    <option value="">-- Selecciona un corte --</option>
                    @foreach ($opcionesCorteCabello as $corte)
                        <option value="{{ $corte }}">{{ $corte }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full px-5 py-2 bg-white text-black rounded-full font-semibold border border-white/10 hover:bg-black hover:text-white hover:border-white transition">Guardar Cita</button>
        </form>
    @elseif(!empty($fechaSeleccionada))
        <p class="text-white/60">No hay horarios disponibles para esta fecha.</p>
    @endif
</div>
@endsection