<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6"
     x-data="{ uploading: false, progress: 0 }"
     x-on:livewire-upload-start="uploading = true"
     x-on:livewire-upload-finish="uploading = false"
     x-on:livewire-upload-error="uploading = false"
     x-on:livewire-upload-progress="progress = $event.detail.progress">

    <div class="flex items-start justify-between mb-6">
        
        <div class="relative w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center overflow-hidden border border-gray-200 group">
            @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" class="w-full h-full object-cover">
            @else
                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->nombre_completo }}" class="w-full h-full object-cover">
            @endif

            <div x-show="uploading" class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center transition-opacity" style="display: none;">
                <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>

        <div class="flex flex-col items-end space-y-2">
            <input type="file" wire:model="photo" x-ref="photo" class="hidden" accept="image/*">
            
            <button x-on:click="$refs.photo.click()" 
                    class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition flex items-center gap-2 disabled:opacity-50"
                    :disabled="uploading">
                
                <span x-show="!uploading">Actualizar Foto</span>
                <span x-show="uploading" x-text="'Subiendo ' + progress + '%'" style="display: none;"></span>
            </button>

            @if(Auth::user()->profile_photo_path)
                <button wire:click="deleteProfilePhoto" wire:confirm="¿Seguro que quieres eliminar tu foto?" class="text-xs text-red-500 hover:text-red-700 font-medium underline">
                    Eliminar foto
                </button>
            @endif

            @error('photo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
    </div>

    <form wire:submit="save" class="space-y-4">
       <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nombre Completo</label>
            
            @if(!$isEditing)
                <div class="flex items-center justify-between bg-gray-50 rounded-lg px-4 py-3 border border-gray-200">
                    <span class="text-gray-900 font-semibold">
                        {{ $nombre }} {{ $apellido_paterno }} {{ $apellido_materno }}
                    </span>
                    <button type="button" wire:click="startEditing" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Editar</button>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <div class="space-y-1">
                        <input type="text" wire:model="nombre" placeholder="Nombre" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                         @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-1">
                        <input type="text" wire:model="apellido_paterno" placeholder="Ap. Paterno" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        @error('apellido_paterno') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="space-y-1">
                        <input type="text" wire:model="apellido_materno" placeholder="Ap. Materno" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                        @error('apellido_materno') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            @if(!$isEditing)
                <div class="flex items-center justify-between bg-gray-50 rounded-lg px-4 py-3 border border-gray-200">
                    <span class="text-gray-900">{{ $email }}</span>
                    <button type="button" wire:click="startEditing" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Editar</button>
                </div>
            @else
                <input type="email" wire:model="email" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Teléfono</label>
            @if(!$isEditing)
                <div class="flex items-center justify-between bg-gray-50 rounded-lg px-4 py-3 border border-gray-200">
                    <span class="text-gray-900">{{ $telefono ?? 'Sin registrar' }}</span>
                    <button type="button" wire:click="startEditing" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Editar</button>
                </div>
            @else
                <input type="text" wire:model="telefono" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                @error('telefono') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            @endif
        </div>

        @if($isEditing)
            <div class="flex justify-end space-x-3 pt-2">
                <button type="button" wire:click="cancelEditing" class="px-4 py-2 text-gray-500 text-sm font-medium hover:text-gray-700 transition">
                    Cancelar
                </button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 shadow-sm transition flex items-center">
                    <span wire:loading.remove wire:target="save">Guardar Cambios</span>
                    <span wire:loading wire:target="save">Guardando...</span>
                </button>
            </div>
        @endif
    </form>
</div>