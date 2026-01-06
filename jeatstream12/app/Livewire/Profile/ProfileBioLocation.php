<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Ubicacion; // Modelo para tabla 'ubicaciones'
use App\Traits\HasInlineEditing;

class ProfileBioLocation extends Component
{
    use HasInlineEditing;

    public $biografia;
    public $cubiculo;
    public $ubicacion_id;

    public function mount()
    {
 
        $perfil = Auth::user()->profile()->firstOrCreate([]);
        
        $this->biografia = $perfil->biografia;
        $this->cubiculo = $perfil->cubiculo;
        $this->ubicacion_id = $perfil->ubicacion_id;
    }

    public function save()
    {
        $this->validate([
            'biografia' => 'nullable|string|max:1000',
            'cubiculo' => 'nullable|string|max:50',
            'ubicacion_id' => 'nullable|exists:ubicaciones,id',
        ]);

        Auth::user()->perfil()->update([
            'biografia' => $this->biografia,
            'cubiculo' => $this->cubiculo,
            'ubicacion_id' => $this->ubicacion_id,
        ]);

        $this->isEditing = false;
        $this->dispatch('notify', message: 'Datos actualizados');
    }

    public function render()
    {
        return view('livewire.profile.profile-bio-location', [
            'ubicaciones' => Ubicacion::where('activo', 1)->get()
        ]);
    }
}                           