
<div>
<div class="bg-red-600 text-white p-4 font-bold text-lg mb-4 rounded border-4 border-yellow-400">
    🕵️ DIAGNÓSTICO EN VIVO:
    <br>
    1. Usuario actual: {{ Auth::user()->name }} (ID: {{ Auth::id() }})
    <br>
    2. ¿Modo "Solo Mías"?: {{ $soloMias ? 'SÍ (Activado - MAL para Admin)' : 'NO (Desactivado - BIEN para Admin)' }}
    <br>
    3. Total Solicitudes Encontradas: {{ $solicitudes->total() }}
</div>

    {{-- Encabezado --}}
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div class="text-2xl">Historial de Solicitudes de Servicio</div>
        </div>
        <div class="mt-2 text-gray-500">
            Aquí puedes ver todas las solicitudes generadas.
        </div>
    </div>

    {{-- Barra de Búsqueda --}}
    <div class="bg-white px-6 py-4 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <div class="flex-1">
                <div class="relative">
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="buscar" 
                        placeholder="Buscar por ID, departamento, tipo de equipo, falla, solicitante, estado..." 
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    @if($buscar)
                        <button 
                            wire:click="$set('buscar', '')" 
                            class="absolute inset-y-0 right-0 pr-3 flex items-center"
                        >
                            <svg class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
            <button 
                wire:click="$set('buscar', '')" 
                class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-semibold rounded-lg transition duration-150"
            >
                Buscar
            </button>
        </div>
        @if($buscar)
            <div class="mt-2 text-sm text-gray-600">
                Mostrando resultados para: <span class="font-semibold">"{{ $buscar }}"</span>
            </div>
        @endif
    </div>

    {{-- Tabla de Resultados --}}
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Grupo / Depto.</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo de Equipo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th scope="col" class="relative px-6 py-3"><span class="sr-only">Acciones</span></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($solicitudes as $solicitud)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $solicitud->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $solicitud->departamento->nombre ?? 'No asignado' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $solicitud->tipoEquipo ?? 'N/A' }}</td>
                                    
                                    <td class="px-6 py-4 text-sm text-gray-900" style="min-width: 300px;">
                                        <div class="font-medium text-indigo-600 hover:text-indigo-900">
                                            Falla: {{ \Illuminate\Support\Str::limit($solicitud->trabajoAFallarAparente, 50) }}
                                        </div>
                                        <div class="text-gray-500">Solicitante: {{ $solicitud->solicitante }}</div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $solicitud->created_at->format('d/m/Y H:i:s') }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if ($solicitud->estadoServicio)
                                            @php
                                                $classes = match($solicitud->estadoServicio->id) {
                                                    1 => 'bg-green-100 text-green-800',
                                                    2 => 'bg-blue-100 text-blue-800',
                                                    3 => 'bg-yellow-100 text-yellow-800',
                                                    4 => 'bg-red-100 text-red-800',
                                                    default => 'bg-gray-100 text-gray-800',
                                                };
                                            @endphp
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $classes }}">
                                                {{ $solicitud->estadoServicio->estado }}
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">Sin estado</span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button wire:click="verDetalle({{ $solicitud->id }})" class="text-blue-600 hover:text-blue-900 font-bold cursor-pointer">
                                            ver
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        @if($buscar)
                                            No se encontraron resultados para "{{ $buscar }}"
                                        @else
                                            No se encontraron solicitudes de servicio.
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $solicitudes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Grande con el Formulario Completo --}}
    <x-dialog-modal wire:model="verModalDetalle">
        <x-slot name="title">
            <div class="flex justify-between items-center">
                <span>Gestión de Solicitud #{{ $solicitudSeleccionada->id ?? '' }}</span>
                @if($solicitudSeleccionada && $solicitudSeleccionada->estadoServicio)
                    @php
                        $classes = match($solicitudSeleccionada->estadoServicio->id) {
                            1 => 'bg-green-100 text-green-800',
                            2 => 'bg-blue-100 text-blue-800',
                            3 => 'bg-yellow-100 text-yellow-800',
                            4 => 'bg-red-100 text-red-800',
                            default => 'bg-gray-100 text-gray-800',
                        };
                    @endphp
                    <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $classes }}">
                        {{ $solicitudSeleccionada->estadoServicio->estado }}
                    </span>
                @endif
            </div>
        </x-slot>
    
        <x-slot name="content">
            @if($solicitudSeleccionada)
                {{-- Formulario de Solicitud (Vista de Solo Lectura) --}}
                <div class="border border-black mb-6">
                    {{-- FILA 1: Responsable y Solicitante --}}
                    <div class="grid grid-cols-2">
                        <div class="border-b border-r border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">Responsable:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->responsable->nombrecompleto ?? 'N/A' }}" readonly />
                        </div>
                        <div class="border-b border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">Solicitante:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->solicitante }}" readonly />
                        </div>
                    </div>

                    {{-- FILA 2: Departamento, Edificio, Laboratorio --}}
                    <div class="grid grid-cols-3">
                        <div class="border-b border-r border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">Departamento:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->departamento->nombre ?? 'N/A' }}" readonly />
                        </div>
                        <div class="border-b border-r border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">Edificio:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->edificio->nombre ?? 'N/A' }}" readonly />
                        </div>
                        <div class="border-b border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">Laboratorio/Cubículo:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->laboratorio ?? 'N/A' }}" readonly />
                        </div>
                    </div>

                    {{-- FILA 3: Con cargo a --}}
                    <div class="border-b border-black p-2 bg-gray-50">
                        <label class="font-bold text-sm">Con cargo a:</label>
                        <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                               value="{{ $solicitudSeleccionada->cuenta->numero ?? 'N/A' }} - {{ $solicitudSeleccionada->cuenta->descripcion ?? '' }}" readonly />
                    </div>

                    {{-- FILA 4: Tipo de Servicio --}}
                    <div class="border-b border-black p-4 bg-gray-50">
                        <label class="font-bold text-sm mb-2 block">Tipo de Servicio:</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-sm">
                            @php
                                $tipos = is_array($solicitudSeleccionada->tipo_servicio) 
                                    ? $solicitudSeleccionada->tipo_servicio 
                                    : json_decode($solicitudSeleccionada->tipo_servicio, true) ?? [];
                            @endphp
                            @foreach(['Revisión', 'Mantenimiento', 'Reparación', 'Instalación', 'Fabricación', 'Otro'] as $tipo)
                                <div>
                                    <input type="checkbox" {{ in_array($tipo, $tipos) ? 'checked' : '' }} disabled>
                                    <label>{{ $tipo }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- FILA 5: Trabajo a realizar / Falla aparente --}}
                    <div class="border-b border-black p-2 bg-gray-50">
                        <label class="font-bold text-sm">Trabajo a realizar / Falla aparente:</label>
                        <textarea class="mt-1 block w-full border-none bg-transparent text-sm" rows="3" readonly>{{ $solicitudSeleccionada->trabajoAFallarAparente }}</textarea>
                    </div>

                    {{-- FILA 6: Encabezado INFORMACIÓN DEL EQUIPO --}}
                    <div class="border-b border-black p-2 font-bold text-center text-sm" style="background-color: #BFBFBF;">
                        INFORMACIÓN DEL EQUIPO (PARA MANTENIMIENTO O REPARACIÓN)
                    </div>

                    {{-- FILA 7: Tipo de Equipo y Marca --}}
                    <div class="grid grid-cols-2">
                        <div class="border-b border-r border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">Tipo de Equipo:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->tipoEquipo ?? 'N/A' }}" readonly />
                        </div>
                        <div class="border-b border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">Marca:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->marca ?? 'N/A' }}" readonly />
                        </div>
                    </div>

                    {{-- FILA 8: Modelo, Clasificación, No. Serie --}}
                    <div class="grid grid-cols-3">
                        <div class="border-b border-r border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">Modelo:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->modelo ?? 'N/A' }}" readonly />
                        </div>
                        <div class="border-b border-r border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">Clasificación:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->clasificacion ?? 'N/A' }}" readonly />
                        </div>
                        <div class="border-b border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">No. Serie:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->noSerie ?? 'N/A' }}" readonly />
                        </div>
                    </div>

                    {{-- FILA 9: No. Inventario y Cantidad --}}
                    <div class="grid grid-cols-2">
                        <div class="border-b border-r border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">No. Inventario:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->noInventario ?? 'N/A' }}" readonly />
                        </div>
                        <div class="border-b border-black p-2 bg-gray-50">
                            <label class="font-bold text-sm">Cantidad:</label>
                            <input type="text" class="mt-1 block w-full border-none bg-transparent text-sm" 
                                   value="{{ $solicitudSeleccionada->cantidad ?? 'N/A' }}" readonly />
                        </div>
                    </div>
                </div>

                {{-- Sección de Comentarios Previos --}}
                @if($solicitudSeleccionada->comentarios && $solicitudSeleccionada->comentarios->count() > 0)
                    <div class="mb-4 bg-blue-50 p-4 rounded border border-blue-200">
                        <h4 class="font-bold text-gray-700 mb-2">Historial de Comentarios:</h4>
                        @foreach($solicitudSeleccionada->comentarios as $comentario)
                            <div class="mb-2 pb-2 border-b border-blue-200 last:border-b-0">
                                <p class="text-sm text-gray-700">{{ $comentario->comentario }}</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    Por: {{ $comentario->user->name ?? 'Sistema' }} - 
                                    {{ $comentario->created_at->format('d/m/Y H:i') }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{--  Visible para Admin --}}
                @if(Auth::user()->email === 'yaiv.gm@gmail.com' || Auth::user()->hasRole('administrador'))
                    <div class="bg-yellow-50 p-4 rounded border border-yellow-200">
                        <label class="block font-bold mb-2 text-gray-700">Observaciones / Comentarios (Admin):</label>
                        <textarea wire:model="comentarioAdmin" 
                                  class="w-full border-gray-300 rounded shadow-sm" 
                                  rows="3" 
                                  placeholder="Escribe observaciones para el usuario (requerido para rechazar)..."></textarea>
                        @error('comentarioAdmin') <span class="text-red-500 text-sm block mt-1">{{ $message }}</span> @enderror
                    </div>
                @endif
            @endif
        </x-slot>
    

        <x-slot name="footer">
        <div class="flex flex-col w-full">
            
            <div class="flex justify-end gap-3 w-full">
                <x-secondary-button wire:click="$set('verModalDetalle', false)">
                    Cerrar
                </x-secondary-button>

                {{-- Primero verificamos que exista una solicitud seleccionada --}}
                @if($solicitudSeleccionada) 

                    {{-- Luego verificamos si es Admin (por email o rol) --}}
                    @if(Auth::user()->email === 'yaiv.gm@gmail.com' || Auth::user()->hasRole('administrador'))
                        
                        {{-- GRUPO A: Si está PENDIENTE (3) o EN PROCESO (2) --}}
                        @if(in_array($solicitudSeleccionada->estado_servicio_id, [2, 3]))
                            
                            {{-- 1. Botón Rechazar --}}
                            <x-danger-button wire:click="actualizarEstado(4)">
                                Rechazar
                            </x-danger-button>

                            {{-- 2. Opción de pasarlo a "En Proceso" (si es pendiente) --}}
                            @if($solicitudSeleccionada->estado_servicio_id == 3)
                                <button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" 
                                        wire:click="actualizarEstado(2)">
                                    Poner En Proceso
                                </button>
                            @endif

                            {{-- 3. Botón Aprobar Final --}}
                            <button class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150" 
                                    wire:click="actualizarEstado(1)">
                                Aprobar Solicitud
                            </button>

                        {{-- GRUPO B: Si ya está APROBADO (1) --}}
                        @elseif($solicitudSeleccionada->estado_servicio_id == 1)
                            
                            <button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150" 
                                    wire:click="actualizarEstado(2)">
                                Regresar a Proceso
                            </button>

                        @endif
                    @endif
                
                @endif {{-- Fin del check de $solicitudSeleccionada --}}
            </div>
        </div>
    </x-slot>


    </x-dialog-modal>

    {{-- Estilos personalizados para el modal --}}
    <style>
        [x-data] .fixed.inset-0 > div > div {
            max-width: 90vw !important;
        }
        [x-data] .bg-white.rounded-lg {
            max-height: 90vh;
            overflow-y: auto;
        }
    </style>
</div>