<x-guest-layout>
    <div id="colorlib-work">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Blog</h2>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                    <span>Portfolio</span>
                    <h2>{{  $post->title  }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="rotate">
                        <h2 class="heading">Portfolio</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="work-entry animate-box">

                        <a href="{{ back() }}" class="work-img" style="background-image: url({{ Storage::url($post->image->url) }});">
                        </a>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="desc">
                                <h2>{{ $post->title }}</h2>
                                <p class="w-full">
                                    {!! $post->content !!}
                                </p>
                                <p class="read"><a href="{{ url()->previous() }}">Live Preview</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
