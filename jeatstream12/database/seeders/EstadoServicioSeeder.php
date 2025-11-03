<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoServicioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('estado_servicios')->insert([
            ['id' => 1, 'estado' => 'Completado'],
            ['id' => 2, 'estado' => 'En Proceso'],
            ['id' => 3, 'estado' => 'Pendiente'],
        ]);
    }
}
