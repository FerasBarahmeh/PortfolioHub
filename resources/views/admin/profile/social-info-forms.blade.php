
<div class="profile-card social-boxes p-20 bg-white rad-10 mt-20">
    <h2 class="mt-0 mb-10 text-capitalize">social Info</h2>
    <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">social media information</p>

    <x-alerts.alert :success="session('success')" :fail="session('fail')" :showTime="4000"/>


    @foreach($domains as $key => $domain)

        <form method="post" action="{{ route('profile.change.social.account') }}" class="w-full mt-6 d-flex justify-between relative ">
            @csrf
            @method('put')

            <div class="d-flex align-center flex-1">
                <i class="fa-brands fa-{{ $domain->icon_name }} center-flex c-white w-16 h-full " style="background-color: {{ $domain->hex_color }}"></i>
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
