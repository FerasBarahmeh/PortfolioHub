<div class="profile-card social-boxes p-20 bg-white rad-10 mt-20">
    <x-admin.widget-title>social information</x-admin.widget-title>
    <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">social media information</p>

    <x-alerts.alert :success="session('success-add-account')" :fail="session('fail-add-account')" :s howTime="4000"/>
    <x-alerts.alert :success="session('success-edit-account')" :fail="session('fail-edit-account')" :showTime="4000"/>
    <x-alerts.alert :success="session('success-delete-account')" :fail="session('fail-delete-account')"
                    :showTime="4000"/>


    <div class="flex align-items-end justify-content-end mb-10">
        <x-primary-button
            x-click
            class="text-capitalize  "
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'add-account')"
        >
            <i class="fa fa-plus fs-15"></i>
        </x-primary-button>

        @include('admin.profile.add-social-account', ['domains' => $domains])
    </div>


    @if($admin->accounts->isNotEmpty())
        @each('admin.profile.accounts', $admin->accounts, 'account')
    @else
        <x-alerts.not-founded :message="'No accounts added yet'"/>
    @endif

</div>
