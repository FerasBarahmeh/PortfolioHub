@php use Illuminate\Support\Carbon; @endphp
<div class="bg-white rad-10 txt-c-mobile block-mobile" >
    <div class="bg-white shadow-md">
        <div class="bg-grey-lightest border-b p-4 flex items-center" >
            <div
                class="flex-1 text-grey text-xs">{{Carbon::parse($field->created_at)->locale(app()->getLocale())->format('l, g:i A') }}</div>
            <div class="mr-2 text-sm text-grey-darkest">{{ $field->title }}</div>
            <img class="rounded-full w-8 h-8" alt="Me"
                 src="{{ asset('admin/images/avatar.png') }}"/>
        </div>

        <div class="p-4 leading-normal">
            <p>{{ $field->name }}</p>
        </div>

        <div class="bg-grey-lightest border-t p-4 text-sm text-right flex justify-start flex-row-reverse align-center">

            <x-danger-button
                x-click
                class="text-capitalize"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'delete-field_{{ $field->id }}')"
                >{{ __('delete') }}</x-danger-button>
            <x-primary-button
                x-click
                class="text-capitalize"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'edit-field_{{$field->id}}')"
            >{{ __('edit') }}</x-primary-button>

            @include('admin.fields.edit', ['field' => $field])
            @include('admin.fields.delete', ['field' => $field])

        </div>
    </div>
</div>
