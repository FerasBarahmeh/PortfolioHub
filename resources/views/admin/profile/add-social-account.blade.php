<x-modal name="add-account" class="relative">
    <x-close-button x-on:click="$dispatch('close')" class="position-absolute right-0 p-10"/>
    <div class="p-20 bg-white rad-10">

        <h2 class="mt-0 mb-10 text-capitalize">add new account</h2>
        <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">all application available</p>

        @if($domains->isNotEmpty())
            @foreach($domains as $key => $domain)

                <form method="post" action="{{ route('social.account.store') }}"
                      class="w-full mt-6 d-flex justify-between relative ">
                    @csrf

                    <div class="d-flex align-center flex-1">
                        <i class="fa-brands fa-{{ $domain->icon_name }} center-flex c-white w-16 h-full "
                           style="background-color: {{ $domain->hex_color }}"></i>
                        <x-input-label for="username_account"/>
                        <x-text-input id="username_account" name="username_account" type="text" class="w-full"
                                      :value="old('username_account', $accounts[$key]->username_account ?? '')" required
                                      autofocus placeholder="{{  $domain->domain }}" autocomplete="username_account"/>

                        <input type="hidden" name="domain_id" value="{{ $domain->id }}">
                    </div>

                    {{-- Save --}}
                    <div class="flex align-center m-1">
                        <x-primary-button class="text-capitalize">{{ __('change') }}</x-primary-button>
                    </div>
                </form>

                <x-input-error class="mt-2" :messages="$errors->get('username_account')"/>

            @endforeach
        @else
            <x-admin.box-adjuster :message="'can\'t add account before add domain'" :route="'app.settings.index'"/>
        @endif
    </div>
</x-modal>
