<?php

namespace App\Livewire\Academicos;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\LineaInvestigacion;

class LineasInvestigacion extends Component
{
    public $descripcion = ''; 

    protected $rules = [
        'descripcion' => 'required|string|max:500',
    ];

    // Propiedad computada para obtener las líneas (Mejor práctica en Livewire 3/12)
    public function getLineasProperty()
    {
        return LineaInvestigacion::where('user_id', Auth::id())
                        ->orderBy('created_at', 'asc') // O 'orden' si lo implementamos luego
                        ->get();
    }

    public function agregarLinea()
    {
        $this->validate();

        LineaInvestigacion::create([
            'user_id' => Auth::id(),
            'descripcion' => $this->descripcion,
            'activo' => 1
        ]);

        $this->reset('descripcion');
        $this->dispatch('saved'); 
    }

public function eliminarLinea($id)
{
    $linea = LineaInvestigacion::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();
    
    if ($linea) {
        $linea->delete();
        $this->dispatch('saved');
    }
}

    public function render()
    {
        return view('livewire.academicos.lineas-investigacion', [
            'lineas' => $this->lineas, // Usamos la propiedad computada
        ]);
    }
}