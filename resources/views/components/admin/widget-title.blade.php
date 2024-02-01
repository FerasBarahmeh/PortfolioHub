@props([
    'icon' => '',
    'sizeIcon' => '',
])
<h2 class="mt-0 mb-10 flex gap-10 align-items-center pb-10 text-capitalize" @style(['font-size: 20px;'])>
    <i class="{{ $icon }} {{ $sizeIcon }}" ></i>
    {{ $slot }}
</h2>
