<div class="md:grid md:grid-cols-3 md:gap-6 mt-10"> <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Formación Profesional</h3>
            <p class="mt-1 text-sm text-gray-600">
                Agrega tus grados académicos (Licenciatura, Maestría, Doctorado).
            </p>
        </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                
                <div class="grid grid-cols-6 gap-6 pb-6 border-b border-gray-200">
                    <div class="col-span-6 sm:col-span-2">
                        <x-label value="Grado" />
                        <select wire:model="grado_academico" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">Selecciona...</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestría">Maestría</option>
                            <option value="Doctorado">Doctorado</option>
                            <option value="Postdoctorado">Postdoctorado</option>
                        </select>
                        <x-input-error for="grado_academico" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label value="Institución" />
                        <x-input wire:model="institucion" type="text" class="mt-1 block w-full" placeholder="Ej. UNAM" />
                        <x-input-error for="institucion" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <x-label value="Título Obtenido" />
                        <x-input wire:model="titulo_obtenido" type="text" class="mt-1 block w-full" placeholder="Ej. Doctor en Ciencias Físicas" />
                        <x-input-error for="titulo_obtenido" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <x-label value="Año de Obtención" />
                        <x-input wire:model="anio_fin" type="number" class="mt-1 block w-full" placeholder="2024" />
                        <x-input-error for="anio_fin" class="mt-2" />
                    </div>
                    
                    <div class="col-span-6 text-right">
                        <x-button wire:click="agregarGrado" type="button" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="agregarGrado">Agregar Grado</span>
                            <span wire:loading wire:target="agregarGrado">Guardando...</span>
                        </x-button>
                    </div>
                </div>

                <div>
                    <h4 class="font-medium text-gray-900 mb-4">Grados Registrados</h4>
                    @if($grados->isEmpty())
                        <p class="text-sm text-gray-500 italic">No tienes información registrada aún.</p>
                    @else
                        <ul class="divide-y divide-gray-200">
                            @foreach($grados as $g)
                                <li class="py-4 flex justify-between items-center group">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0 h-5 w-5 text-blue-500 mt-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">{{ $g->titulo_obtenido }}</p>
                                            <p class="text-sm text-gray-500">{{ $g->grado }} en {{ $g->institucion }} ({{ $g->anio_fin }})</p>
                                        </div>
                                    </div>
                                    
                                    <button wire:click="eliminarGrado({{ $g->id }})" 
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