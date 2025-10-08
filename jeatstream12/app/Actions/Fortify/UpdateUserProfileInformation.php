<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Validator;

class UpdateUserProfileInformation
{
    public function update($user, array $input): void
    {
        Validator::make($input, [
            'nombre' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['required', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'numero_empleado' => ['required', 'string', 'max:255', 'unique:users,numero_empleado,' . $user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ])->validate();

        $user->forceFill([
            'nombre' => $input['nombre'],
            'apellido_paterno' => $input['apellido_paterno'],
            'apellido_materno' => $input['apellido_materno'],
            'telefono' => $input['telefono'] ?? null,
            'numero_empleado' => $input['numero_empleado'],
            'email' => $input['email'],
        ])->save();
    }
}
