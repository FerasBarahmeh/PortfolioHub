


<x-modal name="add-service" class="relative">
    <x-close-button x-on:click="$dispatch('close')" class="position-absolute right-0 p-10" />
    <div class="p-20 bg-white rad-10">

        <h2 class="mt-0 mb-10 text-capitalize">add new service</h2>
        <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">add another service to attention your audience</p>

        <form method="post" action="{{ route('service.store') }}"
              enctype="multipart/form-data"
              class="w-full  relative ">
            @csrf

            <div class="w-full">
                <x-input-label for="name_service" value="{{ __('name service') }}" class=" text-capitalize"/>

                <x-text-input
                    id="name_service"
                    name="name_service"
                    type="name_service"
                    :value="old('name_service', '')"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('name_service')" class="mt-2"/>
            </div>

            <div class="w-full mt-2">
                <x-input-label for="description" value="{{ __('brief for what you serve') }}" class="text-capitalize"/>
                <x-textarea-input name="description" placeholder="Write discretion" class="mt-2" rows="6">{{  old('description', '') }}</x-textarea-input>
            </div>


            <div class="w-full">
                <x-input-label-file for="image_service"/>
                <x-file-input name="image_service" id="image_service"  :value="old('image_service', '')"/>
                <x-input-error :messages="$errors->get('image_service')" class="mt-2"/>
            </div>

            <x-primary-button class="mt-20">
                {{__('add')}}
            </x-primary-button>
        </form>

    </div>


</x-modal>
