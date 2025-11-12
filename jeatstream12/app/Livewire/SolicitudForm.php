<?php

namespace App\Livewire; 

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Departamento;
use App\Models\Edificio;    
use App\Models\Cuenta;
use App\Models\SolicitudServicio;
use App\Models\EstadoServicio; // Necesario para la lista
use Barryvdh\DomPDF\Facade\Pdf; // Para el PDF



class SolicitudForm extends Component
{
    // --- PROPIEDADES PARA VINCULAR AL FORMULARIO ---
    
    // Sección 1: Información del Usuario
    public $responsable_id; // CAMBIADO: Ahora guarda el ID del usuario
    public $responsableNombre; // NUEVO: Para mostrar el nombre en el formulario
    public $solicitante;
    public $departamento = '';
    public $edificio = '';
    public $laboratorio;
    public $conCargoA = '';
    public $cuenta = '';

    // Sección 2: Tipo de Servicio (checkboxes)
    public $tipoServicio = [];

    // Sección 3: Descripción del Servicio
    public $trabajoAFallarAparente;

    // Sección 4: Información del Equipo
    public $tipoEquipo;
    public $marca;
    public $modelo;
    public $clasificacion;
    public $noSerie;
    public $noInventario;
    public $cantidad = 1;

    // --- PROPIEDADES PARA LAS LISTAS (DROPDOWNS) ---
    public $departamentos = [];
    public $edificios = [];
    public $cuentas = [];

    // --- PROPIEDADES PARA EL MODAL ---
    public $mostrarModal = false;
    public $solicitudId = null;

    protected $rules = [
        'responsable_id'  => 'required|exists:users,id', // CAMBIADO
        'solicitante'     => 'required|string|max:255',
        'departamento'    => 'required', 
        'edificio'        => 'required', 
        'laboratorio'     => 'nullable|string|max:255', 
        'conCargoA'       => 'required', 
        'tipoServicio'    => 'required|array|min:1', 
        'trabajoAFallarAparente' => 'required|string|min:10', 
        'tipoEquipo'      => 'nullable|string|max:255',
        'marca'           => 'nullable|string|max:255',
        'modelo'          => 'nullable|string|max:255',
        'clasificacion'   => 'nullable|string|max:255',
        'noSerie'         => 'nullable|string|max:255',
        'noInventario'    => 'nullable|string|max:255',
        'cantidad'        => 'required|numeric|min:1',
    ];

    /**
     * El método 'mount' se ejecuta cuando el componente se carga por primera vez.
     */

public function mount()
{
    // --- Cargar las listas desde la Base de Datos ---
    $this->departamentos = Departamento::orderBy('nombre')->get();
    $this->edificios = Edificio::orderBy('nombre')->get();
    $this->cuentas = Cuenta::orderBy('tipo')->get();

    // --- Precargar datos del usuario ---
    $usuario = Auth::user();
    $this->responsable_id = $usuario->id;
    // Incluye apellido materno para que coincida
    $this->responsableNombre = trim($usuario->nombre . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno);

    // --- Establecer valores por defecto ---
    $this->departamento = ''; 
    $this->edificio = '';
    $this->conCargoA = '';
}
    

    /**
     * El método 'submitForm' será llamado cuando se envíe el formulario.
     */
    public function submitForm()
    {
        // --- VALIDACIÓN ---
        $this->validate();
        
        // --- GUARDAR EN LA BASE DE DATOS ---
        $solicitud = SolicitudServicio::create([
            'responsable_id'             => $this->responsable_id, 
            'solicitante'                => $this->solicitante,
            'departamento_id'            => $this->departamento,
            'edificio_id'                => $this->edificio,
            'laboratorio'                => $this->laboratorio,
            'cuenta_id'                  => $this->conCargoA,
            'tipo_servicio'              => $this->tipoServicio,
            'trabajoAFallarAparente'     => $this->trabajoAFallarAparente,
            'tipoEquipo'                 => $this->tipoEquipo,
            'marca'                      => $this->marca,
            'modelo'                     => $this->modelo,
            'clasificacion'              => $this->clasificacion,
            'noSerie'                    => $this->noSerie,
            'noInventario'               => $this->noInventario,
            'cantidad'                   => $this->cantidad,
        ]);

        // Guardar el ID de la solicitud para el comprobante
        $this->solicitudId = $solicitud->id;
        
        // Mostrar el modal
        $this->mostrarModal = true;
        
        // Limpiar el formulario
        $this->reset([
            'solicitante', 'departamento', 'edificio', 'laboratorio', 'conCargoA', 
            'tipoServicio', 'trabajoAFallarAparente', 'tipoEquipo', 'marca', 
            'modelo', 'clasificacion', 'noSerie', 'noInventario', 'cantidad'
        ]);
    }

    /**
     * Método para cerrar el modal
     */
    public function cerrarModal()
    {
        $this->mostrarModal = false;
        $this->solicitudId = null;
    }

    /**
     * Método para descargar el comprobante
     */
    public function descargarComprobante()
    {
        return redirect()->route('comprobante.descargar', ['id' => $this->solicitudId]);
    }

    /**
     * El método 'render' es el que muestra la vista.
     */
    public function render()
    {
        return view('livewire.solicitud-form');
    }
}