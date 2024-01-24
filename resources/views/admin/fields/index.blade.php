<x-app-layout>
    @section('title', 'Fields')
    <x-admin.title-page class="">
        <span class="text-capitalize">{{ __('Fields') }}</span>
    </x-admin.title-page>

    <div class="container">
        <x-alerts.alert :success="session('success-add-field')" :fail="session('fail-add-field')"/>
        <x-alerts.alert :success="session('success-delete-field')" :fail="session('fail-delete-field')"/>
        <x-alerts.alert :success="session('success-edit-field')" :fail="session('fail-edit-field')"/>
    </div>

    <div class="row w-full">
        <div class="col-12  flex justify-end">
            <x-primary-button
                x-click
                class="text-capitalize"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-field')"
            >{{ __('add field') }}</x-primary-button>
        </div>
    </div>


    <div class="container mt-10">
        <x-alerts.errors />
    </div>


    @include('admin.fields.add')

    <div class=" wrapper d-grid gap-10 mt-20">
        @each('admin.fields.fields', $fields, 'field')
    </div>

</x-app-layout>
