<?php

namespace App\Livewire\Academicos;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\FormacionProfesional;

class FormacionAcademica extends Component
{

// Colección para mostrar la lista
    public $grados; 

    // Campos del formulario
    public $grado_academico = ''; // El select (Lic, Maestria...)
    public $institucion = '';
    public $titulo_obtenido = '';
    public $anio_fin = '';
    public $pais = 'México';

    // Reglas de validación
    protected $rules = [
        'grado_academico' => 'required|string',
        'institucion' => 'required|string|max:255',
        'titulo_obtenido' => 'required|string|max:255',
        'anio_fin' => 'required|integer|digits:4',
    ];

    public function mount()
    {
        $this->cargarGrados();
    }

    public function cargarGrados()
    {
        // Traemos los grados del usuario logueado, ordenados por año (más reciente primero)
        $this->grados = FormacionProfesional::where('user_id', Auth::id())
                        ->orderBy('anio_fin', 'desc')
                        ->get();
    }

    public function agregarGrado()
    {
        $this->validate();

        FormacionProfesional::create([
            'user_id' => Auth::id(),
            'grado' => $this->grado_academico,
            'institucion' => $this->institucion,
            'titulo_obtenido' => $this->titulo_obtenido,
            'anio_fin' => $this->anio_fin,
            'pais' => $this->pais,

        ]);

        $this->reset(['grado_academico', 'institucion', 'titulo_obtenido', 'anio_fin', 'pais']);
        $this->cargarGrados(); // Refrescamos la lista
        
        // Enviamos notificación visual al usuario
        $this->dispatch('saved'); 
    }

    public function eliminarGrado($id)
    {
      
        $registro = FormacionProfesional::where('id', $id)
        ->where('user_id', Auth::id())
        ->first();
        
        if ($registro) {
            $registro->delete();
            $this->cargarGrados();
        }
    }

    public function render()
    {
        return view('livewire.academicos.formacion-academica');
    }
}
