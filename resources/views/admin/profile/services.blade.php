
<div class=" profile-card p-20 bg-white rad-10 mt-20" id="services">
    <h2 class="mt-0 mb-10 text-capitalize">services</h2>
    <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">the services i can provide </p>


    <x-alerts.alert :success="session('success-add-service')" :fail="session('fail-add-service') "/>
    <x-alerts.alert :success="session('success-delete-service')" :fail="session('fail-delete-service') "/>

    <livewire:add-service :notHasRecord="$services->isEmpty()"/>

    @if ($services )
        @foreach($services as $service)
            <form action="{{ route('profile.delete.service') }}" method="post" class="mt-6">
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
