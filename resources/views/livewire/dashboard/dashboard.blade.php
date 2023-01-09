<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex justify-around p-5">
                    <div class="w-48 h-24 bg-blue-500 flex flex-col justify-center items-center rounded-md text-white">
                        <span class="text-2xl font-bold">
                        {{$countOfPrograms}}
                        </span>
                        <span>{{'Cantidad de programas'}}</span>
                    </div>
                    <div class="w-48 h-24 bg-blue-500 flex flex-col justify-center items-center rounded-md text-white">
                        <span class="text-2xl font-bold">
                        {{$countOfPublicity}}
                        </span>
                        <span>{{'Cantidad de anuncios'}}</span>
                    </div>
                </div>
                <hr>
                <br>
                <div class="flex justify-center">
                    <span>{{'Tiempo dedicado a programas: '}}{{$timeOfPrograms}}</span>
                </div>
                <hr>
                <br>
                <div class="flex justify-center">
                    <span>{{'Tiempo dedicado a publicidad: '}}{{$timeOfPublicity}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
