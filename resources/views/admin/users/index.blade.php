@extends('layouts.app')

@section('content')
    <h2>Lista de Usuarios</h2>

    <a href="{{ route('usuarios.create') }}" style="margin-bottom: 15px; display: inline-block;">
        + Nuevo Usuario
    </a>
    <a href="{{ route('usuarios.reporte') }}" style="margin-left: 10px; padding: 5px 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    Generar Reporte
</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a> |
<form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
</form>
                </tr>
            @empty
                <tr><td colspan="5">No hay usuarios registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection