<div class="relative flex flex-col gap-2">

    @if($clicked || $notHasRecord)

        @if (! $errors->isEmpty())
{{--            @dd($errors)--}}
        @endif
        <form method="post" action="{{ route('profile.add.education') }}"
              class="w-full  relative ">
            @csrf

            <div class="option-box-buttons">
                <button type="submit" class="text-capitalize">{{ __('add') }}</button>
                @if(! $notHasRecord)
                    <x-close-button class="c-black" wire:click="toggle">{{ __('close') }}</x-close-button>
                @endif
            </div>


            <div class="w-full mt-3">
                <x-input-label for="name" value="{{ __('name') }}" class=" text-capitalize"/>

                <x-text-input
                    id="name"
                    name="name"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>


            <div class="w-full mt-3">
                <x-input-label for="grade" value="{{ __('grade') }}" class=" text-capitalize"/>

                <x-text-input
                    id="grade"
                    name="grade"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('grade')" class="mt-2"/>
            </div>

            <div class="w-full mt-3">
                <x-input-label for="organisation_name" value="{{ __('organisation_name') }}" class=" text-capitalize"/>

                <x-text-input
                    id="organisation_name"
                    name="organisation_name"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('organisation_name')" class="mt-2"/>
            </div>

            <div class="w-full mt-3">
                <x-input-label for="organisation_url" value="{{ __(' organisation link') }}" class=" text-capitalize"/>

                <x-text-input
                    id="organisation_url"
                    name="organisation_url"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('organisation_url')" class="mt-2"/>
            </div>


            <div class="w-full mt-3">
                <x-input-label for="start_date" value="{{ __(' start date') }}" class=" text-capitalize"/>

                <x-text-input
                    id="start_date"
                    name="start_date"
                    class="w-full p-10 border mt-2"
                    placeholder="Y-m-d"
                />
                <x-input-error :messages="$errors->get('start_date')" class="mt-2"/>
            </div>


            <div class="w-full mt-3">
                <x-input-label for="finish_date" value="{{ __(' finish date') }}" class=" text-capitalize"/>

                <x-text-input
                    id="finish_date"
                    name="finish_date"
                    class="w-full p-10 border mt-2"
                    placeholder="Y-m-d"
                />
                <x-input-error :messages="$errors->get('finish_date')" class="mt-2"/>
            </div>

        </form>
    @endif

    @if (! $clicked && ! $notHasRecord)
        <div class="flex w-full justify-end">
            <x-primary-button wire:click="toggle"> add education</x-primary-button>
        </div>
    @endif
</div>
