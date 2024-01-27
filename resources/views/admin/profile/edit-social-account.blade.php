
<x-modal name="edit_account_{{ $account->id }}">
    <div class="quick-draft p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10 c-grey text-capitalize">edit {{ $account->domain->domain }} username  </h2>
{{--        <p class="mt-0 mb-20 c-grey fs-15">Write A Draft For Your Ideas</p>--}}

        <form method="post" action="{{ route('social.account.store') }}" class="w-full mt-6 d-flex justify-between relative flex gap-1">
            @csrf

            <input type="hidden" name="domain_id" value="{{ $account->domain->id }}">

            <div class="d-flex align-center flex-1">
                <i class="fa-brands fa-{{ $account->domain->icon_name }} center-flex c-white w-16 h-full " style="background-color: {{ $account->domain->hex_color }}"></i>
                <x-input-label for="username_account"  />
                <x-text-input id="username_account" name="username_account" type="text" class="w-full" :value="old('username_account', $account->username_account ?? '')" required autofocus placeholder="{{  $account->domain->domain }}" autocomplete="username_account" />
                <x-input-error class="mt-2" :messages="$errors->get('username_account')" />
            </div>

            <div class="flex align-center ">
                <x-primary-button class="text-capitalize">
                    {{ __('edit') }}
                </x-primary-button>
            </div>
        </form>

        <x-secondary-button x-on:click="$dispatch('close')" class="mt-10">
            {{ __('cancel') }}
        </x-secondary-button>
    </div>

</x-modal>
