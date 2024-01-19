@php use Illuminate\Support\Carbon; @endphp
<div class="bg-white rad-10 txt-c-mobile block-mobile draft {{ $draft->is_done ? 'check' : '' }} relative" >
    <div class="bg-white shadow-md">
        <div class="bg-grey-lightest border-b p-4 flex items-center" >
            <div
                class="flex-1 text-grey text-xs">{{Carbon::parse($draft->created_at)->locale(app()->getLocale())->format('l, g:i A') }}</div>
            <div class="mr-2 text-sm text-grey-darkest">{{ $draft->title }}</div>
            <img class="rounded-full w-8 h-8" alt="Me"
                 src="{{ asset('admin/images/avatar.png') }}"/>
        </div>

        <div class="p-4 leading-normal">
            <p>{{ $draft->content }}</p>
        </div>

        <div class="bg-grey-lightest border-t p-4 text-sm text-right flex justify-start flex-row-reverse align-center">

            <x-danger-button
                x-click
                class="text-capitalize"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'delete-draft_{{ $draft->id }}')"
                >{{ __('delete') }}</x-danger-button>
            <x-primary-button
                x-click
                class="text-capitalize"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'edit-draft_{{$draft->id}}')"
            >{{ __('edit') }}</x-primary-button>
            <livewire:status-draft :isDone="$draft->is_done" :id="$draft->id"/>

            @include('admin.drafts.edit', ['draft' => $draft])
            @include('admin.drafts.delete', ['draft' => $draft])

        </div>
    </div>
</div>
