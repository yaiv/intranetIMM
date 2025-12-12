<x-app-layout>
    <div class="p-8">
        <div class="max-w-7xl mx-auto">
            
            <!-- Frames Container -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <!-- Frame 1321314470 - Perfil del Usuario -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    
                    <!-- Avatar y Botón -->
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-20 h-20 rounded-full bg-gradient-to-br from-orange-300 to-pink-300 flex items-center justify-center">
                                <span class="text-3xl">👨</span>
                            </div>
                        </div>
                        <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition">
                            Actualizar Foto
                        </button>
                    </div>

                    <!-- Campos del formulario -->
                    <div class="space-y-4">
                        
                        <!-- Nombre -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                            <div class="flex items-center justify-between bg-gray-50 rounded-lg px-4 py-3 border border-gray-200">
                                <span class="text-gray-900">{{ Auth::user()->name }}</span>
                                <button class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Editar</button>
                            </div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <div class="flex items-center justify-between bg-gray-50 rounded-lg px-4 py-3 border border-gray-200">
                                <span class="text-gray-900">{{ Auth::user()->email }}</span>
                                <button class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Editar</button>
                            </div>
                        </div>

                        <!-- Número de Teléfono -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Número de Teléfono</label>
                            <div class="flex items-center justify-between bg-gray-50 rounded-lg px-4 py-3 border border-gray-200">
                                <span class="text-gray-900">+91 6952865732</span>
                                <button class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Editar</button>
                            </div>
                        </div>

                    </div>

                    <!-- Descripción -->
                    <div class="mt-6">
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-sm font-medium text-gray-700">Descripción</label>
                            <button class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">Edit</button>
                        </div>
                        <div class="bg-gray-50 rounded-lg px-4 py-3 border border-gray-200">
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Lorem Ipsum dolor sit amet consectetur. Eget cursus a aliquam vel congue tellus. Leo diam cras neque mauris ac arcu elit esuam dolor sit amet consectetur.
                            </p>
                        </div>
                    </div>

                    <!-- Información Adicional -->
                    <div class="mt-6">
                        <h3 class="text-sm font-semibold text-gray-900 mb-3">Adicional</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Ubicación</span>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium text-gray-900">Torre II</span>
                                    <button class="text-indigo-600 hover:text-indigo-700 text-xs font-medium">Editar</button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Cubículo</span>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium text-gray-900">113</span>
                                    <button class="text-indigo-600 hover:text-indigo-700 text-xs font-medium">Editar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Frame 1321314472 - Información Profesional -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    
                    <!-- Formación Profesional -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-semibold text-gray-900">Formación Profesional</h3>
                            <button class="w-8 h-8 bg-indigo-600 hover:bg-indigo-700 rounded-lg flex items-center justify-center transition">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </button>
                        </div>
                        <div class="bg-gray-50 rounded-lg px-4 py-3 border border-gray-200">
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Estos son los detalles profesionales que se muestran a los usuarios en la aplicación.
                            </p>
                        </div>
                    </div>

                    <!-- Línea de Investigación -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-semibold text-gray-900">Línea de Investigación</h3>
                            <button class="w-8 h-8 bg-yellow-400 hover:bg-yellow-500 rounded-lg flex items-center justify-center transition">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                </svg>
                            </button>
                        </div>
                        <div class="bg-gray-50 rounded-lg px-4 py-3 border border-gray-200">
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Estos son los detalles profesionales que se muestran a los usuarios en la aplicación.
                            </p>
                        </div>
                    </div>

                    <!-- Detalles -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-between py-2">
                            <span class="text-sm text-gray-600">Investigador Titular</span>
                            <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium text-gray-700">"B" T. C...</span>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <span class="text-sm text-gray-600">Pride</span>
                            <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium text-gray-700">"C"</span>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <span class="text-sm text-gray-600">SNI</span>
                            <span class="px-3 py-1 bg-gray-100 rounded-full text-sm font-medium text-gray-700">"III"</span>
                        </div>
                    </div>

                    <!-- Últimas Publicaciones -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-base font-semibold text-gray-900 mb-4">Últimas Publicaciones</h3>
                        
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <span class="text-sm font-medium text-gray-900">Google Académico</span>
                                <button class="w-6 h-6 bg-yellow-400 rounded flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                            </div>

                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <span class="text-sm font-medium text-gray-900">Blog Personal</span>
                                <button class="w-6 h-6 bg-yellow-400 rounded flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Botón Guardar -->
                    <div class="mt-6 flex justify-end">
                        <button class="px-6 py-2.5 bg-gray-800 hover:bg-gray-900 text-white rounded-lg font-medium transition">
                            Guardar
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>