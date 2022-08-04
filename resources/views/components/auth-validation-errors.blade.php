@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>

        <ul class="mt-3 list-none text-sm space-y-2">
            @foreach ($errors->all() as $error)
                <li class="border border-red-600 text-red-600 p-2 text-center rounded-md">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
