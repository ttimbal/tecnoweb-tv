<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <x-jet-label>Nombre</x-jet-label>
                            <x-jet-input class="w-full" type="text" id="name" placeholder="Nombre"
                                         wire:model="name"></x-jet-input>
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label>Correo</x-jet-label>
                            <x-jet-input class="w-full" type="text" id="email" placeholder="Correo"
                                         wire:model="email"></x-jet-input>
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label>Teléfono</x-jet-label>
                            <x-jet-input class="w-full" type="number" id="phone_number" placeholder="Teléfono"
                                         wire:model="phone_number"></x-jet-input>
                            @error('phone_number') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label>Fecha de nacimiento</x-jet-label>
                            <x-jet-input class="w-full" type="date" id="date_of_birth" placeholder="Fecha de nacimiento"
                                         wire:model="date_of_birth"></x-jet-input>
                            @error('date_of_birth') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label>Rol</x-jet-label>
                            <x-forms.select id="type" class="block mt-1 w-full" type="date" name="type"  wire:model="type" required>
                                <option value="adm">{{'Administrador'}}</option>
                                <option value="prod">{{'Productor'}}</option>
                                <option value="pres">{{'Presentador'}}</option>
                            </x-forms.select>
                            @error('type') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        @if(!$user_id)
                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" wire:model="password" required/>
                            @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        @endif
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <x-jet-button wire:click.prevent="store()" type="button">Guardar</x-jet-button>
                    <x-forms.cancel wire:click="closeModal()" type="button">Cancelar</x-forms.cancel>
                </div>
            </form>
        </div>

    </div>
</div>
</div>
