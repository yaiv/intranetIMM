<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $investigador->nombre_completo }} | IIM UNAM</title>
        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-white text-slate-600">
        
        @include('layouts.partials._header-top')

        <div class="max-w-7xl mx-auto px-6 py-12 lg:py-16">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <div class="lg:col-span-8 space-y-12">
                    
                    <div class="lg:hidden mb-8">
                        <h1 class="text-3xl font-bold text-slate-900 leading-tight">{{ $investigador->nombre_completo }}</h1>
                        @if($investigador->perfil && $investigador->perfil->tipoAcademico)
                            <p class="text-indigo-700 font-medium mt-2">{{ $investigador->perfil->tipoAcademico->nombre }}</p>
                        @endif
                    </div>

                    <section>
                        <h2 class="text-xl font-bold text-slate-800 border-b-2 border-indigo-100 pb-2 mb-4">
                            Acerca de mí
                        </h2>
                        <div class="prose prose-slate max-w-none text-justify leading-relaxed">
                            @if(optional($investigador->perfil)->biografia)
                                <p>{{ $investigador->perfil->biografia }}</p>
                            @else
                                <p class="italic text-gray-400">Información biográfica no disponible.</p>
                            @endif
                        </div>
                    </section>

                    <section>
                        <h2 class="text-xl font-bold text-slate-800 border-b-2 border-indigo-100 pb-2 mb-4">
                            Formación profesional
                        </h2>
                        <div class="space-y-4">
                            @forelse($investigador->formacionProfesional as $grado)
                                <div class="flex gap-3">
                                    <div class="mt-1.5 h-2 w-2 rounded-full bg-indigo-500 flex-shrink-0"></div>
                                    <div>
                                        <h3 class="font-bold text-slate-900">{{ $grado->titulo_obtenido }}</h3>
                                        <p class="text-sm text-slate-600">
                                            {{ $grado->institucion }} <span class="text-slate-400">•</span> {{ $grado->anio_fin }}
                                        </p>
                                        @if($grado->pais && $grado->pais != 'México')
                                            <p class="text-xs text-slate-500">{{ $grado->pais }}</p>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-400 italic pl-5">Sin registros académicos.</p>
                            @endforelse
                        </div>
                    </section>

                    <section>
                        <h2 class="text-xl font-bold text-slate-800 border-b-2 border-indigo-100 pb-2 mb-4">
                            Líneas de investigación
                        </h2>
                        <div class="space-y-3">
                            @forelse($investigador->lineasInvestigacion as $linea)
                                <div class="flex gap-3">
                                    <svg class="w-5 h-5 text-indigo-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    <p class="text-slate-700 font-medium">{{ $linea->descripcion }}</p>
                                </div>
                            @empty
                                <p class="text-gray-400 italic pl-5">No especificadas.</p>
                            @endforelse
                        </div>
                    </section>

                    <section>
                        <h2 class="text-xl font-bold text-slate-800 border-b-2 border-indigo-100 pb-2 mb-4">
                            Publicaciones Recientes
                        </h2>
                        <div class="bg-slate-50 border border-dashed border-slate-300 rounded-lg p-8 text-center">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-slate-100 mb-4">
                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <h3 class="text-lg font-medium text-slate-900">Módulo en actualización</h3>
                            <p class="text-slate-500 mt-1">El listado de producción científica estará disponible próximamente.</p>
                        </div>
                    </section>

                </div>

                <div class="lg:col-span-4">
                    <div class="sticky top-8">
                        
                        <div class="flex justify-center lg:justify-end mb-8">
                            <div class="relative h-64 w-64 rounded-full p-1 border-2 border-indigo-100 shadow-xl bg-white">
                                <div class="h-full w-full rounded-full overflow-hidden bg-slate-100">
                                    @if($investigador->profile_photo_path)
                                        <img src="/storage/{{ $investigador->profile_photo_path }}" alt="{{ $investigador->nombre }}" class="h-full w-full object-cover">
                                    @else
                                        <div class="h-full w-full flex items-center justify-center text-indigo-300 text-7xl font-bold bg-slate-50">
                                            {{ substr($investigador->nombre, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="text-center lg:text-right space-y-6">
                            
                            <div class="hidden lg:block">
                                <h1 class="text-2xl font-bold text-slate-900 leading-tight mb-2">{{ $investigador->nombre_completo }}</h1>
                                @if($investigador->perfil && $investigador->perfil->tipoAcademico)
                                    <span class="inline-block bg-indigo-50 text-indigo-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                                        {{ $investigador->perfil->tipoAcademico->nombre }}
                                    </span>
                                @endif
                            </div>

                            <div class="space-y-4 pt-4 border-t border-slate-100">
                                
                                @if(optional($investigador->perfil)->sni)
                                    <div>
                                        <span class="block text-xs font-bold text-slate-400 uppercase">Nivel SNI</span>
                                        <span class="text-slate-800 font-medium">{{ $investigador->perfil->sni->nivel }}</span>
                                    </div>
                                @endif

                                @if($investigador->email)
                                    <div>
                                        <span class="block text-xs font-bold text-slate-400 uppercase">Correo Electrónico</span>
                                        <a href="mailto:{{ $investigador->email }}" class="text-indigo-600 font-medium hover:underline break-all">
                                            {{ $investigador->email }}
                                        </a>
                                    </div>
                                @endif

                                @if(optional($investigador->perfil)->telefono_oficina)
                                    <div>
                                        <span class="block text-xs font-bold text-slate-400 uppercase">Teléfono</span>
                                        <span class="text-slate-800 font-medium">{{ $investigador->perfil->telefono_oficina }}</span>
                                    </div>
                                @endif

                                @if(optional($investigador->perfil)->ubicacion)
                                    <div>
                                        <span class="block text-xs font-bold text-slate-400 uppercase">Ubicación</span>
                                        <span class="text-slate-800 font-medium">
                                            {{ $investigador->perfil->ubicacion->edificio }}
                                            @if($investigador->perfil->cubiculo)
                                                <br>Cubículo {{ $investigador->perfil->cubiculo }}
                                            @endif
                                        </span>
                                    </div>
                                @endif

                                @if(optional($investigador->perfil)->google_scholar)
                                    <div class="pt-2">
                                        <a href="{{ $investigador->perfil->google_scholar }}" target="_blank" class="inline-flex items-center text-sm font-bold text-slate-600 hover:text-indigo-600 transition">
                                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.372 0 0 5.373 0 12s5.372 12 12 12 12-5.373 12-12S18.628 0 12 0zm5.85 5.603l-1.575 2.65c-.65-1.075-1.325-1.9-2.025-2.5.375-.125.75-.225 1.125-.325.825-.2 1.65-.25 2.475.175zm-9.3 8.35c.725 1.7 1.25 3.525 1.55 5.35-1.75-.4-3.425-1.05-4.975-2.025.95-1.225 2.1-2.325 3.425-3.325zm4.8 5.675c.25-.025.5-.075.75-.125-.175-1.475-.5-2.925-1-4.325 1.35.875 2.525 1.95 3.45 3.225-1.025.625-2.125 1.05-3.2 1.225zm4.1-3.675c-.825-1.125-1.85-2.1-3.05-2.9 1.125-2.025 1.975-4.225 2.5-6.525.65.65 1.225 1.35 1.7 2.125-.225 2.475-.625 4.925-1.15 7.3z"/></svg>
                                            Ver en Google Scholar
                                        </a>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-20 pt-8 border-t border-slate-200 text-center">
                <p class="text-sm text-slate-400">
                    &copy; {{ date('Y') }} Instituto de Investigaciones en Materiales, UNAM.
                </p>
            </div>

        </div>

    </body>
</html>