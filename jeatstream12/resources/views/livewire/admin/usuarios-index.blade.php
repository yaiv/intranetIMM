<div>
    {{-- Encabezado --}}
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="text-2xl">Gestión de Usuarios</div>
        <div class="mt-2 text-gray-500">
            Administra el acceso y roles de los investigadores y administrativos.
        </div>
    </div>

    {{-- Buscador --}}
    <div class="bg-white px-6 py-4 border-b border-gray-200">
        <input 
            wire:model.live.debounce.300ms="search" 
            type="text" 
            placeholder="Buscar por nombre, correo o número de empleado..." 
            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        >
    </div>

    {{-- Tabla --}}
    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol Actual</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registro</th>
                    <th class="relative px-6 py-3"><span class="sr-only">Editar</span></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                    <div class="text-xs text-gray-400">No. Emp: {{ $user->numero_empleado ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($user->roles->count())
                                @foreach($user->roles as $role)
                                    @php
                                        $color = match($role->name) {
                                            'administrador' => 'bg-purple-100 text-purple-800',
                                            'usuario' => 'bg-green-100 text-green-800',
                                            default => 'bg-gray-100 text-gray-800',
                                        };
                                    @endphp
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $color }}">
                                        {{ ucfirst($role->name) }}
                                    </span>
                                @endforeach
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    Sin Rol
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            {{-- ✅ Botón que activa la función edit() --}}
                            <button wire:click="edit({{ $user->id }})" class="text-indigo-600 hover:text-indigo-900 font-bold cursor-pointer">
                                Editar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-4 py-3 border-t border-gray-200">
            {{ $users->links() }}
        </div>
    </div>

    {{-- ✅ MODAL DE EDICIÓN --}}
    <x-dialog-modal wire:model="isModalOpen">
        <x-slot name="title">
            Editar Rol de Usuario
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                Estás editando los permisos para: <span class="font-bold">{{ $userEditingName }}</span>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Seleccionar Rol</label>
                <select id="role" wire:model="selectedRole" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">-- Seleccionar Rol --</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-2">
                    * Al cambiar el rol, los permisos del usuario se actualizarán inmediatamente.
                </p>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('isModalOpen', false)" wire:loading.attr="disabled">
                Cancelar
            </x-secondary-button>

            <x-button class="ml-2" wire:click="updateRole" wire:loading.attr="disabled">
                Guardar Cambios
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>