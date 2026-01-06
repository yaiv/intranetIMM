<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\FormacionProfesional;

class ProfessionalDegrees extends Component
{
    public $degrees;
    public $isEditing = false;
    public $editingId = null; // Para saber cuál estamos editando (null = creando nuevo)

    // Campos del formulario
    public $grado, $institucion, $pais, $anio_fin, $titulo_obtenido;

    public function mount()
    {
        $this->loadDegrees();
    }

    public function loadDegrees()
    {
        $this->degrees = Auth::user()->estudios()->get();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->editingId = null;
        $this->isEditing = true;
    }

    public function edit($id)
    {
        $degree = FormacionProfesional::find($id);
        
        // Seguridad: Verificar que el registro pertenezca al usuario
        if($degree->user_id !== Auth::id()) {
            return;
        }

        $this->editingId = $id;
        $this->grado = $degree->grado;
        $this->institucion = $degree->institucion;
        $this->pais = $degree->pais;
        $this->anio_fin = $degree->anio_fin;
        $this->titulo_obtenido = $degree->titulo_obtenido;

        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate([
            'grado' => 'required|string',
            'institucion' => 'required|string',
            'anio_fin' => 'required|integer|digits:4',
            'titulo_obtenido' => 'required|string',
            'pais' => 'required|string',
        ]);

        if ($this->editingId) {
            // Actualizar
            $degree = FormacionProfesional::find($this->editingId);
            $degree->update([
                'grado' => $this->grado,
                'institucion' => $this->institucion,
                'pais' => $this->pais,
                'anio_fin' => $this->anio_fin,
                'titulo_obtenido' => $this->titulo_obtenido,
            ]);
        } else {
            // Crear Nuevo
            Auth::user()->estudios()->create([
                'grado' => $this->grado,
                'institucion' => $this->institucion,
                'pais' => $this->pais,
                'anio_fin' => $this->anio_fin,
                'titulo_obtenido' => $this->titulo_obtenido,
            ]);
        }

        $this->isEditing = false;
        $this->loadDegrees(); // Recargar lista
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Auth::user()->estudios()->where('id', $id)->delete();
        $this->loadDegrees();
    }

    public function cancel()
    {
        $this->isEditing = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->grado = '';
        $this->institucion = '';
        $this->pais = 'México';
        $this->anio_fin = '';
        $this->titulo_obtenido = '';
    }

    public function render()
    {
        return view('livewire.profile.professional-degrees');
    }
}