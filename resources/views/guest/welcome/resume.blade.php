@php use App\Enums\TypeSkill; @endphp
<section class="resume" sub-section page="resume">
    <h1 class="title-section">Resume</h1>
    <section class="education timeline">
        <header>
            <div class="icon">
                <i class="fa-solid fa-school"></i>
            </div>

            <h3>Education</h3>
        </header>

        <ul>
            @foreach($admin->educations as $education)
                <li>
                    <span class="grade">Grad {{ $education->grade }} </span>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ $education->organisation_url }}">
                                <span>{{ $education->name }}</span> <span>At</span>
                                <span>{{ $education->organisation_name }}</span>
                            </a>
                        </h3>
                        <span class="date">{{ $education->start_date }} - {{ $education->finish_date }}</span>
                    </div>
                </li>
            @endforeach

        </ul>

    </section>


    {{-- Start Experience --}}
    <section class="education timeline">
        <header>
            <div class="icon">
                <i class="fa-solid fa-school"></i>
            </div>
            <h3>Experience</h3>
        </header>

        <ul>
            @if ($admin->experiences->isNotEmpty())
                @foreach($admin->experiences as $experience)
                    <li>
                        <div class="content">
                            <h3 class="title">
                                <a href="{{ $experience->organisation_url }}">{{ $experience->career_title  }}
                                    <span>At</span> <span
                                        class="text-capitalize">{{ $experience->name_organisation }}</span></a>
                            </h3>
                            <span class="date">{{ $experience->join_date }} — {{ $experience->leave_date }}</span>
                            <p>{{ $experience->job_description }}</p>
                        </div>
                    </li>
                @endforeach
            @else
                <p> No skills added yet, and that's totally fine! Your journey is unique, and there's no rush. Remember, every skill is learned over time. Keep going at your own pace; you're doing great! </p>
            @endif
        </ul>

    </section>
    {{-- End Experience --}}

    {{-- Start Skils --}}
    <section class="skills">
        <h3 class="sub-title">My Skills</h3>
        <div class="container-skills">
            <div class="tech">
                <h3>{{ TypeSkill::Technical->name }} Skill </h3>
                <div class="container">
                    @foreach($admin->technicalSkills as $skill)
                        <figure class="skill">
                            <img src="{{ Storage::url($skill->image->url) }}" alt="{{ $skill->name_skill }}">
                            <span>{{ $skill->name_skill }} <span class="percentage">75%</span></span>
                        </figure>
                    @endforeach
                </div>
            </div>

            <div class="tech"
            >
                <h3 class="">{{ TypeSkill::Technical->name }} Skill </h3>
                <div class="container">
                    @foreach($admin->softSkills as $skill)
                        <figure class="skill">
                            <img src="{{ Storage::url($skill->image->url) }}" alt="{{ $skill->name_skill }}">
                            <span>{{ $skill->name_skill }} </span>
                            {{--                            <span class="percentage">75%</span>--}}
                        </figure>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    {{-- End Skills --}}
</section>
