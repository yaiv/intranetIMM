<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Solicitud de Servicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- Aquí pondremos el componente Livewire para el formulario --}}
                
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    
                    {{-- Encabezados de tu imagen --}}
                    <h1 class="text-2xl font-bold text-center mb-6" style="color: #000080;">Instituto de Investigaciones en Materiales</h1>
                    <h2 class="text-xl font-semibold text-center mb-8 p-3" style="background-color: #CCCC00;">Solicitud de servicio</h2>

                    {{-- Botón Regresar --}}
                    <div class="mb-6">
                        <x-button onclick="window.history.back()">
                            {{ __('Regresar') }}
                        </x-button>
                    </div>

                    {{-- Se llama a componente Livewire --}}
                    @livewire('solicitud-form')
                  

                </div>

            </div>
        </div>
    </div>
</x-app-layout>