@props(['selected' => false])

<option {!! $attributes->merge(['class' => '']) !!} {{ $selected ? 'selected' : '' }}>{{ $slot }}</option>

