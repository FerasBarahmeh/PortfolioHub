@php use Illuminate\Support\Carbon; @endphp
<div class="bg-white rad-10 txt-c-mobile block-mobile relative" >
    <div class="bg-white shadow-md">
        <div class="bg-grey-lightest border-b p-4 w-full flex justify-content-between align-center" >
            <div class="left-0 mr-2 text-sm text-grey-darkest">{{ $post->title }}</div>
            <div class="text-grey text-xs">{{Carbon::parse($post->created_at)->locale(app()->getLocale())->format('l, g:i A') }}</div>
        </div>



        <div class="p-4 leading-normal flex justify-content-center align-center" @style(['height: 400px; '])>
                <img src="{{ Storage::url($post->images->random()->url) }}"  class="h-full" alt="layout image"/>
        </div>

        <div class="bg-grey-lightest border-t p-4 text-sm text-right flex justify-start flex-row-reverse align-center">
            <x-danger-button
                x-click
                class="text-capitalize"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'delete-post_{{ $post->id }}')"
            >{{ __('delete') }}</x-danger-button>

            <div class="w-full flex justify-content-between align-items-center">

                <div class="writer flex gap-1">
                    <span class="text-sm c-grey">created by: </span>
                    <span>{{ $post->admin->username }}</span>
                </div>

                <div class="">
                    <x-primary-a href="{{ route('posts.edit', $post->id) }}" class="btn btn-dark p-1 text-capitalize text-xs">read</x-primary-a>
                    <x-primary-a href="{{ route('posts.edit', $post->id) }}" class="btn btn-dark p-1 text-capitalize text-xs">edit post</x-primary-a>
                </div>



            </div>

            @include('admin.posts.delete', ['post' => $post])

        </div>
    </div>
</div>
