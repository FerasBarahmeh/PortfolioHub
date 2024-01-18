
<x-app-layout>
    @section('title', 'Drafts')
    <x-admin.title-page class="">
        <span class="text-capitalize">{{ __('Drafts') }}</span>
    </x-admin.title-page>


    <div class="container">
        <x-alerts.alert :success="session('success-add-draft')" :fail="session('fail-add-draft')"/>
        <x-alerts.alert :success="session('success-delete-draft')" :fail="session('fail-delete-draft')"/>
        <x-alerts.alert :success="session('success-edit-draft')" :fail="session('fail-delete-draft')"/>
    </div>
    <div class="row w-full">
        <div class="col-12  flex justify-end">
            <x-primary-button
                x-click
                class="text-capitalize"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-draft')"
            >{{ __('add Draft') }}</x-primary-button>

        </div>

    </div>

    @include('admin.drafts.add')

    <div class=" wrapper d-grid gap-10 mt-20">
        @each('admin.drafts.drafts', $drafts, 'draft')
    </div>

</x-app-layout>
