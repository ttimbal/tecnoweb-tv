<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <x-jet-button wire:click="create()">Crear Usuario</x-jet-button>
            @if($isOpen)
                @include('livewire.users.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">ID</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Correo</th>
                    <th class="px-4 py-2">Teléfono</th>
                    <th class="px-4 py-2">Fecha Nac.</th>
                    <th class="px-4 py-2">Rol</th>
                    <th class="px-4 py-2">Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->id }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ $user->phone_number }}</td>
                        <td class="border px-4 py-2">{{ $user->date_of_birth }}</td>
                        <td class="border px-4 py-2">{{ $user->type }}</td>
                        <td class="border px-4 py-2">
                            <x-jet-button wire:click="edit({{ $user->id }})">Editar</x-jet-button>
                            <x-jet-danger-button wire:click="delete({{ $user->id }})">Eliminar</x-jet-danger-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
