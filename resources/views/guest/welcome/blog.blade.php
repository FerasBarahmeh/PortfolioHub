<div id="colorlib-blog">
    <div class="container">
        <div class="row text-center">
            <h2 class="bold">Blog</h2>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0 text-center animate-box intro-heading">
                <span>Blog</span>
                <h2>Read Our Case</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="rotate">
                    <h2 class="heading">Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row animate-box">
            <div class="owl-carousel1">
                @foreach($admin->posts as $post)
                    <div class="item">
                        <div class="col-md-12">
                            <div class="article">
                                <a href="blog.html" class="blog-img">
                                    <img class="img-responsive" src="{{ Storage::url($post->images->random()->url)  }}"
                                         alt="html5 bootstrap by colorlib.com">
                                    <div class="overlay"></div>
                                    <div class="link">
											<h2 class="read">Read more</h2>
                                    </div>
                                </a>
                                <div class="desc">
                                    <span class="meta">{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('d, M Y') }}</span>
                                    <h2><a href="blog.html">{{ $post->title }}</a></h2>
                                    <p>{{ $post->brief }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
