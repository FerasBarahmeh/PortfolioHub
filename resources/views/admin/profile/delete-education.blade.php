<x-modal name="delete_education_{{ $education->id }}">
    <div class="quick-draft p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10 text-capitalize">delete  <strong>{{ $education->name }}</strong> education</h2>
        <p class="mt-0 mb-20 text-capitalize fs-15 text-danger">are you sure for delete {{ $education->name }} education</p>

        <form action="{{ route('education.destroy') }}" method="post"
              class="d-flex justify-between w-full px-1">
            @csrf @method('delete')
            <input type="hidden" name="id" value="{{ $education->id }}">
            <x-danger-button>
                {{ __('delete') }}
            </x-danger-button>
        </form>
    </div>
</x-modal>
