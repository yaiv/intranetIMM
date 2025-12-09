<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles';

    protected $fillable = [
        'user_id',
        'tipo_academico_id',
        'pride_id',
        'sni_id',
        'ubicacion_id',
        'telefono_oficina',
        'cubiculo',
        'google_scholar',
        'biografia',
    ];

    // Relación Inversa con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relaciones con Catálogos
    public function tipoAcademico(): BelongsTo
    {
        return $this->belongsTo(TipoAcademico::class); 
    }

    public function pride(): BelongsTo
    {
        return $this->belongsTo(Pride::class); 
    }

    public function sni(): BelongsTo
    {
        return $this->belongsTo(Sni::class); 
    }
    
    public function ubicacion(): BelongsTo
    {
        return $this->belongsTo(Ubicacion::class); 
    }
}