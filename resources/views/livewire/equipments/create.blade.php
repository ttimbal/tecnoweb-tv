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
                            <x-jet-input class="w-full" type="text" id="name" placeholder="Nombre" wire:model="name"></x-jet-input>
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <x-jet-label>Código</x-jet-label>
                            <x-jet-input class="w-full" type="text" id="code" placeholder="Código" wire:model="code"></x-jet-input>
                            @error('code') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
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
