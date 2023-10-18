<select {{ $attributes->merge($defaultAttributes) }}>
    @if ($placeholder)
        <option
            value=""
            disabled
            @selected($value === null || $value === '')>
            {{ $placeholder }}
        </option>
    @endif
    @if ($slot->isEmpty() && $options)
        @foreach ($options as $k => $v)
            <option
                value="{{ $k }}"
                @selected($isSelected($k))>
                {{ $v }}
            </option>
        @endforeach
    @else
        {{ $slot }}
    @endif
</select>
