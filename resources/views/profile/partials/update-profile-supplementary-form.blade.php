<section>

    @if (session('status') === 'supplementary')
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400 text-capitalize alert alert-success"
        >{{ __('successfully update.') }}</p>

    @endif

    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-capitalize">
            {{ __('supplementary Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 text-capitalize">
            {{ __("update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('supplementary.update') }}" class="w-full mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-6">
                <x-input-label for="job_title" :value="__('job title')" />
                <x-text-input id="job_title" name="job_title" type="text" class="mt-1 block w-full" :value="old('job_title', $admin->supplementaryInfo->job_title)" required autofocus autocomplete="job title" />
                <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
            </div>

            <div class="col-6">
                <x-input-label for="phone" :value="__('phone')" />
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $admin->supplementaryInfo->phone)" required autofocus autocomplete="phone" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

        </div>

        <div class="row">
            <div class="col-6">
                <x-input-label for="BOD" :value="__('BOD')" />
                <x-text-input id="BOD" name="BOD" type="text" class="mt-1 block w-full" :value="old('BOD', $admin->supplementaryInfo->BOD)" required autofocus autocomplete="BOD" placeholder="Y-m-d"/>
                <x-input-error class="mt-2" :messages="$errors->get('BOD')" />
            </div>
            <div class="col-6">
                <x-input-label for="location" :value="__('location')" />
                <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" :value="old('location', $admin->supplementaryInfo->location)" required autofocus autocomplete="location" />
                <x-input-error class="mt-2" :messages="$errors->get('location')" />
            </div>
        </div>

        <div class="row">
           <div class="col-12">
               <x-input-label for="about" :value="__('about')" />
               <x-textarea-input id="" class="w-full" rows="10"  required autofocus autocomplete="about" >{{ old('about', $admin->supplementaryInfo->about) }}</x-textarea-input>
               <x-input-error class="mt-2" :messages="$errors->get('about')" />
           </div>
        </div>

        {{-- Save --}}
        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('save') }}</x-primary-button>
        </div>
    </form>
</section>
