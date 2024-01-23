
<x-app-layout>
    @section('title', 'Posts')
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

            <x-primary-a href="{{ route('posts.create') }}" >add post</x-primary-a>
        </div>

    </div>

    <div class=" wrapper d-grid gap-10 mt-20">
        @each('admin.posts.posts', $posts, 'post')
    </div>

</x-app-layout>
