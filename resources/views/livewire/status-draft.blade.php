
<div >
    <x-input-checkbox :checked="$isDone" id="{{ $id }}"  />
    <x-input-label-checkbox  for="{{ $id }}"   class="text-capitalize" wire:click="changeStatus">
        completed
    </x-input-label-checkbox>
</div>
