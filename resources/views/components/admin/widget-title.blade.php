@props([
    'icon',
])
<h2 class="mt-0 mb-10 flex gap-10 align-items-center pb-10 text-capitalize">
    <i class="{{ $icon }}" ></i>
    {{ $slot }}
</h2>
