@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h2 class="text-3xl font-bold text-black flex items-center gap-2">
            <i class="fas fa-calendar-check text-blue-600"></i> Mis Citas
        </h2>
        <div class="flex gap-2">
            <a href="{{ route('cliente.cita.create') }}" class="flex items-center gap-2 px-5 py-2 bg-blue-600 text-white rounded-full font-semibold shadow hover:bg-blue-700 transition">
                <i class="fas fa-plus"></i> Nueva Cita
            </a>
            <a href="{{ route('cliente.reporte') }}" class="flex items-center gap-2 px-5 py-2 bg-gray-100 text-blue-600 rounded-full font-semibold border border-blue-100 hover:bg-blue-50 transition">
                <i class="fas fa-file-pdf"></i> Generar Reporte
            </a>
        </div>
    </div>
    @if(session('success'))
        <div class="flex items-center gap-2 mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 gap-2">
            <div class="flex items-center gap-2">
                <i class="fas fa-filter text-blue-600"></i>
                <input type="text" id="searchCitas" placeholder="Buscar por nombre, fecha o estado..." class="px-3 py-2 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-200 text-black" onkeyup="filtrarCitas()">
            </div>
        </div>
        @if($citas->isEmpty())
            <p class="text-gray-500 text-center py-8"><i class="fas fa-info-circle"></i> No tienes citas registradas.</p>
        @else
        <div class="overflow-x-auto">
            <table id="tablaCitas" class="min-w-full text-sm text-left">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Corte</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Hora</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Opciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($citas as $cita)
                        <tr>
                            <td class="px-4 py-2">{{ $cita->usuario->name ?? 'Sin nombre' }}</td>
                            <td class="px-4 py-2">{{ $cita->corte_cabello ?? 'No especificado' }}</td>
                            <td class="px-4 py-2">{{ $cita->fecha }}</td>
                            <td class="px-4 py-2">{{ $cita->hora }}</td>
                            <td class="px-4 py-2">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-semibold {{ $cita->estado === 'completada' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    <i class="fas {{ $cita->estado === 'completada' ? 'fa-check-circle' : 'fa-clock' }}"></i>
                                    {{ ucfirst($cita->estado) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('cliente.cita.edit', $cita->id) }}" class="text-blue-600 hover:text-blue-800" title="Editar"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('cliente.cita.cancelar', $cita->id) }}" method="POST" onsubmit="return confirm('¿Cancelar esta cita?');" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="text-yellow-600 hover:text-yellow-800" title="Cancelar"><i class="fas fa-ban"></i></button>
                                </form>
                                <form action="{{ route('cliente.cita.destroy', $cita->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta cita?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
<script>
function filtrarCitas() {
    let input = document.getElementById('searchCitas');
    let filter = input.value.toLowerCase();
    let table = document.getElementById('tablaCitas');
    let trs = table.getElementsByTagName('tr');
    for (let i = 1; i < trs.length; i++) {
        let tds = trs[i].getElementsByTagName('td');
        let show = false;
        for (let j = 0; j < tds.length - 1; j++) {
            if (tds[j].innerText.toLowerCase().indexOf(filter) > -1) show = true;
        }
        trs[i].style.display = show ? '' : 'none';
    }
}
</script>
@endsection
