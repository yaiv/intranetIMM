<div class="md:grid md:grid-cols-3 md:gap-6 mt-10">
    
    <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Líneas de Investigación</h3>
            <p class="mt-1 text-sm text-gray-600">
                Agrega los temas o proyectos principales que desarrollas actualmente.
            </p>
        </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                
                <!-- Formulario para agregar -->
                <div class="grid grid-cols-6 gap-6 pb-6 border-b border-gray-200">
                    
                    <div class="col-span-6">
                        <x-label for="descripcion" value="Descripción de la línea" />
                        <x-input wire:model="descripcion" 
                                 wire:keydown.enter="agregarLinea"
                                 type="text" 
                                 class="mt-1 block w-full" 
                                 placeholder="Ej. Síntesis de polímeros y materiales..." />
                        <x-input-error for="descripcion" class="mt-2" />
                    </div>

                    <div class="col-span-6 text-right">
                        <x-button wire:click="agregarLinea" type="button" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="agregarLinea">Agregar Línea</span>
                            <span wire:loading wire:target="agregarLinea">Guardando...</span>
                        </x-button>
                    </div>

                </div>

                <!-- Lista de líneas registradas -->
                <div>
                    <h4 class="font-medium text-gray-900 mb-4">Líneas Registradas</h4>
                    
                    @if($lineas->isEmpty())
                        <p class="text-sm text-gray-500 italic">No tienes líneas de investigación registradas.</p>
                    @else
                        <ul class="divide-y divide-gray-200">
                            @foreach($lineas as $linea)
                                <li wire:key="linea-{{ $linea->id }}" class="py-4 flex justify-between items-center group">
                                    
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 h-5 w-5 text-blue-500 mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm text-gray-900">{{ $linea->descripcion }}</p>
                                        </div>
                                    </div>

<button wire:click="eliminarLinea({{ $linea->id }})" 
        class="text-red-400 hover:text-red-600 transition-opacity"
        title="Eliminar registro">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
    </svg>
</button>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>