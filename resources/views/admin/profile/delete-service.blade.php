<x-modal name="delete_service_{{ $service->id }}">
    <div class="quick-draft p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10 text-capitalize">delete  <strong>{{ $service->name_service }}</strong> service</h2>
        <p class="mt-0 mb-20 text-capitalize fs-15 text-danger">are you sure for delete {{ $service->name_service }} service</p>

        <form method="post" action="{{ route('service.destroy') }}" class="w-full mt-6 d-flex justify-between relative  gap-1 ">
            @csrf
            @method('delete')
            <input type="hidden" name="id" value="{{ $service->id }}">
            <x-danger-button>{{__('delete')}}</x-danger-button>

            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('cancel') }}
            </x-secondary-button>
        </form>
    </div>
</x-modal>
