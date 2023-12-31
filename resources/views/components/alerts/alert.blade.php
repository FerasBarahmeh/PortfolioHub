@props([
    'success' => null,
    'fail' => null,
    'type' => null,
    'showTime' => 2000,
])

@php

    $scroll = $success != null || $fail != null;

    if ($success !=null)
        $type = 'success';
    elseif ($fail != null)
        $type = 'danger';
@endphp

@if(isset($success) || isset($fail))
    <p
        id="alert"
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, {{ $showTime }})"
        class="text-sm text-gray-600 dark:text-gray-400 text-capitalize alert alert-{{ $type }}"
    >{{ $success ?? $fail }}</p>
@endif

<script>

    if (@js($scroll)) {
        let message = document.getElementById('alert');
        message.scrollIntoView({
            behavior: 'smooth',
            block: 'start',
            inline: 'nearest',
        });
    } else {
        console.log("Not Scroll")
    }

</script>
