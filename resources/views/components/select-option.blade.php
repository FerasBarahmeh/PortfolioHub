@props(['disabled' => false])

<option {!! $attributes->merge(['disabled' => $disabled]) !!}>{{ $slot }}</option>

