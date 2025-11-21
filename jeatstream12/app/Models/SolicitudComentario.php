<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudComentario extends Model
{
    use HasFactory;

    protected $table = 'solicitud_comentarios';

    protected $fillable = [
        'solicitud_servicio_id',
        'user_id',
        'comentario',
        'estado_anterior',
        'estado_nuevo',
    ];
}
