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
    Schema::create('solicitud_servicios', function (Blueprint $table) {
        $table->id();

        // Fila 1
        $table->string('responsable'); // O puedes usar un foreignId si 'responsable' es un usuario
        $table->string('solicitante');

        // Fila 2
        $table->foreignId('departamento_id')->constrained('departamentos');
        $table->foreignId('edificio_id')->constrained('edificios');
        $table->string('laboratorio')->nullable();

        // Fila 3
        $table->foreignId('cuenta_id')->constrained('cuentas'); // Asumiendo que 'conCargoA' es la tabla 'cuentas'

        // Fila 4
        $table->json('tipo_servicio'); // Usamos JSON para guardar el array de checkboxes

        // Fila 5
        $table->text('trabajoAFallarAparente'); // 'trabajoAFallarAparente'

        // Info de Equipo (Filas 7, 8, 9)
        $table->string('tipoEquipo')->nullable();
        $table->string('marca')->nullable();
        $table->string('modelo')->nullable();
        $table->string('clasificacion')->nullable();
        $table->string('noSerie')->nullable();
        $table->string('noInventario')->nullable();
        $table->integer('cantidad')->nullable();

        $table->timestamps(); // created_at y updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_servicios');
    }
};
