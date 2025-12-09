<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Información Académica</h3>
                <p class="mt-1 text-sm text-gray-600">
                    Actualiza tu nombramiento, niveles y ubicación física en el instituto.
                </p>
            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="guardar">
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="tipo_academico" value="Nombramiento" />
                                <select wire:model="tipo_academico_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">Seleccione...</option>
                                    @foreach($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-input-error for="tipo_academico_id" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="sni" value="Nivel SNI" />
                                <select wire:model="sni_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">N/A</option>
                                    @foreach($snis as $s)
                                        <option value="{{ $s->id }}">{{ $s->nivel }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label for="pride" value="Nivel PRIDE" />
                                <select wire:model="pride_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">N/A</option>
                                    @foreach($prides as $p)
                                        <option value="{{ $p->id }}">{{ $p->nivel }}</option>
                                    @endforeach
                                </select>
                            </div>

                             <div class="col-span-6">
                                <x-label for="google_scholar" value="URL Google Scholar" />
                                <x-input wire:model="google_scholar" type="text" class="mt-1 block w-full" placeholder="https://scholar.google.com/..." />
                                <x-input-error for="google_scholar" class="mt-2" />
                            </div>

                            <div class="col-span-6">
                                <x-label for="biografia" value="Biografía Corta" />
                                <textarea wire:model="biografia" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="3"></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-action-message class="mr-3" on="saved">
                            Guardado.
                        </x-action-message>
                        <x-button>
                            Guardar Cambios
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>