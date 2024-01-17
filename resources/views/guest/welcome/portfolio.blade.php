<div id="colorlib-work">
    <div class="container">
        <div class="row text-center">
            <h2 class="bold">Works</h2>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                <span>Portfolio</span>
                <h2>Done Projects</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="rotate">
                    <h2 class="heading">Portfolio</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($admin->projects as $project)
                <div class="col-md-12">
                    <div class="work-entry animate-box">
                        <a href="{{ $project->github_url  }}" class="work-img"
                           style="background-image: url({{ Storage::url($project->images->random()->url)  }});">
                            <div class="display-t">
                                <div class="work-name">
                                    <h2 class="mb-10">{{ $project->name_project  }}</h2>
                                    <span>{{ $project->service->name_service  }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="col-md-4 col-md-offset-4">
                            <div class="desc">
                                <p>{{ $project->discretion }}</p>
                                <p class="read"><a href="#">View details</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
