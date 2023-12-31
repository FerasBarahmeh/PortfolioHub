<x-guest-layout>
    <x-slot name="slot">
        <main>

            @include('guest.welcome.aside', ['admin' => $admin])

            <section class="main-section">
                @include('guest.welcome.nav')

                @include('guest.welcome.about', ['admin' => $admin])

                @include('guest.welcome.resume', ['admin' => $admin])

                @include('guest.welcome.portfolio', ['admin' => $admin])

                @include('guest.welcome.contact', ['admin' => $admin])

           </section>

        </main>

    </x-slot>
</x-guest-layout>
