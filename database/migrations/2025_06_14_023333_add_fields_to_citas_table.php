<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('user_id')->after('id'); // ID del usuario
            $table->string('nombre_cliente')->after('user_id'); // Nombre del cliente
            $table->date('fecha')->after('nombre_cliente'); // Fecha de la cita
            $table->string('hora')->after('fecha'); // Hora de la cita
            $table->string('estado')->default('pendiente')->after('hora');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citas', function (Blueprint $table) {
            //
            $table->dropColumn(['user_id', 'nombre_cliente', 'fecha', 'hora', 'estado']);


        });
    }
};
