<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="profile-page m-20">
        <!-- Start Overview -->
        <div class="overview bg-white rad-10 d-flex align-center">
            <div class="avatar-box txt-c p-20">
                <img class="rad-half mb-10" src="{{ asset('admin/images/avatar.png') }}" alt="" />
                <h3 class="m-0">{{ $admin->name }}</h3>
                <p class="c-grey mt-10">Level 20</p>
                <div class="level rad-6 bg-eee p-relative">
                    <span style="width: 70%"></span>
                </div>
                <div class="rating mt-10 mb-10">
                    <i class="fa-solid fa-star c-orange fs-13"></i>
                    <i class="fa-solid fa-star c-orange fs-13"></i>
                    <i class="fa-solid fa-star c-orange fs-13"></i>
                    <i class="fa-solid fa-star c-orange fs-13"></i>
                    <i class="fa-solid fa-star c-orange fs-13"></i>
                </div>
                <p class="c-grey m-0 fs-13">550 Rating</p>
            </div>
            <div class="info-box w-full txt-c-mobile">
                <!-- Start Information Row -->
                <div class="box p-20 d-flex align-center">
                    <h4 class="c-grey fs-15 m-0 w-full">General Information</h4>
                    <div class="fs-14">
                        <span class="c-grey">Full Name</span>
                        <span>{{ $admin->name }}</span>
                    </div>
                    <div class="fs-14">
                        <span class="c-grey">Gender:</span>
                        <span>Male</span>
                    </div>
                    <div class="fs-14">
                        <span class="c-grey">Country:</span>
                        <span>{{ $admin->supplementaryInfo->location }}</span>
                    </div>
                    <div class="fs-14">
                        <label class="relative">
                            <input class="toggle-checkbox position-absolute left-5 top-1" type="checkbox" checked />
                            <div class="toggle-switch"></div>
                        </label>
                    </div>
                </div>
                <!-- End Information Row -->
                <!-- Start Information Row -->
                <div class="box p-20 d-flex align-center">
                    <h4 class="c-grey w-full fs-15 m-0">Personal Information</h4>
                    <div class="fs-14">
                        <span class="c-grey">Email:</span>
                        <span>{{ $admin->email }}</span>
                    </div>
                    <div class="fs-14">
                        <span class="c-grey">Phone:</span>
                        <span>{{ $admin->supplementaryInfo->phone }}</span>
                    </div>
                    <div class="fs-14">
                        <span class="c-grey">Date Of Birth:</span>
                        <span>{{ $admin->supplementaryInfo->BOD }}</span>
                    </div>
                    <div class="fs-14">
                        <label class="relative">
                            <input class="toggle-checkbox position-absolute left-5 top-1" type="checkbox" />
                            <div class="toggle-switch"></div>
                        </label>
                    </div>
                </div>
                <!-- End Information Row -->
                <!-- Start Information Row -->
                <div class="box p-20 d-flex align-center">
                    <h4 class="c-grey w-full fs-15 m-0">Job Information</h4>
                    <div class="fs-14">
                        <span class="c-grey">Title:</span>
                        <span>{{ $admin->supplementaryInfo->job_title }}</span>
                    </div>
                    <div class="fs-14">
                        <span class="c-grey">Programming Language:</span>
                        <span>Python</span>
                    </div>
                    <div class="fs-14">
                        <span class="c-grey">Years Of Experience:</span>
                        <span>15+</span>
                    </div>
                    <div class="fs-14">
                        <label class="relative">
                            <input class="toggle-checkbox position-absolute left-5 top-1" type="checkbox" checked />
                            <div class="toggle-switch"></div>
                        </label>
                    </div>
                </div>
                <!-- End Information Row -->
                <!-- Start Information Row -->
                <div class="box p-20 d-flex align-center">
                    <h4 class="c-grey w-full fs-15 m-0">Billing Information</h4>
                    <div class="fs-14">
                        <span class="c-grey">Payment Method:</span>
                        <span>Paypal</span>
                    </div>
                    <div class="fs-14">
                        <span class="c-grey">Email:</span>
                        <span>email@website.com</span>
                    </div>
                    <div class="fs-14">
                        <span class="c-grey">Subscription:</span>
                        <span>Monthly</span>
                    </div>
                    <div class="fs-14">
                        <label class="relative">
                            <input class="toggle-checkbox position-absolute left-5 top-1" type="checkbox" />
                            <div class="toggle-switch"></div>
                        </label>
                    </div>
                </div>
                <!-- End Information Row -->
            </div>
        </div>
        <!-- End Overview -->


        {{-- Start Other Data --}}
        <div class="wrapper d-grid gap-20">
            <div class="skills-card p-20 bg-white rad-10 mt-20">
                <h2 class="mt-0 mb-10">My Skills</h2>
                <p class="mt-0 mb-20 c-grey fs-15">Complete Skills List</p>

                <ul class="m-0 txt-c-mobile">
                    <li><span>HTML</span><span>Pugjs</span><span>HAML</span></li>
                    <li><span>CSS</span><span>SASS</span><span>Stylus</span></li>
                    <li><span>JavaScript</span><span>TypeScript</span></li>
                    <li><span>Vuejs</span><span>Reactjs</span></li>
                    <li><span>Jest</span><span>Jasmine</span></li>
                    <li><span>PHP</span><span>Laravel</span></li>
                    <li><span>Python</span><span>Django</span></li>
                </ul>
            </div>

            <div class="social-boxes p-20 bg-white rad-10 mt-20">
                <h2 class="mt-0 mb-10">Social Info</h2>
                <p class="mt-0 mb-20 c-grey fs-15">Social Media Information</p>

                @foreach($socialMediaDomains as $socialMediaDomain)
                    <div class="d-flex align-center mb-15">
                        <i class="fa-brands fa-{{ $socialMediaDomain->icon_name }} center-flex c-grey"></i>
                        <label class="w-full">
                            <input class="w-full" type="text"  placeholder="{{Str::ucfirst($socialMediaDomain->domain) }} Username" />
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- End Other Data --}}
    </div>
</x-app-layout>
