<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
    
    <div class="flex justify-between items-center mb-4">
        <h3 class="font-semibold text-gray-900">Información Adicional</h3>
        @if(!$isEditing)
             <button wire:click="startEditing" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Editar Todo</button>
        @endif
    </div>

    @if(!$isEditing)
        <div class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
                <div class="bg-gray-50 rounded-lg px-4 py-3 border border-gray-200">
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $biografia ?: 'Sin descripción agregada.' }}
                    </p>
                </div>
            </div>

            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Ubicación</span>
                    <span class="text-sm font-medium text-gray-900">
                        {{ $ubicaciones->find($ubicacion_id)?->edificio ?? 'No asignado' }}
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Cubículo</span>
                    <span class="text-sm font-medium text-gray-900">{{ $cubiculo ?? 'N/A' }}</span>
                </div>
            </div>
        </div>
    @else
        <form wire:submit="save" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                <textarea wire:model="biografia" rows="4" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Edificio</label>
                    <select wire:model="ubicacion_id" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 text-sm">
                        <option value="">Seleccionar...</option>
                        @foreach($ubicaciones as $ubi)
                            <option value="{{ $ubi->id }}">{{ $ubi->edificio }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cubículo</label>
                    <input type="text" wire:model="cubiculo" class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 text-sm">
                </div>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" wire:click="cancelEditing" class="text-gray-500 text-sm">Cancelar</button>
                <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-900">Guardar</button>
            </div>
        </form>
    @endif
</div>