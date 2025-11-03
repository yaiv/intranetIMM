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
       Schema::table('solicitud_servicios', function (Blueprint $table) {
        $table->foreignId('estado_servicio_id')
              ->default(2) // <-- ¡Importante! Por defecto será '2' (En Proceso)
              ->after('cantidad') 
              ->constrained('estado_servicios'); // Enlaza con la tabla 'estado_servicios'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitud_servicios', function (Blueprint $table) {
        // Importante para poder revertir en orden
        $table->dropForeign(['estado_servicio_id']);
        $table->dropColumn('estado_servicio_id');
            //
        });
    }
};
