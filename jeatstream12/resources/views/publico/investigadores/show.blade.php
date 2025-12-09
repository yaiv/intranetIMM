<x-guest-layout>
    <nav class="bg-blue-900 border-b border-blue-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center text-white font-bold text-lg">
                        <span class="mr-2">🏛️</span> Instituto de Investigaciones en Materiales
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Iniciar Sesión
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="min-h-screen bg-gray-100">
        
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Perfil del Investigador
                </h2>
            </div>
        </header>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="p-6 sm:p-10"> <h1 class="text-3xl font-bold text-gray-900 mb-8 border-b pb-4">
                             {{ $investigador->nombre_completo }}
                        </h1>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                            <div class="md:col-span-2 space-y-8">

                                <div>
                                    <h3 class="text-lg font-bold text-blue-800 uppercase tracking-wide mb-4">
                                        Formación Profesional
                                    </h3>
                                    @if($investigador->formacionProfesional->isNotEmpty())
                                        <ul class="space-y-3">
                                            @foreach($investigador->formacionProfesional as $grado)
                                                <li class="flex items-start text-gray-700">
                                                    <svg class="h-5 w-5 text-blue-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    <span>
                                                        <strong>{{ $grado->grado }}</strong> en {{ $grado->titulo_obtenido }} <br>
                                                        <span class="text-sm text-gray-500">{{ $grado->institucion }} ({{ $grado->anio_fin }})</span>
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-gray-400 italic">Sin información registrada.</p>
                                    @endif
                                </div>

                                <div>
                                    <h3 class="text-lg font-bold text-blue-800 uppercase tracking-wide mb-4">
                                        Líneas de Investigación
                                    </h3>
                                    @if($investigador->lineasInvestigacion->isNotEmpty())
                                        <ul class="space-y-2">
                                            @foreach($investigador->lineasInvestigacion as $linea)
                                                <li class="flex items-start text-gray-700">
                                                    <span class="text-blue-500 mr-2 font-bold">▸</span>
                                                    {{ $linea->descripcion }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-gray-400 italic">Sin líneas registradas.</p>
                                    @endif
                                </div>

                                @if(optional($investigador->perfil)->google_scholar)
                                    <div class="pt-4">
                                        <a href="{{ $investigador->perfil->google_scholar }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            Ver en Google Scholar
                                        </a>
                                    </div>
                                @endif

                            </div>

                            <div class="md:col-span-1">
                                <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                                    <div class="flex justify-center mb-6">
                                        <div class="h-48 w-48 rounded-full overflow-hidden border-4 border-white shadow-md">
                                            @if($investigador->profile_photo_path)
                                                <img src="/storage/{{ $investigador->profile_photo_path }}" alt="{{ $investigador->nombre }}" class="h-full w-full object-cover">
                                            @else
                                                <div class="h-full w-full bg-blue-100 flex items-center justify-center text-blue-500 text-4xl font-bold">
                                                    {{ substr($investigador->nombre, 0, 1) }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="space-y-3 text-sm text-gray-700">
                                        @if($investigador->perfil)
                                            @if($investigador->perfil->tipoAcademico)
                                                <div class="font-bold text-base text-blue-900 border-b border-gray-200 pb-2 mb-2">
                                                    {{ $investigador->perfil->tipoAcademico->nombre }}
                                                </div>
                                            @endif
                                            
                                            @if($investigador->perfil->pride)
                                                <p><span class="font-bold text-gray-900">PRIDE:</span> {{ $investigador->perfil->pride->nivel }}</p>
                                            @endif
                                            
                                            @if($investigador->perfil->sni)
                                                <p><span class="font-bold text-gray-900">SNI:</span> {{ $investigador->perfil->sni->nivel }}</p>
                                            @endif

                                            <div class="pt-4 space-y-2">
                                                <p class="flex items-center break-all">
                                                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                    {{ $investigador->email }}
                                                </p>
                                                
                                                @if($investigador->perfil->telefono_oficina)
                                                    <p class="flex items-center">
                                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                                        {{ $investigador->perfil->telefono_oficina }}
                                                    </p>
                                                @endif

                                                @if($investigador->perfil->ubicacion)
                                                    <p class="flex items-center">
                                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                                        {{ $investigador->perfil->ubicacion->edificio }}
                                                        @if($investigador->perfil->cubiculo)
                                                            , Cub. {{ $investigador->perfil->cubiculo }}
                                                        @endif
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">
                                ÚLTIMAS PUBLICACIONES
                            </h3>
                            <div class="bg-gray-50 rounded p-4 text-center text-gray-500 border border-dashed border-gray-300">
                                Módulo de publicaciones próximamente...
                            </div>
                        </div>

                    </div>
                </div>
                </div>
        </div>
    </div>
</x-guest-layout>