<div class="card">
    <figure>
        <img src="{{  Storage::url($service->image->url) }}"  alt="service image" />
    </figure>
    <div class="content">
        <h3 class="card-title">{{ $service->name_service }}</h3>
        <p>{{$service->description }}</p>
    </div>
</div>
