<x-app-layout>
    <x-slot name="slot">
        <!-- End Head -->
        <x-admin.title-page> Dashboard</x-admin.title-page>
        <div class="wrapper d-grid gap-20">
            <!-- Start Welcome Widget -->
            <div class="welcome bg-white rad-10 txt-c-mobile block-mobile">
                <div class="intro p-20 d-flex space-between bg-eee">
                    <div>
                        <h2 class="m-0">Welcome</h2>
                        <p class="c-grey mt-5">{{ strtok(Auth::user()->name, ' ') }}</p>
                    </div>
                    <img class="hide-mobile" src="{{ asset('admin/images/welcome.png') }}" alt=""/>
                </div>
                <img src="{{ asset('admin/images/avatar.png') }}" alt="" class="avatar"/>
                <div class="body txt-c d-flex p-20 mt-20 mb-20 block-mobile">
                    <div>{{ Auth::user()->name }} <span class="d-block c-grey fs-14 mt-10">Developer</span></div>
                    <div>80 <span class="d-block c-grey fs-14 mt-10">Projects</span></div>
                    <div>$8500 <span class="d-block c-grey fs-14 mt-10">Earned</span></div>
                </div>
                <a href="{{ route('profile.index') }}" class="visit d-block fs-14 bg-blue c-white w-fit btn-shape">Profile</a>
            </div>
            <!-- End Welcome Widget -->
            <!-- Start Quick Draft Widget -->
            <div class="quick-draft p-20 bg-white rad-10">
                <h2 class="mt-0 mb-10">Quick Draft</h2>
                <p class="mt-0 mb-20 c-grey fs-15">Write A Draft For Your Ideas</p>
                <form>
                    <input class="d-block mb-20 w-full p-10  bg-eee rad-6" type="text" placeholder="Title"/>
                    <textarea class="d-block mb-20 w-full p-10 b-none bg-eee rad-6"
                              placeholder="Your Thought"></textarea>

                    <div class="flex items-center gap-4 mt-10">
                        <x-primary-button>{{ __('save') }}</x-primary-button>
                    </div>
                </form>
            </div>
            <!-- End Quick Draft Widget -->

            <!-- Start Latest News Widget -->
            <div class="latest-news p-20 bg-white rad-10 txt-c-mobile">
                <h2 class="mt-0 mb-20">Latest News</h2>
                <div class="news-row d-flex align-center">
                    <img src="{{ asset('admin/images/news-01.png') }}" alt=""/>
                    <div class="info">
                        <h3>Created SASS Section</h3>
                        <p class="m-0 fs-14 c-grey">New SASS Examples & Tutorials</p>
                    </div>
                    <div class="btn-shape bg-eee fs-13 label">3 Days Ago</div>
                </div>
                <div class="news-row d-flex align-center">
                    <img src="{{ asset('admin/images/news-02.png') }}" alt=""/>
                    <div class="info">
                        <h3>Changed The Design</h3>
                        <p class="m-0 fs-14 c-grey">A Brand New Website Design</p>
                    </div>
                    <div class="btn-shape bg-eee fs-13 label">5 Days Ago</div>
                </div>
                <div class="news-row d-flex align-center">
                    <img src="{{ asset('admin/images/news-03.png') }}" alt=""/>
                    <div class="info">
                        <h3>Team Increased</h3>
                        <p class="m-0 fs-14 c-grey">3 Developers Joined The Team</p>
                    </div>
                    <div class="btn-shape bg-eee fs-13 label">7 Days Ago</div>
                </div>
                <div class="news-row d-flex align-center">
                    <img src="{{ asset('admin/images/news-04.png') }}" alt=""/>
                    <div class="info">
                        <h3>Added Payment Gateway</h3>
                        <p class="m-0 fs-14 c-grey">Many New Payment Gateways Added</p>
                    </div>
                    <div class="btn-shape bg-eee fs-13 label">9 Days Ago</div>
                </div>
            </div>
            <!-- End Latest News Widget -->
            <!-- Start Tasks Widget -->
            <div class="tasks p-20 bg-white rad-10">
                <h2 class="mt-0 mb-20">Latest Tasks</h2>
                <div class="task-row between-flex">
                    <div class="info">
                        <h3 class="mt-0 mb-5 fs-15">Record One New Video</h3>
                        <p class="m-0 c-grey">Record Python Create Exe Project</p>
                    </div>
                    <i class="fa-regular fa-trash-can delete"></i>
                </div>
                <div class="task-row between-flex">
                    <div class="info">
                        <h3 class="mt-0 mb-5 fs-15">Write Article</h3>
                        <p class="m-0 c-grey">Write Low Level vs High Level Languages</p>
                    </div>
                    <i class="fa-regular fa-trash-can delete"></i>
                </div>
                <div class="task-row between-flex">
                    <div class="info">
                        <h3 class="mt-0 mb-5 fs-15">Finish Project</h3>
                        <p class="m-0 c-grey">Publish Academy Programming Project</p>
                    </div>
                    <i class="fa-regular fa-trash-can delete"></i>
                </div>
                <div class="task-row between-flex done">
                    <div class="info">
                        <h3 class="mt-0 mb-5 fs-15">Attend The Meeting</h3>
                        <p class="m-0 c-grey">Attend The Project Business Analysis Meeting</p>
                    </div>
                    <i class="fa-regular fa-trash-can delete"></i>
                </div>
                <div class="task-row between-flex">
                    <div class="info">
                        <h3 class="mt-0 mb-5 fs-15">Finish Lesson</h3>
                        <p class="m-0 c-grey">Finish Teaching Flex Box</p>
                    </div>
                    <i class="fa-regular fa-trash-can delete"></i>
                </div>
            </div>
            <!-- End Tasks -->

            <!-- Start Top Search Word Widget -->
            <div class="search-items p-20 bg-white rad-10">
                <h2 class="mt-0 mb-20">Top Search Items</h2>
                <div class="items-head d-flex space-between c-grey mb-10">
                    <div>Keyword</div>
                    <div>Search Count</div>
                </div>
                <div class="items d-flex space-between pt-15 pb-15">
                    <span>Programming</span>
                    <span class="bg-eee fs-13 btn-shape">220</span>
                </div>
                <div class="items d-flex space-between pt-15 pb-15">
                    <span>JavaScript</span>
                    <span class="bg-eee btn-shape fs-13">180</span>
                </div>
                <div class="items d-flex space-between pt-15 pb-15">
                    <span>PHP</span>
                    <span class="bg-eee btn-shape fs-13">160</span>
                </div>
                <div class="items d-flex space-between pt-15 pb-15">
                    <span>Code</span>
                    <span class="bg-eee btn-shape fs-13">145</span>
                </div>
                <div class="items d-flex space-between pt-15 pb-15">
                    <span>Design</span>
                    <span class="bg-eee btn-shape fs-13">110</span>
                </div>
                <div class="items d-flex space-between pt-15 pb-15">
                    <span>Logic</span>
                    <span class="bg-eee btn-shape fs-13">95</span>
                </div>
            </div>
            <!-- End Top Search Word Widget -->

            <!-- Start Reminders Widget -->
            <div class="reminders p-20 bg-white rad-10 p-relative">
                <h2 class="mt-0 mb-25">Reminders</h2>
                <ul class="m-0">
                    <li class="d-flex align-center mt-15">
                        <span class="key bg-blue mr-15 d-block rad-half"></span>
                        <div class="pl-15 blue">
                            <p class="fs-14 fw-bold mt-0 mb-2">Check My Tasks List</p>
                            <span class="fs-13 c-grey">28/09/2022 - 12:00am</span>
                        </div>
                    </li>
                    <li class="d-flex align-center mt-15">
                        <span class="key bg-green mr-15 d-block rad-half"></span>
                        <div class="pl-15 green">
                            <p class="fs-14 fw-bold mt-0 mb-2">Check My Projects</p>
                            <span class="fs-13 c-grey">26/10/2022 - 12:00am</span>
                        </div>
                    </li>
                    <li class="d-flex align-center mt-15">
                        <span class="key bg-orange mr-15 d-block rad-half"></span>
                        <div class="pl-15 orange">
                            <p class="fs-14 fw-bold mt-0 mb-2">Call All My Clients</p>
                            <span class="fs-13 c-grey">05/11/2022 - 12:00am</span>
                        </div>
                    </li>
                    <li class="d-flex align-center mt-15">
                        <span class="key bg-red mr-15 d-block rad-half"></span>
                        <div class="pl-15 red">
                            <p class="fs-14 fw-bold mt-0 mb-2">Finish The Development Workshop</p>
                            <span class="fs-13 c-grey">20/12/2022 - 12:00am</span>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End Reminders Widget -->
            <!-- Start Latest Post Widget -->
            <div class="latest-post p-20 bg-white rad-10 p-relative">
                <h2 class="mt-0 mb-25">Latest Post</h2>
                <div class="top d-flex align-center">
                    <img class="avatar mr-15" src="{{ asset('admin/images/avatar.png') }}" alt=""/>
                    <div class="info">
                        <span class="d-block mb-5 fw-bold">
                            {{ strtok(Auth::user()->name, ' ') }}
                        </span>
                        <span class="c-grey">About 3 Hours Ago</span>
                    </div>
                </div>
                <div class="post-content txt-c-mobile pt-20 pb-20 mt-20 mb-20">
                    You can fool all of the people some of the time, and some of the people all of the time, but you
                    can't
                    fool all of the people all of the time.
                </div>
                <div class="post-stats between-flex c-grey">
                    <div>
                        <i class="fa-regular fa-heart"></i>
                        <span>1.8K</span>
                    </div>
                    <div>
                        <i class="fa-regular fa-comments"></i>
                        <span>500</span>
                    </div>
                </div>
            </div>
            <!-- End Latest Post Widget -->

            <!-- Start Social Media Stats Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <h2 class="mt-0 mb-25">Social Media Domains</h2>

                <div class="flex gap-10 flex-wrap">
                    @each('admin.dashboard.domains', $domains, 'domain')
                </div>
            </div>
            <!-- Start End Media Stats Widget -->

            <!-- Start Social Media Stats Widget -->
            <div class="social-media p-20 bg-white rad-10 p-relative">
                <h2 class="mt-0 mb-25">Social Media Stats</h2>
                <div class="box twitter p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-twitter fa-2x c-white h-full center-flex"></i>
                    <span>90K Followers</span>
                    <a class="fs-13 c-white btn-shape" href="#">Follow</a>
                </div>
                <div class="box facebook p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-facebook-f fa-2x c-white h-full center-flex"></i>
                    <span>2M Like</span>
                    <a class="fs-13 c-white btn-shape" href="#">Like</a>
                </div>
                <div class="box youtube p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-youtube fa-2x c-white h-full center-flex"></i>
                    <span>1M Subs</span>
                    <a class="fs-13 c-white btn-shape" href="#">Subscribe</a>
                </div>
                <div class="box linkedin p-15 p-relative mb-10 between-flex">
                    <i class="fa-brands fa-linkedin fa-2x c-white h-full center-flex"></i>
                    <span>70K Followers</span>
                    <a class="fs-13 c-white btn-shape" href="#">Follow</a>
                </div>
            </div>
            <!-- Start End Media Stats Widget -->
        </div>

    </x-slot>
</x-app-layout>
