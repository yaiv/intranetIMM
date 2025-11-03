<div>
    <!-- Título de la sección -->
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div class="text-2xl">
                Historial de Solicitudes de Servicio
            </div>
            <!-- Opcional: Puedes poner un botón para crear nuevas solicitudes aquí -->
        </div>
        <div class="mt-2 text-gray-500">
            Aquí puedes ver todas las solicitudes de servicio generadas en el sistema.
        </div>
    </div>

    <!-- Contenedor de la tabla -->
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Grupo / Depto.
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tipo de Equipo
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Descripción
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha de Solicitud
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Acciones</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @forelse ($solicitudes as $solicitud)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $solicitud->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <!-- Usamos la relación 'departamento' que cargamos en el componente -->
                                        {{ $solicitud->departamento->nombre ?? 'No asignado' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $solicitud->tipoEquipo ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900" style="min-width: 300px;">
                                        <!-- Similar a la imagen, con título y subtítulo -->
                                        <div class="font-medium text-indigo-600 hover:text-indigo-900">
                                            <!-- Puedes cambiar esto por un enlace a la solicitud si lo tienes -->
                                            <a href="#">
                                                Falla: {{ \Illuminate\Support\Str::limit($solicitud->trabajoAFallarAparente, 50) }}
                                            </a>
                                        </div>
                                        <div class="text-gray-500">
                                            Solicitante: {{ $solicitud->solicitante }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $solicitud->created_at->format('d/m/Y H:i:s') }}
                                    </td>


<td class="px-6 py-4 whitespace-nowrap text-sm">

    <!-- Primero, revisa si la relación 'estadoServicio' se cargó -->
    @if ($solicitud->estadoServicio)
        
        <!-- Ahora, revisa el ID para cambiar el color -->
        @if ($solicitud->estadoServicio->id == 2) <!-- En Proceso -->
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                {{ $solicitud->estadoServicio->estado }} <!-- <--- CAMBIADO -->
            </span>
        @elseif ($solicitud->estadoServicio->id == 1) <!-- Completado -->
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                {{ $solicitud->estadoServicio->estado }} <!-- <--- CAMBIADO -->
            </span>
        @elseif ($solicitud->estadoServicio->id == 3) <!-- Pendiente -->
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                {{ $solicitud->estadoServicio->estado }} <!-- <--- CAMBIADO -->
            </span>
        @else <!-- Cualquier otro estado -->
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                {{ $solicitud->estadoServicio->estado }} <!-- <--- CAMBIADO -->
            </span>
        @endif

    @else
        <!-- Esto se muestra si la relación falló o el ID es nulo -->
        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
            Sin estado
        </span>
    @endif
</td>


                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <!-- Aquí puedes poner enlaces a Ver/Editar/Eliminar -->
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                        No se encontraron solicitudes de servicio.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    <!-- Paginación (si la habilitaste en el componente) -->
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                        {{ $solicitudes->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>