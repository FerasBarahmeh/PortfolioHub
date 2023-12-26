<div class="relative transition ease-in-out delay-100">

    @if($clicked || $notHasRecord)
        <form method="post" action="{{ route('profile.add.skill') }}"
              enctype="multipart/form-data"
              class="w-full mb-3 relative ">
            @csrf

            <div class="option-box-buttons">
                <button type="submit" class="text-capitalize">{{ __('add') }}</button>
                @if(! $notHasRecord)
                    <x-close-button class="c-black" wire:click="toggle">{{ __('close') }}</x-close-button>
                @endif
            </div>

            <div class="w-full mb-0">
                <x-input-label for="type_skill" value="{{ __('type skill') }}" class=" text-capitalize"/>
                <x-input-select name="type_skill" id="type_skill" class="mt-2">
                    <x-select-option value="{{ \App\Enums\TypeSkill::Technical->value }}">{{ \App\Enums\TypeSkill::Technical->name }}</x-select-option>
                    <x-select-option value="{{ \App\Enums\TypeSkill::Soft->value }}">{{ \App\Enums\TypeSkill::Soft->name }}</x-select-option>
                </x-input-select>
            </div>

            <div class="w-full mt-2">
                <x-input-label for="name_skill" value="{{ __('name skill') }}" class=" text-capitalize mb-1"/>

                <x-text-input
                    id="name_skill"
                    name="name_skill"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->userDeletion->get('name_skill')" class="mt-2"/>
            </div>

            <div class="w-full mt-2">
                <x-input-label for="icon_skill" value="{{ __('icon skill') }}" class=" text-capitalize mb-1"/>
                <x-input-label-file>Chose icon image</x-input-label-file>
                <x-file-input name="icon_skill" />
                <x-input-error :messages="$errors->userDeletion->get('icon_skill')" class="mt-2"/>
            </div>

        </form>



    @endif

        @if (! $clicked && ! $notHasRecord)
        <div class="flex w-full justify-end">
            <x-primary-button wire:click="toggle"> add skill</x-primary-button>
        </div>
    @endif
</div>
