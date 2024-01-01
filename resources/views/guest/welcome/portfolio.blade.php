<section class="portfolio" sub-section page="portfolio">
    <h1 class="title-section">Portfolio</h1>
    <header>
        <ul>
            <li class="active">All</li>
            @foreach($admin->services as $service)
                <li>{{ $service->name_service }}</li>
            @endforeach
        </ul>
    </header>

    <div class="projects">

        @foreach($admin->projects as $project)

            <div class="project">
                <figure>
                    <img src="{{ Storage::url($project->images->random()->url) }}" alt="POS">
                </figure>
                <h3 class="project-name">
                    <a href="{{ $project->github_url }}">{{ $project->name_project }}</a>
                </h3>
                <span class="project-category">{{ $project->service->name_service }}</span>
            </div>

        @endforeach


    </div>

</section>
