<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ( session()->has('message') )
                <div class="border border-green-600 text-green-600 p-2 text-center rounded-md my-3 font-bold uppercase">
                    {{ session('message') }}
                </div>
            @endif

            <livewire:show-vacancies/>

        </div>
    </div>
</x-app-layout>
