<?php

namespace App\Livewire\Academicos;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Sni;
use App\Models\Pride;
use App\Models\TipoAcademico;
use App\Models\Ubicacion;
use App\Models\Perfil;

class EditarPerfil extends Component
{
    // Variables de formulario
    public $tipo_academico_id;
    public $pride_id;
    public $sni_id;
    public $ubicacion_id;
    public $telefono_oficina;
    public $google_scholar;
    public $biografia;

    public function mount()
    {
        $user = Auth::user();
        
        // Cargamos el perfil si existe
        if ($user->perfil) {
            $this->tipo_academico_id = $user->perfil->tipo_academico_id;
            $this->pride_id = $user->perfil->pride_id;
            $this->sni_id = $user->perfil->sni_id;
            $this->ubicacion_id = $user->perfil->ubicacion_id;
            $this->telefono_oficina = $user->perfil->telefono_oficina;
            $this->google_scholar = $user->perfil->google_scholar;
            $this->biografia = $user->perfil->biografia;
        }
    }

    public function guardar()
    {
        $this->validate([
            'tipo_academico_id' => 'required|exists:tipo_academico,id',
            'pride_id' => 'nullable|exists:pride,id',
            'sni_id' => 'nullable|exists:sni,id',
            'ubicacion_id' => 'nullable|exists:ubicaciones,id', // O puedes hacerlo input texto si prefieres
            'google_scholar' => 'nullable|url',
        ]);

        // Magia: Busca el perfil del usuario logueado, si no existe lo crea
        Perfil::updateOrCreate(
            ['user_id' => Auth::id()], // Condición de búsqueda
            [
                'tipo_academico_id' => $this->tipo_academico_id,
                'pride_id' => $this->pride_id,
                'sni_id' => $this->sni_id,
                'ubicacion_id' => $this->ubicacion_id,
                'telefono_oficina' => $this->telefono_oficina,
                'google_scholar' => $this->google_scholar,
                'biografia' => $this->biografia,
            ] // Valores a guardar
        );

        session()->flash('message', 'Perfil académico actualizado correctamente.');
    }

    public function render()
    {
        return view('livewire.academicos.editar-perfil', [
            'tipos' => TipoAcademico::all(),
            'prides' => Pride::all(),
            'snis' => Sni::all(),
            'ubicaciones' => Ubicacion::all(),
        ]);
    }
}