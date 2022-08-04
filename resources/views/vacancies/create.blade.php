<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-2 font-semibold text-xl text-gray-800 leading-tight uppercase">
            <img src="{{ asset('img/new-vacancy.png') }}" alt="Icono Nueva Vacante" class="w-8"> 
                {{ __('Crear vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl text-center mb-10"> Publicar Vacante </h1>
                    
                    <div class="md:flex md:justify-center p-5">
                        <livewire:create-vacancy />
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
