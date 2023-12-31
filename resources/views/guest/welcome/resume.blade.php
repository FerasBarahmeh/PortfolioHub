<section class="resume" sub-section page="resume">
    <h1 class="title-section">Resume</h1>
    <section class="education timeline">
        <header>
            <div class="icon">
                <i class="fa-solid fa-school"></i>
            </div>

            <h3 class="tilte">Education</h3>
        </header>

        <ul>
            @foreach($admin->educations as $education)
                <li>
                    <span class="grade">Grad {{ $education->grade }} </span>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ $education->organisation_url }}">
                                <span>{{ $education->name }}</span> <span>At</span> <span>{{ $education->organisation_name }}</span>
                            </a>
                        </h3>
                        <span class="date">{{ $education->start_date }} - {{ $education->finish_date }}</span>
                    </div>
                </li>
            @endforeach

        </ul>

    </section>


    <!-- Start Experience  -->
    <section class="education timeline">
        <header>
            <div class="icon">
                <i class="fa-solid fa-school"></i>
            </div>

            <h3 class="tilte">Experience</h3>
        </header>

        <ul>
            @foreach($admin->experiences as $experience)
                <li>
                    <div class="content">
                        <h3 class="title">
                            <a href="{{ $experience->organisation_url }}">{{ $experience->career_title  }} <span>At</span> <span class="text-capitalize">{{ $experience->name_organisation }}</span></a>
                        </h3>
                        <span class="date">{{ $experience->join_date }} — {{ $experience->leave_date }}</span>
                        <p>{{ $experience->job_description }}</p>
                    </div>
                </li>
            @endforeach
        </ul>

    </section>
    <!-- End Experience -->

    <!-- Start Skiles  -->
    <section class="skills">
        <h3 class="sub-title">My Skills</h3>
        <div class="contanier-skilles">
            <div class="tech">
                <h3>Technical Skills</h3>
                <div class="contanier">

                    <figure class="skill">
                        <img src="images/skills/git.png" alt="Git">
                        <span>Git <span class="percentage">75%</span></span>
                    </figure>

                    <figure class="skill">
                        <img src="images/skills/ajax.png" alt="AJAX">
                        <span>AJAX <span class="percentage">90%</span></span>
                    </figure>

                </div>
            </div>

        </div>
    </section>
    <!-- End Skiles  -->
</section>
