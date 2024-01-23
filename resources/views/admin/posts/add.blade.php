<x-app-layout>

    @section('title', 'Add Post')
    <x-admin.title-page class="">
        <span class="text-capitalize">{{ __('add post') }}</span>
    </x-admin.title-page>


    <div class="container">

        <div class="row w-full mb-15">
            <div class="col-12  flex justify-end">
                <a href="{{ route('posts.index') }}" class="btn btn-dark text-capitalize">posts</a>
            </div>
        </div>

        <form method="post" action="{{ route('posts.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="mb-10">
                <x-text-input name="title" class="w-full mb-20" placeholder="Title Post " autofocus/>
                <x-input-error :messages="$errors->get('title')" class="mt-2"/>
            </div>

            <div class="mb-10">
                <x-textarea-input name="brief" class="w-full mb-20" placeholder="Brief"/>
                <x-input-error :messages="$errors->get('brief')" class="mt-2"/>
            </div>

            <div class="mb10">
                <x-text-editor :namespace="\App\Models\Post::class" :name="'content'" />
                <x-input-error :messages="$errors->get('content')" class="mt-2"/>
            </div>

            <div class="flex items-center gap-4 mt-10">
                <x-primary-button>{{ __('share') }}</x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
