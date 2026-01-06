<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">¡Bienvenido, {{ Auth::user()->nombre }}!</h1>
                <p class="text-gray-600 mb-4">
                    Este es tu panel de control principal.
                </p>
                
                <a href="{{ route('researcher.profile') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                    Ir a Mi Perfil Académico
                </a>
            </div>
        </div>
    </div>
</x-app-layout>