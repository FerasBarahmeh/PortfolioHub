<x-app-layout>
    @section('title', 'Dashboard')
    <x-slot name="slot">
        <!-- End Head -->

        <x-admin.title-page> Dashboard</x-admin.title-page>
        <div class="wrapper d-grid gap-20">
            <!-- Start Welcome Widget -->
            <div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
                <div class="intro p-20 d-flex space-between bg-eee">
                    <div>
                        <h2 class="m-0">Welcome</h2>
                        <p class="c-grey">{{ strtok($admin->name, ' ') }}</p>
                    </div>
                    <img class="hide-mobile" src="{{ asset('admin/images/welcome.png') }}" alt=""/>
                </div>
                <img src="{{ asset('admin/images/avatar.png') }}" alt="" class="avatar"/>
                <a href="{{ route('profile.index') }}" class="visit btn  btn-dark  d-block fs-14 w-fit">Profile</a>
                <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
                    <div>{{ $admin->name }} <span
                            class="d-block c-grey fs-14 mt-10">{{ $admin->extensions->job_title }}</span></div>
                    <div>{{ $admin->projects->count() }} <span class="d-block c-grey fs-14 mt-10">Projects</span></div>
                    <div>{{ $admin->posts->count() }} <span class="d-block c-grey fs-14 mt-10">Posts</span></div>
                </div>
            </div>
            <!-- End Welcome Widget -->
            <!-- Start Quick Draft Widget -->
            <div class="quick-draft p-20 bg-white rad-10">
                <x-admin.widget-title :icon="'fa-solid fa-pen-ruler fa-2x'">Quick Draft</x-admin.widget-title>

                <p class="mt-0 mb-20 c-grey fs-15">Write A Draft For Your Ideas</p>
                <x-admin.add-draft-form :cancelBtn="false"/>
            </div>
            <!-- End Quick Draft Widget -->

            <!-- Start accounts Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <x-admin.widget-title :icon="'fa-solid fa-link fa-2x'">accounts</x-admin.widget-title>

                <div class="flex gap-10 flex-wrap align-items-center justify-content-center">
                    @if($admin->accounts->isEmpty())
                        <x-alerts.not-founded :message="'not add account yet'" />
                    @endif
                    @each('admin.dashboard.accounts', $admin->accounts, 'account')
                </div>
            </div>
            <!-- End  accounts  Widget -->

            <!-- Start education Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <x-admin.widget-title :icon="'fa-solid fa-graduation-cap fa-2x'">education</x-admin.widget-title>

                <div class="flex gap-10 flex-wrap align-items-center justify-content-center">
                    @if($admin->educations->isEmpty())
                        <x-alerts.not-founded :message="'not add education yet'" />
                    @endif
                    @each('admin.dashboard.education', $admin->educations, 'education')
                </div>
            </div>
            <!-- End  education  Widget -->

            <!-- Start education Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <x-admin.widget-title :icon="'fa-solid fa-laptop-file fa-2x'">experience</x-admin.widget-title>

                <div class="flex gap-10 flex-wrap align-items-center justify-content-center">
                    @if($admin->experiences->isEmpty())
                        <x-alerts.not-founded :message="'not add experiences yet'" />
                    @endif
                    @each('admin.dashboard.experience', $admin->experiences, 'experience')
                </div>
            </div>
            <!-- End  education  Widget -->

            <!-- Start skills Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <x-admin.widget-title :icon="'fa-solid fa-puzzle-piece fa-2x'">skills</x-admin.widget-title>

                <div class="flex gap-10 flex-wrap align-items-center justify-content-center">
                    @if($admin->skills->isEmpty())
                        <x-alerts.not-founded :message="'not add skills yet'" />
                    @endif
                    @each('admin.dashboard.skills', $admin->skills, 'skill')
                </div>
            </div>
            <!-- End  skills  Widget -->

            <!-- Start services Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <x-admin.widget-title :icon="'fa-solid fa-hands-holding-child fa-2x'">services</x-admin.widget-title>

                <div class="flex gap-10 flex-wrap align-items-center justify-content-center">
                    @if($admin->services->isEmpty())
                        <x-alerts.not-founded :message="'not add services yet'" />
                    @endif
                    @each('admin.dashboard.services', $admin->services, 'service')
                </div>
            </div>
            <!-- End  services  Widget -->


            <!-- Start last post Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <x-admin.widget-title :icon="'fa-regular fa-paste fa-2x'">last post</x-admin.widget-title>

                <div class="flex gap-10 flex-wrap align-items-center justify-content-center">
                    @if($admin->posts->isEmpty())
                        <x-alerts.not-founded :message="'not add posts yet'" />
                    @endif
                    @include('admin.dashboard.last-post', ['post' =>$admin->posts->last()])
                </div>
            </div>
            <!-- End  last post  Widget -->



            <!-- Start Social Media Stats Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <x-admin.widget-title :icon="'fa-solid fa-cloud fa-2x'">social media domains</x-admin.widget-title>

                <div class="flex gap-10 flex-wrap">
                    @if($domains->isEmpty())
                        <x-alerts.not-founded :message="'not add domains yet'" />
                    @endif
                    @each('admin.dashboard.domains', $domains, 'domain')
                </div>
            </div>
            <!-- Start End Media Stats Widget -->

            <!-- Start Social Projects Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <x-admin.widget-title :icon="'fa-solid fa-diagram-project fa-2x'">project</x-admin.widget-title>

                <div class="flex gap-10 flex-wrap">
                    @if($admin->projects->isEmpty())
                        <x-alerts.not-founded :message="'not add projects yet'" />
                    @endif
                    @each('admin.dashboard.project', $admin->projects, 'project')
                </div>
            </div>
            <!-- Start End Projects Widget -->
        </div>

    </x-slot>
</x-app-layout>
