<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogosAcademicosSeeder extends Seeder
{
    public function run(): void
    {
        // -------------------------
        // 1. Niveles SNI
        // -------------------------
        $snis = [
            ['nivel' => 'Candidato', 'descripcion' => 'Candidato a Investigador Nacional'],
            ['nivel' => 'Nivel I', 'descripcion' => 'Investigador Nacional Nivel I'],
            ['nivel' => 'Nivel II', 'descripcion' => 'Investigador Nacional Nivel II'],
            ['nivel' => 'Nivel III', 'descripcion' => 'Investigador Nacional Nivel III'],
            ['nivel' => 'Emérito', 'descripcion' => 'Investigador Nacional Emérito'],
        ];
        DB::table('sni')->insertOrIgnore($snis);

        // -------------------------
        // 2. Niveles PRIDE
        // -------------------------
        $prides = [
            ['nivel' => 'A', 'descripcion' => 'Nivel A'],
            ['nivel' => 'B', 'descripcion' => 'Nivel B'],
            ['nivel' => 'C', 'descripcion' => 'Nivel C'],
            ['nivel' => 'D', 'descripcion' => 'Nivel D'],
        ];
        DB::table('pride')->insertOrIgnore($prides);

        // -------------------------
        // 3. Tipos Académicos
        // -------------------------
        $tipos = [
            ['nombre' => 'Investigador Titular A'],
            ['nombre' => 'Investigador Titular B'],
            ['nombre' => 'Investigador Titular C'],
            ['nombre' => 'Investigador Asociado C'],
            ['nombre' => 'Técnico Académico Titular A'],
        ];
        DB::table('tipo_academico')->insertOrIgnore($tipos);

        // -------------------------
        // 4. Ubicaciones
        // -------------------------
        $ubicaciones = [
            ['edificio' => 'Edificio A', 'cubiculo' => 'PB-01'],
            ['edificio' => 'Edificio C', 'cubiculo' => '113'],
        ];
        DB::table('ubicaciones')->insertOrIgnore($ubicaciones);

        // -------------------------------------------------------
        // 5. CUENTAS
        // -------------------------------------------------------
        $cuentas = [
            ['tipo' => 'Administrativa', 'descripcion' => 'Cuenta para gastos administrativos'],
            ['tipo' => 'Nómina', 'descripcion' => 'Cuenta de pago a empleados'],
            ['tipo' => 'Operativa', 'descripcion' => 'Cuenta para operaciones diarias'],
            ['tipo' => 'Proyecto', 'descripcion' => 'Cuenta destinada a proyectos específicos'],
        ];
        DB::table('cuentas')->insertOrIgnore($cuentas);

        // -------------------------------------------------------
        // 6. DEPARTAMENTOS
        // -------------------------------------------------------
        $departamentos = [
            ['nombre' => 'Recursos Humanos', 'descripcion' => 'Gestión del personal', 'ubicacion' => 'Edificio A - Planta Baja'],
            ['nombre' => 'Finanzas', 'descripcion' => 'Control administrativo y financiero', 'ubicacion' => 'Edificio B - Piso 2'],
            ['nombre' => 'TI', 'descripcion' => 'Tecnologías de la Información', 'ubicacion' => 'Edificio C - Piso 1'],
            ['nombre' => 'Investigación', 'descripcion' => 'Desarrollo de proyectos de investigación', 'ubicacion' => 'Laboratorio Central'],
        ];
        DB::table('departamentos')->insertOrIgnore($departamentos);

        // -------------------------------------------------------
        // 7. EDIFICIOS
        // -------------------------------------------------------
        $edificios = [
            ['nombre' => 'Edificio A', 'direccion' => 'Av. Universidad 123'],
            ['nombre' => 'Edificio B', 'direccion' => 'Calle Innovación 456'],
            ['nombre' => 'Edificio C', 'direccion' => 'Boulevard Tecnológico 789'],
            ['nombre' => 'Laboratorio Central', 'direccion' => 'Zona Experimental S/N'],
        ];
        DB::table('edificios')->insertOrIgnore($edificios);
    }
}
