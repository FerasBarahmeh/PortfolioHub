
<x-modal name="delete_skill_{{ $skill->id }}">
    <x-close-button x-on:click="$dispatch('close')" class="position-absolute right-0 p-10" />
    <div class="quick-draft p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10 text-capitalize">delete  {{ $skill->name_skill }} skill</h2>
        <p class="mt-0 mb-20 text-capitalize fs-15 text-danger">are you sure for delete {{ $skill->name_skill }} skill</p>

            <form action="{{ route('skill.destroy') }}" method="post">
                @csrf @method('delete')
                <input type="hidden" name="id" value="{{ $skill->id }}">
                <x-danger-button>{{__('delete')}}</x-danger-button>
            </form>
    </div>
</x-modal>
