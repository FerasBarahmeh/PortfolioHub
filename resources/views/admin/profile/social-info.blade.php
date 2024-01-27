<div class="profile-card social-boxes p-20 bg-white rad-10 mt-20">
    <h2 class="mt-0 mb-10 text-capitalize">social Info</h2>
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

    @foreach($accounts as $account)

        <div class="flex align-center flex-1 gap-1 mb-3">
            <i class="fa-brands fa-{{ $account->domain->icon_name }} center-flex c-white w-16 h-full p-15"
               style="background-color: {{ $account->domain->hex_color }}"></i>
            <div class="content flex  w-100 align-items-center">

                <div
                    class="name flex-1 text-white p-10" @style(['opacity: .5; background-color: ' . $account->domain->hex_color])>
                    <a href="https://twitter.com/{{ $account->username_account }}"
                       class="w-full">{{$account->username_account}}</a>
                </div>

                <div class="options flex gap-1 p-10">
                    <x-primary-button
                        x-click
                        class="text-capitalize bg-transparent "
                        @style(['border: none !important;  padding: 0px !important; '])
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'edit_account_{{ $account->id }}')"
                    >
                        <i class="fa fa-edit text-success fs-15"></i>
                    </x-primary-button>

                    <x-danger-button
                        x-click
                        class="text-capitalize bg-transparent "
                        @style(['border: none !important;  padding: 0px !important; '])
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'delete_account_{{ $account->id }}')"
                    >
                        <i class="fa fa-trash text-danger fs-15"></i>
                    </x-danger-button>

                </div>
            </div>
        </div>

        @include('admin.profile.edit-social-account', ['account' => $account])
        @include('admin.profile.delete-social-account', ['account' => $account])
    @endforeach

</div>
