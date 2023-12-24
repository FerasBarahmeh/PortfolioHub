<x-app-layout>


    <x-slot name="slot" >

        <x-admin.title-page> Settings </x-admin.title-page>

        <div class="settings-page m-20 d-grid gap-20">
            {{-- Start Settings Box --}}

            @include('admin.settings.forms.main-info-form')

            {{-- End Settings Box --}}

            {{-- Start Settings Box --}}

            @include('admin.settings.forms.supplementary-info-form')

            {{-- End Settings Box --}}
            {{-- Start Settings Box --}}
            <div class="widgets-control p-20 bg-white rad-10">
                <h2 class="mt-0 mb-10">Widgets Control</h2>
                <p class="mt-0 mb-20 c-grey fs-15">Show/Hide Widgets</p>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="one" checked />
                    <label for="one">Quick Draft</label>
                </div>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="two" checked />
                    <label for="two">Yearly Targets</label>
                </div>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="three" checked />
                    <label for="three">Tickets Statistics</label>
                </div>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="four" checked />
                    <label for="four">Latest News</label>
                </div>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="five" />
                    <label for="five">Latest Tasks</label>
                </div>
                <div class="control d-flex align-center mb-15">
                    <input type="checkbox" id="six" checked />
                    <label for="six">Top Search Items</label>
                </div>
            </div>
            {{-- End Settings Box --}}
            {{-- Start Settings Box --}}
            <div class="backup-control p-20 bg-white rad-10">
                <h2 class="mt-0 mb-10">Backup Manager</h2>
                <p class="mt-0 mb-20 c-grey fs-15">Control Backup Time And Location</p>
                <div class="date d-flex align-center mb-15">
                    <input type="radio" name="time" id="daily" checked />
                    <label for="daily">Daily</label>
                </div>
                <div class="date d-flex align-center mb-15">
                    <input type="radio" name="time" id="weekly" />
                    <label for="weekly">Weekly</label>
                </div>
                <div class="date d-flex align-center mb-15">
                    <input type="radio" name="time" id="monthly" />
                    <label for="monthly">Monthly</label>
                </div>
                <div class="servers d-flex align-center txt-c">
                    <input type="radio" name="servers" id="server-one" />
                    <div class="server mb-15 rad-10 w-full">
                        <label class="d-block m-15" for="server-one">
                            <i class="fa-solid fa-server d-block mb-10"></i>
                            Megaman
                        </label>
                    </div>
                    <input type="radio" name="servers" id="server-two" checked />
                    <div class="server mb-15 rad-10 w-full">
                        <label class="d-block m-15" for="server-two">
                            <i class="fa-solid fa-server d-block mb-10"></i>
                            Zero
                        </label>
                    </div>
                    <input type="radio" name="servers" id="server-three" />
                    <div class="server mb-15 rad-10 w-full">
                        <label class="d-block m-15" for="server-three">
                            <i class="fa-solid fa-server d-block mb-10"></i>
                            Sigma
                        </label>
                    </div>
                </div>
            </div>
            {{-- End Settings Box --}}


            {{-- Start Settings Box --}}

            @include('admin.settings.forms.update-password')

            {{-- End Settings Box --}}

            {{-- Start Settings Box --}}

            @include('admin.settings.forms.delete-admin-form')

            {{-- End Settings Box --}}
        </div>

    </x-slot>
</x-app-layout>
