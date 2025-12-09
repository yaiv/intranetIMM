<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pride extends Model
{
    use HasFactory;

    protected $table = 'pride'; 

    protected $fillable = ['nivel', 'descripcion', 'orden', 'activo'];
}