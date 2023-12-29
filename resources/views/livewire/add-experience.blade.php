<div class="relative" @style([
    'max-height:250px',
    'overflow-y:scroll',
])>

    @if($clicked || $notHasRecord)
        <form method="post" action="{{ route('profile.add.experience') }}"
              class="w-full  relative ">
            @csrf

            <div class="option-box-buttons">
                <button type="submit" class="text-capitalize">{{ __('add new exp.') }}</button>
                @if(! $notHasRecord)
                    <x-close-button class="c-black" wire:click="toggle">{{ __('close') }}</x-close-button>
                @endif
            </div>

            <div class="w-ful mt-3">
                <x-input-label for="career_title" value="{{ __('career title') }}" class=" text-capitalize"/>

                <x-text-input
                    id="career_title"
                    name="career_title"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('career_title')" class="mt-2"/>
            </div>

            <div class="w-full mt-3">
                <x-input-label for="name_organisation" value="{{ __('name organisation') }}" class=" text-capitalize"/>

                <x-text-input
                    id="name_organisation"
                    name="name_organisation"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('name_organisation')" class="mt-2"/>
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
                <x-input-label for="join_date" value="{{ __(' join date') }}" class=" text-capitalize"/>

                <x-text-input
                    id="join_date"
                    name="join_date"
                    class="w-full p-10 border mt-2"
                    placeholder="Y-m-d"
                />
                <x-input-error :messages="$errors->get('join_date')" class="mt-2"/>
            </div>


            <div class="w-ful mt-3">
                <x-input-label for="leave_date" value="{{ __(' leve date') }}" class=" text-capitalize"/>

                <x-text-input
                    id="leave_date"
                    name="leave_date"
                    class="w-full p-10 border mt-2"
                    placeholder="Y-m-d"
                />
                <x-input-error :messages="$errors->get('leave_date')" class="mt-2"/>
            </div>

            <div class="w-full mt-3">
                <x-input-label for="job_description" value="{{ __('brief for job type') }}" class="text-capitalize"/>
                <x-textarea-input name="job_description" placeholder="Write discretion" class="mt-2" rows="6"/>
            </div>

        </form>

    @endif

        @if (! $clicked && ! $notHasRecord)
        <div class="flex w-full justify-end">
            <x-primary-button wire:click="toggle"> add experience</x-primary-button>
        </div>
    @endif
</div>
