<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SolicitudServicio;
use App\Models\EstadoServicio;

class SolicitudController extends Controller
{
    /**
     * Muestra el dashboard del admin con TODAS las solicitudes.
     * (Corresponde a la ruta GET /admin/solicitudes)
     */
    public function index()
    {
        // 1. Cargar todas las solicitudes
        $solicitudes = SolicitudServicio::with([
                            'responsable',    // Carga el usuario que la creó
                            'estadoServicio', // Carga el estado actual
                            'departamento'    // Carga el departamento
                        ])
                        ->latest() // Muestra las más nuevas primero
                        ->get();

        // 2. Cargar todos los estados disponibles (para el dropdown)
        $estados = EstadoServicio::orderBy('nombre')->get();
        
        // 3. Mostrar la vista del admin y pasarle los datos
        return view('admin.solicitudes', compact('solicitudes', 'estados'));
    }

    /**
     * Actualiza el estado de una solicitud.
     * (Corresponde a la ruta PATCH /admin/solicitud/{id}/actualizar-estado)
     *
     * @param Request $request
     * @param SolicitudServicio $solicitud (¡Esto es Route Model Binding!)
     */
    public function updateStatus(Request $request, SolicitudServicio $solicitud)
    {
        // 1. Validar que el estado_servicio_id enviado exista
        $request->validate([
            'estado_servicio_id' => 'required|exists:estado_servicios,id',
        ]);

        // 2. Actualizar la solicitud
        $solicitud->update([
            'estado_servicio_id' => $request->estado_servicio_id,
        ]);

        // 3. (Opcional) Enviar una notificación al usuario
        // Mail::to($solicitud->responsable->email)->send(new SolicitudActualizada($solicitud));
        
        // 4. Redirigir de vuelta al dashboard del admin con un mensaje de éxito
        return redirect()->route('admin.solicitudes.index')
                         ->with('success', 'Estado de la solicitud #' . $solicitud->id . ' actualizado.');
    }
}