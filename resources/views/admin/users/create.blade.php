@extends('layouts.app')

@section('content')
    <h2>Crear Nuevo Usuario</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <label for="name">Nombre:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>

        <label for="email">Correo electrónico:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>

        <label for="role">Rol:</label><br>
        <select name="role" required>
            <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Selecciona un rol --</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="cliente" {{ old('role') == 'cliente' ? 'selected' : '' }}>Cliente</option>
        </select><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <label for="password_confirmation">Confirmar contraseña:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <button type="submit">Guardar Usuario</button>
    </form>
@endsection