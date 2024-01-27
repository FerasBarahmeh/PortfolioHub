
@php use App\Enums\TypeSkill; @endphp

<x-modal name="add-skill" class="relative">
    <x-close-button x-on:click="$dispatch('close')" class="position-absolute right-0 p-10" />
    <div class="p-20 bg-white rad-10">

        <h2 class="mt-0 mb-10 text-capitalize">add new skill</h2>
        <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">add another service to attention your audience</p>

        <form method="post" action="{{ route('skill.store') }}"
              enctype="multipart/form-data"
              class="w-full mb-3 relative ">
            @csrf

            <div class="w-full mb-0">
                <x-input-label for="type_skill" value="{{ __('type skill') }}" class=" text-capitalize"/>
                <x-input-select name="type_skill" id="type_skill" class="mt-2">
                    <x-select-option  :selected="old('type_skill') == TypeSkill::Technical->value"
                                      value="{{ TypeSkill::Technical->value }}">
                        {{ TypeSkill::Technical->name}}
                    </x-select-option>

                    <x-select-option
                        :selected="old('type_skill') == TypeSkill::Soft->name"
                        value="{{ TypeSkill::Soft->value }}">{{ TypeSkill::Soft->name }}</x-select-option>
                </x-input-select>
                <x-input-error :messages="$errors->get('type_skill')" class="mt-2"/>
            </div>

            <div class="w-full mt-2">
                <x-input-label for="name_skill" value="{{ __('name skill') }}" class=" text-capitalize mb-1"/>

                <x-text-input
                    id="name_skill"
                    name="name_skill"
                    value="{{ old('name_skill', '') }}"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('name_skill')" class="mt-2"/>
            </div>

            <div class="w-full mt-2">
                <x-input-label for="icon_skill" value="{{ __('icon skill') }}" class=" text-capitalize mb-1"/>
                <x-input-label-file>Chose icon image</x-input-label-file>
                <x-file-input name="icon_skill"/>
                <x-input-error :messages="$errors->get('icon_skill')" class="mt-2"/>
            </div>

            <x-primary-button
                class="mt-10"
            >{{ __('share new skill') }}</x-primary-button>
        </form>

    </div>


</x-modal>

