<div class="flex justify-content-between border-b pb-10 align-center flex-1 gap-1 mb-3">
    <div class="flex gap-10">
        <figure @style(['width: 50px; height: 50px; border-radius: 10px;'])>
            <img src="{{ Storage::url($skill->image->url) }}" alt="image skill" @style(['border-radius: 10px;'])/>
        </figure>
        <div class="content flex  w-100 align-items-center">
            <div
                class="name flex-1 p-10" >
                <span>{{ $skill->name_skill }}</span>
            </div>
        </div>
    </div>

    <span class="type text-sm c-grey">{{ $skill->type_skill }}</span>
</div>
