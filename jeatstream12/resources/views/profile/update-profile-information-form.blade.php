<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Información del Perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Actualiza los datos personales y la información de tu cuenta.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Foto de Perfil -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">

                <!-- Input de Foto -->
                <input type="file" id="photo" class="hidden"
                       wire:model.live="photo"
                       x-ref="photo"
                       x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo.files[0]);
                       ">

                <x-label for="photo" value="Foto" />

                <!-- Foto Actual -->
                <div class="mt-2" x-show="!photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" 
                         class="rounded-full size-20 object-cover">
                </div>

                <!-- Preview Nueva Foto -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full size-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2"
                                    type="button" 
                                    x-on:click.prevent="$refs.photo.click()">
                    Cargar Nueva Foto
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2"
                                        wire:click="deleteProfilePhoto">
                        Eliminar Foto
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif


        <!-- NOMBRE -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="nombre" value="Nombre" />
            <x-input id="nombre" type="text" class="mt-1 block w-full"
                     name="nombre"
                     wire:model="state.nombre"
                     required />
            <x-input-error for="nombre" class="mt-2" />
        </div>

        <!-- APELLIDO PATERNO -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="apellido_paterno" value="Apellido Paterno" />
            <x-input id="apellido_paterno" type="text" class="mt-1 block w-full"
                     name="apellido_paterno"
                     wire:model="state.apellido_paterno"
                     required />
            <x-input-error for="apellido_paterno" class="mt-2" />
        </div>

        <!-- APELLIDO MATERNO -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="apellido_materno" value="Apellido Materno" />
            <x-input id="apellido_materno" type="text" class="mt-1 block w-full"
                     name="apellido_materno"
                     wire:model="state.apellido_materno"
                     required />
            <x-input-error for="apellido_materno" class="mt-2" />
        </div>

        <!-- TELÉFONO -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="telefono" value="Teléfono" />
            <x-input id="telefono" type="text" class="mt-1 block w-full"
                     name="telefono"
                     wire:model="state.telefono" />
            <x-input-error for="telefono" class="mt-2" />
        </div>

        <!-- NÚMERO DE EMPLEADO -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="numero_empleado" value="Número de Empleado" />
            <x-input id="numero_empleado" type="text" class="mt-1 block w-full"
                     name="numero_empleado"
                     wire:model="state.numero_empleado"
                     required />
            <x-input-error for="numero_empleado" class="mt-2" />
        </div>

        <!-- EMAIL -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="Email" />
            <x-input id="email" type="email" class="mt-1 block w-full"
                     name="email"
                     wire:model="state.email"
                     required />

            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) 
                && !$this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    Tu email no ha sido verificado.

                    <button type="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900"
                        wire:click.prevent="sendEmailVerification">
                        Enviar enlace de verificación
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        Se envió un nuevo enlace de verificación.
                    </p>
                @endif
            @endif
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Guardado.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            Guardar
        </x-button>
    </x-slot>
</x-form-section>
