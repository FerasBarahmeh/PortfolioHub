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
                <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
                    <div>{{ $admin->name }} <span class="d-block c-grey fs-14 mt-10">{{ $admin->extensions->job_title }}</span></div>
                    <div>{{ $admin->projects->count() }} <span class="d-block c-grey fs-14 mt-10">Projects</span></div>

                </div>
                <a href="{{ route('profile.index') }}" class="visit btn  btn-dark  d-block fs-14 w-fit">Profile</a>
            </div>
            <!-- End Welcome Widget -->
            <!-- Start Quick Draft Widget -->
            <div class="quick-draft p-20 bg-white rad-10">
                <h2 class="mt-0 mb-10">Quick Draft</h2>
                <p class="mt-0 mb-20 c-grey fs-15">Write A Draft For Your Ideas</p>
                <x-admin.add-draft-form :cancelBtn="false"/>
            </div>
            <!-- End Quick Draft Widget -->


            <!-- Start Social Media Stats Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <h2 class="mt-0 mb-25">Social Media Domains</h2>

                <div class="flex gap-10 flex-wrap">
                    @each('admin.dashboard.domains', $domains, 'domain')
                </div>
            </div>
            <!-- Start End Media Stats Widget -->

        </div>

    </x-slot>
</x-app-layout>
