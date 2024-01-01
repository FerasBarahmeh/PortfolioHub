@props(['checked' => false])
<input

    {!! $attributes->merge([
        'type' => 'checkbox',
        'class' => 'appearance-none opacity-0',
         'checked' => $checked,
    ]) !!}
/>
