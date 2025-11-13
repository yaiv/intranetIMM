<h1>Usuario</h1>

<a href="{{ route('solicitudes.index') }}" class="flex items-center text-white hover:bg-blue-800 px-3 py-2 rounded-md text-sm font-medium transition">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
    </svg>
    Mis Solicitudes
</a>

<a href="{{ route('solicitudes.create') }}" class="flex items-center text-white hover:bg-blue-800 px-3 py-2 rounded-md text-sm font-medium transition">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    Nueva Solicitud
</a>

<a href="#" class="flex items-center text-white hover:bg-blue-800 px-3 py-2 rounded-md text-sm font-medium transition">
    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    Historial
</a>