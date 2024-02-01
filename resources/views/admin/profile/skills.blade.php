<div class="profile-card p-20 bg-white rad-10 mt-20">
    <x-admin.widget-title>skills</x-admin.widget-title>
    <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">complete skills list</p>


    <x-alerts.alert :success="session('success-edit-skill')" :fail="session('fail-edit-skill') "/>
    <x-alerts.alert :success="session('success-delete-skill')" :fail="session('fail-delete-skill') "/>
    <x-alerts.alert :success="session('success-add-skill')" :fail="session('fail-add-skill') "/>

    <div class="flex align-items-end justify-content-end mb-10">
        <x-primary-button
            x-click
            class="text-capitalize  "
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-skill')"
        >
            <i class="fa fa-plus fs-15"></i>
        </x-primary-button>

        @include('admin.profile.add-skill')
    </div>


    @if ($admin->skills->isNotEmpty())
        <div class="flex flex-wrap mt-20 gap-10">
            @each('admin.profile.skill', $admin->skills, 'skill')
        </div>
    @else
        <x-alerts.not-founded :message="'No skills added yet'"/>
    @endif

</div>
