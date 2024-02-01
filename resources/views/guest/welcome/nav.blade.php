<nav id="colorlib-main-nav" role="navigation">
    <span href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active show" id="btn-hidden-burger"><i></i></span>
    <div class="js-fullheight colorlib-table">
        <div class="colorlib-table-cell js-fullheight">
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="form-group">--}}
{{--                        <input type="text" class="form-control" id="search" placeholder="Enter any key to search...">--}}
{{--                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-links-nav">
                        <li onclick="scrollToSection('colorlib-about', this)" class="active">
                            <a href="#colorlib-about">Home</a>
                        </li>
                        <li onclick="scrollToSection('colorlib-services', this)">
                            <a href="#colorlib-services">Services</a>
                        </li>
                        <li onclick="scrollToSection('colorlib-work', this)">
                            <a href="#colorlib-work">Work</a>
                        </li>
                        <li>
                            <a href="blog.html">Blog</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">login as admin</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="head-title">Works</h2>
                    @foreach($admin->projects->take(4) as $project)
                        <a href="{{ Storage::url($project->images->random()->url) }}"
                           class="gallery image-popup-link text-center"
                           style="background-image: url({{  Storage::url($project->images->random()->url)  }});">
                            <span><i class="icon-search3"></i></span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</nav>

<script>

    function removeActivationFromLinks() {
        let ListLinks = document.querySelector('.list-links-nav');
        let links = ListLinks.querySelectorAll('li');
        links.forEach(link => {
            link.classList.remove('active');
        });
    }

    function scrollToSection($nameSection, e) {

        let btnNavClose = document.getElementById('btn-hidden-burger');
        let section = document.getElementById($nameSection);
        if (section) {
            removeActivationFromLinks();
            e.classList.add('active');
            section.scrollIntoView({
                behavior: 'smooth'
            });
            btnNavClose.click();
        }
    }
</script>
