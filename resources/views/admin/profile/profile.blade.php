<x-app-layout>

    <x-admin.title-page> {{ __('projects') }}</x-admin.title-page>

    <div class="profile-page m-20">
        <!-- Start Overview -->
        <div class="overview bg-white rad-10 d-flex align-center">
            <div class="avatar-box txt-c p-20">
                <img class="rad-half mb-10" src="{{ asset('admin/images/avatar.png') }}" alt=""/>
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
                        <span>{{ $admin->extensions->location }}</span>
                    </div>
                    <div class="fs-14">
                        <label class="relative">
                            <input class="toggle-checkbox position-absolute left-5 top-1" type="checkbox" checked/>
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
                        <span>{{ $admin->extensions->phone }}</span>
                    </div>
                    <div class="fs-14">
                        <span class="c-grey">Date Of Birth:</span>
                        <span>{{ $admin->extensions->BOD }}</span>
                    </div>
                    <div class="fs-14">
                        <label class="relative">
                            <input class="toggle-checkbox position-absolute left-5 top-1" type="checkbox"/>
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
                        <span>{{ $admin->extensions->job_title }}</span>
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
                            <input class="toggle-checkbox position-absolute left-5 top-1" type="checkbox" checked/>
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
                            <input class="toggle-checkbox position-absolute left-5 top-1" type="checkbox"/>
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

            @include('admin.profile.skills')

            @include('admin.profile.experiences')

            @include('admin.profile.education')

            {{-- Social info box --}}
            @include('admin.profile.social-info-forms')

            {{--  providers --}}
            @include('admin.profile.services')

        </div>
        {{-- End Other Data --}}
    </div>
</x-app-layout>
