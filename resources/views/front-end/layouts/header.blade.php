<header class="continer-fluid ">
    <div class="header-top">
        <div class="container">
            <div class="row col-det">
                <div class="col-lg-6 d-none d-lg-block">
                    <ul class="ulleft">
                        <li>
                            <i class="far fa-envelope"></i>
                            Here4u.jaipur@gmail.com
                            <span>|</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-volume"></i>
                            +72199 99099
                        </li>
                        <li>+86194 12780</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 folouws">
                    <ul class="ulright">
                        <li> <small>Folow Us </small>:</li>
                        {{-- <li>
                            <i class="fab fa-facebook-square"></i>
                        </li>
                        <li>
                            <i class="fab fa-twitter-square"></i>
                        </li> --}}
                        <li>
                            <a href="https://www.youtube.com/@Here4u.jaipur"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/here4u.jaipur?igsh=MTI4b2ZjZDJ2ZGFnNg=="><i
                                    class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a
                                href="https://www.linkedin.com/in/here4u-jaipur-2b19b6292?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i
                                    class="fab fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 d-none d-md-block col-md-6 btn-bhed">
                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSfVbwZt6JzbWxkhIBg120956GStyBfO6LEmTq4Wo2o1dqJiYw/viewform"
                        class="btn btn-sm btn-success">Join Us</a>
                </div>
            </div>
        </div>
    </div>
    <div id="menu-jk" class="header-bottom">
        <div class="container">
            <div class="row nav-row">
                <div class="col-lg-3 col-md-12 logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/images/logo.jpg') }}" alt="" width="40%">
                        <a data-toggle="collapse" data-target="#menu" href="#menu">
                            <i class="fas d-block d-lg-none  small-menu fa-bars"></i>
                        </a>
                    </a>
                </div>
                <div id="menu" class="col-lg-9 col-md-12 d-none d-lg-block nav-col">
                    <ul class="navbad">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('index') }}">Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about-us.index') }}">About Us</a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index') }}">Events</a>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gallery.index') }}">Gallery</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blogs.index') }}">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact-us.index') }}">Contact US</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
