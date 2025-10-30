<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


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
        'responsable',
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
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tipo_servicio' => 'array', // Le dice a Laravel que trate esto como un array
    ];

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
