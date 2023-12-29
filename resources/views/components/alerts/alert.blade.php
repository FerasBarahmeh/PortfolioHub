@props([
    'success',
    'fail',
    'type' => null,
    'showTime' => 2000,
])

@if ($success != null)
    {{ $type = 'success' }}
@elseif($fail != null)
    {{ $type = 'danger' }}
@endif

@if(isset($success) || isset($fail))
    <p
        x-data="{ show: true }"
        x-show="show"
        x-transition
        x-init="setTimeout(() => show = false, {{ $showTime }})"
        class="text-sm text-gray-600 dark:text-gray-400 text-capitalize alert alert-{{ $type }}"
    >{{ $success }}</p>
@endif
