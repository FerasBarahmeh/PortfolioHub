
<div class="p-20 bg-white rad-10 mt-20">
    <h2 class="mt-0 mb-10 text-capitalize">services</h2>
    <p class="mt-0 mb-20 c-grey fs-15">the services you provide </p>


    @php
        $alertType = session('fail-add-service') ? 'danger' : (session('success-add-service') ? 'success' : '');
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
            <div class="service">
                <figure>
                    <img src="{{ asset('admin/images/activity-01.png') }}" alt="service image">
                </figure>
                <div class="content">
                    <h5 class="name">{{ $service->name_service }}</h5>
                    <p class="description">{{ \Illuminate\Support\Str::limit($service->description, 40) }}</p>
                </div>
            </div>
        @endforeach
    @endif

</div>
