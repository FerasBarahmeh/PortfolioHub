<form method="post" action="{{ route('settings.update.supplementary.info') }}" class="">
    @csrf
    @method('patch')
    <div class="p-20 bg-white rad-10 h-full">

        @if (session('status') === 'supplementary-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400 text-capitalize alert alert-success"
            >{{ __('successfully update.') }}</p>
        @endif

        <h2 class="mt-0 mb-10 text-capitalize">{{ __('supplementary Information') }}</h2>
        <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">update your supplementary information.</p>
        <div class="mb-15">
            <x-input-label for="job_title" :value="__('job title')"/>
            <x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full"
                          :value="old('job_title', $admin->supplementaryInfo->job_title)" required autofocus
                          autocomplete="job title"/>
            <x-input-error class="mt-2" :messages="$errors->get('job_title')"/>
        </div>

        <div class="mb-15">
            <x-input-label for="phone" :value="__('phone')"/>
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                          :value="old('phone', $admin->supplementaryInfo->phone)" required autofocus
                          autocomplete="phone"/>
            <x-input-error class="mt-2" :messages="$errors->get('phone')"/>
        </div>

        <div>
            <x-input-label for="BOD" :value="__('BOD')"/>
            <x-text-input id="BOD" name="BOD" type="text" class="mt-1 block w-full"
                          :value="old('BOD', $admin->supplementaryInfo->BOD)" required autofocus autocomplete="BOD"
                          placeholder="Y-m-d"/>
            <x-input-error class="mt-2" :messages="$errors->get('BOD')"/>
        </div>

        <div>
            <x-input-label for="location" :value="__('location')"/>
            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
                          :value="old('location', $admin->supplementaryInfo->location)" required autofocus
                          autocomplete="location"/>
            <x-input-error class="mt-2" :messages="$errors->get('location')"/>
        </div>

        <div>
            <x-input-label for="about" :value="__('about')"/>
            <x-textarea-input id="about" name="about" class="w-full" rows="5" required autofocus
                              autocomplete="about">{{ old('about', $admin->supplementaryInfo->about) }}</x-textarea-input>
            <x-input-error class="mt-2" :messages="$errors->get('about')"/>
        </div>
        {{-- Save --}}

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('save') }}</x-primary-button>
        </div>
    </div>

</form>
