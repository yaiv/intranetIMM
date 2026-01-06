<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
    
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-base font-semibold text-gray-900">Formación Profesional</h3>
        
        @if(!$isEditing)
            <button wire:click="create" class="w-8 h-8 bg-indigo-600 hover:bg-indigo-700 rounded-lg flex items-center justify-center transition text-white" title="Agregar Estudio">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </button>
        @endif
    </div>

    @if(!$isEditing)
        <div class="space-y-4">
            @forelse($degrees as $degree)
                <div class="relative group bg-gray-50 rounded-lg p-3 border border-gray-100 hover:border-indigo-100 transition">
                    <div class="pr-8"> <h4 class="text-sm font-bold text-gray-800">{{ $degree->titulo_obtenido }}</h4>
                        <div class="text-xs text-gray-600 flex flex-wrap gap-2 mt-1">
                            <span class="bg-white px-2 py-0.5 rounded border border-gray-200">{{ $degree->grado }}</span>
                            <span>• {{ $degree->institucion }}</span>
                            <span>• {{ $degree->anio_fin }}</span>
                        </div>
                    </div>

                    <div class="absolute top-3 right-3 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button wire:click="edit({{ $degree->id }})" class="text-blue-600 hover:text-blue-800" title="Editar">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                        <button wire:confirm="¿Eliminar este registro?" wire:click="delete({{ $degree->id }})" class="text-red-600 hover:text-red-800" title="Eliminar">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </div>
            @empty
                <div class="text-center py-4 text-gray-400 text-sm italic">
                    No se han registrado grados académicos.
                </div>
            @endforelse
        </div>
    @else
        <form wire:submit="save" class="bg-gray-50 p-4 rounded-lg border border-indigo-100 animate-fade-in-down">
            <h4 class="text-sm font-bold text-gray-800 mb-3 border-b pb-2">
                {{ $editingId ? 'Editar Grado' : 'Nuevo Grado Académico' }}
            </h4>

            <div class="grid grid-cols-1 gap-3">
                <div class="grid grid-cols-3 gap-3">
                    <div class="col-span-2">
                        <label class="block text-xs font-medium text-gray-700">Nivel</label>
                        <select wire:model="grado" class="mt-1 block w-full rounded-md border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">Seleccionar...</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestría">Maestría</option>
                            <option value="Doctorado">Doctorado</option>
                            <option value="Postdoctorado">Postdoctorado</option>
                        </select>
                        @error('grado') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700">Año Fin</label>
                        <input type="number" wire:model="anio_fin" placeholder="2024" class="mt-1 block w-full rounded-md border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                        @error('anio_fin') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-700">Título Obtenido</label>
                    <input type="text" wire:model="titulo_obtenido" placeholder="Ej. Doctor en Ciencias Físicas" class="mt-1 block w-full rounded-md border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('titulo_obtenido') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-700">Institución</label>
                    <input type="text" wire:model="institucion" placeholder="Ej. UNAM" class="mt-1 block w-full rounded-md border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @error('institucion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                 
                 <div>
                    <label class="block text-xs font-medium text-gray-700">País</label>
                    <input type="text" wire:model="pais" class="mt-1 block w-full rounded-md border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-4 border-t pt-3">
                <button type="button" wire:click="cancel" class="px-3 py-1.5 border border-gray-300 text-gray-700 rounded-md text-xs font-medium hover:bg-white">
                    Cancelar
                </button>
                <button type="submit" class="px-3 py-1.5 bg-indigo-600 text-white rounded-md text-xs font-medium hover:bg-indigo-700 shadow-sm">
                    Guardar
                </button>
            </div>
        </form>
    @endif
</div>