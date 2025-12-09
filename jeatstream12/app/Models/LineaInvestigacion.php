<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{
    use HasFactory;

    
    protected $table = 'lineas_investigacion';

    protected $fillable = [
        'user_id',
        'titulo',      // Nombre corto (ej. "Polímeros")
        'descripcion', // El texto completo que se ve en la lista
        'orden',
        'activo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}