<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    //
    protected $fillable = ['user_id', 'nombre_cliente', 'fecha', 'hora', 'estado', 'corte_cabello'];
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
