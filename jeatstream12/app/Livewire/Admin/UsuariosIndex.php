<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UsuariosIndex extends Component
{
    use WithPagination;

    public $search = '';

    //  Propiedades para el Modal
    public $isModalOpen = false;
    public $userEditingId = null;
    public $userEditingName = '';
    public $selectedRole = '';
    
    // Resetear paginación si se busca algo
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::with('roles') //  Cargamos los roles para no hacer N+1 consultas
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('numero_empleado', 'like', '%' . $this->search . '%') // Búsqueda extra
            ->paginate(10);

      //  Pasamos todos los roles disponibles a la vista
        $roles = Role::all(); 

        return view('livewire.admin.usuarios-index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    //  Método para abrir el modal y cargar datos
    public function edit($userId)
    {
        $user = User::find($userId);
        
        $this->userEditingId = $user->id;
        $this->userEditingName = $user->name;
        
        // Obtenemos el primer rol del usuario (si tiene) o dejamos vacío
        $this->selectedRole = $user->roles->first()->name ?? '';
        
        $this->isModalOpen = true;
    }

    //  Método para guardar el cambio
    public function updateRole()
    {
        $user = User::find($this->userEditingId);

        if ($user) {
            // Sincronizamos el rol (quita los anteriores y pone el nuevo)
            // Si seleccionó "Sin Rol" (vacío), le quitamos todos.
            if (!empty($this->selectedRole)) {
                $user->syncRoles($this->selectedRole);
            } else {
                $user->syncRoles([]); // Quitar roles
            }
            
            // Notificación (opcional, si usas sweetalert o banner)
            session()->flash('flash.banner', 'Rol actualizado correctamente.');
        }

        $this->isModalOpen = false;
    }
}