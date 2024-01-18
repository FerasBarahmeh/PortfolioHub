<x-app-layout>
    @section('title', 'Settings')

    <x-slot name="slot" >

        <x-admin.title-page> Settings </x-admin.title-page>

        <div class="settings-page m-20 d-grid gap-20">
            {{-- Start Settings Box --}}

            @include('admin.settings.forms.main-info-form')

            {{-- End Settings Box --}}

            {{-- Start Settings Box --}}

            @include('admin.settings.forms.supplementary-info-form')

            {{-- End Settings Box --}}

            {{-- Start Settings Box --}}

            @include('admin.settings.forms.update-password')

            {{-- End Settings Box --}}

            {{-- Start Settings Box --}}

            @include('admin.settings.forms.delete-admin-form')

            {{-- End Settings Box --}}
        </div>

    </x-slot>
</x-app-layout>
