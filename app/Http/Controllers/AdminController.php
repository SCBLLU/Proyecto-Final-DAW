<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;



class AdminController extends Controller
{
    protected $usuario;

    public function __construct()
    {
        $this->usuario = Auth::user();


        if (!$this->usuario) {
            abort(403, 'Usuario no autenticado.');
        }

        if ($this->usuario->role !== 'admin') {
            abort(403, 'Acceso denegado. No tienes permisos de administrador.');
        }
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
