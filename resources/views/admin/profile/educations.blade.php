<div class="profile-card p-20 bg-white rad-10 mt-20">
    <h2 class="mt-0 mb-10 text-capitalize">my educations</h2>
    <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">what stages education i finished</p>

    <x-alerts.alert :success="session('success-add-education')" :fail="session('fail-add-education')"/>
    <x-alerts.alert :success="session('success-edit-education')" :fail="session('fail-edit-education')"/>
    <x-alerts.alert :success="session('success-delete-education')" :fail="session('fail-delete-education')"/>


    <div class="flex align-items-end justify-content-end mb-10">
        <x-primary-button
            x-click
            class="text-capitalize  "
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-education')"
        >
            <i class="fa fa-plus fs-15"></i>
        </x-primary-button>

        @include('admin.profile.add-education')
    </div>

    @if($admin->educations->isNotEmpty())
        <ul class="txt-c-mobile mt-6">
            @each('admin.profile.education', $admin->educations, 'education')
        </ul>
    @else
        <x-alerts.not-founded :message="'No education added yet'"/>
    @endif
</div>
