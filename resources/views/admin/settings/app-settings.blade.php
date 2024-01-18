<x-app-layout>
    @section('title', 'App Settings')
    <x-slot name="slot" >

        <x-admin.title-page>App Settings </x-admin.title-page>

        <div class="settings-page m-20 d-grid gap-20">


            {{-- Start Settings Box --}}

            @include('admin.settings.forms.add-domains-social-media')

            {{-- End Settings Box --}}

        </div>

    </x-slot>
</x-app-layout>
