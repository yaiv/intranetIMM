<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoServicio extends Model
{
    use HasFactory;

    protected $fillable = ['estado'];
    /**
     * Relación con SolicitudServicio (muchas solicitudes tienen un estado)
     */
    public function solicitudesServicio()
    {
        return $this->hasMany(SolicitudServicio::class);
    }
}