<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserPasswords; // <--- El contrato de Fortify
use Illuminate\Validation\ValidationException;

class UpdatePassword extends Component
{
    // Estado del formulario
    public $current_password = '';
    public $password = '';
    public $password_confirmation = '';

    public function update(UpdatesUserPasswords $updater)
    {
        $this->resetErrorBag();

        try {
            // Usamos la lógica oficial de Fortify/Jetstream
            $updater->update(Auth::user(), [
                'current_password' => $this->current_password,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
            ]);

            // Si pasa, limpiamos campos y notificamos
            $this->current_password = '';
            $this->password = '';
            $this->password_confirmation = '';

            $this->dispatch('notify', message: 'Contraseña actualizada correctamente.');

        } catch (ValidationException $e) {
            // Si falla (contraseña actual incorrecta o nueva muy debil), mostramos errores
            throw $e;
        }
    }

    public function render()
    {
        return view('livewire.profile.update-password');
    }
}