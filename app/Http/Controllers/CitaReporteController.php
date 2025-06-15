<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CitaReporteController extends Controller
{
    public function generar()
    {
        $citas = Cita::with('usuario')->orderBy('fecha')->orderBy('hora')->get();

        $pdf = Pdf::loadView('reportes.citas', compact('citas'));
        return $pdf->stream('reporte_citas.pdf');
    }
}