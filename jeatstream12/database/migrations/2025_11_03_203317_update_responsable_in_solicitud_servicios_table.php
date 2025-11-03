<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\SolicitudServicio;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('solicitud_servicios', function (Blueprint $table) {
            // 1. Agregar la nueva columna responsable_id (permitimos null temporalmente)
           // $table->unsignedBigInteger('responsable_id')->nullable()->after('id');

            // 2. Crear relación con users.id
          //  $table->foreign('responsable_id')->references('id')->on('users')->onDelete('cascade');
        });

        // 3. Migrar los datos del campo responsable al nuevo responsable_id
        $servicios = \DB::table('solicitud_servicios')->get();
        foreach ($servicios as $servicio) {
            $user = DB::table('users')
            ->whereRaw("CONCAT(nombre, ' ', apellido_paterno) = ?", [$servicio->responsable])
            ->first();

            if ($user) {
                \DB::table('solicitud_servicios')
                    ->where('id', $servicio->id)
                    ->update(['responsable_id' => $user->id]);
            }
        }

        Schema::table('solicitud_servicios', function (Blueprint $table) {
            // 4. Eliminar la columna antigua después de migrar los datos
            $table->dropColumn('responsable');
        });
    }

    public function down(): void
    {
        Schema::table('solicitud_servicios', function (Blueprint $table) {
            $table->string('responsable')->nullable();
            $table->dropForeign(['responsable_id']);
            $table->dropColumn('responsable_id');
        });
    }
};
