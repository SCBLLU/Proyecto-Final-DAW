<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{


    public function index()
    {
        $usuarios = User::where('id', '!=', auth::id())->get();
        return view('admin.users.index', compact('usuarios'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,cliente',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function update(Request $request, $id)
    {
        $usuario = \App\Models\User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'role' => 'required|in:admin,cliente',
        ]);

        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }


    public function edit($id)
    {
        // Evitar que el admin se edite a sí mismo
        if (auth::id() == $id) {
            abort(403, 'No puedes editar tu propio usuario.');
        }

        $usuario = User::findOrFail($id);
        return view('admin.users.edit', compact('usuario'));
    }

    public function destroy($id)
    {
        // Evitar que el admin se elimine a sí mismo
        if (auth::id() == $id) {
            return redirect()->route('usuarios.index')->with('error', 'No puedes eliminar tu propio usuario.');
        }

        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
