<div class="relative">

    @if($clicked || $notHasRecord)
        <form method="post" action="{{ route('profile.change.service') }}"
              enctype="multipart/form-data"
              class="w-full  relative ">
            @csrf
            @method('put')

            <div class="option-box-buttons">
                <button type="submit" class="">{{ __('Change') }}</button>
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
                    class="w-full p-10 border mt-2"
                />
                <x-input-error :messages="$errors->userDeletion->get('name_service')" class="mt-2"/>
            </div>

            <div class="w-full mt-2">
                <x-input-label for="description" value="{{ __('brief for what you serve') }}" class="text-capitalize"/>
                <x-textarea-input name="description" placeholder="Write discretion" class="mt-2" rows="6"/>
            </div>


            <div class="w-full">
                <x-input-label-file/>
                <x-file-input name="image_service" />
                <x-input-error :messages="$errors->userDeletion->get('image_service')" class="mt-2"/>
            </div>


        </form>

        <x-input-error class="mt-2" :messages="$errors->get('username_account')"/>

    @endif

        @if (! $clicked && ! $notHasRecord)
        <div class="flex w-full justify-end">
            <x-primary-button wire:click="toggle"> add service</x-primary-button>
        </div>
    @endif
</div>
