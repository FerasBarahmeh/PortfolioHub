<div id="colorlib-about">
    <div class="container">
        <div class="row text-center">
            <h2 class="bold">About</h2>
        </div>
        <div class="row row-padded-bottom">
            <div class="col-md-5 animate-box p-relative">
                <span></span>
                @isset($admin->layout)
{{--                   Storage::url($admin->layout->image?->url) ?? --}}
                    <img class="img-responsive about-img"
                         src="{{ asset('guest/images/about.png') }}"
                         alt="html5 bootstrap template by colorlib.com">
                @endisset
            </div>
            <div class="col-md-6 col-md-push-1 animate-box">
                <div class="about-desc">
                    <h2>@foreach( explode(' ', $admin->name) as $name)
                            <span>{{$name}}</span>
                        @endforeach</h2>
                    <div class="desc">
                        <div class="rotate">
                            <h2 class="heading">About</h2>
                        </div>
                        <p>{{ $admin->extensions->about }}</p>
                        <p class="colorlib-social-icons">
                            <x-admin.links-media :admin="$admin"/>
                        </p>
{{--                        <p><a href="work.html" class="btn btn-primary btn-outline">View My Works</a></p>--}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
