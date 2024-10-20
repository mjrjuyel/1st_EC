<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('contents/frontend') }}/assets/styles/bootstrap4/bootstrap.min.css">
    <link
        href="{{ asset('contents/frontend') }}/assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css"
        rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('contents/frontend') }}/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('contents/frontend') }}/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('contents/frontend') }}/assets/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('contents/frontend') }}/assets/plugins/slick-1.8.0/slick.css">
    @yield('product_css')
    @yield('login_css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('contents/frontend') }}/assets/styles/main_styles.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('contents/frontend') }}/assets/styles/responsive.css">
    @yield('cart_css')
    @yield('category_css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('contents/frontend') }}/assets/styles/style.css">

    <script src="http://localhost:8000/contents/admin/assets/js/jquery.min.js"></script>
    <script src="http://localhost:8000/contents/admin/assets/js/sweetalert.min.js"></script>
</head>

<body>
    <!-- sweet alert notification -->
    @if(Session::has('success'))
        <script type="text/javascript">
            swal({
                title: "Success!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "OK",
                timer: 5000,
            });
        </script>
    @endif
    @if(Session::has('error'))
        <script type="text/javascript">
            swal({
                title: "Opps!",
                text: "{{ Session::get('error') }}",
                icon: "error",
                button: "OK",
                timer: 5000,
            });
        </script>
    @endif
    <!-- sweet alert notification -->
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img
                                        src="{{ asset('contents/frontend') }}/assets/images/phone.png"
                                        alt=""></div>+38 068 005 3570
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img
                                        src="{{ asset('contents/frontend') }}/assets/images/mail.png"
                                        alt=""></div><a
                                    href="https://colorlib.com/cdn-cgi/l/email-protection#234542505750424f465063444e424a4f0d404c4e"><span
                                        class="__cf_email__"
                                        data-cfemail="34525547404755585147745359555d581a575b59"></span></a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li>
                                            <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Italian</a></li>
                                                <li><a href="#">Spanish</a></li>
                                                <li><a href="#">Japanese</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">EUR Euro</a></li>
                                                <li><a href="#">GBP British Pound</a></li>
                                                <li><a href="#">JPY Japanese Yen</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="top_bar_user">
                                    <div class="user_icon"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/user.svg"
                                            alt=""></div>
                                    @if(Auth::guard('customer')->check())
                                        <div><a
                                                href="{{ route('customer.profile',Auth::guard('customer')->user()->slug) }}">{{ Auth::guard('customer')->user()->name }}</a>
                                        </div>
                                        <a href="{{ route('customer.logout') }} "class="text-danger"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('customer.logout') }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @else
                                        <div><a href="{{ route('customer.login') }}">Sign in</a></div>
                                        <div><a href="{{ route('customer.register') }}">Sign Up</a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Main -->
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{ route('.') }}">S&G</a></div>
                            </div>
                        </div>
                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix">
                                            <input type="search" required="required" class="header_search_input"
                                                placeholder="Search for products...">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                    <i class="ri-arrow-down-fill"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                        <li><a class="clc" href="#">Computers</a></li>
                                                        <li><a class="clc" href="#">Laptops</a></li>
                                                        <li><a class="clc" href="#">Cameras</a></li>
                                                        <li><a class="clc" href="#">Hardware</a></li>
                                                        <li><a class="clc" href="#">Smartphones</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300"
                                                value="Submit"><img
                                                    src="{{ asset('contents/frontend') }}/assets/images/search.png"
                                                    alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img
                                            src="{{ asset('contents/frontend') }}/assets/images/heart.png"
                                            alt="">
                                    </div>
                                    @if(Auth::guard('customer')->check())
                                        @php
                                            $wishlist
                                            =App\Models\WishList::where('customer_id',Auth::guard('customer')->user()->id)->count();
                                        @endphp
                                    @endif
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a
                                                href="{{ route('wishlist') }}">Wishlist</a></div>
                                        @if(Auth::guard('customer')->check())
                                            <div class="wishlist_count">{{ $wishlist }}</div>
                                        @else
                                            <div class="wishlist_count">0</div>
                                        @endif
                                    </div>
                                </div>
                                <!-- Cart -->
                                @if(Auth::guard('customer')->check())
                                    @php

                                    @endphp
                                @endif
                                <div class="cart">
                                    <a href="{{route('allcart')}}">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="{{ asset('contents/frontend') }}/assets/images/cart.png"
                                                alt="">
                                            <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a
                                                    href="{{ route('allcart') }}">Cart</a></div>
                                            <div class="cart_price">${{ Cart::subtotal() }}</div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Navigation -->
            @include('layouts.section_divide.main_nav')
        </header>
        @yield('content')
        @yield('product')
        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 footer_col">
                        <div class="footer_column footer_contact">
                            <div class="logo_container">
                                <div class="logo"><a href="#">OneTech</a></div>
                            </div>
                            <div class="footer_title">Got Question? Call Us 24/7</div>
                            <div class="footer_phone">+38 068 005 3570</div>
                            <div class="footer_contact_text">
                                <p>17 Princess Road, London</p>
                                <p>Grester London NW18JR, UK</p>
                            </div>
                            <div class="footer_social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 offset-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Find it Fast</div>
                            <ul class="footer_list">
                                <li><a href="#">Computers & Laptops</a></li>
                                <li><a href="#">Cameras & Photos</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Smartphones & Tablets</a></li>
                                <li><a href="#">TV & Audio</a></li>
                            </ul>
                            <div class="footer_subtitle">Gadgets</div>
                            <ul class="footer_list">
                                <li><a href="#">Car Electronics</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <ul class="footer_list footer_list_2">
                                <li><a href="#">Video Games & Consoles</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Cameras & Photos</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Computers & Laptops</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer_column">
                            <div class="footer_title">Customer Care</div>
                            <ul class="footer_list">
                                @if(Auth::guard('customer')->check())
                                <li><a href="{{route('customer.profile',Auth::guard('customer')->user()->slug)}}">My Account</a></li>
                                @else
                                <li><a href="{{route('customer.login')}}">Login</a></li>
                                @endif
                                <li><a href="{{route('wishlist')}}">Wish List</a></li>
                                <li><a href="#">Customer Services</a></li>
                                <li><a href="#">Returns / Exchange</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Product Support</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <!-- Copyright -->

        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div
                            class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                            <div class="copyright_content">
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());

                                </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                    aria-hidden="true"></i> by <a href="https://templatespoint.net/"
                                    target="_blank">Styles and Gadgets</a>
                            </div>
                            <div class="logos ml-sm-auto">
                                <ul class="logos_list">
                                    <li><a href="#"><img
                                                src="{{ asset('contents/frontend') }}/assets/images/logos_1.png"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('contents/frontend') }}/assets/images/logos_2.png"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('contents/frontend') }}/assets/images/logos_3.png"
                                                alt=""></a></li>
                                    <li><a href="#"><img
                                                src="{{ asset('contents/frontend') }}/assets/images/logos_4.png"
                                                alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('contents/frontend') }}/assets/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('contents/frontend') }}/assets/styles/bootstrap4/popper.js"></script>
    <script src="{{ asset('contents/frontend') }}/assets/styles/bootstrap4/bootstrap.min.js">
    </script>
    <script src="{{ asset('contents/frontend') }}/assets/plugins/greensock/TweenMax.min.js">
    </script>
    <script src="{{ asset('contents/frontend') }}/assets/plugins/greensock/TimelineMax.min.js">
    </script>
    <script src="{{ asset('contents/frontend') }}/assets/plugins/scrollmagic/ScrollMagic.min.js">
    </script>
    <script src="{{ asset('contents/frontend') }}/assets/plugins/greensock/animation.gsap.min.js">
    </script>
    <script src="{{ asset('contents/frontend') }}/assets/plugins/greensock/ScrollToPlugin.min.js">
    </script>
    <script
        src="{{ asset('contents/frontend') }}/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js">
    </script>
    <script src="{{ asset('contents/frontend') }}/assets/plugins/slick-1.8.0/slick.js"></script>
    <script src="{{ asset('contents/frontend') }}/assets/plugins/easing/easing.js"></script>
    @yield('product_js')
    @yield('login_js')
    @yield('cart_js')
    @yield('category_js')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script src="{{ asset('contents/frontend') }}/assets/js/custom.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-23581568-13');

        // notification timeout
        setTimeout(function () {
            let alert = document.querySelector('.alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 3000); // 3 seconds

    </script>

</body>


</html>
