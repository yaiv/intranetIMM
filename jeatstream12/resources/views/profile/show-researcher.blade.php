<x-app-layout>
    <div class="p-8">
        <div class="max-w-7xl mx-auto">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                <div class="space-y-6">
                    <livewire:profile.personal-information />

                    <livewire:profile.profile-bio-location />
                    <livewire:profile.update-password />
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 h-fit">
                    
                    <div class="mb-6">
                        <livewire:profile.professional-degrees />
                    </div>

                    <div class="mb-6">
                        </div>

                    <livewire:profile.academic-summary />

                    <div class="border-t border-gray-200 pt-6">
                         <h3 class="text-base font-semibold text-gray-900 mb-4">Últimas Publicaciones</h3>
                         </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>