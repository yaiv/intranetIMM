<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\EstadoServicio;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Edificio;
use App\Models\Cuenta;


class SolicitudServicio extends Model
{
    //
    use HasFactory;
     protected $table = 'solicitud_servicios';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'responsable_id',
        'solicitante',
        'departamento_id',
        'edificio_id',
        'laboratorio',
        'cuenta_id',
        'tipo_servicio',
        'trabajoAFallarAparente',
        'tipoEquipo',
        'marca',
        'modelo',
        'clasificacion',
        'noSerie',
        'noInventario',
        'cantidad',
        'estado_servicio_id'
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tipo_servicio' => 'array', // Le dice a Laravel que trate esto como un array
    ];

    public function estadoServicio()
{
    return $this->belongsTo(EstadoServicio::class);
}

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    /**
     * Relación con Departamento
     */
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    /**
     * Relación con Edificio
     */
    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }

    /**
     * Relación con Cuenta
     */
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }

}
