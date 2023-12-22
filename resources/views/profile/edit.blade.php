<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-capitalize text-gray-900" id="main-info-tab" data-bs-toggle="tab" data-bs-target="#main-info-tab-pane" type="button" role="tab" aria-controls="main-info-tab-pane" aria-selected="true">main info</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-capitalize text-gray-900" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="password-tab-pane" aria-selected="false">password</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-capitalize text-gray-900" id="delete-account-tab" data-bs-toggle="tab" data-bs-target="#delete-account-tab-pane" type="button" role="tab" aria-controls="delete-account-tab-pane" aria-selected="false">delete account</button>
                </li>
            </ul>

            <div  class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" id="main-info-tab-pane" role="tabpanel" aria-labelledby="main-info-tab" tabindex="0">
                    <div class="w-full">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="tab-pane fade p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                    <div class="w-full">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="tab-pane fade p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" id="delete-account-tab-pane" role="tabpanel" aria-labelledby="delete-account-tab" tabindex="0">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
