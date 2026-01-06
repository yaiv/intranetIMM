<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasProfilePhoto, HasRoles;

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'numero_empleado',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNombreCompletoAttribute(): string
    {
        return trim("{$this->nombre} {$this->apellido_paterno} {$this->apellido_materno}");
    }

    // Relación 1:N con Publicaciones
    public function publicaciones(): HasMany
    {
        return $this->hasMany(Publicacion::class)->orderBy('anio', 'desc');
    }

    // Relación 1:N con Formacion Profesional
    public function formacionProfesional(): HasMany{
        return $this->hasMany(FormacionProfesional::class)->orderBy('anio_fin', 'desc');
    }

    // Relación con Líneas de Investigación
    public function lineasInvestigacion(): HasMany
    {
        return $this->hasMany(LineaInvestigacion::class);
    } 

    public function profile(): HasOne
    {
        return $this->hasOne(Perfil::class);
    }

    public function estudios()
    {
        return $this->hasMany(FormacionProfesional::class, 'user_id')
                    ->orderBy('anio_fin', 'desc'); // Ordenar del más reciente al más antiguo
    }

}
