@extends('layouts.app')

@section('title', 'Contact Us | Secret Paradise Villa')

@section('meta')
<meta name="description" content="Contact Secret Paradise Villa in Sri Lanka. Find our location, call us, or send an inquiry for bookings and information.">
<meta name="keywords" content="Contact Secret Paradise Villa, Sri Lanka villa contact, hotel contact information, villa location, contact form">
@endsection

@section('content')

<section class="contact-page py-25">
    <div class="container">

        <div class="text-center mb-3" data-aos="fade-up">
            <h1 class="page-title text-center mt-5">Contact Us & Location</h1>
            <p class="text-center">
                Get in touch with us to plan your stay. Located in a peaceful area with scenic surroundings, 
                our villa offers easy access to nearby attractions and beaches in Sri Lanka.
            </p>
        </div>

        <div class="row">

            <div class="col-md-5 mb-4" data-aos="fade-left">

                <div class="contact-card">
                    <h2>Contact Details</h2>

                    <p><strong>Address:</strong><br>
                        Secret Paradise Villa,<br>
                        Hiriketiya Beach, Dikwella, Sri Lanka
                    </p>

                    <p>
                        <strong>Phone:</strong><br>
                        <a href="tel:+94712156430">+94 71 215 6430</a>
                    </p>

                    <p>
                        <strong>Email:</strong><br>
                        <a href="mailto:info@secretparadise.com">info@secretparadise.com</a>
                    </p>

                    <p>
                        <strong>Opening Hours:</strong><br>
                        24/7 Guest Support
                    </p>
                </div>

            </div>

            <div class="col-md-7 mb-4" >

                <div class="map-container" data-aos="fade-right">

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.1680427309298!2d80.71342997447766!3d5.97158182933197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae137bab9c1d185%3A0x8811e14577899043!2sCafe%20secret%20paradise-Hiriketiya!5e0!3m2!1sen!2slk!4v1776585678646!5m2!1sen!2slk" 
                        width="600" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                </div>

            </div>

        </div>

    </div>
            <div class="contact-form mt-5 p-4">
                <div class="container">
            <h4 class="text-center mb-4">Send an Inquiry</h4>

            @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif
              @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            

            <form method="POST" action="{{ route('submit') }}">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>

                    <div class="col-md-12 mb-3">
                        <textarea name="message" class="form-control" rows="4" placeholder="Your Message"></textarea>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-outline-primary btn-md">Send Message</button>
                </div>
            </form>
          
        </div>
</section>

@endsection