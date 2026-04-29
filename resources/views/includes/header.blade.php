<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Secret Paradise Villa | Hidden Gem in Hiriketiya')</title>
    <meta name="description" content="@yield('meta_description', 'Welcome make your dreams come true waking up by the sounds of nature and overviewing the Indian Ocean while the sun comes up in our Secret Paradise Villa located in Hiriketiya, Sri Lanka. Book your stay now and experience the ultimate tropical getaway.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Secret Paradise Villa, Hiriketiya Beach, Sri Lanka villa, tropical getaway, beachfront villa, luxury accommodation, hotel in Sri Lanka')">
	<link rel="icon" type="image/x-icon" href="{{ asset('public/images/favicon.ico')}}">


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Forum&display=swap" rel="stylesheet">
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,700'>

	<link rel="stylesheet" href="{{ asset('public/css/normalize.min.css')}}">
	<link rel='stylesheet' href="{{ asset('public/css/font-awesome.min.css')}}">
	<link rel='stylesheet' href="{{ asset('public/admin/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('public/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('public/css/icomoon.css')}}">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{ asset('public/css/themify-icons.css')}}">
	<link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('public/css/magnific-popup.css')}}">

	<!-- Bootstrap DateTimePicker --> 
	<link rel="stylesheet" href="{{ asset('public/css/bootstrap-datetimepicker.min.css')}}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ asset('public/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('public/css/owl.theme.default.min.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('public/css/style.css')}}">

    <!--Lightbox CSS-->
    <link href="{{ asset('public/css/lightbox.min.css')}}" rel="stylesheet" />

    <!--swiper css-->
    <link rel="stylesheet" href="{{ asset('public/css/swiper-bundle.min.css')}}" />
    
    <!-- aos animation css -->
    <link rel="stylesheet" href="{{ asset('public/css/aos.css')}}" />

   <body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <span class="logo-text"><img src="{{ asset('public/images/project-logo.png')}}" alt="Secret Paradise Villa | Logo" title="Secret Paradise Villa | Logo"></span>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('rooms*') ? 'active' : '' }}" href="{{ url('rooms') }}">Rooms</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dining*') ? 'active' : '' }}" href="{{ url('dining') }}">Dining</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('gallery*') ? 'active' : '' }}" href="{{ url('gallery') }}">Gallery</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link {{ Request::is('offers*') ? 'active' : '' }}" href="{{ url('offers') }}">Special Offers</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ url('contact') }}">Contact Us</a>
                </li>

				<li class="nav-item ml-3">
                    <a class="btn btn-book-now text-white" href="{{ url('/reservation') }}">
                         Book Now
                    </a>
                </li>

                @guest
                    <li class="nav-item">
                        <a class="btn bg-secondary btn-book-now text-white" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <a class="dropdown-item" href="{{ url('/my-account') }}">
                                <i class="fas fa-calendar-check"></i> My Bookings
                            </a>
                            <a class="dropdown-item" href="{{ url('/profile') }}">
                                <i class="fas fa-user-edit"></i> Profile
                            </a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                @endguest

                
            </ul>
        </div>
    </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>


	


 
    
