<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cita;
use Barryvdh\DomPDF\Facade\Pdf;

class ClientecitaReporteController extends Controller
{
    public function generar()
    {
        $citas = Cita::where('user_id', Auth::id())->get();

        $pdf = Pdf::loadView('reportes.citacliente', compact('citas'));

        return $pdf->stream('reporte_citas_cliente.pdf');
    }
}
