<x-guest-layout>
    <x-slot name="slot">


        @include('guest.welcome.nav', ['admin' => $admin])

        <div id="colorlib-page">
            @include('guest.welcome.header', ['admin' => $admin])

            @include('guest.welcome.about', ['admin' => $admin])
            @include('guest.welcome.services', ['admin' => $admin])
            @include('guest.welcome.skills', ['admin' => $admin])
            @include('guest.welcome.portfolio', ['admin' => $admin])
            @include('guest.welcome.blog', ['admin' => $admin])

{{--            @include('guest.welcome.testimonies', ['admin' => $admin])--}}

            {{--                @include('guest.welcome.resume', ['admin' => $admin])--}}

            {{--                @include('guest.welcome.contact', ['admin' => $admin])--}}
            @include('guest.welcome.footer', ['admin' => $admin])
        </div>

    </x-slot>
</x-guest-layout>
