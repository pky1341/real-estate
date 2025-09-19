<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/property-layout.css') }}" />
    <title>@yield('title', 'DooparSpace — Premium Real Estate')</title>
</head>
<body>
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <a href="{{ route('home') }}" class="logo m-0 float-start d-flex align-items-center">
                        <img src="{{ asset('images/logo/1758027633.png') }}" alt="DooparSpace" class="logo-img">
                    </a>
                    <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                        <li class="{{ request()->is('/') ? 'active' : '' }}">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="has-children {{ request()->is('properties*') ? 'active' : '' }}">
                            <a href="{{ route('properties') }}">Properties</a>
                            <ul class="dropdown">
                                <li><a href="{{ route('properties') }}">All Properties</a></li>
                                <li><a href="{{ route('properties', ['type' => 1]) }}">Houses</a></li>
                                <li><a href="{{ route('properties', ['type' => 2]) }}">Apartments</a></li>
                            </ul>
                        </li>
                        <li class="{{ request()->is('services') ? 'active' : '' }}">
                            <a href="{{ route('page.show', 'services') }}">Services</a>
                        </li>
                        <li class="{{ request()->is('about') ? 'active' : '' }}">
                            <a href="{{ route('page.show', 'about') }}">About</a>
                        </li>
                        <li class="{{ request()->is('contact') ? 'active' : '' }}">
                            <a href="{{ route('page.show', 'contact') }}">Contact Us</a>
                        </li>
                    </ul>
                    <a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Contact DooparSpace</h3>
                        <address>123 Premium Plaza, Business District<br>New York, NY 10001</address>
                        <ul class="list-unstyled links">
                            <li><a href="tel://15551234567">+1 (555) 123-4567</a></li>
                            <li><a href="mailto:info@dooparspace.com">info@dooparspace.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Quick Links</h3>
                        <ul class="list-unstyled float-start links">
                            <li><a href="{{ route('properties') }}">Browse Properties</a></li>
                            <li><a href="{{ route('page.show', 'services') }}">Our Services</a></li>
                            <li><a href="{{ route('page.show', 'about') }}">About Us</a></li>
                            <li><a href="{{ route('page.show', 'contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget">
                        <h3>Links</h3>
                        <ul class="list-unstyled social">
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/counter.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>