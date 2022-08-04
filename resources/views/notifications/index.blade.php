<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center gap-2 font-semibold text-xl text-gray-800 leading-tight uppercase">
            <img src="{{ asset('img/notification.png') }}" alt="Icono Nueva Vacante" class="w-8"> 
                {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl text-center mb-10"> Mis Notificaciones </h1>
                    
                    <div class="divide-y divide-gray-200">
                        @forelse ($notifications as $notification)
                            <div class="p-5 flex justify-between">
                                <div>
                                    <p> 
                                        Nuevo candidato para: 
                                            <span class="font-bold"> {{ $notification->data['name_vacancy'] }} </span>
                                    </p>
        
                                    <p> 
                                        Hace 
                                            <span class="font-bold"> {{ $notification->created_at->diffForHumans() }} </span>
                                    </p>
                                </div>

                                <div class="mt-5 lg:mt-0">
                                    <a href="{{ route('candidates.index', $notification->data['id_vacancy'] ) }}" class="bg-blue-600 text-white px-2 py-1 rounded-full uppercase items-center text-sm">
                                        Ver Candidatos
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600"> No hay notificaciones nuevas </p>
                        @endforelse
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
