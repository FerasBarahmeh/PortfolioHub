
<x-app-layout>
    @section('title', 'Drafts')
    <x-admin.title-page class="">
        <span class="text-capitalize">{{ __('posts') }}</span>
    </x-admin.title-page>


    <div class="container">
        <x-alerts.alert :success="session('success-add-post')" :fail="session('fail-add-post')"/>
        <x-alerts.alert :success="session('success-delete-post')" :fail="session('fail-delete-post')"/>
        <x-alerts.alert :success="session('success-edit-post')" :fail="session('fail-delete-post')"/>
    </div>
    <div class="row w-full">
        <div class="col-12  flex justify-end">
            <a href="{{ route('posts.create') }}" class="btn btn-dark">add post</a>

        </div>

    </div>

{{--    @include('admin.posts.add')--}}

    <div class=" wrapper d-grid gap-10 mt-20">
{{--        @each('admin.posts.posts', $posts, 'post')--}}
    </div>

</x-app-layout>
