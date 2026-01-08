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

    public $buscar = '';
    public $soloMias = false;
    public $solicitudSeleccionada = null;
    public $comentarioAdmin = '';
    public $verModalDetalle = false;

    public function mount($soloMias = false)
    {
        $this->soloMias = $soloMias;
    }   

    public function updatingBuscar()
    {
        $this->resetPage(); // Reiniciar paginación al buscar
    }   

    public function render()
    {
        $query = SolicitudServicio::with(['departamento', 'estadoServicio']);

        if ($this->soloMias) {
            $query->where('responsable_id', Auth::id());
        }

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

    public function verDetalle($id)
    {
        $query = SolicitudServicio::with(['estadoServicio', 'comentarios', 'responsable', 'departamento', 'edificio', 'cuenta']);


        if ($this->soloMias) {
            $query->where('responsable_id', Auth::id());
        }

        $this->solicitudSeleccionada = $query->find($id);

        // Si no encuentra la solicitud (o no es suya), no abre el modal
        if ($this->solicitudSeleccionada) {
            $this->comentarioAdmin = '';
            $this->verModalDetalle = true;
        }
    }

    public function actualizarEstado($nuevoEstadoId)
    {

        if (!Auth::user()->hasRole('administrador')) {
            $this->dispatch('notify', 'No tienes permisos para realizar esta acción.'); // O un error 403
            return;
        }

        if ($nuevoEstadoId == 4 && empty($this->comentarioAdmin)) {
            $this->addError('comentarioAdmin', 'Debes agregar un motivo para rechazar la solicitud.');
            return;
        }

        SolicitudComentario::create([
            'solicitud_servicio_id' => $this->solicitudSeleccionada->id,
            'user_id' => Auth::id(),
            'comentario' => $this->comentarioAdmin ?: 'Cambio de estatus sin comentario.',
            'estado_anterior' => $this->solicitudSeleccionada->estado_servicio_id,
            'estado_nuevo' => $nuevoEstadoId,
        ]);

        $this->solicitudSeleccionada->estado_servicio_id = $nuevoEstadoId;
        $this->solicitudSeleccionada->save();

        $this->verModalDetalle = false;
        $this->dispatch('notify', 'Solicitud actualizada correctamente');
    }
}
