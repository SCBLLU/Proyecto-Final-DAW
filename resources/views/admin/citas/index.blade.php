@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-black flex items-center gap-2">
        <i class="fas fa-calendar-alt text-blue-600"></i> Listado de Citas
    </h2>
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div class="flex gap-2">
            <a href="{{ route('admin.citas.create') }}" class="flex items-center gap-2 px-5 py-2 bg-blue-600 text-white rounded-full font-semibold shadow hover:bg-blue-700 transition">
                <i class="fas fa-plus"></i> Nueva Cita
            </a>
            <a href="{{ route('reportes.citas.pdf') }}" class="flex items-center gap-2 px-5 py-2 bg-gray-100 text-blue-600 rounded-full font-semibold border border-blue-100 hover:bg-blue-50 transition">
                <i class="fas fa-file-pdf"></i> Generar Reporte
            </a>
        </div>
        <div class="flex items-center gap-2">
            <i class="fas fa-search text-blue-600"></i>
            <input type="text" id="searchAdminCitas" placeholder="Buscar por cliente, fecha o estado..." class="px-3 py-2 border border-gray-200 rounded focus:outline-none focus:ring-2 focus:ring-blue-200 text-black" onkeyup="filtrarAdminCitas()">
        </div>
    </div>
    <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white">
        <table id="tablaAdminCitas" class="min-w-full text-sm text-left">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Cliente</th>
                    <th class="px-4 py-3">Fecha</th>
                    <th class="px-4 py-3">Hora</th>
                    <th class="px-4 py-3">Corte</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($citas as $cita)
                <tr class="hover:bg-blue-50 transition">
                    <td class="px-4 py-2">{{ $cita->id }}</td>
                    <td class="px-4 py-2">{{ $cita->nombre_cliente ?? $cita->usuario->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $cita->fecha }}</td>
                    <td class="px-4 py-2">{{ $cita->hora }}</td>
                    <td class="px-4 py-2">{{ $cita->corte_cabello }}</td>
                    <td class="px-4 py-2">
                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-semibold {{ $cita->estado === 'completada' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            <i class="fas {{ $cita->estado === 'completada' ? 'fa-check-circle' : 'fa-clock' }}"></i>
                            {{ ucfirst($cita->estado) }}
                        </span>
                    </td>
                    <td class="px-4 py-2 flex gap-2">
                        <a href="{{ route('admin.citas.edit', $cita->id) }}" class="text-blue-600 hover:text-blue-800" title="Editar"><i class="fas fa-edit"></i></a>
                        @if ($cita->estado !== 'completada')
                            <form action="{{ route('admin.citas.completar', $cita->id) }}" method="POST" onsubmit="return confirm('¿Marcar como completada?');" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-800" title="Completar"><i class="fas fa-check"></i></button>
                            </form>
                        @endif
                        <form action="{{ route('admin.citas.destroy', $cita->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta cita?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" title="Eliminar"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="px-4 py-2 text-center text-gray-400">No hay citas registradas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<script>
function filtrarAdminCitas() {
    let input = document.getElementById('searchAdminCitas');
    let filter = input.value.toLowerCase();
    let table = document.getElementById('tablaAdminCitas');
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