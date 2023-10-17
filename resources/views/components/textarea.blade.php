<textarea {{ $attributes->merge($defaultAttributes) }}>{{ $slot->isNotEmpty() ? $slot : $attributes->get('value', '') }}</textarea>
