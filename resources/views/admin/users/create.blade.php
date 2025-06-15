@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto py-10">
        <h2 class="text-3xl font-extrabold mb-8 text-[#1db954] flex items-center gap-3">
            <i class="fas fa-user-plus text-2xl"></i> Crear Nuevo Usuario
        </h2>
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-900/80 text-white rounded-lg animate-pulse">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('usuarios.store') }}" method="POST" class="space-y-6 animate-fade-in">
            @csrf
            <div>
                <label for="name" class="block text-white/80 mb-1">Nombre:</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    class="w-full bg-[#181818] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]" />
            </div>
            <div>
                <label for="email" class="block text-white/80 mb-1">Correo electrónico:</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full bg-[#181818] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]" />
            </div>
            <div>
                <label for="role" class="block text-white/80 mb-1">Rol:</label>
                <select name="role" required
                    class="w-full bg-[#181818] border border-[#1db954]/30 text-white rounded px-3 py-2">
                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Selecciona un rol --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="cliente" {{ old('role') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                </select>
            </div>
            <div>
                <label for="password" class="block text-white/80 mb-1">Contraseña:</label>
                <input type="password" name="password" required
                    class="w-full bg-[#181818] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]" />
            </div>
            <div>
                <label for="password_confirmation" class="block text-white/80 mb-1">Confirmar contraseña:</label>
                <input type="password" name="password_confirmation" required
                    class="w-full bg-[#181818] border border-[#1db954]/30 text-white rounded px-3 py-2 focus:border-[#1db954] focus:ring-[#1db954]" />
            </div>
            <button type="submit"
                class="w-full px-5 py-2 bg-[#1db954] text-black rounded-full font-bold border border-[#1db954] transition-all duration-300 shadow-md group hover:bg-[#121212] hover:text-[#1db954] hover:border-[#1db954] focus:outline-none focus:ring-2 focus:ring-[#1db954] focus:ring-offset-2">
                <i class="fas fa-save transition-transform duration-300  group-hover:text-[#1db954]"></i> Guardar Usuario
            </button>
        </form>
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
@endsection