@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-8 text-[#1db954] flex items-center gap-3">
            <i class="fas fa-users text-2xl"></i> Lista de Usuarios
        </h2>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div class="flex gap-2">
                <a href="{{ route('usuarios.create') }}"
                    class="flex items-center gap-2 px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                    <i class="fas fa-user-plus transition-transform duration-300 group-hover:text-[#1db954]"></i>
                    Nuevo Usuario
                </a>
                <a href="{{ route('usuarios.reporte') }}" target="_blank"
                    class="flex items-center gap-2 px-5 py-2 bg-[#181818] text-[#1db954] rounded-full font-bold border border-[#1db954] transition-all duration-300 shadow-md group hover:bg-[#1db954] hover:text-black hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                    <i class="fas fa-file-pdf transition-transform duration-300 group-hover:text-black"></i>
                    Generar Reporte
                </a>
            </div>
            <div class="flex items-center gap-2 relative w-full max-w-xs">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#1db954] pointer-events-none">
                    <i class="fas fa-search"></i>
                </span>
                <input type="text" id="searchUsuarios" placeholder="Buscar por nombre..."
                    class="pl-10 pr-3 py-2 border border-[#1db954]/30 rounded bg-[#181818] text-white focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:border-[#1db954] transition-all duration-300 w-full placeholder:italic placeholder:text-[#b3b3b3]"
                    onkeyup="filtrarUsuarios()">
                <button type="button" onclick="document.getElementById('searchUsuarios').value=''; filtrarUsuarios();"
                    class="absolute right-2 top-1/2 -translate-y-1/2 text-[#1db954] hover:text-white transition"
                    title="Limpiar búsqueda">
                    <i class="fas fa-times-circle"></i>
                </button>
            </div>
        </div>
        <div class="overflow-x-auto rounded-xl border border-[#1db954]/20 bg-[#181818] animate-fade-in">
            <table id="tablaUsuarios" class="min-w-full text-sm text-left text-white">
                <thead class="bg-[#121212] border-b border-[#1db954]/20">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Rol</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#1db954]/10">
                    @forelse ($usuarios as $usuario)
                        <tr class="hover:bg-[#1db954]/10 transition">
                            <td class="px-4 py-2">{{ $usuario->id }}</td>
                            <td class="px-4 py-2">{{ $usuario->name }}</td>
                            <td class="px-4 py-2">{{ $usuario->email }}</td>
                            <td class="px-4 py-2">
                                <span
                                    class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-semibold {{ $usuario->role === 'admin' ? 'bg-[#1db954]/20 text-[#1db954]' : 'bg-blue-900/40 text-blue-300' }}">
                                    <i class="fas {{ $usuario->role === 'admin' ? 'fa-user-shield' : 'fa-user' }}"></i>
                                    {{ ucfirst($usuario->role) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                    class="text-[#1db954] hover:text-white transition" title="Editar"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                    onsubmit="return confirm('¿Eliminar este usuario?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-600 transition" title="Eliminar"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-white/60">No hay usuarios registrados.</td>
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
        function filtrarUsuarios() {
            const input = document.getElementById('searchUsuarios');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('tablaUsuarios');
            const trs = table.getElementsByTagName('tr');
            for (let i = 1; i < trs.length; i++) { // Empieza en 1 para saltar el thead
                const tds = trs[i].getElementsByTagName('td');
                let show = false;
                for (let j = 0; j < tds.length - 1; j++) { // No filtra por acciones
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