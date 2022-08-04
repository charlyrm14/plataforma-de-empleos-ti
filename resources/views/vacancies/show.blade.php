<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-2 font-semibold text-xl text-gray-800 leading-tight uppercase">
            <img src="{{ asset('img/new-vacancy.png') }}" alt="Icono Nueva Vacante" class="w-8"> 
                {{ $vacancy->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:show-vacancy :vacancy="$vacancy"/>
            </div>
        </div>
    </div>
</x-app-layout>
