<x-jet-dialog-modal wire:model="isOpen">
    <x-slot name="title">
        Event
    </x-slot>

    <x-slot name="content">
        {{--              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
            <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


          <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
                    <form id="form1">
          <div style="padding:20px">

            <select id="chkveg" multiple="multiple">
              <option value="cheese">Cheese</option>
              <option value="tomatoes">Tomatoes</option>
              <option value="mozarella">Mozzarella</option>
              <option value="mushrooms">Mushrooms</option>
              <option value="pepperoni">Pepperoni</option>
              <option value="onions">Onions</option>
            </select>

            <br /><br />

            <input type="button" id="btnget" value="Get Selected Values" />
          </div>
        </form>

            <script>$(function() {

          $('#chkveg').multiselect({
            includeSelectAllOption: true
          });

          $('#btnget').click(function() {
            alert($('#chkveg').val());
          });
        });</script>--}}
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="mb-4">
                        <x-jet-label>Nombre</x-jet-label>
                        <x-jet-input class="w-full" type="text" id="name" placeholder="Nombre" wire:model="name"
                                     autocomplete="false"
                                     required></x-jet-input>
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <x-jet-label>Fecha de inicio</x-jet-label>
                        <x-jet-input class="w-full" type="date" id="start_date" placeholder="Fecha de inicio"
                                     wire:model="start_date" required></x-jet-input>
                        @error('start_date') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <x-jet-label>Fecha de finalización</x-jet-label>
                        <x-jet-input class="w-full" type="date" id="end_date" placeholder="Fecha de finalización"  min="{{$start_date}}"
                                     wire:model="end_date" required></x-jet-input>
                        @error('end_date') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                                        <div class="mb-4">
                        <x-jet-label>Hora de inicio</x-jet-label>
                        <x-jet-input class="w-full" type="time" id="start_time" placeholder="Hora de inicio" step="1"
                                     wire:model="start_time" required></x-jet-input>
                        @error('start_time') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <x-jet-label>Hora de finalización</x-jet-label>
                        <x-jet-input class="w-full" type="time" id="end_time" placeholder="Hora de finalización" step="1"
                                     wire:model="end_time" required></x-jet-input>
                        @error('end_time') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <x-jet-label>Tipo</x-jet-label>
                        <x-forms.select id="type" class="block mt-1 w-full" name="type" wire:model="type" required>
                            <option>{{'Selecciona el tipo de evento'}}</option>
                            <option value="programa">{{'Programa'}}</option>
                            <option value="publicidad">{{'Publicidad'}}</option>
                        </x-forms.select>
                        @error('type') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <x-jet-label>Categoria</x-jet-label>
                        <x-forms.select id="category_id" class="block mt-1 w-full" name="category_id"
                                        wire:model="category_id" required>
                            <option>{{'Selecciona el tipo de categoria'}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </x-forms.select>
                        @error('category_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <x-jet-label>Turno</x-jet-label>
                        <x-forms.select id="turn_id" class="block mt-1 w-full" name="turn_id"
                                        wire:model="turn_id" required>
                            <option>{{'Selecciona el turno'}}</option>
                            @foreach($turns as $turn)
                                <option value="{{$turn->id}}">{{$turn->name}}</option>
                            @endforeach
                        </x-forms.select>
                        @error('turn_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <x-jet-label>Presentador</x-jet-label>
                        <x-forms.select id="presenter_id" class="block mt-1 w-full" name="presenter_id"
                                        wire:model="presenter_id" required>
                            <option>{{'Selecciona un presentador'}}</option>
                            @foreach($presenters as $presenter)
                                <option value="{{$presenter->id}}">{{$presenter->name}}</option>
                            @endforeach
                        </x-forms.select>
                        @error('presenter_id') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>

                    <div class="mb-4">
                        <x-jet-label>Días</x-jet-label>
                        <div class="flex space-x-20">
                            @foreach($days as $day)
                                <label class="flex flex-col w-12 uppercase">
                                    <x-jet-checkbox wire:model="selectedDays" value="{{$day->id}}" required/>
                                    {{substr($day->name, 0, 2)}}
                                </label>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </x-slot>
    <x-slot name="footer">
        <div class="w-full flex justify-between">
            <div>
                @if($event_id!==null)
                    <x-jet-danger-button wire:click="delete({{ $event_id }})" type="button">Eliminar
                    </x-jet-danger-button>
                @endif
            </div>
            <div>
                <x-forms.cancel wire:click="closeModal()" type="button">Cancelar</x-forms.cancel>
                <x-jet-button wire:click.prevent="store()" type="button">Guardar</x-jet-button>
            </div>
        </div>
    </x-slot>
</x-jet-dialog-modal>


