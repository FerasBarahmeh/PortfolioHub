
<div class="flex w-full mb-3 border-b pb-2">
    <div class="flex gap-10 w-full align-items-center">
        <figure @style(['width: 50px; height: 50px; border-radius: 10px;'])>
            <img src="{{ Storage::url($service->image->url) }}" alt="image skill" @style(['border-radius: 10px;'])/>
        </figure>
        <div class="content flex flex-col w-full p-10">
            <div class="name flex-1 mb-1" >
                <span>{{ $service->name_service }}</span>
            </div>
            <p class="type text-sm c-grey">{{ \Illuminate\Support\Str::limit( $service->description , 50) }}</p>
        </div>
    </div>


</div>
