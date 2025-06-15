@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8">
    <h2 class="text-3xl font-bold mb-6 text-pink-600 dark:text-pink-300">Panel de Administración</h2>
    <div class="bg-white/80 dark:bg-neutral-900 border border-pink-100 dark:border-pink-900 rounded-xl p-6 shadow-lg">
        <p class="text-gray-700 dark:text-gray-200 mb-2">Aquí puedes gestionar todas las citas.</p>
        <a href="{{ route('admin.citas.index') }}" class="inline-block mt-4 px-6 py-2 bg-gradient-to-r from-pink-500 via-orange-400 to-yellow-400 text-white rounded-full font-semibold border-none shadow hover:from-pink-600 hover:to-yellow-500 transition">Ver citas</a>
    </div>
</div>
@endsection
