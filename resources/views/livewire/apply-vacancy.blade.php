<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">  Postularme a esta vacante </h3>

    @if ( session()->has('message') )
        <div class="border border-green-600 text-green-600 p-2 text-center rounded-md my-3 font-bold uppercase">
            {{ session('message') }}
        </div>
    @else
        <form class="w-96 mt-5" wire:submit.prevent="applyVacancyForm">

            <div class="mb-4">
                <x-label for="cv" :value="__('Curriculum PDF')" />
                <x-input id="cv" type="file" accept=".pdf" wire:model="cv" class="block mt-1 w-full"/>
            </div>

            @error('cv')
                <livewire:show-alert :message="$message" />
            @enderror
            
            <x-button class="my-5">
                {{ __('Postularme') }}
            </x-button>

        </form>
    @endif

    

</div>
