@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto py-8">
        <h2 class="text-3xl font-extrabold mb-6 text-[#1db954] flex items-center gap-2">
            <i class="fas fa-calendar-check text-[#1db954]"></i> Mis Citas
        </h2>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div class="flex gap-2">
                <a href="{{ route('cliente.cita.create') }}"
                    class="flex items-center gap-2 px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                    <i class="fas fa-plus transition-transform duration-300  group-hover:text-[#1db954]"></i>
                    Nueva Cita
                </a>
                <a href="{{ route('cliente.reporte') }}" target="_blank"
                    class="flex items-center gap-2 px-5 py-2 bg-[#181818] text-[#1db954] rounded-full font-bold border border-[#1db954] transition-all duration-300 shadow-md group hover:bg-[#1db954] hover:text-black hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                    <i class="fas fa-file-pdf transition-transform duration-300  group-hover:text-black"></i>
                    Generar Reporte
                </a>
            </div>
            <div class="flex items-center gap-2 relative w-full max-w-xs">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#1db954] pointer-events-none">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="searchCitas" placeholder="Buscar fecha o estado..."
                    class="pl-10 pr-3 py-2 border border-[#1db954]/30 rounded bg-[#181818] text-white focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:border-[#1db954] transition-all duration-300 w-full placeholder:italic placeholder:text-[#b3b3b3]"
                    onkeyup="filtrarCitas()">
                <button type="button" onclick="document.getElementById('searchCitas').value=''; filtrarCitas();"
                    class="absolute right-2 top-1/2 -translate-y-1/2 text-[#1db954] hover:text-white transition"
                    title="Limpiar búsqueda">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>
        </div>
        @if(session('success'))
            <div class="flex items-center gap-2 mb-4 p-4 bg-green-900/80 text-white rounded-lg animate-pulse">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        <div class="overflow-x-auto rounded-xl border border-[#1db954]/20 bg-[#181818] animate-fade-in">
            <table id="tablaCitas" class="min-w-full text-sm text-left text-white">
                <thead class="bg-[#121212] border-b border-[#1db954]/20">
                    <tr>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Corte</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Hora</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Opciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#1db954]/10">
                    @forelse($citas as $cita)
                        <tr class="hover:bg-[#1db954]/10 transition">
                            <td class="px-4 py-2">{{ $cita->usuario->name ?? 'Sin nombre' }}</td>
                            <td class="px-4 py-2">{{ $cita->corte_cabello ?? 'No especificado' }}</td>
                            <td class="px-4 py-2">{{ $cita->fecha }}</td>
                            <td class="px-4 py-2">{{ $cita->hora }}</td>
                            <td class="px-4 py-2">
                                <span
                                    class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-semibold {{ $cita->estado === 'completada' ? 'bg-[#1db954]/20 text-[#1db954]' : 'bg-yellow-900/40 text-yellow-300' }}">
                                    <i class="fas {{ $cita->estado === 'completada' ? 'fa-check-circle' : 'fa-clock' }}"></i>
                                    {{ ucfirst($cita->estado) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('cliente.cita.edit', $cita->id) }}"
                                    class="text-[#1db954] hover:text-white transition" title="Editar"><i
                                        class="fas fa-edit"></i></a>
                                @if ($cita->estado !== 'completada')
                                    <form action="{{ route('cliente.cita.cancelar', $cita->id) }}" method="POST"
                                        onsubmit="return confirm('¿Cancelar esta cita?');" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-yellow-400 hover:text-yellow-200 transition"
                                            title="Cancelar"><i class="fas fa-ban"></i></button>
                                    </form>
                                @endif
                                <form action="{{ route('cliente.cita.destroy', $cita->id) }}" method="POST"
                                    onsubmit="return confirm('¿Eliminar esta cita?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-600 transition" title="Eliminar"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-white/60">No tienes citas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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
    <script>
        function filtrarCitas() {
            const input = document.getElementById('searchCitas');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('tablaCitas');
            const trs = table.getElementsByTagName('tr');
            for (let i = 1; i < trs.length; i++) {
                const tds = trs[i].getElementsByTagName('td');
                let show = false;
                for (let j = 0; j < tds.length - 1; j++) {
                    if (tds[j] && tds[j].textContent.toLowerCase().indexOf(filter) > -1) {
                        show = true;
                        break;
                    }
                }
                trs[i].style.display = show ? '' : 'none';
            }
        }
    </script>
@endsection