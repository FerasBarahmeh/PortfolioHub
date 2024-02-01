
<x-modal name="add-project">
    @if ($services->isNotEmpty() && $skills->isNotEmpty())
        <form method="post" action="{{ route('projects.store') }}"  enctype="multipart/form-data"
          class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-capitalize">
            {{ __('add new project for share your skills to people') }}
        </h2>

        <div class="mt-6">
            <x-input-label for="service_id" value="{{ __('service') }}" class="mb-1"/>

            <x-input-select name="service_id">

                <x-select-option class="text-capitalize">{{ __('Chose Service') }}</x-select-option>
                @foreach($services as $service)
                    <x-select-option value="{{ $service->id }}" :selected="old('service_id') == $service->id">{{ $service->name_service }}</x-select-option>
                @endforeach
            </x-input-select>

            <x-input-error :messages="$errors->get('service_id')" class="mt-2"/>
        </div>

        {{-- name project --}}
        <div class="mt-6">
            <x-input-label for="name_project" value="{{ __('name project') }}" class="mb-1"/>

            <x-text-input id="name_project"
                          name="name_project"
                          class="mt-1 block w-full"
                          :value="old('name_project', '')"
                          required autofocus autocomplete="name_project"/>

            <x-input-error :messages="$errors->get('name_project')" class="mt-2"/>
        </div>

        {{-- name project --}}
        <div class="mt-6">
            <x-input-label for="github_url" value="{{ __('github url for repo project') }}" class="mb-1"/>

            <x-text-input id="github_url"
                          name="github_url"
                          class="mt-1 block w-full"
                          :value="old('github_url', '')"
                          required autofocus autocomplete="github_url"/>

            <x-input-error :messages="$errors->get('github_url')" class="mt-2"/>
        </div>


        {{-- finsihed  --}}
        <div class="mt-6">
            <x-input-label for="finish_date" value="{{ __('finish date project') }}" class="mb-1"/>
            <x-input-date
                id="finish_date"
                name="finish_date"
                :value="old('finish_date', '')"
                class="w-full"/>
            <x-input-error :messages="$errors->get('finish_date')" class="mt-2"/>
        </div>

        {{-- discretion--}}
        <div class="mt-6">
            <x-input-label for="discretion" value="{{ __('write brief for this project') }}" class="mb-1"/>
            <x-textarea-input
                id="discretion"
                name="discretion"
                class="w-full"> {{ old('discretion', '') }}</x-textarea-input>
            <x-input-error :messages="$errors->get('discretion')" class="mt-2"/>
        </div>

        {{-- skills --}}
        <div class="mt-6 relative flex justify-evenly">
            @foreach($skills as $skill)
                <div class="">
                    <x-input-checkbox :checked="in_array($skill->id, old('skills', []))" id="skill_{{ $skill->id }}" name="skills[]" value="{{ $skill->id }}" />
                    <x-input-label-checkbox  for="skill_{{ $skill->id }}">
                        {{ $skill->name_skill }}
                    </x-input-label-checkbox>
                </div>
            @endforeach
            <x-input-error :messages="$errors->get('skills')" class="mt-2"/>
        </div>


        {{-- image --}}
        <div class="mt-6">
            <x-input-label for="project_images" value="{{ __('image for project') }}" class=" text-capitalize mb-1"/>
            <x-input-label-file for="project_images" class="text-capitalize">images to project </x-input-label-file>
            <x-file-input name="project_images[]" id="project_images" multiple  />
            <x-input-error :messages="$errors->get('project_images')" class="mt-2"/>
        </div>


        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('add new project') }}
            </x-primary-button>
        </div>
    </form>
    @elseif($skills->isEmpty())
        <x-admin.box-adjuster :message="'you dont have skills to attach with this project'" :route="'profile.index'"/>
    @else
        <x-admin.box-adjuster :message="'a category is required before adding a project.'" :route="'profile.index'"/>
    @endif
</x-modal>
