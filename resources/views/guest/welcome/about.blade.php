<section class="about active" sub-section page="about">
    <h1 class="title-section">About</h1>
    <div class="content">
        <p class="description">{{ $admin->supplementaryInfo->about  }}</p>

        <h2 class="sub-title">what service I can provide</h2>

        <div class="cards">
            @each('guest.welcome.services', $admin->services, 'service')
        </div>
    </div>
</section>
