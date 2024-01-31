<footer>
    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-pb-sm">
                    <div class="row">
                        <div class="col-md-10">
                            <h2>Let's Talk</h2>
                            <p><a href="#">{{  $admin->email}}</a></p>
                            <p class="colorlib-social-icons">
                                <x-admin.links-media :admin="$admin"/>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-pb-sm">
                    <h2>Latest Blog</h2>
                    @foreach($admin->posts as $post )
                        <div class="f-entry">
                            <a href="#" class="featured-img" style="background-image: url({{ $post->image->url }});"></a>
                            <div class="desc">
                                <span>{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('Y M d') }}</span>
                                <h3><a href="#">{{ $post->title }}</a></h3>
                            </div>
                        </div>
                    @endforeach
                </div>
{{--                <div class="col-md-4 col-pb-sm">--}}
{{--                    <h2>Newsletter</h2>--}}
{{--                    <div class="subscribe text-center">--}}
{{--                        <div class="form-group">--}}
{{--                            <input type="text" class="form-control text-center" placeholder="Enter Email address">--}}
{{--                            <input type="submit" value="Subscribe" class="btn btn-primary btn-custom">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        &copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | created with  <i class="fa fa-heart" aria-hidden="true"></i> <a href="{{ route('welcome.index') }}" target="_blank">Feras Barahmeh</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
