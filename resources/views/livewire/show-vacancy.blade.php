<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacancy->title }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-100 p-4 my-10">
            <p class="text-sm uppercase my-3"> 
                Empresa: <span class="font-bold"> {{ $vacancy->company }} </span> 
            </p>

            <p class="text-sm uppercase my-3"> 
                Último día para postularse: 
                    <span class="font-bold"> {{ $vacancy->last_day->toFormattedDateString('d/m/Y') }} </span> 
            </p>

            <p class="text-sm uppercase my-3"> 
                Categoría: 
                    <span class="font-bold"> {{ $vacancy->category->category }} </span> 
            </p>

            <p class="text-sm uppercase my-3"> 
                Salario: 
                    <span class="font-bold"> {{ $vacancy->wage->wage }} </span> 
            </p>

        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacancies/' . $vacancy->image) }}" alt="{{ $vacancy->title }}" class="w-76">
        </div>

        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5"> Descripción del puesto: </h2>
            <p> {{ $vacancy->description }} </p>
        </div>
    </div>

    @guest
    <div class="mt-5 bg-gray-100 border border-dashed p-5 text-center">
        <p> 
            ¿ Deseas aplicar a esta vacante ? 
                <a href="{{ route('register') }}" class="font-bold text-blue-600"> 
                    Obten una cuenta y aplica a esta y otras vacantes 
                </a>
        </p>
    </div>
    @endguest

    @cannot('create', App\Models\Vacancy::class)
        <livewire:apply-vacancy :vacancy="$vacancy"/>
    @endcannot
    
</div>
