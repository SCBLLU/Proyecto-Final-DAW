@extends('layouts.app')

@section('content')
    <h2>Editar Usuario</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label><br>
        <input type="text" name="name" value="{{ old('name', $usuario->name) }}" required><br><br>

        <label for="email">Correo electrónico:</label><br>
        <input type="email" name="email" value="{{ old('email', $usuario->email) }}" required><br><br>

        <label for="role">Rol:</label><br>
        <select name="role" required>
            <option value="admin" {{ old('role', $usuario->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="cliente" {{ old('role', $usuario->role) == 'cliente' ? 'selected' : '' }}>Cliente</option>
        </select><br><br>

        <button type="submit">Actualizar Usuario</button>
    </form>
@endsection