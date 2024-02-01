<div class="project border p-20 rad-6 p-relative">
    <span class="date fs-13 c-grey">{{ $project->finish_date }}</span>
    <h4 class="m-0">{{ $project->name_project }}</h4>
    <p class="c-grey mt-10 mb-10 fs-14">{{ \Illuminate\Support\Str::limit($project->discretion, 30) }}</p>
    <div class="team">
        @php $image = $project->images->random() @endphp
        <a  href="{{ Storage::url($image->url) }}" class="fs-1 flex justify-content-center align-items-center rad-6" @style(['height: 200px; width: 200px; '])>
            <img src="{{ Storage::url($image->url) }}" class="w-full h-full" alt="image for project"/>
        </a>
    </div>

    <div class="do flex mt-2">
        @foreach($project->skills as $skill)
            <span class="fs-13 rad-6 bg-eee p-1">{{ $skill->name_skill }}</span>
        @endforeach
    </div>

    <div class="info flex justify-content-end w-full mt-10">
        <div class="fs-14 c-grey">
            {{ $project->service->name_service }}
        </div>
    </div>
</div>
