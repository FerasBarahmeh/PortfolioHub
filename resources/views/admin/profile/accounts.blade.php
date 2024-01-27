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
