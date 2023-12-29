<div class="project bg-white p-20 rad-6 p-relative">
    <span class="date fs-13 c-grey">{{ $project->finish_date }}</span>
    <h4 class="m-0">{{ $project->name_project }}</h4>
    <p class="c-grey mt-10 mb-10 fs-14">{{ $project->discretion }}</p>
    <div class="team">
        @foreach($project->images as $image)
            <a href="{{ Storage::url($image->url) }}"><img src="{{ Storage::url($image->url) }}" alt="image for project"/></a>
        @endforeach
    </div>

    <div class="do d-flex">
        @foreach($project->skills as $skill)
            <span class="fs-13 rad-6 bg-eee">{{ $skill->name_skill }}</span>
        @endforeach
    </div>

    <div class="info between-flex">
        <div class="prog bg-eee">
            <span class="bg-red" style="width: 50%"></span>
        </div>
        <div class="fs-14 c-grey">
            {{ $project->service->name_service }}
        </div>
        <form method="post" action="{{ route('projects.destroy') }}">
            @csrf @method('delete')
            <input type="hidden"  name="id"  value="{{ $project->id }}">
            <button class="fs-14 text-danger" type="submit">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    </div>
</div>
