
<!-- Modernizr JS -->
<script src="{{ asset('public/js/modernizr-2.6.2.min.js')}}"></script>

    <!-- jQuery -->
<script src="{{ asset('public/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/js/popper.min.js')}}"></script>
<script src="{{ asset('public/js/sweetalert.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('public/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{ asset('public/js/jquery.waypoints.min.js')}}"></script>
<!-- Carousel -->
<script src="{{ asset('public/js/owl.carousel.min.js')}}"></script>
<!-- countTo -->
<script src="{{ asset('public/js/jquery.countTo.js')}}"></script>

<!-- Stellar Parallax -->
<script src="{{ asset('public/js/jquery.stellar.min.js')}}"></script>

<!-- Magnific Popup -->
<script src="{{ asset('public/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('public/js/magnific-popup-options.js')}}"></script>

<script src="{{ asset('public/js/moment.min.js')}}"></script>
<script src="{{ asset('public/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- Lightbox JS -->
<script src="{{ asset('public/js/lightbox.min.js')}}"></script>
<!-- Swiper JS -->
<script src="{{ asset('public/js/swiper-bundle.min.js')}}"></script>
<!-- <script src="{{ asset('public/js/bootstrap.bundle.min.js')}}"></script> -->
<!-- UserWay Accessibility Widget -->
<script src="https://cdn.userway.org/widget.js" data-account="aRUYcDKRpE"></script>

<!-- aos animation -->
<script src="{{ asset('public/js/aos.js')}}"></script>


<!-- Main -->
<script src="{{ asset('public/js/main.js')}}"></script>


</head>
<body>
<!-- Footer -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="footer-heading">Secret Paradise Villa</h5>
                <p class="footer-text">
                    Experience luxury and comfort in Hiriketiya Beach. Your dream vacation awaits at Secret Paradise Villa.
                </p>
                <div class="social-icons mt-4">
                    <a href="#" class="social-icon" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="TripAdvisor">
                        <i class="fab fa-tripadvisor"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-heading">Quick Links</h5>
                <ul class="footer-links">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/rooms') }}">Rooms</a></li>
                    <li><a href="{{ url('/dining') }}">Dining</a></li>
                    <!-- <li><a href="{{ url('/offers') }}">Special Offers</a></li> -->
                    <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="footer-heading">Support</h5>
                <ul class="footer-links">
                    <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                    <li><a href="{{ url('/faq') }}">FAQs</a></li>
                    <!-- <li><a href="{{ url('#') }}">About Us</a></li>
                    <li><a href="{{ url('#') }}">Terms & Conditions</a></li>
                    <li><a href="{{ url('#') }}">Privacy Policy</a></li> -->
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="footer-heading">Contact Info</h5>
                <ul class="footer-contact">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Secret Paradise Villa, Hiriketiya Beach, Dikwella, Sri Lanka</span>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <a href="tel:+94712156430"><span>+94 71 215 6430</span></a>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:info@secretparadise.lk"><span>info@secretparadise.lk</span></a>
                    </li>
                    <li>
                        <i class="fas fa-clock"></i>
                        <span>24/7 Customer Support</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row">
            <div class="col-12">
                <div class="footer-bottom text-center">
                    <p class="mb-0">
                        &copy; {{ date('Y') }} Secret Paradise Villa. All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- WhatsApp Integration -->
    <div class="wa-container">
        <a href="https://wa.me/94712156430?text=Hello%2C%20I%E2%80%99m%20interested%20in%20booking%20a%20room%20at%20Secret%20Paradise%20Villa.%20Can%20you%20share%20availability%20and%20prices%3F" target="_blank" class="wa-float">
            <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" width="30">
        </a>
    </div>
    

    <!-- Back to Top Button -->
    <button id="backToTop" class="back-to-top" aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>
