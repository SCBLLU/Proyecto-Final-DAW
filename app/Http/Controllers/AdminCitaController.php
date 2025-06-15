<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCitaController extends Controller
{
    private $opcionesCorteCabello = [
        'Corte clásico',
        'Corte degradado',
        'Corte undercut',
        'Corte pompadour',
        'Corte con raya',
        'Corte texturizado',
        'Corte buzz',
    ];

    public function index()
    {
        $citas = Cita::with('usuario')->get();
        return view('admin.citas.index', compact('citas'));
    }

    public function create(Request $request)
    {
        $clientes = User::where('role', 'cliente')->get();
        $fechaSeleccionada = $request->query('fecha') ?? now()->toDateString();
        $horaActual = now()->format('H:i');

        $horariosBase = [
            '07:00 AM',
            '07:35 AM',
            '08:10 AM',
            '08:45 AM',
            '09:20 AM',
            '10:00 AM',
            '10:35 AM',
            '11:10 AM',
            '12:30 PM',
            '01:00 PM',
            '01:35 PM',
            '02:10 PM',
            '02:45 PM',
            '03:20 PM',
            '04:00 PM',
            '04:30 PM'
        ];

        $horariosOcupados = Cita::whereDate('fecha', $fechaSeleccionada)->pluck('hora')->toArray();

        if ($fechaSeleccionada === now()->toDateString()) {
            $horariosBase = array_filter($horariosBase, fn($hora) => strtotime($hora) > strtotime($horaActual));
        }

        $horariosDisponibles = array_values(array_diff($horariosBase, $horariosOcupados));
        $opcionesCorteCabello = [
            'Corte clásico',
            'Corte degradado',
            'Corte undercut',
            'Corte pompadour',
            'Corte con raya',
            'Corte texturizado',
            'Corte buzz',
        ];

        return view('admin.citas.create', compact(
            'clientes',
            'fechaSeleccionada',
            'horariosDisponibles',
            'opcionesCorteCabello'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'corte_cabello' => 'required|string|in:' . implode(',', $this->opcionesCorteCabello),
        ]);

        if (Cita::where('fecha', $request->fecha)->where('hora', $request->hora)->exists()) {
            return back()->withErrors(['hora' => 'Ese horario ya está ocupado.'])->withInput();
        }

        $user = User::findOrFail($request->usuario_id);

        Cita::create([
            'user_id' => $user->id,
            'nombre_cliente' => $user->name,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'corte_cabello' => $request->corte_cabello,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('admin.citas.index')->with('success', 'Cita creada exitosamente.');
    }

    public function edit(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $clientes = User::where('role', 'cliente')->get();
        $fechaSeleccionada = $request->query('fecha') ?? $cita->fecha;
        $horaActual = now()->format('H:i');

        $horariosBase = [
            '07:00 AM',
            '07:35 AM',
            '08:10 AM',
            '08:45 AM',
            '09:20 AM',
            '10:00 AM',
            '10:35 AM',
            '11:10 AM',
            '12:30 PM',
            '01:00 PM',
            '01:35 PM',
            '02:10 PM',
            '02:45 PM',
            '03:20 PM',
            '04:00 PM',
            '04:30 PM'
        ];

        $horariosOcupados = Cita::whereDate('fecha', $fechaSeleccionada)
            ->where('id', '!=', $cita->id)
            ->pluck('hora')
            ->toArray();

        if ($fechaSeleccionada === now()->toDateString()) {
            $horariosBase = array_filter($horariosBase, fn($hora) => strtotime($hora) > strtotime($horaActual));
        }

        $horariosDisponibles = array_values(array_diff($horariosBase, $horariosOcupados));
        $opcionesCorteCabello = [
            'Corte clásico',
            'Corte degradado',
            'Corte undercut',
            'Corte pompadour',
            'Corte con raya',
            'Corte texturizado',
            'Corte buzz',
        ];

        return view('admin.citas.edit', compact(
            'cita',
            'clientes',
            'fechaSeleccionada',
            'horariosDisponibles',
            'opcionesCorteCabello'
        ));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);

        $request->validate([
            'usuario_id' => 'required|exists:users,id',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'corte_cabello' => 'required|string|in:' . implode(',', $this->opcionesCorteCabello),
            'estado' => 'required|in:pendiente,completada',
        ]);

        if (Cita::where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->where('id', '!=', $cita->id)
            ->exists()
        ) {
            return back()->withErrors(['hora' => 'Ese horario ya está ocupado.'])->withInput();
        }

        $user = User::findOrFail($request->usuario_id);

        $cita->update([
            'user_id' => $user->id,
            'nombre_cliente' => $user->name,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'corte_cabello' => $request->corte_cabello,
            'estado' => $request->estado,
        ]);

        return redirect()->route('admin.citas.index')->with('success', 'Cita actualizada exitosamente.');
    }
    public function marcarComoCompletada($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->estado = 'completada';
        $cita->save();

        return redirect()->route('admin.citas.index')->with('success', 'Cita marcada como completada.');
    }
    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();

        return redirect()->route('admin.citas.index')->with('success', 'Cita eliminada correctamente.');
    }
}
