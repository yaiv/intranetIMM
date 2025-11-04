{{-- 
    Usamos <div> en lugar de <form> y 'wire:submit.prevent' en el botón
    o podemos envolver todo en un <form wire:submit.prevent="submitForm">
--}}
<form wire:submit.prevent="submitForm">

    {{-- Contenedor principal del formulario con estilo de tabla/grid --}}

    <div class="border border-black">

        {{-- FILA 1: Responsable y Solicitante (2 columnas) --}}
        <div class="grid grid-cols-2">
            {{-- Columna Responsable --}}
            <div class="border-b border-r border-black p-2">
                <x-label for="responsable" value="Responsable:" class="font-bold" />
                {{-- 'wire:model' vincula esta entrada a la propiedad $responsable en la clase --}}
                <x-input id="responsable" type="text" class="mt-1 block w-full border-none" wire:model="responsableNombre" readonly />
                <input type="hidden" wire:model="responsable_id">
            </div>

            {{-- Columna Solicitante --}}
            <div class="border-b border-black p-2">
                <x-label for="solicitante" value="Solicitante:" class="font-bold" />
                <x-input id="solicitante" type="text" class="mt-1 block w-full border-none" wire:model="solicitante"  />
                     @error('solicitante') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>
               

        {{-- FILA 2: Departamento, Edificio, Laboratorio (3 columnas) --}}
        <div class="grid grid-cols-3">

            {{-- CORRECCIÓN 2: Estructura de Departamento simplificada --}}
            {{-- Columna Departamento --}}
            <div class="border-b border-r border-black p-2">
                <x-label for="departamento" value="Departamento:" class="font-bold" />
                <select id="departamento" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="departamento">
                    <option value="">Seleccione una opción</option>
                    {{-- Aquí está la magia --}}
                    @foreach($departamentos as $depto)
                        {{-- Cambia 'id' y 'nombre' por tus nombres de columna reales --}}
                        <option value="{{ $depto->id }}">{{ $depto->nombre }}</option>
                    @endforeach
                </select>
                @error('departamento') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- CORRECCIÓN 3: Estructura de Edificio simplificada --}}
            {{-- Columna Edificio --}}
            <div class="border-b border-r border-black p-2">
                <x-label for="edificio" value="Edificio:" class="font-bold" />
                <select id="edificio" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="edificio">
                    <option value="">Seleccione una opción</option>
                    @foreach($edificios as $edif)
                        {{-- Cambia 'id' y 'nombre' por tus nombres de columna reales --}}
                        <option value="{{ $edif->id }}">{{ $edif->nombre }}</option>
                    @endforeach
                </select>
                         @error('edificio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            {{-- Columna Laboratorio/Cubículo --}}
            <div class="border-b border-black p-2">
                <x-label for="laboratorio" value="Laboratorio/Cubículo:" class="font-bold" />
                <x-input id="laboratorio" type="text" class="mt-1 block w-full" wire:model="laboratorio" />
            </div>
        </div>

        {{-- CORRECCIÓN 4: Estructura de 'Con cargo a' simplificada --}}
        {{-- FILA 3: Con cargo a... (1 columna) --}}
        <div>
            <div class="border-b border-black p-2">
                <x-label for="conCargoA" value="Con cargo a:" class="font-bold" />
                {{-- Reemplazamos el x-input por un select --}}
                <select id="conCargoA" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="conCargoA">
                    <option value="">Seleccione una opción</option>
                    @foreach($cuentas as $cuenta)
                        {{-- Ajusta 'id' y 'numero'/'descripcion' a tus columnas --}}
                        <option value="{{ $cuenta->id }}">{{ $cuenta->numero }} - {{ $cuenta->descripcion ?? '' }}</option>
                    @endforeach
                </select>
                   @error('conCargoA') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>


        {{-- FILA 4: Tipo de Servicio (Checkboxes) --}}
        <div class="border-b border-black p-4">
            <x-label value="Tipo de Servicio:" class="font-bold mb-2" />
            {{-- Usamos un grid para los checkboxes --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
                <div>
                    <input type="checkbox" id="rev" value="Revisión" wire:model="tipoServicio">
                    <label for="rev">Revisión</label>
                </div>
                <div>
                    <input type="checkbox" id="mant" value="Mantenimiento" wire:model="tipoServicio">
                    <label for="mant">Mantenimiento</label>
                </div>
                <div>
                    <input type="checkbox" id="rep" value="Reparación" wire:model="tipoServicio">
                    <label for="rep">Reparación</label>
                </div>
                <div>
                    <input type="checkbox" id="inst" value="Instalación" wire:model="tipoServicio">
                    <label for="inst">Instalación</label>
                </div>
                <div>
                    <input type="checkbox" id="fab" value="Fabricación" wire:model="tipoServicio">
                    <label for="fab">Fabricación</label>
                </div>
                 <div>
                    <input type="checkbox" id="otro" value="Otro" wire:model="tipoServicio">
                    <label for="otro">Otro</label>
                </div>
            </div>
              @error('tipoServicio') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- FILA 5: Trabajo a realizar / Falla aparente (Textarea) --}}
        <div class="border-b border-black p-2">
            <x-label for="trabajoAFallarAparente" value="Trabajo a realizar / Falla aparente:" class="font-bold" />
            <textarea id="trabajoAFallarAparente" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4" wire:model="trabajoAFallarAparente"></textarea>
                @error('trabajoAFallarAparente') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- FILA 6: Encabezado "INFORMACIÓN DEL EQUIPO" (1 columna) --}}
        <div class="border-b border-black p-2 font-bold text-center" style="background-color: #BFBFBF;">
            INFORMACIÓN DEL EQUIPO (PARA MANTENIMIENTO O REPARACIÓN)
        </div>

        {{-- FILA 7: Tipo de Equipo y Marca (2 columnas) --}}
        <div class="grid grid-cols-2">
            <div class="border-b border-r border-black p-2">
                <x-label for="tipoEquipo" value="Tipo de Equipo:" class="font-bold" />
                <x-input id="tipoEquipo" type="text" class="mt-1 block w-full" wire:model="tipoEquipo" />
            </div>
            <div class="border-b border-black p-2">
                <x-label for="marca" value="Marca:" class="font-bold" />
                <x-input id="marca" type="text" class="mt-1 block w-full" wire:model="marca" />
            </div>
        </div>

        {{-- FILA 8: Modelo, Clasificación, No. Serie (3 columnas) --}}
        <div class="grid grid-cols-3">
            <div class="border-b border-r border-black p-2">
                <x-label for="modelo" value="Modelo:" class="font-bold" />
                <x-input id="modelo" type="text" class="mt-1 block w-full" wire:model="modelo" />
            </div>
            <div class="border-b border-r border-black p-2">
                <x-label for="clasificacion" value="Clasificación:" class="font-bold" />
                <x-input id="clasificacion" type="text" class="mt-1 block w-full" wire:model="clasificacion" />
            </div>
            <div class="border-b border-black p-2">
                <x-label for="noSerie" value="No. Serie:" class="font-bold" />
                <x-input id="noSerie" type="text" class="mt-1 block w-full" wire:model="noSerie" />
            </div>
        </div>

        {{-- FILA 9: No. Inventario y Cantidad (2 columnas) --}}
        <div class="grid grid-cols-2">
            <div class="border-b border-r border-black p-2">
                <x-label for="noInventario" value="No. Inventario:" class="font-bold" />
                <x-input id="noInventario" type="text" class="mt-1 block w-full" wire:model="noInventario" />
            </div>
            <div class="border-b border-black p-2">
                <x-label for="cantidad" value="Cantidad:" class="font-bold" />
                <x-input id="cantidad" type="number" class="mt-1 block w-full" wire:model="cantidad" />
            </div>
        </div>

    </div> {{-- Fin del contenedor del formulario --}}


    {{-- Botón de envío y mensaje de éxito --}}
    <div class="flex items-center justify-end mt-6">
        
        {{-- Mensaje de éxito (se muestra si 'mensaje' existe en la sesión) --}}
        @if (session()->has('mensaje'))
            <div class="text-sm text-green-600 mr-3">
                {{ session('mensaje') }}
            </div>
        @endif

        <x-button>
            {{ __('Enviar Solicitud') }}
        </x-button>

        <!-- Modal de Éxito -->
        @if($mostrarModal)
        <div 
            x-data="{ show: @entangle('mostrarModal') }"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 overflow-y-auto"
            aria-labelledby="modal-title" 
            role="dialog" 
            aria-modal="true"
        >
            <!-- Overlay oscuro -->
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div 
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" 
                    aria-hidden="true"
                    wire:click="cerrarModal"
                ></div>

                <!-- Centrar modal -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <!-- Contenido del Modal -->
                <div 
                    x-show="show"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                >
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <!-- Icono de éxito animado -->
                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-green-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>

                            <!-- Contenido -->
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">
                                    ¡Solicitud Enviada con Éxito!
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Su solicitud ha sido registrada correctamente con el folio <strong>#{{ $solicitudId }}</strong>. 
                                        Puede descargar el comprobante o regresar a la página principal.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                        <!-- Botón Descargar Comprobante -->
                        <button 
                            type="button"
                            wire:click="descargarComprobante"
                            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Descargar Comprobante
                        </button>

                        <!-- Botón Regresar -->
                        <a 
                            href="{{ route('dashboard') }}"
                            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Regresar a Inicio
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

</form>