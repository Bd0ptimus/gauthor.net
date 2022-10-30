<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-xs-5" id="layout-icon">
                <div id="fh5co-logo"><a href="{{route('main')}}">
                    <img src="{{ asset('front/images/icons/bear-icon/web/32.png') }}">
                    <img src="{{ asset('front/images/icons/heart-icon/web/32.png') }}">
                    <img src="{{ asset('front/images/icons/rabbit-icon/web/32.png') }}">
                </a></div>
            </div>
            <div class="col-xs-7 text-right menu-1">
                <ul>
                    <li ><a class="nav-text" href="{{route('main')}}">Home</a></li>
                    <!-- <li><a href="about.html">Story</a></li>
                    <li class="has-dropdown">
                        <a href="gallery.html">Gallery</a>
                        <ul class="dropdown">
                            <li><a href="#">Gallery 1</a></li>
                            <li><a href="#">Gallery 2</a></li>
                            <li><a href="#">Gallery 3</a></li>
                            <li><a href="#">Gallery 4</a></li>
                        </ul>
                    </li> -->
                    <li ><a class="nav-text" href="{{route('authenticate')}}">Login</a></li>
                </ul>
            </div>
        </div>

    </div>
</nav>
