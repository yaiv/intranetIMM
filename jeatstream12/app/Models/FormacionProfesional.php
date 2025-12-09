<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormacionProfesional extends Model
{
    use HasFactory;

    
    protected $table = 'formacion_profesional';

    protected $fillable = [
        'user_id',
        'grado',          
        'institucion',    
        'pais',
        'anio_inicio',
        'anio_fin',
        'titulo_obtenido',
        'orden'
    ];

    // Relación inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}