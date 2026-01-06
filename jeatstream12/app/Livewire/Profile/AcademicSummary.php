<?php


namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
// Asumiendo que tienes estos modelos creados según tu BD. 
// Si no, te daré el código de los modelos abajo.
use App\Models\TipoAcademico;
use App\Models\Sni;
use App\Models\Pride;
use App\Traits\HasInlineEditing;

class AcademicSummary extends Component
{
    use HasInlineEditing;

    public $tipo_academico_id;
    public $pride_id;
    public $sni_id;

    public function mount()
    {
        // Usamos firstOrCreate para que si el usuario es nuevo, se cree su registro en perfiles
        // Asegúrate de tener la relación 'perfil' en tu modelo User
        $perfil = Auth::user()->profile()->firstOrCreate([]);
        
        $this->tipo_academico_id = $perfil->tipo_academico_id;
        $this->pride_id = $perfil->pride_id;
        $this->sni_id = $perfil->sni_id;
    }

    public function save()
    {
        Auth::user()->profile()->update([
            'tipo_academico_id' => $this->tipo_academico_id,
            'pride_id' => $this->pride_id,
            'sni_id' => $this->sni_id,
        ]);

        $this->isEditing = false;
        // Si usas un componente de notificaciones:
        // $this->dispatch('notify', message: 'Estatus académico actualizado'); 
    }

    public function render()
    {
        return view('livewire.profile.academic-summary', [
            'tipos' => TipoAcademico::where('activo', 1)->get(),
            'prides' => Pride::where('activo', 1)->get(),
            'snis' => Sni::where('activo', 1)->get(),
        ]);
    }
}