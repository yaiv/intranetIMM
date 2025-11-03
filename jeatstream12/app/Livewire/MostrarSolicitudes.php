<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SolicitudServicio; // <-- Asegúrate de importar tu modelo

class MostrarSolicitudes extends Component
{
    public function render()
    {
        // Cargamos las solicitudes, pero usando 'with' para
        // traer también la información del departamento (Eager Loading).
        // Esto es mucho más eficiente.
        // También ordenamos por la más reciente.
        $solicitudes = SolicitudServicio::with(['departamento', 'estadoServicio'])
                                        ->latest() // Ordena por created_at descendente
                                        ->paginate(10); // Opcional: paginar si son muchas

        return view('livewire.mostrar-solicitudes', [
            'solicitudes' => $solicitudes
        ]);
    }
}
