<form class="md:w-1/2 space-y-5" wire:submit.prevent="editVacancy">

    <div>
        <x-label for="title" :value="__('Título de la vacante')" />

        <x-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" 
                placeholder="Ejemplo: Desarrollador FullStack"/>

        @error('title')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <div>
        <x-label for="salary" :value="__('Salario Mensual')" />

        <select id="salary" wire:model="wage_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option> Selecciona </option>
            @forelse ($wages as $wage)
                <option value="{{ $wage->id }}"> {{ $wage->wage }} </option>
            @empty
            <option> Selecciona </option>
            @endforelse
        </select>

        @error('salary')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>

    <div>
        <x-label for="category" :value="__('Categoría')" />

        <select id="category" wire:model="category_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option> Selecciona </option>
            @forelse ($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->category }} </option>
            @empty
            <option> Selecciona </option>
            @endforelse
        </select>

        @error('category')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>

    <div>
        <x-label for="company" :value="__('Empresa')" />

        <x-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')" 
                placeholder="Nombre de tu empresa"/>
        
        @error('company')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>

    <div>
        <x-label for="last_day" :value="__('Último día para postularse')" />

        <x-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')"/>

        @error('last_day')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>

    <div>
        <x-label for="description" :value="__('Descripción del puesto')" />

        <textarea id="description" wire:model="description" :value="old('description')"
        placeholder="Descripción general del puesto"
        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-40"></textarea>

        @error('description')
            <livewire:show-alert :message="$message" />
        @enderror

    </div>

    <div>
        <x-label for="image" :value="__('Imagen')" />

        <x-input id="image" class="block mt-1 w-full" type="file" wire:model="new_image" accept="image/*"/>

        <div class="my-5 w-96">
            <x-label :value="__('Imagen actual')" />
            <img src="{{ asset('storage/vacancies/' . $image) }}" alt="{{ $title }}">
        </div>

        <div class="my-5 w-96">
            @if ( $new_image )
            <p> Imagen Nueva: </p>
                <img src="{{ $new_image->temporaryUrl() }}" alt="preview"/>
            @endif
        </div>

        @error('new_image')
            <livewire:show-alert :message="$message" />
        @enderror
    </div>

    <x-button>
        Actualizar 
    </x-button>

</form>