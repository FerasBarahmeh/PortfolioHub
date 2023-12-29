<div class="relative" @style([
    'max-height:250px',
    'overflow-y:scroll',
])>

    @if($clicked || $notHasRecord)
        <form method="post" action="{{ route('profile.change.service') }}"
              enctype="multipart/form-data"
              class="w-full  relative ">
            @csrf
            @method('put')

            <div class="option-box-buttons">
                <button type="submit" class="text-capitalize">{{ __('add new service') }}</button>
                @if(! $notHasRecord)
                    <x-close-button class="c-black" wire:click="toggle">{{ __('close') }}</x-close-button>
                @endif
            </div>

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


        </form>

    @endif

        @if (! $clicked && ! $notHasRecord)
        <div class="flex w-full justify-end">
            <x-primary-button wire:click="toggle"> add service</x-primary-button>
        </div>
    @endif
</div>
