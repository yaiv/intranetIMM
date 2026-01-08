<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Le decimos: soloMias = false (O sea, trae TODO) --}}
            @livewire('mostrar-solicitudes', ['soloMias' => false])

        </div>
    </div>
</x-app-layout>
