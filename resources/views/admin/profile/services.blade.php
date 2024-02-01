<div class=" profile-card p-20 bg-white rad-10 mt-20" id="services">
    <x-admin.widget-title>services</x-admin.widget-title>
    <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">the services i can provide </p>


    <x-alerts.alert :success="session('success-add-service')" :fail="session('fail-add-service') "/>
    <x-alerts.alert :success="session('success-delete-service')" :fail="session('fail-delete-service') "/>
    <x-alerts.alert :success="session('success-edit-service')" :fail="session('fail-edit-service') "/>

    <div class="flex align-items-end justify-content-end mb-10">
        <x-primary-button
            x-click
            class="text-capitalize  "
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-service')"
        >
            <i class="fa fa-plus fs-15"></i>
        </x-primary-button>

        @include('admin.profile.add-service', ['domains' => $domains])
    </div>

    @if ($admin->services->isNotEmpty() )
        @each('admin.profile.service', $admin->services, 'service')
    @else
        <x-alerts.not-founded :message="'No services added  yet'" />
    @endif

</div>
