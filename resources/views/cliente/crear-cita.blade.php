@extends('layouts.app')

@section('content')
<h2>Agendar una nueva cita</h2>

<!-- Formulario para seleccionar la fecha -->
<form method="GET" action="{{ route('cliente.cita.create') }}">
    <label for="fecha">Selecciona una fecha:</label>
    <input 
        type="date" 
        id="fecha" 
        name="fecha" 
        required 
        min="{{ now()->toDateString() }}" 
        value="{{ $fechaSeleccionada ?? '' }}"
    >
    <button type="submit">Buscar horarios</button>
</form>

<br>

<!-- Mostrar formulario para agendar si hay horarios filtrados -->
@if(!empty($fechaSeleccionada) && count($horarios_filtrados) > 0)
    <form action="{{ route('cliente.cita.store') }}" method="POST">
        @include('cliente.form')
        <button type="submit">Guardar cita</button>
    </form>
@elseif(!empty($fechaSeleccionada))
    <p>No hay horarios disponibles para esta fecha.</p>
@endif
@endsection
