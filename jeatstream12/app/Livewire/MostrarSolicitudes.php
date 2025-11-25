<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SolicitudServicio; 
use Livewire\WithPagination;
use App\Models\SolicitudComentario;
use Illuminate\Support\Facades\Auth;

class MostrarSolicitudes extends Component
{
    use WithPagination;
public function render()
{
    $query = SolicitudServicio::with(['departamento', 'estadoServicio']);

    if ($this->buscar) {
        $busqueda = '%' . $this->buscar . '%';

        $query->where(function ($q) use ($busqueda) {
            $q->where('id', 'like', $busqueda)
              ->orWhere('tipoEquipo', 'like', $busqueda)
              ->orWhere('trabajoAFallarAparente', 'like', $busqueda)
              ->orWhere('solicitante', 'like', $busqueda)
              ->orWhereHas('departamento', function ($d) use ($busqueda) {
                  $d->where('nombre', 'like', $busqueda);
              })
              ->orWhereHas('estadoServicio', function ($e) use ($busqueda) {
                  $e->where('estado', 'like', $busqueda);
              });
        });
    }

    $solicitudes = $query->latest()->paginate(10);

    return view('livewire.mostrar-solicitudes', [
        'solicitudes' => $solicitudes
    ]);
}
    public $buscar = '';
     // Propiedades para el modal de detalle y actualización
    public $solicitudSeleccionada = null;
    public $comentarioAdmin = '';
    public $verModalDetalle = false;

       public function updatingBuscar()
    {
        $this->resetPage(); // Reiniciar paginación al buscar
    }


    public function verDetalle($id)
    {
        $this->solicitudSeleccionada = SolicitudServicio::with('estadoServicio', 'comentarios')->find($id);
        $this->comentarioAdmin = ''; // Limpiar campo
        $this->verModalDetalle = true;
    }


    // Método para actualizar estado (Aprobar o Rechazar)
    public function actualizarEstado($nuevoEstadoId)
    {
        // Validar: Si rechaza 
        // Ajusta el ID 3 al ID que corresponda a "Rechazado" en BD
        if ($nuevoEstadoId == 3 && empty($this->comentarioAdmin)) {
            $this->addError('comentarioAdmin', 'Debes agregar un motivo para rechazar la solicitud.');
            return;
        }

        // 1. Guardar en el historial/comentarios
        SolicitudComentario::create([
            'solicitud_servicio_id' => $this->solicitudSeleccionada->id,
            'user_id' => Auth::id(),
            'comentario' => $this->comentarioAdmin ?: 'Cambio de estatus sin comentario.',
            'estado_anterior' => $this->solicitudSeleccionada->estado_servicio_id,
            'estado_nuevo' => $nuevoEstadoId,
        ]);

        // 2. Actualizar la solicitud
        $this->solicitudSeleccionada->estado_servicio_id = $nuevoEstadoId;
        $this->solicitudSeleccionada->save();

        $this->verModalDetalle = false;
        $this->dispatch('notify', 'Solicitud actualizada correctamente'); 
    }
}
