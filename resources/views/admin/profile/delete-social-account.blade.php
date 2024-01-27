<x-modal name="delete_account_{{ $account->id }}">
    <div class="quick-draft p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10 text-capitalize">delete  {{ $account->domain->domain }} account</h2>
        <p class="mt-0 mb-20 text-capitalize fs-15 text-danger">are you sure for delete {{ $account->domain->domain }} account</p>

        <form method="post" action="{{ route('social.account.destroy', $account->id) }}" class="w-full mt-6 d-flex justify-between relative  gap-1 ">
            @csrf
            @method('delete')
            <x-danger-button>{{__('delete')}}</x-danger-button>

            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('cancel') }}
            </x-secondary-button>
        </form>
    </div>
</x-modal>
