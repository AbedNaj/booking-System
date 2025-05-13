<div>
    @php
    $statusEnum = $enumClass::tryFrom($value);
@endphp
    <label class="block mb-1 text-gray-500 text-sm uppercase tracking-wider">{{ $slot }}
        :</label>
@if ($statusEnum)
    <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded bg-{{ $statusEnum->color() }}-100 text-{{ $statusEnum->color() }}-800">
        {{ $statusEnum->label() }}
    </span>
@else
    {{ $value }}
@endif

</div>