<div class="p-20 bg-white rad-10 h-full">
    <x-alerts.alert :success="session('success-change-layout')" :fail="session('fail-change-layout')"/>

    <h2 class="mt-0 mb-10 text-capitalize">change main layout </h2>
    <p class="mt-0 mb-20 c-grey fs-15 text-capitalize">change picture in welcome page layout </p>


    <form action="{{ route('app.settings.store-layout') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-15">
            <x-input-filepond  :name="'layout-img'" />
            <x-input-error :messages="$errors->get('layout_img')" class="mt-2"/>
        </div>
        {{-- change --}}
        <div class="flex items-center gap-4 mt-10">
            <x-primary-button>{{ __('change') }}</x-primary-button>
        </div>
    </form>
</div>
