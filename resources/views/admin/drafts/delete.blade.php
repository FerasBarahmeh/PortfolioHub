@props(['draft'])

<x-modal name="delete-draft_{{$draft->id}}">
    <div class="quick-draft p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10 text-capitalize">confirm message</h2>
        <p class="mt-0 mb-20 c-grey fs-15">Are you sure to delete {{ $draft->title }} draft</p>
        <form method="post" action="{{ route('drafts.destroy', $draft->id) }}">
            @csrf @method('delete')


            <div class="flex items-center gap-4 mt-10">
                <x-primary-button >{{ __('delete') }}</x-primary-button>

                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('cancel') }}
                </x-secondary-button>
            </div>
        </form>
    </div>
</x-modal>
