@props(['selected' => false])

<option {!! $attributes->merge([]) !!} {{ $selected ? 'selected' : '' }}>{{ $slot }}</option>

