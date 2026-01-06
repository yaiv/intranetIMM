<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use App\Traits\HasInlineEditing;
use Livewire\WithFileUploads;

class PersonalInformation extends Component
{
    use HasInlineEditing;
    use WithFileUploads;

    #[Validate('required|string|min:2')]
    public $nombre;

    #[Validate('required|string|min:2')]
    public $apellido_paterno;

    #[Validate('required|string|min:2')]
    public $apellido_materno;

    // Validación única ignorando el ID del usuario actual
    public $email; 
    
    #[Validate('nullable|string')]
    public $telefono;

    #[Validate('nullable|image|max:1024')] // Máximo 1MB
    public $photo;

    public function mount()
    {
        $user = Auth::user();
        $this->nombre = $user->nombre;
        $this->apellido_paterno = $user->apellido_paterno;
        $this->apellido_materno = $user->apellido_materno;
        $this->email = $user->email;
        $this->telefono = $user->telefono;
    }

    public function updatedPhoto()
    {
        $this->validate();

        Auth::user()->updateProfilePhoto($this->photo);

        $this->dispatch('notify', message: 'Foto actualizada correctamente');
    }

    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();
        $this->dispatch('notify', message: 'Foto eliminada');
    }
    
    public function save()
    {
        // Validación manual para el email unique
        $this->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required'
        ]);

        Auth::user()->update([
            'nombre' => $this->nombre,
            'apellido_paterno' => $this->apellido_paterno,
            'apellido_materno' => $this->apellido_materno,
            'email' => $this->email,
            'telefono' => $this->telefono,
        ]);

        $this->isEditing = false;
        $this->dispatch('notify', message: 'Información personal actualizada');
    }

    public function render()
    {
        return view('livewire.profile.personal-information');
    }
}