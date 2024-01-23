@php use Illuminate\Support\Carbon; @endphp
<div class="bg-white rad-10 txt-c-mobile block-mobile relative" >
    <div class="bg-white shadow-md">
        <div class="bg-grey-lightest border-b p-4 flex items-center" >
            <div
                class="flex-1 text-grey text-xs">{{Carbon::parse($post->created_at)->locale(app()->getLocale())->format('l, g:i A') }}</div>
            <div class="mr-2 text-sm text-grey-darkest">{{ $post->title }}</div>
            <img class="rounded-full w-8 h-8" alt="Me"
                 src="{{ asset('admin/images/avatar.png') }}"/>
        </div>

        <div class="p-4 leading-normal">
            <p>{!! $post->content !!}</p>
        </div>

        <div class="bg-grey-lightest border-t p-4 text-sm text-right flex justify-start flex-row-reverse align-center">
            <x-danger-button
                x-click
                class="text-capitalize"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'delete-post_{{ $post->id }}')"
            >{{ __('delete') }}</x-danger-button>

            <div class="row w-full">

                <div class="col-12  flex justify-end">
                    <x-primary-a href="{{ route('posts.edit', $post->id) }}" class="btn btn-dark p-1 text-capitalize text-xs">edit post</x-primary-a>
                </div>
            </div>

            @include('admin.posts.delete', ['post' => $post])

        </div>
    </div>
</div>
