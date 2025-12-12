<aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
    
    <!-- Logo SAM - IIM -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <div class="font-bold text-gray-900">SAM - IIM</div>
            </div>
        </div>
    </div>

    <!-- Menú de Navegación -->
    <nav class="flex-1 p-4">
        @role('administrador')
            @include('layouts.partials._sidebar-admin-menu')
        @else
            @include('layouts.partials._sidebar-user-menu')
        @endrole
    </nav>

</aside>