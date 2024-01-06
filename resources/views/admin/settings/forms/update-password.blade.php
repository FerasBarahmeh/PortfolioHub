<form method="post" action="{{ route('password.update') }}" class="w-full">
    @csrf
    @method('put')
    <div class="p-20 bg-white rad-10 h-full">

        <x-alerts.alert :success="session('password-updated') "/>

        <h2 class="mt-0 mb-10 text-capitalize">main info</h2>
        <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">update your account's profile information and email
            address.</p>

        <div class="mb-15">
            <x-input-label for="update_password_current_password" :value="__('Current Password')"/>
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                          class="mt-1 block w-full" autocomplete="current-password"/>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>
        </div>

        <div class="mb-15">
            <x-input-label for="update_password_password" :value="__('New Password')"/>
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                          autocomplete="new-password"/>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2"/>
        </div>

        <div class="mb-15">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')"/>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                          class="mt-1 block w-full" autocomplete="new-password"/>
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>

    </div>

</form>
