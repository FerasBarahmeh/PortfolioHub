<div id="colorlib-services">
    <div class="container">
        <div class="row text-center">
            <h2 class="bold">Services</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="services-flex">
                    <div class="one-third">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-0 animate-box intro-heading">
                                <span>My Services</span>
                                <h2>Here Are Some of My Skills</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="rotate">
                                    <h2 class="heading">Services</h2>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @foreach($admin->services as $service)
                                    <div class="services animate-box">
                                        <h3>{{ $service->name_service }}</h3>
                                       <p>{{ $service->description }}</p>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="one-forth services-img" style="background-image: url({{ asset('guest/images/services-img.jpg') }});">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
