<div>

    <livewire:filter-vacancies/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-bold text-4xl text-gray-800 mb-12">
                Las mejores vacantes de TI para ti
            </h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                
                @forelse ($vacancies as $vacancy)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a class="font-bold text-2xl" href="{{ route('vacancies.show', $vacancy) }}">
                                {{ $vacancy->title }}
                            </a>
                            <p class="text-base text-indigo-600 font-bold mb-1"> 
                                {{ $vacancy->company }}
                            </p>
                            <p class="text-base font-bold mb-1"> 
                                {{ $vacancy->category->category }}
                            </p>
                            <p class="text-base font-bold mb-1"> 
                                {{ $vacancy->wage->wage }}
                            </p>
                            <p class="text-gray-600">
                                Último día para postularse:
                                    <span class="font-bold"> {{ $vacancy->last_day->format('d/m/Y') }} </span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a class="bg-blue-600 text-white uppercase py-1 px-2 rounded-full text-center" href="{{ route('vacancies.show', $vacancy) }}">
                                Ver vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600"> No hay vacantes aún </p>
                @endforelse

            </div>
        </div>
    </div>
</div>
