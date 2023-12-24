<form method="post" action="{{ route('app.settings.add-domain') }}" class="">
    @csrf
    <div class="p-20 bg-white rad-10 h-full">
        @if (session('success') === 'successfully')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400 text-capitalize alert alert-success"
            >{{ __('create domain successfully.') }}</p>
        @endif

            @if (session('failed') === 'failed')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400 text-capitalize alert alert-danger"
                >{{ __('failed create domain. try later.') }}</p>
            @endif

        <h2 class="mt-0 mb-10 text-capitalize">Add domain for application </h2>
        <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">add domain for social media application</p>
        <div class="mb-15">
            <x-input-label for="domain" :value="__('domain')"/>
            <x-text-input id="domain" name="domain" type="text" class="mt-1 block w-full" required autofocus
                          autocomplete="domain"/>
            <x-input-error class="mt-2" :messages="$errors->get('domain')" />
        </div>

        <div class="mb-15">
            <x-input-label for="icon_name" :value="__('Icon name')"/>
            <x-text-input id="icon_name" name="icon_name" type="text" class="mt-1 block w-full" required
                          autocomplete="icon_name"/>
            <x-input-error class="mt-2" :messages="$errors->get('icon_name')" />
        </div>

            <div class="mb-15">
                <x-input-label for="hex_color" :value="__('hex color')"/>
                <x-text-input id="hex_color" name="hex_color" type="text" class="mt-1 block w-full"
                              placeholder="#"
                              value='#'
                              autocomplete="hex_color"/>
                <x-input-error class="mt-2" :messages="$errors->get('hex_color')" />
            </div>


            {{-- Save --}}
        <div class="flex items-center gap-4 mt-10">
            <x-primary-button>{{ __('add') }}</x-primary-button>
        </div>
    </div>

</form>
