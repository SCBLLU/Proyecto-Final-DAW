<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminUserReportController extends Controller
{
    public function generar()
    {
        $usuarios = User::all();
        $pdf = Pdf::loadView('reportes.usuarios', compact('usuarios'));
        return $pdf->stream('reporte_usuarios.pdf');
    }
}
