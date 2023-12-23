<div class="sidebar bg-white p-20 p-relative">
    <h3 class="p-relative txt-c mt-0">{{ $admin->name}}</h3>
    <ul>
        <li>

            <a class="{{Route::is('dashboard') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="{{ route('dashboard') }}">
                <i class="fa-regular fa-chart-bar fa-fw"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li>
            <a class="{{Route::is('profile.index') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="{{ route('profile.index') }}">
                <i class="fa-regular fa-user fa-fw"></i>
                <span>Profile</span>
            </a>
        </li>

        <li>
            <a class="{{Route::is('settings.index') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="{{ route('settings.index') }}">
                <i class="fa-solid fa-gear fa-fw"></i>
                <span>Settings</span>
            </a>
        </li>

        <li>
            <a class="{{Route::is('projects') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="projects.html">
                <i class="fa-solid fa-diagram-project fa-fw"></i>
                <span>Projects</span>
            </a>
        </li>
        <li>
            <a class="{{Route::is('courses') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="courses.html">
                <i class="fa-solid fa-graduation-cap fa-fw"></i>
                <span>Courses</span>
            </a>
        </li>

    </ul>
</div>
