<x-app-layout>
    @section('title', 'Edit Post ' . $post->title)
    <x-admin.title-page class="">
        <span class="text-capitalize">{{ __('edit post ' . $post->title) }}</span>
    </x-admin.title-page>


    <div class="container">

        <div class="row w-full mb-15">
            <div class="col-12  flex justify-end">
                <a href="{{ route('posts.index') }}" class="btn btn-dark text-capitalize">posts</a>
            </div>
        </div>

        <form method="post" action="{{ route('posts.update', $post->id)}}" enctype="multipart/form-data">
            @csrf @method('put')

            <div class="mb-15">
                <x-text-input name="title" value="{{ old('title', $post->title) }}" class="w-full mb-20" placeholder="Title Post " autofocus/>
                <x-input-error :messages="$errors->get('title')" class="mt-2"/>
            </div>

            <div class="mb-15">

                <x-textarea-input name="brief"  class="w-full mb-20" placeholder="Brief">{{ old('brief', $post->brief) }}</x-textarea-input>
                <x-input-error :messages="$errors->get('brief')" class="mt-2"/>

            </div>

            <div class="mb-15">

                <x-text-editor :namespace="\App\Models\Post::class" :name="'content'" > {!! old('content', $post->content) !!} </x-text-editor>
                <x-input-error :messages="$errors->get('content')" class="mt-2"/>

            </div>

            <div class="flex items-center gap-4 mt-10 mb-10">
                <x-primary-button>{{ __('Edit') }}</x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
