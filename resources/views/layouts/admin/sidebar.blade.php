<div class="sidebar bg-white p-20 p-relative">
    <h3 class="p-relative txt-c mt-0">{{ $admin->name}}</h3>
    <ul>
        <li>

            <a class="{{Route::is('') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="{{ route('welcome.index') }}">
                <i class="fa fa-home fa-fw"></i>
                <span>Home</span>
            </a>
        </li>

        <li>

            <a class="{{Route::is('dashboard') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="{{ route('dashboard') }}">
                <i class="fa-regular fa-chart-bar fa-fw"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li>
            <a class="{{Route::is('profile.*') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="{{ route('profile.index') }}">
                <i class="fa-regular fa-user fa-fw"></i>
                <span>Profile</span>
            </a>
        </li>

        <li>
            <a class="{{Route::is('settings.*') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="{{ route('settings.index') }}">
                <i class="fa-solid fa-gear fa-fw"></i>
                <span>Settings</span>
            </a>
        </li>
        <li>
            <a class="{{Route::is('app.settings.index') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="{{ route('app.settings.index') }}">
                <i class="fa-solid fa-sliders fa-fw"></i>
                <span>App Settings</span>
            </a>
        </li>

        <li>
            <a class="{{Route::is('projects.*') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="{{ route('projects.index') }}">
                <i class="fa-solid fa-diagram-project fa-fw"></i>
                <span>Projects</span>
            </a>
        </li>


        <li>
            <a class="{{Route::is('posts.*') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10"
               href="{{ route('posts.index') }}">
                <i class="fa-solid fa-newspaper fa-fw"></i>
                <span>Posts</span>
            </a>
        </li>


        <li>
            <a class="{{Route::is('drafts.*') ? 'active' : '' }} d-flex align-center fs-14 c-black rad-6 p-10 flex justify-between"
               href="{{ route('drafts.index') }}">
                <div>
                    <i class="fa-solid fa-note-sticky fa-fw"></i>
                    <span>Drafts</span>
                </div>
                @if( $admin->getCountCompleteDraftsAttribute > 0)
                    <span class="c-white bg-danger rounded flex justify-center align-center" style="width: 20px; height: 20px">{{  $admin->getCountCompleteDraftsAttribute }}</span>
                @endif
            </a>
        </li>
    </ul>
</div>
