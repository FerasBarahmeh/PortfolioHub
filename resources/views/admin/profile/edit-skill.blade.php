
@php use App\Enums\TypeSkill; @endphp

<x-modal name="edit-skill_{{ $skill->id }}" class="relative">
    <x-close-button x-on:click="$dispatch('close')" class="position-absolute right-0 p-10" />
    <div class="p-20 bg-white rad-10">

        <h2 class="mt-0 mb-10 text-capitalize">edit  <strong>{{ $skill->name_skill }}</strong> skill</h2>


        <div class="header flex justify-content-between align-items-center">
            <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">edit {{ $skill->name_skill }} service </p>
            <div class="w-full flex justify-content-center mt-10" @style(['width: 150px; height: 150px'])>
                <img src="{{ Storage::url($skill->image->url) }}" class="w-full h-full" alt="service image">
            </div>
        </div>



        <form method="post" action="{{ route('skill.update', $skill->id) }}"
              enctype="multipart/form-data"
              class="w-full mb-3 relative">
            @csrf @method('put')

            <div class="w-full mb-0">
                <x-input-label for="type_skill" value="{{ __('type skill') }}" class=" text-capitalize"/>
                <x-input-select name="type_skill" id="type_skill" class="mt-2">
                    <x-select-option  :selected="old('type_skill') == TypeSkill::Technical->value || $skill->type_skill == TypeSkill::Technical->value"
                                      value="{{ TypeSkill::Technical->value }}">
                        {{ TypeSkill::Technical->name}}
                    </x-select-option>

                    <x-select-option
                        :selected="old('type_skill') == TypeSkill::Soft->value || $skill->type_skill == TypeSkill::Soft->value"
                        value="{{ TypeSkill::Soft->value }}">{{ TypeSkill::Soft->name }}</x-select-option>
                </x-input-select>
                <x-input-error :messages="$errors->get('type_skill')" class="mt-2"/>
            </div>

            <div class="w-full mt-2">
                <x-input-label for="name_skill" value="{{ __('name skill') }}" class=" text-capitalize mb-1"/>

                <x-text-input
                    id="name_skill"
                    name="name_skill"
                    value="{{ old('name_skill', $skill->name_skill) }}"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('name_skill')" class="mt-2"/>
            </div>

            <x-primary-button
                class="mt-10"
            >{{ __('apply changes') }}</x-primary-button>

            <x-secondary-button x-on:click="$dispatch('close')" >{{ __('close') }}</x-secondary-button>
        </form>

    </div>


</x-modal>

