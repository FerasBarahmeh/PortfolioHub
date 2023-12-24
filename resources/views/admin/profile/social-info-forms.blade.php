
<div class="social-boxes p-20 bg-white rad-10 mt-20">
    <h2 class="mt-0 mb-10">Social Info</h2>
    <p class="mt-0 mb-20 c-grey fs-15">Social Media Information</p>


    @php
        $alertType = session('fail') ? 'danger' : (session('success') ? 'success' : '');
    @endphp

    @if ($alertType)
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400 text-capitalize alert alert-{{ $alertType }}"
        >{{ __('successfully update.') }}</p>
    @endif



    @foreach($domains as $key => $domain)

        <form method="post" action="{{ route('profile.change.social.account') }}" class="w-full mt-6 d-flex justify-between relative ">
            @csrf
            @method('put')

            <div class="d-flex align-center flex-1">

                <i class="fa-brands fa-{{ $domain->icon_name }} center-flex c-grey  text-bg-{{ $accounts[$key]->active ? 'success' : 'danger' }}"></i>
                <x-input-label for="username_account"  />
                <x-text-input id="username_account" name="username_account" type="text" class="w-full" :value="old('username_account', $accounts[$key]->username_account ?? '')" required autofocus placeholder="{{  $domain->domain }}" autocomplete="username_account" />

                <input type="hidden" name="domain_id" value="{{ $domain->id }}">
            </div>

            {{-- Save --}}
            <div class="flex align-center ">
                <button type="submit">{{ __('change') }}</button>
            </div>
        </form>

        <x-input-error class="mt-2" :messages="$errors->get('username_account')" />

    @endforeach

</div>
