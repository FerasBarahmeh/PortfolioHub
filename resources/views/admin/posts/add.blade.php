<x-app-layout>

    @section('title', 'Add Post')
    <x-admin.title-page class="">
        <span class="text-capitalize">{{ __('add post') }}</span>
    </x-admin.title-page>


    <div class="container">
        <x-alerts.alert :success="session('success-add-post')" :fail="session('fail-add-post')"/>
        <x-alerts.alert :success="session('success-delete-post')" :fail="session('fail-delete-post')"/>
        <x-alerts.alert :success="session('success-edit-post')" :fail="session('fail-delete-post')"/>
    </div>

    <div class="container">

        <form method="post" action="{{ route('drafts.store')}}" enctype="multipart/form-data">
            @csrf

            <x-text-input name="title" class="w-full mb-20" placeholder="Title Post " autofocus/>
            <x-text-editor />

            <div class="flex items-center gap-4 mt-10">
                <x-primary-button>{{ __('share') }}</x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
