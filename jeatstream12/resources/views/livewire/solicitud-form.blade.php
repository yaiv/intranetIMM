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
                <x-input id="responsable" type="text" class="mt-1 block w-full border-none" wire:model="responsable" readonly />
            </div>

            {{-- Columna Solicitante --}}
            <div class="border-b border-black p-2">
                <x-label for="solicitante" value="Solicitante:" class="font-bold" />
                <x-input id="solicitante" type="text" class="mt-1 block w-full border-none" wire:model="solicitante"  />
            </div>
        </div>

        {{-- FILA 2: Departamento, Edificio, Laboratorio (3 columnas) --}}
        <div class="grid grid-cols-3">

            {{-- CORRECCIÓN 2: Estructura de Departamento simplificada --}}
            {{-- Columna Departamento --}}
            <div class="border-b border-r border-black p-2">
                <x-label for="departamento" value="Departamento:" class="font-bold" />
                <select id="departamento" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" wire:model="departamento">
                    <option value="">SELECCIONA UNA OPCIÓN</option>
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

            {{-- Columna Laboratorio/Cubículo (Esta estaba bien) --}}
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
        </div>

        {{-- FILA 5: Trabajo a realizar / Falla aparente (Textarea) --}}
        <div class="border-b border-black p-2">
            <x-label for="trabajoAFallarAparente" value="Trabajo a realizar / Falla aparente:" class="font-bold" />
            <textarea id="trabajoAFallarAparente" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="4" wire:model="trabajoAFallarAparente"></textarea>
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
    </div>

</form>