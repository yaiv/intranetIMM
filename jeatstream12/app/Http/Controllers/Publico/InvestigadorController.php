<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class InvestigadorController extends Controller
{
    public function show($id)
    {
        // Buscamos al investigador por ID
        // 'with' carga las relaciones para optimizar la consulta (Eager Loading)
        $investigador = User::with([
            'profile.tipoAcademico',
            'profile.pride',
            'profile.sni',
            'profile.ubicacion',
            'formacionProfesional',
            'lineasInvestigacion'
        ])->findOrFail($id);

        return view('publico.investigadores.show', compact('investigador'));
    }
}