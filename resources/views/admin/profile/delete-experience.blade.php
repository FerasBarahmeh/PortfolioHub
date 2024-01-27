
<x-modal name="delete_experience_{{ $experience->id }}" class="relative">
    <x-close-button x-on:click="$dispatch('close')" class="position-absolute right-0 p-10" />
    <div class="p-20 bg-white rad-10">

        <h2 class="mt-0 mb-10 text-capitalize">add new experience</h2>
        <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">add another experience to attention your audience</p>

        <form action="{{ route('experience.destroy') }}" method="post" class="d-flex justify-between w-full px-1">
            @csrf @method('delete')
            <input type="hidden" name="id" value="{{ $experience->id }}">
            <x-danger-button>{{ __('delete') }}</x-danger-button>
        </form>
    </div>
</x-modal>
