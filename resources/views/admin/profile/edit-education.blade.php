<x-modal name="edit_education_{{ $education->id }}" class="relative">
    <x-close-button x-on:click="$dispatch('close')" class="position-absolute right-0 p-10" />
    <div class="p-20 bg-white rad-10">

        <h2 class="mt-0 mb-10 text-capitalize">Edit {{ $education->name }}</h2>
        <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">add another education to attention your audience</p>


        <form method="post" action="{{ route('education.update', $education->id) }}"
              class="w-full  relative ">
            @csrf @method('put')

            <div class="w-full mt-3">
                <x-input-label for="name" value="{{ __('name') }}" class=" text-capitalize"/>

                <x-text-input
                    id="name"
                    name="name"
                    value="{{ old('name', $education->name) }}"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>


            <div class="w-full mt-3">
                <x-input-label for="grade" value="{{ __('grade') }}" class=" text-capitalize"/>

                <x-text-input
                    id="grade"
                    name="grade"
                    value="{{ old('grade', $education->grade) }}"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('grade')" class="mt-2"/>
            </div>

            <div class="w-full mt-3">
                <x-input-label for="organisation_name" value="{{ __('organisation name') }}" class=" text-capitalize"/>

                <x-text-input
                    id="organisation_name"
                    name="organisation_name"
                    value="{{ old('organisation_name', $education->organisation_name) }}"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('organisation_name')" class="mt-2"/>
            </div>

            <div class="w-full mt-3">
                <x-input-label for="organisation_url" value="{{ __(' organisation link') }}" class=" text-capitalize"/>

                <x-text-input
                    id="organisation_url"
                    name="organisation_url"
                    value="{{ old('organisation_url',$education->organisation_url ) }}"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('organisation_url')" class="mt-2"/>
            </div>


            <div class="w-full mt-3">
                <x-input-label for="start_date" value="{{ __(' start date') }}" class=" text-capitalize"/>

                <x-text-input
                    id="start_date"
                    name="start_date"
                    value="{{ old('start_date', $education->start_date) }}"
                    class="w-full p-10 border mt-2"
                    placeholder="Year"
                />
                <x-input-error :messages="$errors->get('start_date')" class="mt-2"/>
            </div>


            <div class="w-full mt-3">
                <x-input-label for="finish_date" value="{{ __(' finish date') }}" class=" text-capitalize"/>

                <x-text-input
                    id="finish_date"
                    name="finish_date"
                    value="{{ old('finish_date', $education->finish_date) }}"
                    class="w-full p-10 border mt-2"
                    placeholder="Year"
                />
                <x-input-error :messages="$errors->get('finish_date')" class="mt-2"/>

                <div class="mt-10">
                    <x-primary-button>{{ __('add new education') }}</x-primary-button>
                </div>
            </div>

        </form>

    </div>


</x-modal>
