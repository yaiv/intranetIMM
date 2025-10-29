<?php

namespace App\Livewire; 

use Livewire\Component;
use Illuminate\Support\Facades\Auth; // Necesario para obtener el usuario
use App\Models\Departamento; // Cargar desde BD 
use App\Models\Edificio;    
use App\Models\Cuenta;      // <-- (para "con cargo a")

class SolicitudForm extends Component
{
    // --- PROPIEDADES PARA VINCULAR AL FORMULARIO ---
    // (usando 'wire:model')

    // Sección 1: Información del Usuario
    public $responsable;
    public $solicitante;
    public $departamento = '';
    public $edificio = '';
    public $laboratorio;
    public $conCargoA = '';
    public $cuenta = '';

    // Sección 2: Tipo de Servicio (checkboxes)
    public $tipoServicio = []; // Es un array porque son checkboxes

    // Sección 3: Descripción del Servicio
    public $trabajoAFallarAparente;

    // Sección 4: Información del Equipo
    public $tipoEquipo;
    public $marca;
    public $modelo;
    public $clasificacion;
    public $noSerie;
    public $noInventario;
    public $cantidad = 1; // Valor por defecto

    // --- PROPIEDADES PARA LAS LISTAS (DROPDOWNS) ---
    public $departamentos = [];
    public $edificios = [];
    public $cuentas = [];


protected $rules = [
        'responsable'     => 'required|string|max:255',
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
        // Asegúrate de cambiar 'nombre', 'numero', etc., por tus columnas reales
        $this->departamentos = Departamento::orderBy('nombre')->get();
        $this->edificios = Edificio::orderBy('nombre')->get();
        $this->cuentas = Cuenta::orderBy('tipo')->get(); // O como se llame tu columna
    
        // --- Precargar datos del usuario ---
        $usuario = Auth::user();
        $this->responsable = $usuario->nombre . ' '. $usuario->apellido_paterno; // Ajusta según tu modelo de usuario
        //$this->solicitante = $usuario->nombre;
    
        // --- Establecer valores por defecto ---
        // Dejamos los select vacíos para que el usuario elija
        $this->departamento = ''; 
        $this->edificio = '';
    
        // Si quieres que "1185" sea un ID por defecto, búscalo:
        // $cuentaPorDefecto = Cuenta::where('numero', 1185)->first();
        // $this->conCargoA = $cuentaPorDefecto ? $cuentaPorDefecto->id : '';
        // Por ahora, lo dejaremos vacío:
        $this->conCargoA = '';
    }
    /**
     * El método 'submitForm' será llamado cuando se envíe el formulario.
     */
    public function submitForm()
    {
        // --- VALIDACIÓN ---
        $this->validate();
        
        // --- LÓGICA DE GUARDADO ---
        // Aquí iría el código para guardar en la base de datos.
        // Ejemplo:
        // Solicitud::create([
        //     'responsable' => $this->responsable,
        //     'departamento' => $this->departamento,
        //     'tipo_servicio' => json_encode($this->tipoServicio), // Guardar el array
        //     // ...etc
        // ]);

        // Mensaje de éxito para el usuario
        session()->flash('mensaje', '¡Solicitud enviada con éxito!');
        
        // Opcional: Redirigir a otra página
        // return redirect()->to('/dashboard');
    }


    /**
     * El método 'render' es el que muestra la vista.
     */
    public function render()
    {
        return view('livewire.solicitud-form');
    }
}