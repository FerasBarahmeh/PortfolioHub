
<x-modal name="delete-field_{{ $field->id }}">
    <div class="quick-draft p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10">Field</h2>
        <p class="mt-0 mb-20 c-grey fs-15">delete {{ $field->name }} filed</p>

        <form method="post" action="{{ route('fields.delete', $field->id)}}">
            @csrf @method('delete')

            <p>are you sure you want delete {{ $field->name }} field</p>

            <div class="flex items-center gap-4 mt-10">
                <x-primary-button>{{ __('delete') }}</x-primary-button>
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('cancel') }}
                </x-secondary-button>
            </div>
        </form>
    </div>
</x-modal>
