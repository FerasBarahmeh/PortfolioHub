@props([
    'message',
    'route'
])
<div class="rad-10 p-10">
    <div>
        <span class="text-capitalize">{{ $message }}</span>
        <a href="{{ route($route) }}" class="text-capitalize">{{ __('add new') }}</a>
    </div>

    <x-secondary-button x-on:click="$dispatch('close')" class="w-fit mt-10">
        {{ __('cancel') }}
    </x-secondary-button>
</div>
