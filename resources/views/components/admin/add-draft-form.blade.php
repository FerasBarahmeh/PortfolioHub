@props([
    'cancelBtn' => true,
])
<form method="post" action="{{ route('drafts.store')}}">
    @csrf

    <x-text-input name="title" class="w-full mb-20" placeholder="Title Draft " autofocus/>
    <x-textarea-input name="content" placeholder="What Do you thinking"/>

    <div class="flex items-center gap-4 mt-10">
        <x-primary-button>{{ __('add') }}</x-primary-button>

        @if($cancelBtn)
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('cancel') }}
            </x-secondary-button>
        @endif
    </div>
</form>
