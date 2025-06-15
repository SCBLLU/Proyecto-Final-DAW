<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientecitaReporteController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminUserReportController;
use App\Http\Controllers\AdminCitaController;
use App\Http\Controllers\CitaReporteController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    $user = auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'cliente') {
        return redirect()->route('cliente.dashboard');
    } else {
        abort(403, 'Acceso no autorizado');
    }
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.dashboard');

Route::get('/cliente/cita/crear', [ClienteController::class, 'create'])->name('cliente.cita.create');
Route::post('/cliente/cita', [ClienteController::class, 'store'])->name('cliente.cita.store');
Route::get('/cliente/cita/{id}/editar', [ClienteController::class, 'edit'])->name('cliente.cita.edit');
Route::put('/cliente/cita/{id}', [ClienteController::class, 'update'])->name('cliente.cita.update');
Route::put('/cliente/cita/{id}/cancelar', [ClienteController::class, 'cancelar'])->name('cliente.cita.cancelar');
Route::get('/cliente/citas', [ClienteController::class, 'misCitas'])->name('cliente.citas');
Route::delete('/cliente/citas/{id}', [ClienteController::class, 'destroy'])->name('cliente.cita.destroy');


Route::get('/reporte-citas-cliente', [ClientecitaReporteController::class, 'generar'])->name('cliente.reporte');
Route::get('/admin/usuarios', [AdminUserController::class, 'index'])->name('usuarios.index');

Route::get('/admin/usuarios/crear', [AdminUserController::class, 'create'])->name('usuarios.create');
Route::post('/admin/usuarios', [AdminUserController::class, 'store'])->name('usuarios.store');
Route::put('/admin/usuarios/{id}', [AdminUserController::class, 'update'])->name('usuarios.update');
Route::get('/admin/usuarios/{id}/editar', [AdminUserController::class, 'edit'])->name('usuarios.edit');
Route::delete('/admin/usuarios/{id}', [AdminUserController::class, 'destroy'])->name('usuarios.destroy');
Route::get('/admin/usuarios/reporte', [AdminUserReportController::class, 'generar'])->name('usuarios.reporte');


Route::get('/admin/citas', [App\Http\Controllers\AdminController::class, 'citasIndex'])->name('admin.citas.index');
Route::prefix('admin/citas')->middleware('auth')->group(function () {
    Route::get('/', [AdminCitaController::class, 'index'])->name('admin.citas.index');
    Route::get('/crear', [AdminCitaController::class, 'create'])->name('admin.citas.create');
    Route::post('/', [AdminCitaController::class, 'store'])->name('admin.citas.store');
    Route::get('/{id}/editar', [AdminCitaController::class, 'edit'])->name('admin.citas.edit');
    Route::put('/{id}', [AdminCitaController::class, 'update'])->name('admin.citas.update');
    Route::put('/{id}/completar', [AdminCitaController::class, 'marcarComoCompletada'])->name('admin.citas.completar');
    Route::delete('/{id}', [AdminCitaController::class, 'destroy'])->name('admin.citas.destroy');
});
Route::get('/admin/citas/horarios-disponibles', [AdminCitaController::class, 'horariosDisponibles'])->name('admin.citas.horarios');
Route::get('/admin/reportes/citas', [CitaReporteController::class, 'generar'])->name('reportes.citas.pdf');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('users', AdminUserController::class)->names('admin.users');
});


require __DIR__.'/auth.php';
