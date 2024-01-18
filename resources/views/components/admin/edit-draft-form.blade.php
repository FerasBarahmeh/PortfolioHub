@props(['draft'])

<form method="post" action="{{ route('drafts.update', $draft->id)  }}">
    @csrf @method('put')
    <input type="hidden" name="id" value="{{ $draft->id }}">
    <x-text-input name="title" class="w-full mb-20" value="{{ $draft->title }}" placeholder="Title Draft " autofocus />
    <x-textarea-input name="content" placeholder="What Do you thinking">{{ $draft->content }}</x-textarea-input>

    <div class="flex items-center gap-4 mt-10">
        <x-primary-button>{{ __('change') }}</x-primary-button>

        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('cancel') }}
        </x-secondary-button>
    </div>
</form>
