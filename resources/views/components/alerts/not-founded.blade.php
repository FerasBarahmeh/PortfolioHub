@props([
    'message' => '',
    'maxWidth' => '100px',
    'maxHigh' => '100px',
])
<div class="flex flex-col w-full justify-content-center align-items-center">
    <img src="{{ asset('app/null.png') }}" alt="Null Image" @style(['max-width: '.$maxWidth.'; max-height:  ' . $maxHigh.';'])>
    <span class="w-full text-center c-grey">{{ $message }}</span>
</div>
