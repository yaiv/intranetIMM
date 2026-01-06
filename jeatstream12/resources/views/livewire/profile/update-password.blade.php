<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
    
    <div class="mb-6">
        <h3 class="text-base font-semibold text-gray-900">Seguridad de la Cuenta</h3>
        <p class="text-sm text-gray-500 mt-1">
            Asegúrate de que tu cuenta utilice una contraseña larga y aleatoria para mantenerse segura.
        </p>
    </div>

    <form wire:submit="update" class="space-y-4">
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña Actual</label>
            <input type="password" 
                   wire:model="current_password" 
                   class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
            @error('current_password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nueva Contraseña</label>
                <input type="password" 
                       wire:model="password" 
                       class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar Nueva Contraseña</label>
                <input type="password" 
                       wire:model="password_confirmation" 
                       class="w-full rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
            </div>
        </div>

        <div class="flex justify-end pt-2">
            <button type="submit" class="px-4 py-2 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-black shadow-sm transition flex items-center">
                <span wire:loading.remove wire:target="update">Actualizar Contraseña</span>
                <span wire:loading wire:target="update">Guardando...</span>
            </button>
        </div>

    </form>
</div>