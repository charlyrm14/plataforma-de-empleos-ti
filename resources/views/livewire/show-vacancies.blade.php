<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        
        @forelse ($vacancies as $vacancy)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{ route('vacancies.show', $vacancy->id) }}" class="text-xl font-bold hover:text-blue-600"> 
                        {{ $vacancy->title }} 
                    </a>
                    <p class="text-sm text-gray-600 font-bold"> {{ $vacancy->company }} </p>
                    <p class="text-sm text-gray-500"> Último día para postularse: {{ $vacancy->last_day->format('d/m/Y') }} </p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="{{ route('candidates.index', $vacancy) }}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        {{ $vacancy->candidates->count() }} Candidatos 
                    </a>

                    <a href="{{ route('vacancies.edit', $vacancy->id ) }}" class="bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Editar
                    </a>

                    <button wire:click="$emit('deleteAlert', {{ $vacancy->id }})" class="border border-red-600 py-2 px-4 rounded-lg text-xs font-bold uppercase text-center">
                        Eliminar
                    </button>

                </div>

            </div>
        @empty

            <div class="p-6 bg-white border-b border-gray-200">
                <div class="leading-10 text-center uppercase font-bold">
                    <p> No tienes vacantes aún, empieza creando una </p>
                </div>
            </div>
        @endforelse

    </div>

    <div class="mt-10">
        {{ $vacancies->links() }}
    </div>

</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('deleteAlert', ( vacancy_id ) => {

            Swal.fire({
                title: '¿Estás seguro de eliminar esta vacante?',
                text: "Si eliminas esta vacante no podras recuperarla",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                confirmButtonText: '¡Si, eliminar!',
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emit('deleteVacancy', vacancy_id);

                    Swal.fire(
                        'Vacante eliminada',
                        'Datos eliminados con éxito',
                        'success'
                    )
                }
            })

        })
        
    </script>
@endpush