<x-app-layout>
    <x-admin.title-page class="">
        <span class="text-capitalize">{{ __('projects') }}</span>
    </x-admin.title-page>


    <div class="container">
        <x-alerts.alert :success="session('success-add-project')" :fail="session('fail-add-project')"/>
    </div>
    <div class="row w-full">
        <div class="col-12  flex justify-end">
            <x-primary-button
                x-click
                class="text-capitalize"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-project')"
            >{{ __('add project') }}</x-primary-button>
        </div>
    </div>


    {{-- add project --}}
    @include('admin.projects.add-project')

    <div class="projects-page d-grid m-20 gap-20">
        @each('admin.projects.projects', $projects, 'project')
    </div>


@push('script')
        <script src="{{ asset('admin/js/upload.multi.file.js') }}"></script>
@endpush
</x-app-layout>
