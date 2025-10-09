<header class="bg-blue-900 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-32">
            
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <img src="{{ asset('img/logoIIM.png') }}" alt="IIM UNAM" class="h-12 w-auto" />
                    <div class="ml-3">
                        <div class="text-lg font-bold text-white">Instituto de Investigaciones en Materiales</div>
                        <div class="text-xs text-gray-100">UNAM</div>
                    </div>
                </a>
            </div>

            <div class="flex items-center space-x-6">
                
                <a href="{{ route('solicitudes') }}" class="flex items-center text-white hover:bg-blue-800 px-3 py-2 rounded-md text-sm font-medium transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Solicitudes
                </a>

                <a href="{{ route('profile.show') }}" class="flex items-center text-white hover:bg-blue-800 px-3 py-2 rounded-md text-sm font-medium transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Mi Perfil
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="flex items-center text-white hover:bg-blue-800 px-3 py-2 rounded-md text-sm font-medium transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Cerrar Sesión
                    </button>
                </form>

            </div>
        </div>
    </div>
</header>