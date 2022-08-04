<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-2 font-semibold text-xl text-gray-800 leading-tight uppercase">
            <img src="{{ asset('img/people.png') }}" alt="Icono Nueva Vacante" class="w-8"> 
                {{ __('Candidatos de la vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl text-center mb-10"> Candidatos para la vacante 
                        <span class="font-bold"> {{ $vacancy->title }} </span> 
                    </h1>
                    
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full">

                            @forelse ($vacancy->candidates as $candidate)
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800">
                                            {{ $candidate->user->name }}
                                        </p>
                                        <p class="text-sm text-gray-600">
                                            {{ $candidate->user->email }}
                                        </p>
                                        <p class="text-sm text-gray-800">
                                            Día que se postuló: 
                                            <span class="font-bold"> {{ $candidate->created_at->diffForHumans() }} </span>
                                        </p>
                                    </div>
                                    <div>
                                        <a  href="{{ asset('storage/cv/' . $candidate->cv ) }}"
                                            target="_blank"
                                            rel="noreferrer noopener" 
                                            class="inline-flex items-center shadow-sm px-2.5 py-0.5 text-sm leading-5 font-bold rounded-full text-gray-700 bg-green-400 uppercase">
                                            Ver CV
                                        </a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600"> 
                                    Por el momento tu vacante no cuenta con ningún candidato 
                                </p>
                            @endforelse

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
