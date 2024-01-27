<x-modal name="edit-service_{{ $service->id }}" class="relative">
    <x-close-button x-on:click="$dispatch('close')" class="position-absolute right-0 p-10" />
    <div class="p-20 bg-white rad-10">

        <h2 class="mt-0 mb-10 text-capitalize">edit <strong class="c-grey">{{ $service->name_service }}</strong> service</h2>

        <div class="header flex justify-content-between">
            <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">edit {{ $service->name_service }} service </p>
            <div class="w-full flex justify-content-center mt-10" @style(['width: 150px; height: 150px'])>
                <img src="{{ Storage::url($service->image->url) }}" class="w-full h-full" alt="service image">
            </div>
        </div>


        <form method="post" action="{{ route('service.update', $service->id) }}"
              enctype="multipart/form-data"
              class="w-full  relative ">
            @csrf
            @method('put')

            <div class="w-full">
                <x-input-label for="name_service" value="{{ __('name service') }}" class=" text-capitalize"/>

                <x-text-input
                    id="name_service"
                    name="name_service"
                    type="name_service"
                    :value="old('name_service', $service->name_service)"
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->get('name_service')" class="mt-2"/>
            </div>

            <div class="w-full mt-2">
                <x-input-label for="description" value="{{ __('brief for what you serve') }}" class="text-capitalize"/>
                <x-textarea-input name="description" placeholder="Write discretion" class="mt-2" rows="6">{{  old('description', $service->description) }}</x-textarea-input>
            </div>



            <x-primary-button class="mt-20">
                {{__('edit')}}
            </x-primary-button>
        </form>

    </div>


</x-modal>
