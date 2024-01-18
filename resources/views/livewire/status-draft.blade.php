
<div >
    <x-input-checkbox :checked="$isDone" id="is-done" />
    <x-input-label-checkbox  for="is-done"   class="btn text-capitalize" wire:click="changeStatus">
        i do it
    </x-input-label-checkbox>
</div>
