<div class="space-y-3 mb-6 bg-white p-6 rounded-2xl border border-gray-200">
    <div class="flex justify-between items-center mb-2">
        <h3 class="text-base font-semibold text-gray-900">Detalles Académicos</h3>
        @if(!$isEditing)
            <button wire:click="startEditing" class="text-indigo-600 hover:text-indigo-700 text-xs font-medium">Editar</button>
        @endif
    </div>

    @if(!$isEditing)
        <div class="flex items-center justify-between py-2 border-b border-gray-100">
            <span class="text-sm text-gray-600">Investigador</span>
            <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium text-gray-700">
                {{ $tipos->find($tipo_academico_id)?->nombre ?? 'Sin asignar' }}
            </span>
        </div>
        <div class="flex items-center justify-between py-2 border-b border-gray-100">
            <span class="text-sm text-gray-600">PRIDE</span>
            <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium text-gray-700">
                {{ $prides->find($pride_id)?->nivel ?? '-' }}
            </span>
        </div>
        <div class="flex items-center justify-between py-2">
            <span class="text-sm text-gray-600">SNI</span>
            <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium text-gray-700">
                {{ $snis->find($sni_id)?->nivel ?? '-' }}
            </span>
        </div>
    @else
        <form wire:submit="save" class="space-y-3">
            <div>
                <label class="text-xs font-bold text-gray-500 uppercase">Nombramiento</label>
                <select wire:model="tipo_academico_id" class="w-full mt-1 rounded-lg border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Seleccionar...</option>
                    @foreach($tipos as $t) 
                        <option value="{{ $t->id }}">{{ $t->nombre }}</option> 
                    @endforeach
                </select>
            </div>
            
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-xs font-bold text-gray-500 uppercase">PRIDE</label>
                    <select wire:model="pride_id" class="w-full mt-1 rounded-lg border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">-</option>
                        @foreach($prides as $p) 
                            <option value="{{ $p->id }}">{{ $p->nivel }}</option> 
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-xs font-bold text-gray-500 uppercase">SNI</label>
                    <select wire:model="sni_id" class="w-full mt-1 rounded-lg border-gray-300 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">-</option>
                        @foreach($snis as $s) 
                            <option value="{{ $s->id }}">{{ $s->nivel }}</option> 
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <button type="button" wire:click="cancelEditing" class="text-xs text-gray-500 hover:text-gray-700">Cancelar</button>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-xs transition">
                    Guardar
                </button>
            </div>
        </form>
    @endif
</div>