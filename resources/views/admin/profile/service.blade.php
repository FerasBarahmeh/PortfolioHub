<div class="service">

    <x-alerts.errors/>

    <figure>
        <img src="{{ Storage::url($service->image->url) }}" alt="service image">
    </figure>
    <div class="content">
        <h5 class="name">{{ $service->name_service }}</h5>
        <p class="description">{{ Str::limit($service->description, 40) }}</p>
    </div>



    <div class="flex flex-col">
        <x-primary-button
            x-click
            class="text-capitalize  "
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'edit-service_{{ $service->id }}')"
        >
            <i class="fa fa-edit fs-15"></i>
        </x-primary-button>
        <x-danger-button
            x-click
            class="text-capitalize  "
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'delete_service_{{ $service->id }}')"
        >
            <i class="fa fa-trash fs-15"></i>
        </x-danger-button>
    </div>

    @include('admin.profile.edit-service', ['service'=> $service])
    @include('admin.profile.delete-service', ['service'=> $service])

</div>
