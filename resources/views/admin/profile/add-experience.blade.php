
<x-modal name="add-experience" class="relative">
    <x-close-button x-on:click="$dispatch('close')" class="position-absolute right-0 p-10" />
    <div class="p-20 bg-white rad-10">

        <h2 class="mt-0 mb-10 text-capitalize">add new experience</h2>
        <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">add another experience to attention your audience</p>

        <form method="post" action="{{ route('experience.store') }}"
              class="w-full  relative ">
            @csrf

            <div class="w-ful mt-3">
                <x-input-label for="career_title" value="{{ __('career title') }}" class=" text-capitalize"/>

                <x-text-input
                    id="career_title"
                    value="{{ old('career_title', '') }}"
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
                    value="{{ old('name_organisation', '') }}"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('name_organisation')" class="mt-2"/>
            </div>

            <div class="w-full mt-3">
                <x-input-label for="organisation_url" value="{{ __(' organisation link') }}" class=" text-capitalize"/>

                <x-text-input
                    id="organisation_url"
                    name="organisation_url"
                    value="{{ old('organisation_url', '') }}"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('organisation_url')" class="mt-2"/>
            </div>


            <div class="w-full mt-3">
                <x-input-label for="join_date" value="{{ __(' join Year') }}" class=" text-capitalize"/>

                <x-text-input
                    id="join_date"
                    name="join_date"
                    value="{{ old('join_date', '') }}"
                    class="w-full p-10 border mt-2"
                    placeholder="Year"
                />
                <x-input-error :messages="$errors->get('join_date')" class="mt-2"/>
            </div>


            <div class="w-ful mt-3">
                <x-input-label for="leave_date" value="{{ __(' leve Year') }}" class=" text-capitalize"/>

                <x-text-input
                    id="leave_date"
                    name="leave_date"
                    value="{{ old('leave_date', '') }}"
                    class="w-full p-10 border mt-2"
                    placeholder="Year"
                />
                <x-input-error :messages="$errors->get('leave_date')" class="mt-2"/>
            </div>

            <div class="w-full mt-3">
                <x-input-label for="job_description" value="{{ __('brief for job type') }}" class="text-capitalize"/>
                <x-textarea-input name="job_description" placeholder="Write discretion" class="mt-2" rows="6">{{ old('job_description', '') }}</x-textarea-input>
                <x-input-error :messages="$errors->get('job_description')" class="mt-2"/>
            </div>


            <x-primary-button class="mt-20">
                {{__('add completion to profile')}}
            </x-primary-button>

            <x-secondary-button x-on:click="$dispatch('close')" class="text-capitalize">{{ __('close') }}</x-secondary-button>
        </form>

    </div>


</x-modal>
