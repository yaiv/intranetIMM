<header class="bg-gradient-to-r from-indigo-700 to-indigo-600 shadow-md">
    <div class="px-6 py-4">
        <div class="flex justify-between items-center">
            
            <!-- Logo y Título -->
            <div class="flex items-center space-x-4">
                <img src="{{ asset('img/logoIIM.png') }}" alt="UNAM Logo" class="h-12 w-auto" />
                <div class="text-white">
                    <div class="text-base font-semibold">Instituto de</div>
                    <div class="text-base font-semibold">Investigaciones en Materiales</div>
                    <div class="text-xs opacity-90">UNAM</div>
                </div>
            </div>

            <!-- Usuario y Cerrar Sesión -->
            <div class="flex items-center space-x-6">
                <div class="text-right">
                    <div class="text-white text-sm font-medium">Hola {{ Auth::user()->name }}</div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-indigo-200 hover:text-white text-sm transition">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>