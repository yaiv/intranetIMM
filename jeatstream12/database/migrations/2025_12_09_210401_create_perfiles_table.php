<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();
            
            // Relación 1:1 Principal. 
            // Usamos ->unique() para asegurar que un usuario solo tenga UN perfil.
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');

            // Relaciones con catálogos (Nullable por si el perfil está incompleto)
            $table->foreignId('tipo_academico_id')->nullable()->constrained('tipo_academico');
            $table->foreignId('pride_id')->nullable()->constrained('pride');
            $table->foreignId('sni_id')->nullable()->constrained('sni');
            $table->foreignId('ubicacion_id')->nullable()->constrained('ubicaciones');

            // Campos específicos del perfil (para lograr la vista de la imagen)
            $table->string('telefono_oficina')->nullable();
            $table->string('cubiculo')->nullable(); // Por si el cubo es un dato simple y no un ID
            $table->string('google_scholar')->nullable(); // Para el botón del perfil
            $table->text('biografia')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfiles');
    }
};