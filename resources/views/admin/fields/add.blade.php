<x-modal name="add-field">
    <div class="quick-draft p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10">Field</h2>
        <p class="mt-0 mb-20 c-grey fs-15">Write A name filed</p>

        <form method="post" action="{{ route('fields.store')}}">
            @csrf

            <x-input-label class="mb-2" :value="'name field'"/>
            <x-text-input name="name" class="w-full mb-20" autofocus :value="old('name', '')"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>

            <div class="flex items-center gap-4 mt-10">
                <x-primary-button>{{ __('add') }}</x-primary-button>
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('cancel') }}
                </x-secondary-button>
            </div>
        </form>
    </div>
</x-modal>
