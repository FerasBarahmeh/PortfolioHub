<div class="relative">

    @if($clicked)
        <form method="post" action="{{ route('profile.add.education') }}"
              class="w-full  relative ">
            @csrf

            <div class="option-box-buttons">
                <button type="submit" class="text-capitalize">{{ __('add') }}</button>
                <x-close-button class="c-black" wire:click="toggle">{{ __('close') }}</x-close-button>
            </div>


            <div class="w-full">
                <x-input-label for="name" value="{{ __('name') }}" class=" text-capitalize"/>

                <x-text-input
                    id="name"
                    value="Engineer"
                    name="name"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->userDeletion->get('name')" class="mt-2"/>
            </div>


            <div class="w-full">
                <x-input-label for="grade" value="{{ __('grade') }}" class=" text-capitalize"/>

                <x-text-input
                    id="grade"
                    value="very Good"
                    name="grade"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->userDeletion->get('grade')" class="mt-2"/>
            </div>

            <div class="w-full">
                <x-input-label for="organisation_name" value="{{ __('organisation_name') }}" class=" text-capitalize"/>

                <x-text-input
                    id="organisation_name"
                    value="TTU"
                    name="organisation_name"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->userDeletion->get('organisation_name')" class="mt-2"/>
            </div>

            <div class="w-full">
                <x-input-label for="organisation_url" value="{{ __(' organisation link') }}" class=" text-capitalize"/>

                <x-text-input
                    id="organisation_url"
                    value="http://www.ttu.edu.jo/"
                    name="organisation_url"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->userDeletion->get('organisation_url')" class="mt-2"/>
            </div>


            <div class="w-full">
                <x-input-label for="start_date" value="{{ __(' start date') }}" class=" text-capitalize"/>

                <x-text-input
                    id="start_date"
                    value="2021-10-1"
                    name="start_date"
                    class="w-full p-10 border mt-2"
                    placeholder="Y-m-d"
                />
                <x-input-error :messages="$errors->userDeletion->get('start_date')" class="mt-2"/>
            </div>


            <div class="w-full">
                <x-input-label for="finish_date" value="{{ __(' finish date') }}" class=" text-capitalize"/>

                <x-text-input
                    id="finish_date"
                    value="2025-1-18"
                    name="finish_date"
                    class="w-full p-10 border mt-2"
                    placeholder="Y-m-d"
                />
                <x-input-error :messages="$errors->userDeletion->get('finish_date')" class="mt-2"/>
            </div>

        </form>

    @endif

    @if (! $clicked)
        <div class="flex w-full justify-end">
            <x-primary-button wire:click="toggle"> add education</x-primary-button>
        </div>
    @endif
</div>
