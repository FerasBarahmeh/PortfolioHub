
<div class="p-20 bg-white rad-10 mt-20">
    <h2 class="mt-0 mb-10 text-capitalize">services</h2>
    <p class="mt-0 mb-20 c-grey fs-15">the services you provide </p>


    @php
        $alertType = session('fail-service') ? 'danger' : (session('success-service') ? 'success' : '');
    @endphp

    @if ($alertType)
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-600 dark:text-gray-400 text-capitalize alert alert-{{ $alertType }}"
        >{{ __('successfully update.') }}</p>
    @endif



    <livewire:add-service />

    @if ($services )
        @foreach($services as $service)
            <form action="{{ route('profile.delete.service') }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{ $service->id }}">
                <div class="service">
                    <figure>
                        <img src="{{ Storage::url($service->image->url) }}" alt="service image">
                    </figure>
                    <div class="content">
                        <h5 class="name">{{ $service->name_service }}</h5>
                        <p class="description">{{ Str::limit($service->description, 40) }}</p>
                    </div>
                    <x-danger-button class="delete-service">
                        <i class="fa-solid fa-trash"></i>
                    </x-danger-button>
                </div>
            </form>
        @endforeach
    @endif

</div>
