<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cita;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        if (auth::check()) {
            if (auth::user()->role !== 'cliente') {
                abort(403, 'Acceso denegado. Solo clientes pueden acceder.');
            }
        }
        // No abortamos si no está autenticado aquí para evitar errores tempranos.
    }

    private $opcionesCorteCabello = [
        'Corte clásico',
        'Corte degradado',
        'Corte undercut',
        'Corte pompadour',
        'Corte con raya',
        'Corte texturizado',
        'Corte buzz'
    ];

    public function index()
    {
        $citas = Cita::where('user_id', auth::id())
            ->with('usuario')
            ->get();

        return view('cliente.dashboard', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'nombre_cliente' => 'required|string',
            'corte_cabello' => 'required|string|in:' . implode(',', $this->opcionesCorteCabello),
        ]);

        if (Cita::where('fecha', $request->fecha)->where('hora', $request->hora)->exists()) {
            return back()->withErrors(['hora' => 'Este horario ya está ocupado.']);
        }

        Cita::create([
            'user_id' => auth::id(),
            'nombre_cliente' => $request->nombre_cliente,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'corte_cabello' => $request->corte_cabello,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('cliente.dashboard')->with('success', 'Cita creada exitosamente.');
    }

    public function create(Request $request)
    {
        $fechaSeleccionada = $request->query('fecha') ?? now()->toDateString();
        $horaActual = now()->format('H:i');

        $horarios_disponibles = [
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

        $horarios_ocupados = Cita::whereDate('fecha', $fechaSeleccionada)->pluck('hora')->toArray();

        if ($fechaSeleccionada === now()->toDateString()) {
            $horarios_disponibles = array_filter($horarios_disponibles, function ($hora) use ($horaActual) {
                return strtotime($hora) > strtotime($horaActual);
            });
        }

        $horarios_filtrados = array_values(array_diff($horarios_disponibles, $horarios_ocupados));

        $opcionesCorteCabello = $this->opcionesCorteCabello;

        return view('cliente.crear-cita', compact('horarios_filtrados', 'fechaSeleccionada', 'opcionesCorteCabello'));
    }

    public function edit(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);

        $fechaSeleccionada = $request->query('fecha') ?? $cita->fecha;
        $horaActual = now()->format('H:i');

        $horarios_disponibles = [
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

        $horarios_ocupados = Cita::whereDate('fecha', $fechaSeleccionada)
            ->where('id', '!=', $cita->id)
            ->pluck('hora')
            ->toArray();

        if ($fechaSeleccionada === now()->toDateString()) {
            $horarios_disponibles = array_filter($horarios_disponibles, function ($hora) use ($horaActual) {
                return strtotime($hora) > strtotime($horaActual);
            });
        }

        $horarios_filtrados = array_values(array_diff($horarios_disponibles, $horarios_ocupados));

        $opcionesCorteCabello = $this->opcionesCorteCabello;

        return view('cliente.edit', compact('cita', 'fechaSeleccionada', 'horarios_filtrados', 'opcionesCorteCabello'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);

        if ($cita->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta cita.');
        }

        $request->validate([
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'nombre_cliente' => 'required|string',
            'corte_cabello' => 'required|string|in:' . implode(',', $this->opcionesCorteCabello),
        ]);

        if (Cita::where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->where('id', '!=', $cita->id)
            ->exists()
        ) {
            return back()->withErrors(['hora' => 'Este horario ya está ocupado.']);
        }

        $cita->update([
            'nombre_cliente' => $request->nombre_cliente,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'corte_cabello' => $request->corte_cabello,
        ]);

        return redirect()->route('cliente.dashboard')->with('success', 'Cita actualizada exitosamente.');
    }

    public function cancelar($id)
    {
        $cita = Cita::findOrFail($id);

        if ($cita->user_id !== Auth::id()) {
            abort(403, 'No puedes cancelar una cita que no te pertenece.');
        }

        $cita->estado = 'cancelada';
        $cita->save();

        return redirect()->route('cliente.citas')->with('success', 'Cita cancelada exitosamente.');
    }
    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);

        if ($cita->user_id !== auth::id()) {
            abort(403, 'No autorizado.');
        }

        $cita->delete();

        return redirect()->route('cliente.dashboard')->with('success', 'Cita eliminada correctamente.');
    }
    public function misCitas()
    {
        $citas = Cita::where('user_id', auth::id())
            ->with('usuario')
            ->get();
        return view('cliente.dashboard', compact('citas'));
    }
}
