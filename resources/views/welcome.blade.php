@extends('layouts.app')
@section('title', 'Luxury Rooms in Sri Lanka | Secret Paradise Villa')

@section('meta')
<meta name="description" content="Explore luxury rooms at Secret Paradise Villa. Comfortable, affordable, and perfect for your stay in Sri Lanka. Book your ideal room today.">
<meta name="keywords" content="hotel rooms Sri Lanka, luxury rooms, villa accommodation, booking rooms">
@endsection

@section('content')

<!-- <header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background:url(public/images/banner.webp)" data-stellar-background-ratio="0.5"> -->
<header>
    <!-- <div class="overlay"></div> -->
  <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="4000" data-fade="true">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('public/images/banner.webp')}}" class="d-block w-100  h-100vh" alt="Sunrise Villa | Secret Paradise" title="Sunrise Villa | Secret Paradise">
        <div class="carousel-caption d-none d-md-block" data-aos="fade-down">
          <p class="slogan-main text-uppercase cursive-font medium" >Sunrise Villa</h5>
          <p>Do you like to start your day with this beautiful view secretly?</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('public/images/dining.webp')}}" class="d-block w-100  h-100vh" alt="Breakfast | Cafe Secret Paradise" title="Breakfast | Cafe Secret Paradise">
        <div class="carousel-caption d-none d-md-block" data-aos="fade-down">
          <p class="slogan-main text-uppercase cursive-font medium">Cafe at Secret Paradise</h5>
          <p>Enjoy breakfast with warm coffee under this calming mango</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('public/images/stay.webp')}}" class="d-block w-100  h-100vh" alt="Wood Villa | Secret Paradise" title="Wood Villa | Secret Paradise">
        <div class="carousel-caption d-none d-md-block" data-aos="fade-down">
          <p class="slogan-main text-uppercase cursive-font medium">Wood Villa</h5>
          <p>Feel calm and nature vibes in this wood villa. Visit Us.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

    <!-- <div class="gtco-container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0 text-left">
                

                <div class="row row-mt-15em">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 mt-text animate-box" data-animate-effect="fadeInUp">
                        <center>
                        <h1 class="cursive-font">Hotel Management System!</h1>	<br>
                        <a href="{{ url('reservation') }}" class="btn btn-reserve btn-block">Reserve Now</a>
                        </center>
                    </div>
                    <div class="col-md-3"></div>
                    {{-- <div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
                        <div class="form-wrap">
                            <div class="tab">
                                
                                <div class="tab-content">
                                    <div class="tab-content-inner active" data-content="signup">
                                        <h3 class="cursive-font">Table Reservation</h3>
                                        <form action="#">
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label for="activities">Persons</label>
                                                    <select name="#" id="" class="form-control">
                                                        <option value="">1</option>
                                                        <option value="">2</option>
                                                        <option value="">3</option>
                                                        <option value="">4</option>
                                                        <option value="">5+</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label for="date-start">Date</label>
                                                    <input type="text" id="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label for="date-start">Time</label>
                                                    <input type="text" id="time" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-primary btn-block" value="Reserve Now">
                                                </div>
                                            </div>
                                        </form>	
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div> -->
</header>
<!-- home intro -->
<section data-aos="fade-up" class="intro-section py-5">
    <div class="container mt-5 text-center">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title">Welcome to Secret Paradise Villa</h2>
                <p class="section-subtitle">Experience luxury and comfort in Hiriketiya Beach. Your dream vacation awaits at Secret Paradise Villa.</p>
            </div>
            <p class="">
                Discover a hidden tropical escape at <strong>Secret Paradise Villa</strong>, located in the heart of Hiriketiya, Sri Lanka.
                Experience a perfect blend of luxury accommodation, beachfront living, and authentic island dining designed for relaxation and adventure.
            </p>

            <p class="">
                Whether you're planning a peaceful getaway, a surfing trip, or a romantic retreat, our villas offer ocean views,
                modern comfort, and warm Sri Lankan hospitality. Enjoy freshly prepared cuisine, serene surroundings,
                and unforgettable moments just steps away from the beach.
            </p>
        </div>
    </div>
</section>
<!-- Rooms Section -->
<section data-aos="fade-up" class="rooms-section py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title">Our Rooms & Suites</h2>
                <p class="section-subtitle">Experience comfort and luxury in our carefully designed accommodations</p>
            </div>
        </div>

        <div class="row">
            @forelse($rooms as $room)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="room-card">
                    <div class="room-image">
                        <img src="{{ asset('public/images/rooms/' . $room->r_image) }}" alt="{{ $room->r_name }}" class="img-fluid">
                        <div class="room-badge">{{ $room->r_quantity }}</div>
                    </div>
                    <div class="room-content">
                        <h3 class="room-title">{{ $room->r_name }}</h3>
                        <div class="room-info">
                            <span><i class="fas fa-users"></i> Up to {{ $room->max_occupancy }} guests</span>
                        </div>
                        <p class="room-description">{{ Str::limit($room->r_description, 500) }}</p>
                        <div class="room-footer">
                            <div class="room-price text-center">
                                <span class="price-label">From</span>
                                <span class="price-amount">${{ number_format($room->r_price, 2) }}</span>
                                <span class="price-period">/night</span>
                            </div>
                            
                        </div>
                        <a href="{{ url('/reservation?room=' . $room->r_id) }}" class="btn btn-book">
                                <i class="fas fa-calendar-check mr-2"></i> Book Now
                            </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">No rooms available at the moment.</p>
            </div>
            @endforelse
        </div>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ url('/rooms') }}" class="btn btn-outline-primary btn-md">
                    View All Rooms <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- dining section -->
<section    class="dining-section py-5">
<div class="container mt-5 text-center">
        <div class="row mb-5" data-aos="fade-left">
            <div class="col-12 text-center">
                <h2 class="section-title">Dining at Secret Paradise Hiriketiya</h2>
                <p class="section-subtitle">Enjoy authentic Sri Lankan cuisine, fresh seafood, and tropical dining experiences just steps away from the beach.</p>
            </div>
        </div>
    <div class="row">
        @foreach($menus as $menu)
            <div class="col-md-3">
                <div class="card shadow-sm mb-4" data-aos="fade-left">
                    <img src="{{ asset('public/images/food/'.$menu->image) }}" 
                         class="card-img-top">

                    <div class="card-body text-center">
                        <h3 class="room-title">{{ $menu->name }}</h3>
                        <p class="card-text text-muted">
                            {{ \Illuminate\Support\Str::limit($menu->description, 60) }}
                        </p>

                        <span class="price-amount">${{ number_format($menu->price, 2) }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ url('/dining') }}" class="btn btn-outline-primary btn-md">
                    View All Dining Options <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
</div>
</section>
<section data-aos="fade-right" class="home-gallery py-5">
    <div class="container">

        <div class="text-center mb-4">
            <h2>Discover Our Experience</h2>
            <p>Explore moments from our rooms, dining, and surroundings.</p>
        </div>

            <div class="swiper gallerySwiper">
            <div class="swiper-wrapper">

                @foreach($images as $img)
                <div class="swiper-slide">
                    <div class="gallery-card">
                        <img src="{{ asset($img) }}" class="gallery-img">
                    </div>
                </div>
                @endforeach

            </div>

            <!-- navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- pagination -->
            <div class="swiper-pagination"></div>
        </div>
    <div class="row mt-4">
        <div class="col-12 text-center">
            <a href="{{ url('/gallery') }}" class="btn btn-outline-primary btn-md">
                View Full Gallery <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
@endsection
 <!-- <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
<script>
    var botmanWidget = {
aboutText: 'Write Something',
introMessage: "✋ Hi! I'm form eimpact.net"
};
</script>

<script src="//code.jivosite.com/widget/9usFdoA8FJ" async></script>
 -->
