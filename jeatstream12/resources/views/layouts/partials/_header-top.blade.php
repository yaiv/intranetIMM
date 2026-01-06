<header class="bg-gradient-to-r from-indigo-700 to-indigo-600 shadow-md">
    <div class="px-6 py-4">
        <div class="flex justify-between items-center">
            
            <div class="flex items-center space-x-4">
                <img src="{{ asset('img/logoIIM.png') }}" alt="UNAM Logo" class="h-12 w-auto" />
                <div class="text-white">
                    <div class="text-base font-semibold">Instituto de</div>
                    <div class="text-base font-semibold">Investigaciones en Materiales</div>
                    <div class="text-xs opacity-90">UNAM</div>
                </div>
            </div>

            <div class="flex items-center space-x-6">
                
                @auth
                    <div class="text-right">
                        <div class="text-white text-sm font-medium">
                            Hola, {{ Auth::user()->nombre }}
                        </div>
                        
                        <div class="flex items-center justify-end space-x-3 mt-1">
                            <a href="{{ route('dashboard') }}" class="text-indigo-200 hover:text-white text-xs underline transition">
                                Ir al Dashboard
                            </a>
                            
                            <span class="text-indigo-400">|</span>

                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-indigo-200 hover:text-white text-xs font-semibold uppercase tracking-wider transition">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div>
                        <a href="{{ route('login') }}" class="group inline-flex items-center px-4 py-2 border border-white/20 bg-white/10 backdrop-blur-sm rounded-lg text-sm font-medium text-white hover:bg-white hover:text-indigo-700 transition-all duration-200 shadow-sm">
                            <svg class="w-4 h-4 mr-2 group-hover:text-indigo-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Acceso Académicos
                        </a>
                    </div>
                @endauth

            </div>

        </div>
    </div>
</header>